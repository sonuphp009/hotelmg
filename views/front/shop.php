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
                                    <li class="breadcrumb-item"><a href="shop.html">shop</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">checkout</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- checkout main wrapper start -->
        <div class="checkout-page-wrapper section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                         <?php if($this->session->flashdata('success')!=""){?>
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <?php echo $this->session->flashdata('success');?>
                        </div>
                        <?php }?>
                
                        <?php if($this->session->flashdata('error')!=""){?>
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <?php echo $this->session->flashdata('error');?>
                        </div>
                        <?php }?>
                        <?php if($this->session->flashdata('error_msg')!=""){?>
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <?php echo $this->session->flashdata('error_msg');?>
                        </div>
                        <?php }?>
                        <!-- Checkout Login Coupon Accordion Start -->
                        <?php if($chkUser==0){?>
                        <div class="checkoutaccordion" id="checkOutAccordion">
                            <div class="card">
                                <h6>Returning Customer? <span data-bs-toggle="collapse" data-bs-target="#logInaccordion">Click
                                            Here To Login</span></h6>
                                <div id="logInaccordion" class="collapse <?php if($this->session->flashdata('error')=="Inactive User."){?>show<?php } ?>" data-parent="#checkOutAccordion">
                                    <div class="card-body">
                                        <p>If you have shopped with us before, please enter your details in the boxes
                                            below. If you are a new customer, please proceed to the Billing &amp;
                                            Shipping section.</p>
                                        <div class="login-reg-form-wrap mt-20">
                                            <div class="row">
                                                <div class="col-lg-7 m-auto">
                                                    
                                                    <form action="<?php echo site_url('Welcome/login');?>" name="frm_login" id="frm_login" method="post">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="single-input-item">
                                                                    <input type="hidden" name="checkout_page" value="checkout">
                                                                    <input type="hidden" name="session_user_id" id="session_user_id" value="<?php echo $user_id;?>">
                                                                    <input type="email" name="username" placeholder="Enter your Email" required />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <div class="single-input-item">
                                                                    <input type="password" name="password" placeholder="Enter your Password" required />
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="single-input-item">
                                                            <div class="login-reg-form-meta d-flex align-items-center justify-content-between">
                                                                <div class="remember-meta">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" id="rememberMe"  />
                                                                        <label class="custom-control-label" for="rememberMe">Remember
                                                                            Me</label>
                                                                    </div>
                                                                </div>

                                                                <!-- <a href="#" class="forget-pwd">Forget Password?</a> -->
                                                            </div>
                                                        </div>

                                                        <div class="single-input-item">
                                                            <input type="submit" name="btn_login" value="Login" class="btn btn-sqr">
                                                           <!--  <button class="btn btn-sqr" type="submit" name="btn_login">Login</button> -->
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                           <!--  <div class="card">
                                <h6>Have A Coupon? <span data-bs-toggle="collapse" data-bs-target="#couponaccordion">Click
                                            Here To Enter Your Code</span></h6>
                                <div id="couponaccordion" class="collapse" data-parent="#checkOutAccordion">
                                    <div class="card-body">
                                        <div class="cart-update-option">
                                            <div class="apply-coupon-wrapper">
                                                <form action="#" method="post" class=" d-block d-md-flex">
                                                    <input type="text" placeholder="Enter Your Coupon Code" required />
                                                    <button class="btn btn-sqr">Apply Coupon</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    <?php }?>
                        <!-- Checkout Login Coupon Accordion End -->
                    </div>
                </div>
               

                <div class="row">
                    <?php if(count($cAddData)==0){ ?>
                    <!-- Checkout Billing Details -->
                    <div class="col-lg-6">
                        <div class="checkout-billing-details-wrap">
                            <h5 class="checkout-title">Billing Details</h5>
                            <div class="billing-form-wrap">
                                <form action="<?php echo site_url("Welcome/checkoutRegister")?>" enctype="multipart/form-data"  method="post">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="single-input-item">
                                                <input type="hidden" name="session_user_id" id="session_user_id" value="<?php if(isset($user_id)){ echo $user_id;}?>">
                                                <label for="f_name" class="required">First Name</label>
                                                <input type="text" name="first_name" id="f_name" placeholder="First Name" required />
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="single-input-item">
                                                <label for="l_name" class="required">Last Name</label>
                                                <input type="text" name="last_name" id="l_name" placeholder="Last Name" required />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="single-input-item">
                                        <label for="email" class="required">Email Address</label>
                                        <input type="email" name="email" id="email" placeholder="Email Address" onblur="checkEailExist()" required />
                                        <span id="email_err" style="color:red;display: none;">Email is already exist</span>
                                    </div>

                                    <div class="single-input-item">
                                        <label for="com-name">Company Name</label>
                                        <input type="text" name="company_name" id="com-name" placeholder="Company Name" />
                                    </div>

                                    <div class="single-input-item">
                                        <label for="country" class="required">Country</label>
                                        <select name="country" id="country">
                                            <option value="Afghanistan">Afghanistan</option>
                                            <option value="Albania">Albania</option>
                                            <option value="Algeria">Algeria</option>
                                            <option value="Armenia">Armenia</option>
                                            <option value="Bangladesh">Bangladesh</option>
                                            <option value="India">India</option>
                                            <option value="Pakistan">Pakistan</option>
                                            <option value="England">England</option>
                                            <option value="London">London</option>
                                            <option value="London">London</option>
                                            <option value="Chaina">China</option>
                                        </select>
                                    </div>

                                    <div class="single-input-item">
                                        <label for="street-address" class="required mt-20">Street address</label>
                                        <input  type="text" name="street_address1" id="street-address" placeholder="Street address Line 1" required />
                                    </div>

                                    <div class="single-input-item">
                                        <input type="text" name="street_address2" placeholder="Street address Line 2 (Optional)" />
                                    </div>

                                    <div class="single-input-item">
                                        <label for="town" class="required">Town / City</label>
                                        <input type="text" name="city" id="town" placeholder="Town / City" required />
                                    </div>

                                    <div class="single-input-item">
                                        <label for="state">State / Divition</label>
                                        <input type="text" name="state" id="state" placeholder="State / Divition" />
                                    </div>

                                    <div class="single-input-item">
                                        <label for="postcode" class="required">Postcode / ZIP</label>
                                        <input type="text" name="postcode" id="postcode" placeholder="Postcode / ZIP" required />
                                    </div>

                                    <div class="single-input-item">
                                        <label for="phone">Phone</label>
                                        <input type="text" name="phone" id="phone" placeholder="Phone" />
                                    </div>
                                    <?php if($chkUser==0){?>
                                    <div class="checkout-box-wrap">
                                        <div class="single-input-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" name="account_chk" class="custom-control-input" id="create_pwd" value="yes">
                                                <label class="custom-control-label" for="create_pwd">Create an
                                                    account?</label>
                                            </div>
                                        </div>
                                        <div class="account-create single-form-row">
                                            <p>Create an account by entering the information below. If you are a
                                                returning customer please login at the top of the page.</p>
                                            <div class="single-input-item">
                                                <label for="pwd" class="required">Account Password</label>
                                                <input type="password" name="user_password" id="pwd" placeholder="Account Password" required />
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                                   <!--  <div class="checkout-box-wrap">
                                        <div class="single-input-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="ship_to_different">
                                                <label class="custom-control-label" for="ship_to_different">Ship to a
                                                    different address?</label>
                                            </div>
                                        </div>
                                       
                                    </div>--><hr/>
                                   <div class="summary-footer-area">
                                        <!-- <div class="custom-control custom-checkbox mb-20">
                                            <input type="checkbox" class="custom-control-input" id="terms" required />
                                            <label class="custom-control-label" for="terms">I have read and agree to
                                                the website <a href="index.html">terms and conditions.</a></label>
                                        </div> -->
                                        <button type="submit" class="  " name="btn_save_address" value="save_address">Save Address</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php }else{?>
                    <div class="col-lg-6">
                         <div class="row ">
                                <!-- Checkout Billing Details -->
                                <div class="col-lg-12">

                                <?php if(count($cAddData)>0){ ?>
                                        <div class="row ">
                                            <div class="col-lg-8 ">
                                                <h4>Select Address</h4>
                                            </div>
                                            <div class="col-lg-4">
                                                <a href="<?php echo site_url("Welcome/addAddress/".$user_id);?>"><button class="btn btn-sqr" type="button" >Add Address</button></a>
                                            </div>
                                        </div><hr/>
                                <?php    foreach($cAddData as $row){?>
                                        <div class="row card">
                                            <a href="<?php echo site_url("Welcome/getSelectAddress/".$row['address_id']."/".$user_id)?>">
                                            <div class="col-lg-2">
                                                <!-- <button class="btn btn-primary" type="button" onclick="getSelectAddress(<?php echo $row['address_id']?>)">Select</button> -->
                                                <?php if($row['is_selected']=="yes"){?>
                                                    <input type="radio" name="chk_address" id="chk_address" checked>
                                                <?php }else{ ?>
                                                    <input type="radio" name="chk_address" id="chk_address" >

                                                <?php } ?>
                                            </div>
                                            <div class="col-lg-10">
                                                <p><?php echo $row['company_name'].", ".$row['street_address1'].", ".$row['street_address2'].", ".$row['city'].", ".$row['state'].", ".$row['country'].", Post Code - ".$row['postcode']?></p>
                                            </div>
                                            </a>

                                        </div><br/>
                                <?php }
                                }?>
                                </div>
                            </div>

                    </div>
                <?php }?>

                    <!-- Order Summary Details -->
                    <div class="col-lg-6">
                        <div class="order-summary-details">
                            <h5 class="checkout-title">Your Order Summary</h5>
                            <div class="order-summary-content">
                                <!-- Order Summary Table -->
                                <div class="order-summary-table table-responsive text-center">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Products</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 

                                        $subtotal=0;
                                        $totalamt=0;
                                        if(isset($productData))
                                        {
                                            $i=0;
                                            foreach ($productData as  $value) 
                                            {
                                                $i++;
                                                $subtotal+=$value['sub_total'];

                                                ?>
                                            <tr>
                                                <td><a href="product-details.html"><?php echo $value['product_title']?> <strong> × <?php echo $value['product_quantity']?></strong></a>
                                                </td>
                                                <td><?php echo $value['sub_total']?></td>
                                            </tr>
                                             <?php }
                                        $charges=0;
                                       $totalamt=$subtotal+$charges;
                                    }?>
                                           
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td>Sub Total</td>
                                                <td><strong><?php echo $totalamt;?></strong></td>
                                            </tr>
                                           <!--  <tr>
                                                <td>Shipping</td>
                                                <td class="d-flex justify-content-center">
                                                    <ul class="shipping-type">
                                                        <li>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="flatrate" name="shipping" class="custom-control-input" checked />
                                                                <label class="custom-control-label" for="flatrate">Flat
                                                                    Rate: $70.00</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="freeshipping" name="shipping" class="custom-control-input" />
                                                                <label class="custom-control-label" for="freeshipping">Free
                                                                    Shipping</label>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr> -->
                                            <tr>
                                                <td>Total Amount</td>
                                                <td><strong><?php echo $totalamt;?></strong></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            <form action="<?php echo site_url("Welcome/addOrder/".$user_id)?>" enctype="multipart/form-data"  method="post">

                                <!-- Order Payment Method -->
                                <div class="order-payment-method">
                                    <div class="single-payment-method show">
                                        <div class="payment-method-name">
                                            <div class="custom-control custom-radio">
                                                <input type="hidden" name="address_selected" value="<?php echo $address_id;?>">
                                                <input type="radio" id="cashon" name="paymentmethod" value="cash" class="custom-control-input" checked />
                                                <label class="custom-control-label" for="cashon">Cash On Delivery</label>
                                            </div>
                                        </div>
                                        <div class="payment-method-details" data-method="cash">
                                            <p>Pay with cash upon delivery.</p>
                                        </div>
                                    </div>
                                   
                                    <div class="single-payment-method">
                                        <div class="payment-method-name">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="paypalpayment" name="paymentmethod" value="paypal" class="custom-control-input" />
                                                <label class="custom-control-label" for="paypalpayment">Cashfree <img src="<?php echo base_url()?>assets/img/cashfree.jfif" class="img-fluid paypal-card" alt="Cashfree" /></label>
                                            </div>
                                        </div>
                                        <div class="payment-method-details" data-method="paypal">
                                            <p>Pay via Cashfree; you can pay with your credit card if you don’t have a
                                                Cashfree account.</p>
                                        </div>
                                    </div>
                                     <div class="single-input-item">
                                        <label for="ordernote">Order Note</label>
                                        <textarea name="ordernote" id="ordernote" cols="30" rows="3" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                    </div>
                                    <div class="summary-footer-area">
                                        <div class="custom-control custom-checkbox mb-20">
                                            <input type="checkbox" class="custom-control-input" id="terms" required />
                                            <label class="custom-control-label" for="terms">I have read and agree to
                                                the website <a href="index.html">terms and conditions.</a></label>

                                        <input type="hidden" name="session_user_id" id="session_user_id" value="<?php if(isset($user_id)){ echo $user_id;}?>">

                                        </div>
                                        <button type="submit" name="place_order" value="place_order" class="btn btn-sqr">Place Order</button>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- checkout main wrapper end -->
    </main>