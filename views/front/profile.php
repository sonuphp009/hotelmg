 <main>
        <!-- breadcrumb area start -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">my-account</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- my account wrapper start -->
        <div class="my-account-wrapper section-padding">
            <div class="container">
                <div class="section-bg-color">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- My Account Page Start -->
                            <div class="myaccount-page-wrapper">
                                <!-- My Account Tab Menu Start -->
                                <div class="row">
                                    <div class="col-lg-3 col-md-4">
                                        <div class="myaccount-tab-menu nav" role="tablist">
                                            <a href="#" class="<?php if($page_title=="dashboard"){ echo 'active';}?>" data-bs-toggle="tab"><i class="fa fa-dashboard"></i>
                                                Dashboard</a>
                                            <a href="<?php echo site_url('Welcome/manageOrder/'.$userData[0]['rid'])?>" class="<?php if($page_title=="Manage Order"){ echo 'active';}?>" ><i class="fa fa-cart-arrow-down"></i>
                                                Orders</a>
                                            <a href="#" class="<?php if($page_title=="downloads"){ echo 'active';}?>" data-bs-toggle="tab"><i class="fa fa-cloud-download"></i>
                                                Download</a>
                                            <a href="#" class="<?php if($page_title=="payment_method"){ echo 'active';}?>" data-bs-toggle="tab"><i class="fa fa-credit-card"></i>
                                                Payment
                                                Method</a>
                                            <a href="#" class="<?php if($page_title=="addresses"){ echo 'active';}?>" data-bs-toggle="tab"><i class="fa fa-map-marker"></i>
                                                address</a>
                                            <a href="<?php echo base_url().'Welcome/profile/'.base64_encode($userData[0]['rid'])?>" class="<?php if($page_title=="profile"){ echo 'active';}?>" data-bs-toggle="tab"><i class="fa fa-user"></i> Account
                                                Details</a>
                                            <a href="<?php echo site_url('Welcome/logout_user');?>"><i class="fa fa-sign-out"></i> Logout</a>
                                        </div>
                                    </div>
                                    <!-- My Account Tab Menu End -->

                                    <!-- My Account Tab Content Start -->
                                    <div class="col-lg-9 col-md-8">
                                        <div class="tab-content" id="myaccountContent">
                                           

                                            <?php //echo $userData;exit;?>
                                            <!-- Single Tab Content Start -->
                                            <div class="tab-pane fade show active" id="account-info" role="tabpanel">
                                                <div class="myaccount-content">
                                                    <h5>Account Details</h5>
                                                    <div class="account-details-form">
                                                    <form class="mt-4" action="<?php echo site_url('Welcome/profile/'.base64_encode($userData[0]['rid']));?>" name="frm_login" id="frm_login" method="post" enctype="multipart/form-data">
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="single-input-item">
                                                                        <label for="first-name" class="required">Upload Image</label>
                                                                        <input type="hidden" name="txt_pic" id="txt_pic" value="<?php echo $userData[0]['profile_pic'];?>">

                                                                        <input type="file" name="fle_option1" id="first-name" placeholder="First Name" onchange="readURL(this);"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="single-input-item">
                                                                        <?php if(isset($userData[0]['profile_pic']) && $userData[0]['profile_pic']!=""){?>
                                                                            <img  id="thumb"  width="100px" height="100px" title="Image" src="<?php echo base_url().$userData[0]['profile_pic'];?>" />
                                                                        <?php }else{?>
                                                                        <img  id="thumb"  width="100px" height="100px" title="Image" src="<?php echo base_url().'assets/img/screen.png'?>" />
                                                                         <?php }?>
                                                                        

                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="single-input-item">
                                                                        <label for="first-name" class="required">Full Name</label>
                                                                        <input type="text" id="full_name" name="full_name" placeholder="Full Name"  value="<?php echo $userData[0]['name'];?>" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="single-input-item">
                                                                        <label for="first-name" class="required">Mobile Number</label>
                                                                        <input type="text" id="mobile_number" name="mobile_number" placeholder="Mobile Number" value="<?php echo $userData[0]['mobileno'];?>"/>
                                                                    </div>
                                                                </div>
                                                                 <div class="col-lg-6">
                                                                    <div class="single-input-item">
                                                                        <label for="first-name" class="required">Email</label>
                                                                        <input type="email" id="email" name="email" placeholder="Email Address" value="<?php echo $userData[0]['email'];?>"/>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                            
                                                            <div class="single-input-item">
                                                                <label for="email" class="required">Addres</label>
                                                                <input type="text" id="address" name="address" placeholder="Enter Address" value="<?php echo $userData[0]['address'];?>"/>
                                                            </div>
                                                            <!-- <fieldset>
                                                                <legend>Password change</legend>
                                                                <div class="single-input-item">
                                                                    <label for="current-pwd" class="required">Current
                                                                        Password</label>
                                                                    <input type="password" id="current-pwd" placeholder="Current Password" />
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <div class="single-input-item">
                                                                            <label for="new-pwd" class="required">New
                                                                                Password</label>
                                                                            <input type="password" id="new-pwd" placeholder="New Password" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="single-input-item">
                                                                            <label for="confirm-pwd" class="required">Confirm
                                                                                Password</label>
                                                                            <input type="password" id="confirm-pwd" placeholder="Confirm Password" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </fieldset> -->
                                                            <div class="single-input-item">
                                                                <button type="submit" class="btn btn-sqr" name="btn_updateuser">Save Changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div> <!-- Single Tab Content End -->
                                        </div>
                                    </div> <!-- My Account Tab Content End -->
                                </div>
                            </div> <!-- My Account Page End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- my account wrapper end -->
    </main>
