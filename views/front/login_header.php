<?php 
$user_id = $this->session->userdata('user_id');
$profile_pic = $this->session->userdata('profile_pic');
$full_name = $this->session->userdata('full_name');

function isMobile(){
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}
?>
<!DOCTYPE html>
<!--
	ustora by freshdesignweb.com
	Twitter: https://twitter.com/freshdesignweb
	URL: https://www.freshdesignweb.com/ustora/
-->
<html lang="en">
  <head>
   <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Wanoway - <?php if(isset($page_title)) echo $page_title;?></title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo  base_url().'assets/img/wanoway.jpeg'?>">

    <!-- CSS
    ============================================ -->
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,900" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/customer_theme/assets/css/vendor/bootstrap.min.css">
    <!-- Pe-icon-7-stroke CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/customer_theme/assets/css/vendor/pe-icon-7-stroke.css">
    <!-- Font-awesome CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/customer_theme/assets/css/vendor/font-awesome.min.css">
    <!-- Slick slider css -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/customer_theme/assets/css/plugins/slick.min.css">
    <!-- animate css -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/customer_theme/assets/css/plugins/animate.css">
    <!-- Nice Select css -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/customer_theme/assets/css/plugins/nice-select.css">
    <!-- jquery UI css -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/customer_theme/assets/css/plugins/jqueryui.min.css">
    <!-- main style css -->
    <!-- main style css -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/customer_theme/assets/css/style.css">
<!--===============================================================================================-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"  />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/fontawesome.min.css"  />
<style type="text/css">
    .divider:after,
.divider:before {
content: "";
flex: 1;
height: 1px;
background: #eee;
}
.h-custom {
height: calc(100% - 73px);
}
@media (max-width: 450px) {
.h-custom {
height: 100%;
}
}
</style>
  </head>
 <body class="animsition" ><!-- style="background: rgb(2,0,36);
background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,107,121,1) 35%, rgba(0,212,255,1) 100%);" -->
    
     <!-- Start Header Area -->
    <header class="header-area header-wide">
        <!-- main header start -->
        <div class="main-header d-none d-lg-block" >
           

           
            <!-- header middle area end -->
        </div>
        <!-- main header start -->

       
     <!-- offcanvas mobile menu end -->
    </header>
    <!-- end Header Area -->

    