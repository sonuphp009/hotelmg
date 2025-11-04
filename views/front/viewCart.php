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
                                    <li class="breadcrumb-item active" aria-current="page">cart</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- cart main wrapper start -->
        <div class="cart-main-wrapper section-padding">
            <div class="container">
                <div class="section-bg-color">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Cart Table Area -->
                            <div class="cart-table table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="pro-thumbnail">Thumbnail</th>
                                            <th class="pro-title">Product</th>
                                            <th class="pro-price">Price</th>
                                            <th class="pro-quantity">Quantity</th>
                                            <th class="pro-subtotal">Total</th>
                                            <th class="pro-remove">Remove</th>
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
                                            <td class="pro-thumbnail"><a href="#"><img class="img-fluid" src="<?php echo base_url().$value['product_image']?>" alt="Product" style="height: 30px;width: 30px;"/></a></td>
                                            <td class="pro-title"><a href="#"><?php echo $value['product_title']?></a></td>
                                            <td class="pro-price">
                                                <input type="hidden" name="product_price<?php echo $i;?>" id="product_price<?php echo $i;?>" value="<?php echo $value['product_price']?>">
                                                <span><?php echo $value['product_price']?></span>
                                            </td>
                                            <td class="pro-quantity">
                                                 <div class="quantity" >
                                                    <div >
                                                        <a href="#" onclick="getAddProductToCartMinus(<?php echo $value['product_id'].",".$i?>)"><span class="dec qtybtn">-</span></a> &nbsp;&nbsp;&nbsp;<input name="product_qty<?php echo $i;?>" id="product_qty<?php echo $i;?>" value="<?php echo $value['product_quantity']?>"  style="width: 50px;text-align: center;height: 30px;" onblur="getAddProductToCartInput(<?php echo $value['product_id'].",".$i?>)"><a href="#" onclick="getAddProductToCartPlus(<?php echo $value['product_id'].",".$i?>)"><span class="inc qtybtn"> &nbsp;&nbsp;+</span></a>
                                                    </div>
                                                </div>
                                               
                                               
                                                <!-- <div class="">
                                                    <span class="dec qtybtn" style="font-size: 18px;"  ><a href="#" onclick="getAddProductToCartMinus(<?php echo $value['product_id'].",".$i?>)">-</a></span>
                                                    <input type="text"  name="product_qty<?php echo $i;?>" id="product_qty<?php echo $i;?>" value="<?php echo $value['product_quantity']?>"  style="width: 100px;text-align: center;height: 30px;" class="form-control" onblur="getAddProductToCartInput(<?php echo $value['product_id'].",".$i?>)">
                                                    <span class="inc qtybtn" ><a href="#" onclick="getAddProductToCartPlus(<?php echo $value['product_id'].",".$i?>)">+</a></span>
                                                </div> -->
                                            </td>
                                            <td class="pro-subtotal"><span><?php echo $value['sub_total']?></span></td>
                                            <td class="pro-remove"><a href="#" onclick="getDeleteCartproduct(<?php echo $value['cart_id'];?>,<?php echo $session_id;?>)"><i class="fa fa-trash-o"></i></a></td>
                                        </tr>
	                                   <?php }
                                        $charges=0;
                                       $totalamt=$subtotal+$charges;
	                                }?>
                                        
                                    </tbody>
                                </table>
                            </div>
                            <!-- Cart Update Option -->
                            <!-- <div class="cart-update-option d-block d-md-flex justify-content-between">
                                <div class="apply-coupon-wrapper">
                                    <form action="#" method="post" class=" d-block d-md-flex">
                                        <input type="text" placeholder="Enter Your Coupon Code" required />
                                        <button class="btn btn-sqr">Apply Coupon</button>
                                    </form>
                                </div>
                                <div class="cart-update">
                                    <a href="#" class="btn btn-sqr">Update Cart</a>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-5 ml-auto">
                            <!-- Cart Calculation Area -->
                            <div class="cart-calculator-wrapper">
                                <div class="cart-calculate-items">
                                    <h6>Cart Totals</h6>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <td>Sub Total</td>
                                                <td><?php echo $subtotal;?></td>
                                            </tr> 
                                            <!-- <tr>
                                                <td>Shipping</td>
                                                <td>$70</td>
                                            </tr> -->
                                            <tr class="total">
                                                <td>Total</td>
                                                <td class="total-amount"><?php echo $totalamt;?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <a href="<?php echo site_url("Welcome/shopProduct/".$session_id);?>" class="btn btn-sqr d-block" >Proceed Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- cart main wrapper end -->
    </main>
