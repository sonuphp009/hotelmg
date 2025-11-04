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
                                            <a href="<?php echo site_url('Welcome/manageOrder/'.$orderInfo['user_id'])?>" class="<?php if($page_title=="Manage Order"){ echo 'active';}?>" ><i class="fa fa-cart-arrow-down"></i>
                                                Orders</a>
                                            <a href="#" class="<?php if($page_title=="downloads"){ echo 'active';}?>" data-bs-toggle="tab"><i class="fa fa-cloud-download"></i>
                                                Download</a>
                                            <a href="#" class="<?php if($page_title=="payment_method"){ echo 'active';}?>" data-bs-toggle="tab"><i class="fa fa-credit-card"></i>
                                                Payment
                                                Method</a>
                                            <a href="#" class="<?php if($page_title=="addresses"){ echo 'active';}?>" data-bs-toggle="tab"><i class="fa fa-map-marker"></i>
                                                address</a>
                                            <a href="<?php echo base_url().'Welcome/profile/'.base64_encode($orderInfo['user_id'])?>" class="<?php if($page_title=="profile"){ echo 'active';}?>"><i class="fa fa-user"></i> Account
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
                                                     <div class="row ">
                                                        <div class="col-sm-10">
                                                        </div>
                                                             <div class="col-sm-2">
                                                                    <a href="<?php echo site_url('Welcome/manageOrder/'.$orderInfo['user_id']);?>" class="btn  btn-round" style="background-color: white; color:black;"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp; Back</a>
                                                            </div>
                                                    </div>
                                                    <h5>Order No - <?php echo $orderInfo['order_no']?></h5>
                                                    
                                                        <div class="row card-body">
                                                             <div class="col-sm-8">
                                                                    <p>Customer name - <?php echo $orderInfo['name']?></p>
                                                                </div>  

                                                                <div class="col-sm-4">
                                                                    <label>Order Date</label> - <?php echo date('d M Y',strtotime($orderInfo['order_date']));?>
                                                                    
                                                                </div>  
                                                                <div class="col-sm-8">
                                                                    <label>Order Note</label> - <?php echo $orderInfo['order_note']?>
                                                                    
                                                                </div>  
                                                                <div class="col-sm-4">
                                                                    <label>Order Status</label> - <?php echo $orderInfo['order_status']?>
                                                                    
                                                                </div>  
                                                               
                                                                <div class="col-sm-8">
                                                                    <p>Delivery Destination - <?php echo $orderInfo['street_address1'].', '.$orderInfo['street_address2'].', '.$orderInfo['city'].', '.$orderInfo['state'].', '.$orderInfo['country']?></p>
                                                                </div>
                                                                 <div class="col-sm-4">
                                                                    <label>Order Amount</label> - <?php echo $orderInfo['total_amount']?>
                                                                    
                                                                </div>  
                                                        </div>
                                                        <div class="row card-body">
                                                            <div class="col-sm-12 form-control">
                                                                <label>Order Details</label>
                                                            </div>
                                                        </div>
                                                         <div class="row card-body">
                                                            <div class="col-sm-12 form-control">
                                                                <?php 
                                                        $orderData=$this->User_model->getOrderDetails($orderInfo['order_id'],1);
                                                        
                                                    ?>
                                                    <?php //$cntusermaster=$this->Inm->get_user_all_admin_res();
                                                                if(count($orderData)>0)
                                                                {

                                                                    ?>
                                                                     <table class="table table-striped table-bordered" id="datatable tbl_report" width="100%">
                                                                        <thead>
                                                                            <tr>
                                                                                <th class="pro-thumbnail">Thumbnail</th>
                                                                                                                        <th class="pro-title">Product</th>
                                                                                                                        <th class="pro-price">Price</th>
                                                                                                                        <th class="pro-quantity">Quantity</th>
                                                                                                                        <th class="pro-subtotal">Total</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody id="searchTable2">
                                                                       <?php 

                                                                                                                            $subtotal=0;
                                                                                                                            $totalamt=0;
                                                                                                                            if(isset($orderData))
                                                                                                                            {
                                                                                                                                $i=0;
                                                                                                                                foreach ($orderData as  $value) 
                                                                                                                                {
                                                                                                                                    $i++;
                                                                                                                                    $subtotal+=$value['sub_total'];

                                                                                                                                    ?>
                                                                                                                                    
                                                                                                                            <tr>
                                                                                                                                <td class="pro-thumbnail"><a href="#"><img class="img-fluid" src="<?php echo base_url().$value['product_image']?>" alt="Product" style="height: 50px;width: 50px;"/></a></td>
                                                                                                                                <td class="pro-title"><?php echo $value['product_title']?></td>
                                                                                                                                <td class="pro-price">
                                                                                                                                    <input type="hidden" name="product_price<?php echo $i;?>" id="product_price<?php echo $i;?>" value="<?php echo $value['product_price']?>">
                                                                                                                                    <span><?php echo $value['product_price']?></span>
                                                                                                                                </td>
                                                                                                                                <td class="pro-quantity">
                                                                                                                                   <?php echo $value['product_quantity']?>
                                                                                                                                </td>
                                                                                                                                <td class="pro-subtotal"><span><?php echo round($value['sub_total'],2);?></span></td>
                                                                                                                                
                                                                                                                            </tr>
                                                                                                                           <?php }
                                                                                                                            $charges=0;
                                                                                                                           $totalamt=$subtotal+$charges;
                                                                                                                        }?>
                                                                                                                         <tr>
                                                                                                                                <td colspan="4" style="text-align:right;">Total</td>
                                                                                                                                <td colspan=""><?php echo round($subtotal,2);?></td>
                                                                                                                         </tr>
                                                                                                                        <!--  <tr>
                                                                                                                                <td colspan="4" style="text-align:right;">GST Amount(18%)</td>
                                                                                                                                <td colspan=""><?php $gstamt=$subtotal*18/100; echo round($gstamt,2);?></td>
                                                                                                                         </tr> -->
                                                                        </tbody>
                                                                    </table>
                                                                    
                                                                <?php } else {?>
                                                                    <div     class="alert alert-danger">
                                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                                        No records found.
                                                                    </div>
                                                                <?php }?>
                                                            </div>
                                                        </div>
                                                        <div class="row card-body">
                                                            <div class="col-sm-12 form-control text-center">
                                                                <a href="<?php echo site_url('Welcome/orderInvoice/'.base64_encode($orderInfo['order_id']));?>" class="btn  btn-round" style="background-color: white; color:black;"><button class="btn btn-sqr btn-block">View Invoice</button></a>
                                                            </div>
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
