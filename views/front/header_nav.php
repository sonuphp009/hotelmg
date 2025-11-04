 <?php 
 error_reporting(1);
$logged_in = $this->session->userdata('logged_in');
$session_data=$this->session->userdata('edit_session');
$session_id = $session_data['session_id'];
$userData = getUserData($logged_in['user_id']);
$pTypeData=$this->User_model->getAllproductFromCart($session_id);
$cart_count=count($pTypeData);
/*print_r($userData);
exit;*/
?>
 <!-- Start Header Area -->
     

            <!-- header middle area start -->
            <div class="header-main-area sticky" style="border-bottom: solid 1px gray;">
                <div class="container">
                    <div class="row align-items-center position-relative">

                        <!-- start logo area -->
                        <div class="col-lg-2">
                            <div class="logo">
                                <a href="<?php echo  base_url();?>">
                                    <!-- <img src="<?php //echo  base_url().'assets/img/wanoway.jpeg'?>" alt="Brand Logo" style="max-height: 100px;max-width: 100%;"> -->
                                    <!-- <img src="<?php //echo  base_url().'assets/img/wanoway.jpeg'?>" alt="Brand Logo" style="max-height: 100px;max-width: 100%;"> -->
                                    <h4>Test Logo</h4>
                                </a>
                            </div>
                        </div>
                        <!-- start logo area -->

                        <!-- main menu area start -->
                        <div class="col-lg-4 position-static">
                            <div class="main-menu-area">
                                <div class="main-menu">
                                    <!-- main menu navbar start -->
                                    <nav class="desktop-menu">
                                        <ul>
                                            <li class="<?php if($page_title=="Home"){ echo "active"; }?>"><a href="<?php echo base_url();?>">Home <!-- <i class="fa fa-angle-down"></i> --></a>
                                               
                                            </li>
                                            <li class="<?php if($page_title=="About Us"){ echo "active"; }?>"><a href="<?php echo site_url('Welcome/about');?>">About Us <!-- <i class="fa fa-angle-down"></i> --></a>
                                                
                                            </li>
                                           <!--  <li><a href="shop.html">Blogs <i class="fa fa-angle-down"></i></a>
                                               
                                            </li> -->
                                           
                                            <li class="<?php if($page_title=="Contact Us"){ echo "active"; }?>"><a href="<?php echo site_url('Welcome/contactus');?>">Contact us</a></li>
                                        </ul>
                                    </nav>
                                    <!-- main menu navbar end -->
                                </div>
                            </div>
                        </div>
                        <!-- main menu area end -->

                        <!-- mini cart area start -->
                        <div class="col-lg-6">
                            <div class="header-right d-flex align-items-center justify-content-xl-between justify-content-lg-end">
                                <div class="header-search-container" style="width:500px;">
                                    <button class="search-trigger d-xl-none d-lg-block"><i class="pe-7s-search"></i></button>
                                    <form class="header-search-box d-lg-none d-xl-block">
                                        <input type="text" id="search_data" name="search_data"  placeholder="Search entire store hire" class="form-control" onclick="getSearchModel()">
                                        <!-- onclick="getSearchModel()" -->
                                         <input type="hidden" name="selectuser_id" id="selectuser_id">

                                        <!-- <button class="header-search-btn"><i class="pe-7s-search"></i></button> -->
                                    </form>
                                </div>
                                <div class="header-configure-area">
                                    <ul class="nav justify-content-end">
                                        <li class="user-hover">
                                            <a href="#">
                                                <?php 
                                                   
                                                if(isset($userData) && $userData[0]['profile_pic']!=""){?>
                                                    <img src="<?php echo base_url().$userData[0]['profile_pic'];?>" style="height: 25px;width: 25px;" class="rounded">

                                                <?php }else{?>
                                                <i class="pe-7s-user"></i>
                                                <?php }?>

                                            </a>
                                            <ul class="dropdown-list">
                                                
                                                <?php if(isset($logged_in)){?>
                                                <li><a href="<?php echo base_url().'Welcome/profile/'.base64_encode($logged_in['user_id'])?>">my account</a></li>
                                            <li><a href="<?php echo base_url().'Welcome/logout_user'?>">Logout</a></li>

                                            <?php }?>
                                            <?php if($logged_in['user_type']!="customer"){?>
                                                <li><a href="<?php echo base_url().'Welcome/login'?>">login</a></li>
                                                <li><a href="<?php echo base_url().'Welcome/register'?>">register</a></li>
                                                <li><a href="<?php echo base_url().'Welcome/index_admin'?>">Admin Login</a></li>
                                            <?php } ?>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url('Welcome/getFavoriteProducts');?>">
                                                <i class="pe-7s-like"></i>
                                                <!-- <div class="notification">0</div> -->
                                            </a>
                                        </li>
                                        <li>
                                            <input type="hidden" name="txt_session_id" id="txt_session_id" value="<?php echo $session_data['session_id'];?>">
                                            <?php if(isset($session_id)){?>
                                            <a href="<?php echo site_url("Welcome/shoppingCart/".$session_id);?>" class="minicart-btn">
                                                <i class="pe-7s-shopbag"></i>

                                                <div class="notification" id="cart_cnt"><?php if(isset($cart_count)){ echo $cart_count;}else{ echo 0;}?></div>
                                            </a>
                                        <?php }?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- mini cart area end -->

                    </div>
                </div>
            </div>
            <!-- header middle area end -->
        </div>
        <!-- main header start -->

        <!-- mobile header start -->
        <!-- mobile header start -->
        <div class="mobile-header d-lg-none d-md-block sticky">
            <!--mobile header top start -->
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="mobile-main-header">
                            <div class="mobile-logo">
                                <a href="index.html">
                                    <img src="assets/img/logo/logo.png" alt="Brand Logo">
                                </a>
                            </div>
                            <div class="mobile-menu-toggler">
                                <div class="mini-cart-wrap">
                                     <?php if(isset($session_id)){?>
                                            <a href="<?php echo site_url("Welcome/shoppingCart/".$session_id);?>" class="minicart-btn">
                                                <i class="pe-7s-shopbag"></i>
                                                <div class="notification"><?php if(isset($cart_count)){ echo $cart_count;}else{ echo 0;}?></div>
                                            </a>
                                        <?php }?>
                                </div>
                                <button class="mobile-menu-btn">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- mobile header top start -->
        </div>
        <!-- mobile header end -->
        <!-- mobile header end -->
     <!-- offcanvas mobile menu end -->
    </header>
    <!-- end Header Area -->

    