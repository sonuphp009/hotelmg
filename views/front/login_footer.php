<!-- Footer -->
    <!-- Scroll to top start -->
    <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
    </div>
    <!-- Scroll to Top End -->

   

   

   

<!--===============================================================================================-->  
  <script src="<?php echo base_url();?>assets/customer_theme/assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <!-- jQuery JS -->
    <script src="<?php echo base_url();?>assets/customer_theme/assets/js/vendor/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="<?php echo base_url();?>assets/customer_theme/assets/js/vendor/bootstrap.bundle.min.js"></script>
    <!-- slick Slider JS -->
    <script src="<?php echo base_url();?>assets/customer_theme/assets/js/plugins/slick.min.js"></script>
    <!-- Countdown JS -->
    <script src="<?php echo base_url();?>assets/customer_theme/assets/js/plugins/countdown.min.js"></script>
    <!-- Nice Select JS -->
    <script src="<?php echo base_url();?>assets/customer_theme/assets/js/plugins/nice-select.min.js"></script>
    <!-- jquery UI JS -->
    <script src="<?php echo base_url();?>assets/customer_theme/assets/js/plugins/jqueryui.min.js"></script>
    <!-- Image zoom JS -->
    <script src="<?php echo base_url();?>assets/customer_theme/assets/js/plugins/image-zoom.min.js"></script>
    <!-- Images loaded JS -->
    <script src="<?php echo base_url();?>assets/customer_theme/assets/js/plugins/imagesloaded.pkgd.min.js"></script>
    <!-- mail-chimp active js -->
    <script src="<?php echo base_url();?>assets/customer_theme/assets/js/plugins/ajaxchimp.js"></script>
    <!-- contact form dynamic js -->
    <script src="<?php echo base_url();?>assets/customer_theme/assets/js/plugins/ajax-mail.js"></script>
    <!-- google map api -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfmCVTjRI007pC1Yk2o2d_EhgkjTsFVN8"></script>
    <!-- google map active js -->
    <script src="<?php echo base_url();?>assets/customer_theme/assets/js/plugins/google-map.js"></script>
    <!-- Main JS -->
    <script src="<?php echo base_url();?>assets/customer_theme/assets/js/main.js"></script>

</body>
<script type="text/javascript">
function chk_pass()
{
    var password=document.getElementById('password').value;
    var confirm_password=document.getElementById('confirm_password').value;
    if(password!=confirm_password)
    {
        //document.getElementById('lbl_confirm_password').color="red";
        $('#lbl_confirm_password').empty();
       // $('#lbl_confirm_password').color("red");
        $('#lbl_confirm_password').append("Password didn't match !");

        document.getElementById('confirm_password').value="";
    }
    else
    {
        $('#lbl_confirm_password').empty();

    }
}
</script>
</html>