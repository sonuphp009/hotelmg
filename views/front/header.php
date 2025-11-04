<?php 
$logged_in = $this->session->userdata('logged_in');

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
    <!-- <link rel="stylesheet" href="<?php echo base_url();?>assets/customer_theme/assets/css/vendor/fontawesome.min.css"> -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Slick slider css -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/customer_theme/assets/css/plugins/slick.min.css">
    <!-- animate css -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/customer_theme/assets/css/plugins/animate.css">
    <!-- Nice Select css -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/customer_theme/assets/css/plugins/nice-select.css">
    <!-- jquery UI css -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/customer_theme/assets/css/plugins/jqueryui.min.css">
    <!-- <link rel="stylesheet" href="<?php ///echo base_url();?>assets/customer_theme/assets/css/plugins/custome.css"> -->
    <!-- main style css -->
    <!-- main style css -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/customer_theme/assets/css/style.css">
<!--===============================================================================================-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"  />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/fontawesome.min.css"  />
 <style type="text/css">
      .ui-autocomplete-row
      {
        padding:8px;
        background-color: #f4f4f4;
        border-bottom:1px solid #ccc;
        font-weight:bold;
      }
      .ui-autocomplete-row:hover
      {
        background-color: #f4f4f4;
      }
      .ui-autocomplete-row:hover
      {
        background-color: #f4f4f4;
      }
    </style>
  </head>
 <body class="animsition">
    
    <header class="header-area header-wide">
        <!-- main header start -->
        <div class="main-header d-none d-lg-block">
            <!-- header top start -->
            <div class="header-top bdr-bottom" style="">
                <div class="container-fluid">
                    <div class="row align-items-center" style="color:#79094b;">
                        <!-- <div class="col-lg-12 text-center">
                            <div class="welcome-message ">
                                <p  style="color:#79094b;"><b>Welcome to Wanoway Jewelry online store</b></p>
                            </div>
                        </div> -->
                        <div class="col-lg-6 text-right">
                            <div class="header-top-settings">
                                <ul class="nav align-items-center justify-content-end">
                                   <!--  <li class="curreny-wrap"  style="color:#79094b;">
                                        $ Currency
                                        <i class="fa fa-angle-down"></i>
                                        <ul class="dropdown-list curreny-list">
                                            <li><a href="#">$ INR</a></li>
                                         <li><a href="#">€ EURO</a></li> 
                                        </ul>
                                    </li> -->
                                   <!--  <li class="language">
                                        <img src="assets/img/icon/en.png" alt="flag"> English
                                        <i class="fa fa-angle-down"></i>
                                        <ul class="dropdown-list">
                                            <li><a href="#"><img src="assets/img/icon/en.png" alt="flag"> english</a></li>
                                            <li><a href="#"><img src="assets/img/icon/fr.png" alt="flag"> french</a></li>
                                        </ul>
                                    </li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- header top end -->