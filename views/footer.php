<!-- 
<footer class="bg-light" style="
	padding: 10px;position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  color: black;
  text-align: left;">
    <strong>Copyright &copy; 2021-2022 <a href="http://clinicalsoftware.in">Sonu Thakare</a>.</strong>
    All rights reserved.
    
  </footer> -->
  </body>
<script type="text/javascript">

  function fnExcelReportPaymentDone(tbl_name)
{
  alert(tbl_name);
    var tab_text="<table border='2px'><tr bgcolor='#87AFC6'>";
    var textRange; var j=0;
    tab = document.getElementById(tbl_name); // id of table

    for(j = 0 ; j < tab.rows.length ; j++) 
    {     
        tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
        //tab_text=tab_text+"</tr>";
    }

    tab_text=tab_text+"</table>";
    tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
    tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
    tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE "); 

    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
    {
        txtArea1.document.open("txt/html","replace");
        txtArea1.document.write(tab_text);
        txtArea1.document.close();
        txtArea1.focus(); 
        sa=txtArea1.document.execCommand("SaveAs",true,"Sevak.xls");
    }  
    else                 //other browser not tested on IE 11
        sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));  

    return (sa);
}


</script>
  <script type="text/javascript">

  function chk_modal()
{
  $('#modal_signup').modal('show');
}
function login_validation() {

  var username=document.getElementById("username").value
  var admin_password=document.getElementById("admin_password").value

  document.getElementById("err_username").value="";
  document.getElementById("err_admin_password").value="";

  var flag=1;

  if(username=="")
  {
  		document.getElementById("err_username").innerHTML="enter username";
  		flag=0;
  }
  if(admin_password=="")
  {
  		document.getElementById("err_admin_password").innerHTML="enter password";
  		flag=0;
  }
  if(flag==1)
  {
  	return true;
  }
  else
  {
  	return false;
  }

}
  	function login_profile()
{
  var userid=document.getElementById("userid").value
  var password=document.getElementById("password").value
  //alert(id);
  //document.getElementById("ch_id").value=id;
  $('#imgload').show();
  if(userid=="")
  {
  		
  		alert('Enter Username Please');
  }
  else if(password=="")
  {
  		
  		alert('Enter Password Please');
  }
  else
  {
  
		  $.ajax(
		    {
		      type:"POST",
		      url:"<?php print base_url(); ?>index.php/Welcome/get_login",
		      data:{
		              userid:userid,
		              password:password
		            }
		    }).done(function(message){
		      var res=message.split('_|_');
		 //alert(message);
		    $('#imgload').hide();
		   if(message!="")
		     {
		         
              if(message=="admin")
              {
		            window.location = "<?php print base_url(); ?>index.php/Welcome/index2";
		             //window.location("<?php //print base_url(); ?>index.php/Welcome/index2");
              }
              else if(message=="patient")
              {
                window.location = "<?php print base_url(); ?>index.php/Welcome/patient_dashboard";
                 //window.location("<?php //print base_url(); ?>index.php/Welcome/index2");
              }
              else if(message=="Receptionist")
              {
                window.location = "<?php print base_url(); ?>index.php/Welcome/user_dashboard";
                 //window.location("<?php //print base_url(); ?>index.php/Welcome/index2");
              }
              else if(message=="mail_msg")
              {
                $('#lab_login').text("Your Can't Login Anymore Please Renew Package Of Software To This Year !");  
                $('#lab_login').css("color","#17a2b8");
              }
		        
		    }
		    else
		    {
		      
		        $('#lab_login').text("Invalid username or password");  
		        $('#lab_login').css("color","#17a2b8");
		        //alert("Wrong UserName or Password");
		    }

		    
		     
		      //$('#myModalc').modal('show');
		  });
	}
}
function getsubcategory()
{
  var category_id=document.getElementById("category_id").value
 
      $.ajax(
        {
          type:"POST",
          url:"<?php print base_url(); ?>backend/Posts/getSubcategory",
          data:{
                  category_id:category_id,
                 
                }
        }).done(function(message){
          var res=message.split('_|_');
          $('#subcategory_id').empty();
          $('#subcategory_id').append(message);
        
      });
}  
function getTypeAddToProduct()
{
  var product_id=document.getElementById("product_id").value
  var type_id=document.getElementById("type_id").value
 
      $.ajax(
        {
          type:"POST",
          url:"<?php print base_url(); ?>backend/Posts/addTypeToProduct",
          data:{
                  product_id:product_id,
                  type_id:type_id
                 
                }
        }).done(function(message){
          var res=message.split('_|_');
          $('#tblproducttype').empty();
          $('#tblproducttype').append(message);
        
      });
}  
function getDeleteTypeDetails(id)
{
 
 
      $.ajax(
        {
          type:"POST",
          url:"<?php print base_url(); ?>backend/Posts/deleteTypeToTable",
          data:{
                  detail_id:id,
                 
                }
        }).done(function(message){
          var res=message.split('_|_');
          $('#tblproducttype').empty();
          $('#tblproducttype').append(message);
        
      });
}  
</script>
</html>