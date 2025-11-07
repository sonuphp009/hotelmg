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
                                    <li class="breadcrumb-item active" aria-current="page">product details</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- page main wrapper start -->
        <div class="shop-main-wrapper section-padding pb-0">
            <div class="container">
                <div class="row">
                    <!-- product details wrapper start -->
                    <div class="col-lg-12 order-1 order-lg-2">
                        <!-- product details inner end -->
                        <div class="product-details-inner">
                            <div class="row">
                            	
								
                                <div class="col-lg-5">
                                    <div class="product-large-slider">
                                    	<?php 
                                    	// print_r($pDetails);
                                        // exit;
                                    	if(count($pDetails)>0){
                                    		foreach($pDetails as $row)
                                    		{
                                    			$pimg=base_url().$row['image_url'];
                                                if($row['url_type']=="image")
                                                {
                                                    echo '<div class="pro-large-img img-zoom">
                                                        <img src="'.$pimg.'" alt="product-details" style="height:500px;width:450px;"/>
                                                    </div>';
                                                }
                                                else
                                                {
                                                    echo '<div class="pro-large-img img-zoom">
                                                      <video style="height:500px;width:450px;" controls>
                                                          <source src="'.$pimg.'" type="video/mp4">
                                                          <source src="'.$pimg.'" type="video/ogg">
                                                         
                                                        </video>
                                                    </div>';
                                                }
                                    		}
                                    	}
                                        else
                                        {
                                             echo '<div class="pro-large-img img-zoom">
                                                        <img src="'.base_url().$productData['product_image'].'" alt="product-details" style="height:500px;width:450px;"/>
                                                    </div>';
                                            
                                        }
                                    	?>
                                        
                                       <!--  <div class="pro-large-img img-zoom">
                                            <img src="assets/img/product/product-details-img2.jpg" alt="product-details" />
                                        </div>
                                        <div class="pro-large-img img-zoom">
                                            <img src="assets/img/product/product-details-img3.jpg" alt="product-details" />
                                        </div>
                                        <div class="pro-large-img img-zoom">
                                            <img src="assets/img/product/product-details-img4.jpg" alt="product-details" />
                                        </div>
                                        <div class="pro-large-img img-zoom">
                                            <img src="assets/img/product/product-details-img5.jpg" alt="product-details" />
                                        </div> -->
                                    </div>
                                    <div class="pro-nav slick-row-10 slick-arrow-style">
                                    	<?php 
                                    	if(count($pDetails)>0){
                                    		foreach($pDetails as $row)
                                    		{
                                    			$pimg2=base_url().$row['image_url'];
                                                 if($row['url_type']=="image")
                                                {
                                    			echo '<div class="pro-nav-thumb" style="margin-left:0px;">
			                                            <img src="'.$pimg2.'" alt="product-details" style="height:100px;width:100px;"/>
			                                        </div>';
                                                }
                                                else
                                                {

                                                    echo '<div class="pro-large-img img-zoom">
                                                      <video style="height:100px;width:100px;" >
                                                          <source src="'.$pimg2.'" type="video/mp4">
                                                          <source src="'.$pimg2.'" type="video/ogg">
                                                         
                                                        </video>
                                                    </div>';
                                                }
                                    		}
                                    	}
                                        else
                                        {
                                            echo '<div class="pro-nav-thumb" style="margin-left:0px;">
                                                        <img src="'.base_url().$productData['product_image'].'" alt="product-details" style="height:100px;width:100px;"/>
                                                    </div>';
                                        }
                                    	?>
                                        
                                       <!--  <div class="pro-nav-thumb">
                                            <img src="assets/img/product/product-details-img2.jpg" alt="product-details" />
                                        </div>
                                        <div class="pro-nav-thumb">
                                            <img src="assets/img/product/product-details-img3.jpg" alt="product-details" />
                                        </div>
                                        <div class="pro-nav-thumb">
                                            <img src="assets/img/product/product-details-img4.jpg" alt="product-details" />
                                        </div>
                                        <div class="pro-nav-thumb">
                                            <img src="assets/img/product/product-details-img5.jpg" alt="product-details" />
                                        </div> -->
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="product-details-des"  style="margin-top:20px;">
                                       <!--  <div class="manufacturer-name">
                                            <a href="product-details.html">HasTech</a>
                                        </div> -->
                                        <input type="hidden"  id="product_id" name="product_id" value="<?php echo $productData['product_id']?>">
                                        <input type="hidden" id="product_price" name="product_price" value="<?php echo $productData['product_price']?>">
                                        <input type="hidden" id="session_id" name="session_id" >
                                        
                                        <h3 class="product-name"><?php echo $productData['product_title']?></h3>
                                        
                                        <div class="price-box">
                                            <span class="price-regular"><span>&#8377;</span><?php echo $productData['product_price']?></span>
                                            <span class="price-old"><span>&#8377;</span><del><?php echo $productData['mrp_price']?></del></span>
                                        </div>
                                       <!--  <h5 class="offer-text"><strong>Hurry up</strong>! offer ends in:</h5>
                                        <div class="product-countdown" data-countdown="2022/12/20"></div> -->
                                        <div class="availability">
                                            <i class="fa fa-check-circle"></i>
                                            <span>room status</span>
                                        </div>
                                        
                                        <div class="quantity-cart-box d-flex align-items-center">
                                            <h6 class="option-title">qty:</h6>
                                            <div class="quantity">
                                                <div class="pro-qty"><input type="text" value="1" id="product_qty" name="product_qty"></div>
                                            </div>
                                            <div class="action_link">
                                                <a class="btn btn-cart2" href="#" onclick="getProductAddToCart()">Book Room</a>
                                            </div>
                                        </div>
                                        <div class="pro-size">
                                            <h6 class="option-title">size :</h6>
                                            <select class="nice-select">
                                                <option>S</option>
                                                <option>M</option>
                                                <option>L</option>
                                                <option>XL</option>
                                            </select>
                                        </div>
                                        <?php if(isset($user_id)){?>

                                        <div class="useful-links">
                                            <!-- <a href="#" data-bs-toggle="tooltip" title="Compare"><i
                                                    class="pe-7s-refresh-2"></i>compare</a> -->
                                           <?php if($wishdata==0){?>

                                            <a href="<?php echo site_url('Welcome/getAddWishlist/'.base64_encode($productData['product_id']))?>" data-bs-toggle="tooltip" title="Wishlist"><i
                                                    class="pe-7s-like"></i>wishlist</a>
                                             <?php }   ?>
                                        </div>
                                    <?php }?>
                                    <p class="pro-desc"><?php echo $productData['product_description']?></p>
                                       <!--  <div class="like-icon">
                                            <a class="facebook" href="#"><i class="fa fa-facebook"></i>like</a>
                                            <a class="twitter" href="#"><i class="fa fa-twitter"></i>tweet</a>
                                            <a class="pinterest" href="#"><i class="fa fa-pinterest"></i>save</a>
                                            <a class="google" href="#"><i class="fa fa-google-plus"></i>share</a>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- product details inner end -->

                        <!-- product details reviews start -->
                        <div class="product-details-reviews section-padding pb-0">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="product-review-info">
                                        <ul class="nav review-tab">
                                            <li>
                                                <a class="active" data-bs-toggle="tab" href="#tab_one">description</a>
                                            </li>
                                            <li>
                                                <a data-bs-toggle="tab" href="#tab_two">information</a>
                                            </li>
                                            <li>
                                                <a data-bs-toggle="tab" href="#tab_three">reviews (1)</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content reviews-tab">
                                            <div class="tab-pane fade show active" id="tab_one">
                                                <div class="tab-one">
                                                    <p><?php echo $productData['product_description']?></p>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="tab_two">
                                                <table class="table table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <td>color</td>
                                                            <td>black, blue, red</td>
                                                        </tr>
                                                        <tr>
                                                            <td>size</td>
                                                            <td>L, M, S</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade" id="tab_three">
                                                <form action="#" class="review-form">
                                                    <h5>1 review for <span>Chaz Kangeroo</span></h5>
                                                    <div class="total-reviews">
                                                        <div class="rev-avatar">
                                                            <img src="assets/img/about/avatar.jpg" alt="">
                                                        </div>
                                                        <div class="review-box">
                                                            <div class="ratings">
                                                                <span class="good"><i class="fa fa-star"></i></span>
                                                                <span class="good"><i class="fa fa-star"></i></span>
                                                                <span class="good"><i class="fa fa-star"></i></span>
                                                                <span class="good"><i class="fa fa-star"></i></span>
                                                                <span><i class="fa fa-star"></i></span>
                                                            </div>
                                                            <div class="post-author">
                                                                <p><span>admin -</span> 30 Mar, 2019</p>
                                                            </div>
                                                            <p>Aliquam fringilla euismod risus ac bibendum. Sed sit
                                                                amet sem varius ante feugiat lacinia. Nunc ipsum nulla,
                                                                vulputate ut venenatis vitae, malesuada ut mi. Quisque
                                                                iaculis, dui congue placerat pretium, augue erat
                                                                accumsan lacus</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col">
                                                            <label class="col-form-label"><span class="text-danger">*</span>
                                                                Your Name</label>
                                                            <input type="text" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col">
                                                            <label class="col-form-label"><span class="text-danger">*</span>
                                                                Your Email</label>
                                                            <input type="email" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col">
                                                            <label class="col-form-label"><span class="text-danger">*</span>
                                                                Your Review</label>
                                                            <textarea class="form-control" required></textarea>
                                                            <div class="help-block pt-10"><span
                                                                    class="text-danger">Note:</span>
                                                                HTML is not translated!
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col">
                                                            <label class="col-form-label"><span class="text-danger">*</span>
                                                                Rating</label>
                                                            &nbsp;&nbsp;&nbsp; Bad&nbsp;
                                                            <input type="radio" value="1" name="rating">
                                                            &nbsp;
                                                            <input type="radio" value="2" name="rating">
                                                            &nbsp;
                                                            <input type="radio" value="3" name="rating">
                                                            &nbsp;
                                                            <input type="radio" value="4" name="rating">
                                                            &nbsp;
                                                            <input type="radio" value="5" name="rating" checked>
                                                            &nbsp;Good
                                                        </div>
                                                    </div>
                                                    <div class="buttons">
                                                        <button class="btn btn-sqr" type="submit">Continue</button>
                                                    </div>
                                                </form> <!-- end of review-form -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- product details reviews end -->
                    </div>
                    <!-- product details wrapper end -->
                </div>
            </div>
        </div>
        <!-- page main wrapper end -->
    </main>