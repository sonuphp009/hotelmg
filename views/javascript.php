  <!--   Core JS Files   -->
  <!--   Core JS Files   -->
	<script src="<?php print base_url(); ?>assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="<?php print base_url(); ?>assets/js/core/popper.min.js"></script>
	<script src="<?php print base_url(); ?>assets/js/core/bootstrap.min.js"></script>

	<!-- jQuery UI -->
	<script src="<?php print base_url(); ?>assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="<?php print base_url(); ?>assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- jQuery Scrollbar -->
	<script src="<?php print base_url(); ?>assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


	<!-- Chart JS -->
	<script src="<?php print base_url(); ?>assets/js/plugin/chart.js/chart.min.js"></script>

	<!-- jQuery Sparkline -->
	<script src="<?php print base_url(); ?>assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

	<!-- Chart Circle -->
	<script src="<?php print base_url(); ?>assets/js/plugin/chart-circle/circles.min.js"></script>

	<!-- Datatables -->
	<script src="<?php print base_url(); ?>assets/js/plugin/datatables/datatables.min.js"></script>

	<!-- Bootstrap Notify -->
	<script src="<?php print base_url(); ?>assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

	<!-- jQuery Vector Maps -->
	<script src="<?php print base_url(); ?>assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
	<script src="<?php print base_url(); ?>assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

	<!-- Sweet Alert -->
	<script src="<?php print base_url(); ?>assets/js/plugin/sweetalert/sweetalert.min.js"></script>

	<!-- Atlantis JS -->
	<script src="<?php print base_url(); ?>assets/js/atlantis.min.js"></script>

	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="<?php print base_url(); ?>assets/js/setting-demo.js"></script>
	<script src="<?php print base_url(); ?>assets/js/demo.js"></script>
	<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#thumb').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
  <script src="https://cdn.jsdelivr.net/gh/linways/table-to-excel@v1.0.4/dist/tableToExcel.js"></script>

<script>
$(document).ready(function()
    {
    	$("#btnExportReport").click(function() 
	    {

	        
	            
	                let table = document.getElementsByTagName("table");
	                  TableToExcel.convert(table[0], { // html code may contain multiple tables so here we are refering to 1st table tag
	                 name: `category.xlsx`, // fileName you could use any name
	                 sheet: {
	                    name: 'Sheet 1' // sheetName
	                 }
	              });
	        

	    });

    	$("#btnExportReportSubCat").click(function() 
	    {

	        
	            
	                let table = document.getElementsByTagName("table");
	                  TableToExcel.convert(table[0], { // html code may contain multiple tables so here we are refering to 1st table tag
	                 name: `subcategory.xlsx`, // fileName you could use any name
	                 sheet: {
	                    name: 'Sheet 1' // sheetName
	                 }
	              });
	        

	    });

	$("#btnExportReportProduct").click(function() 
	    {

	        
	            
	                let table = document.getElementsByTagName("table");
	                  TableToExcel.convert(table[0], { // html code may contain multiple tables so here we are refering to 1st table tag
	                 name: `product.xlsx`, // fileName you could use any name
	                 sheet: {
	                    name: 'Sheet 1' // sheetName
	                 }
	              });
	        

	    });



	   
});

 /*$("#btnExport").click(function() 
	    {

	          var cuisine_title=document.getElementById("cuisine_title").value;
	        var cuisine_status=document.getElementById("cuisine_status").value;
	        

	      $.ajax(
	        {

	          type:"POST",

	          url:"<?php print base_url(); ?>backend/Category/getCategoryReport",

	          data:{

	                  cuisine_title:cuisine_title,
	                  cuisine_status:cuisine_status,
	                 
	                }

	        }).done(function(message){

	          if(message!="")
	          {
	            $('#tbl_report').empty();
	            $('#tbl_report').append(message);
	            
	                let table = document.getElementsByTagName("table");
	                  TableToExcel.convert(table[0], { // html code may contain multiple tables so here we are refering to 1st table tag
	                 name: `category.xlsx`, // fileName you could use any name
	                 sheet: {
	                    name: 'Sheet 1' // sheetName
	                 }
	              });
	              window.location.href="<?php echo base_url().'backend/Category/manageCategory/';?>"+cuisine_title+"/"+cuisine_status;
	          }

	          
	      });

	    });*/
</script>
	<script>
		Circles.create({
			id:'circles-1',
			radius:45,
			value:60,
			maxValue:100,
			width:7,
			text: 5,
			colors:['#f1f1f1', '#FF9E27'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		Circles.create({
			id:'circles-2',
			radius:45,
			value:70,
			maxValue:100,
			width:7,
			text: 36,
			colors:['#f1f1f1', '#2BB930'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		Circles.create({
			id:'circles-3',
			radius:45,
			value:40,
			maxValue:100,
			width:7,
			text: 12,
			colors:['#f1f1f1', '#F25961'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		var totalIncomeChart = document.getElementById('totalIncomeChart').getContext('2d');

		var mytotalIncomeChart = new Chart(totalIncomeChart, {
			type: 'bar',
			data: {
				labels: ["S", "M", "T", "W", "T", "F", "S", "S", "M", "T"],
				datasets : [{
					label: "Total Income",
					backgroundColor: '#ff9e27',
					borderColor: 'rgb(23, 125, 255)',
					data: [6, 4, 9, 5, 4, 6, 4, 3, 8, 10],
				}],
			},
			options: {
				responsive: true,
				maintainAspectRatio: false,
				legend: {
					display: false,
				},
				scales: {
					yAxes: [{
						ticks: {
							display: false //this will remove only the label
						},
						gridLines : {
							drawBorder: false,
							display : false
						}
					}],
					xAxes : [ {
						gridLines : {
							drawBorder: false,
							display : false
						}
					}]
				},
			}
		});

		$('#lineChart').sparkline([105,103,123,100,95,105,115], {
			type: 'line',
			height: '70',
			width: '100%',
			lineWidth: '2',
			lineColor: '#ffa534',
			fillColor: 'rgba(255, 165, 52, .14)'
		});
	</script>
	<script language="javascript" type="text/javascript">
        $(document).ready(function()
        {
        	//alert();
                $('#search2').keyup(function() {
                        searchTable2($(this).val());
                });
        });

        function searchTable2(inputVal) {
                var table = $('#searchTable2');
                table.find('tr').each(function(index, row) {
                        var allCells = $(row).find('td');
                        if (allCells.length > 0) {
                                var found = false;
                                allCells.each(function(index, td) {
                                        var regExp = new RegExp(inputVal, 'i');
                                        if (regExp.test($(td).text())) {
                                                found = true;
                                                return false;
                                        }
                                });
                                if (found == true)
                                        $(row).show();
                                else
                                        $(row).hide();
                        }
                });
        }
</script>