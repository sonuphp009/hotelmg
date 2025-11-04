
 <main>
<style type="text/css">
.items
{
    display: flex;
    overflow-x: scroll;
    width: 100%;
}
.items::-webkit-scrollbar
{
    display: block;
    height: 10px;
}
.items .item
{
    min-width: 130px;
    height: 110px;
    background: #ddd;
    margin: 20px;
    text-align: center;
}
</style>
<div class="container-fluid" style="background-color:#f7f7f7;padding:5px;">

    <div class="row" style="">
         <div class="col-12">
            <div class="product-container">
                <div class="items">    
                    <?php if(count($catData)>0){
                            foreach($catData as $row){?>
                                <!-- product item start -->
                                <div class="item" >
                                   <a href="<?php echo site_url("Welcome/getIndexProductList/".$row['category_id']);?>">
                                            <img class="" src="<?php echo base_url().'assets/category/'.$row['category_image']?>" alt="product" style="width: 100%;height: 100%;">

                                            <!-- <img class="sec-img" src="<?php //echo base_url().'assets/category/'.$row['category_image']?>" alt="product"> -->
                                        </a><br/>
                                        <p class="sec-img" style="font-size:11px;margin-top: 5px;"><?php echo $row['category_name'];?></p>
                                </div>
                               <!-- product item start -->

                           <?php } 
                            }?>
                </div>
            </div>
           
        </div>
        
        
    
    </div>
</div>
        <!-- hero slider area start -->
        <section class="slider-area">
            <div class="hero-slider-active slick-arrow-style slick-arrow-style_hero slick-dot-style">
                <!-- single slider item start -->
                <div class="hero-single-slide hero-overlay">
                    <div class="hero-slider-item bg-img" data-bg="<?php echo  base_url().'assets/site_banners/1.png'?>">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- <div class="hero-slider-content slide-1" style="background-color: #fff;">
                                        <h2 class="slide-title">Family Jewelry <span>Collection</span></h2>
                                        <h4 class="slide-desc">Designer Jewelry Necklaces-Bracelets-Earings</h4>
                                        <a href="shop.html" class="btn btn-hero">Read More</a>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- single slider item start -->

                <!-- single slider item start -->
               <!--  <div class="hero-single-slide hero-overlay">
                    <div class="hero-slider-item bg-img" data-bg="<?php //echo  base_url().'assets/site_banners/bb2.jpg'?>">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="hero-slider-content slide-2 float-md-end float-none">
                                        <h2 class="slide-title">Diamonds Jewelry<span>Collection</span></h2>
                                        <h4 class="slide-desc">Shukra Yogam & Silver Power Silver Saving Schemes.</h4>
                                        <a href="shop.html" class="btn btn-hero">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- single slider item start -->

                <!-- single slider item start -->
               <!--  <div class="hero-single-slide hero-overlay">
                    <div class="hero-slider-item bg-img" data-bg="<?php //echo  base_url().'assets/site_banners/bb3.jpg'?>">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="hero-slider-content slide-3">
                                        <h2 class="slide-title">Grace Designer<span>Jewelry</span></h2>
                                        <h4 class="slide-desc">Rings, Occasion Pieces, Pandora & More.</h4>
                                        <a href="shop.html" class="btn btn-hero">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- single slider item end -->
            </div>
        </section>
        <!-- hero slider area end -->

        <!-- twitter feed area start -->
        <!-- <div class="twitter-feed">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="twitter-feed-content text-center">
                            <p>Check out "Corano - Multipurpose eCommerce Bootstrap 5 template" on #Envato by @<a href="#">Corano</a> #Themeforest <a href="http://1.envato.market/9LbxW">http://1.envato.market/9LbxW</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- twitter feed area end -->

        <!-- service policy area start -->
        <div class="service-policy section-padding">
            <div class="container">
                <div class="row mtn-30">
                    <div class="col-sm-6 col-lg-3">
                        <div class="policy-item">
                            <div class="policy-icon">
                                <i class="pe-7s-plane"></i>
                            </div>
                            <div class="policy-content">
                                <h6>Free Shipping</h6>
                                <p>Free shipping all order</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="policy-item">
                            <div class="policy-icon">
                                <i class="pe-7s-help2"></i>
                            </div>
                            <div class="policy-content">
                                <h6>Support 24/7</h6>
                                <p>Support 24 hours a day</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="policy-item">
                            <div class="policy-icon">
                                <i class="pe-7s-back"></i>
                            </div>
                            <div class="policy-content">
                                <h6>Money Return</h6>
                                <p>30 days for free return</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="policy-item">
                            <div class="policy-icon">
                                <i class="pe-7s-credit"></i>
                            </div>
                            <div class="policy-content">
                                <h6>100% Payment Secure</h6>
                                <p>We ensure secure payment</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- service policy area end -->

        <!-- category -->
        <!--  <div class="container">
                <div class="row">
                    <div class="col-12">
                        section title start
                        <div class="section-title text-center">
                            <h2 class="title">Categories</h2>
                        </div>
                         section title start 
                    </div>
                </div>
        </div> -->

     

      <!-- category -->
        <!-- product area start -->
        <section class="product-area section-padding">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- section title start -->
                        <div class="section-title text-center">
                            <h2 class="title">our products</h2>
                            <p class="sub-title">Add our products to weekly lineup</p>
                        </div>
                        <!-- section title start -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="product-container">
                            <!-- product tab menu start -->
                            <!-- <div class="product-tab-menu">
                                <ul class="nav justify-content-center">

                                    <li><a href="#" class="active" id="Entertainment" onclick="getIndexProduct(1)">Entertainment</a></li>
                                    <li><a href="#" class="" id="Storage" onclick="getIndexProduct(2)">Storage</a></li>
                                    <li><a href="#" class="" id="Lying" onclick="getIndexProduct(3)">Lying</a></li>
                                    <li><a href="#" class="" id="Tables" onclick="getIndexProduct(4)">Tables</a></li>
                                </ul>
                            </div> -->
                            <!-- product tab menu end -->
                                      
                            <!-- product tab content start -->
                            <div class="tab-content">
                                
                                <div class="tab-pane fade show active" id="tab1">
                                    <div class="product-carousel-4 slick-row-10 slick-arrow-style text-center" id="plist">
                                        <?php if(isset($pTypeData)){
                                    foreach($pTypeData as $row){?>   
                                        <!-- product item start -->
                                        <div class="product-item" style="width: 100%; display: inline-block;">
                                            <figure class="product-thumb">
                                                <a href="<?php echo site_url("Welcome/getProductDetails/".base64_encode($row['product_id']))?>" tabindex="0">
                                                    <img class="pri-img" src="<?php echo base_url().$row['product_image'];?>" style="height: 320px;width: 320px;" alt="product">
                                                    <img class="sec-img" src="<?php echo base_url().$row['product_image'];?>" style="height: 320px;width: 320px;" alt="product">
                                                </a>
                                                
                                               
                                            </figure>
                                            <div class="product-caption text-center">
                                               <!--  <div class="product-identity">
                                                    <p class="manufacturer-name"><a href="product-details.html" tabindex="0">Diamond</a></p>
                                                </div>
                                                <ul class="color-categories">
                                                    <li>
                                                        <a class="c-lightblue" href="#" title="LightSteelblue" tabindex="0"></a>
                                                    </li>
                                                    <li>
                                                        <a class="c-darktan" href="#" title="Darktan" tabindex="0"></a>
                                                    </li>
                                                    <li>
                                                        <a class="c-grey" href="#" title="Grey" tabindex="0"></a>
                                                    </li>
                                                    <li>
                                                        <a class="c-brown" href="#" title="Brown" tabindex="0"></a>
                                                    </li>
                                                </ul> -->
                                                <h6 class="product-name">
                                                    <a href="product-details.html" tabindex="0"><?php echo $row['product_title'];?></a>
                                                </h6>
                                                <div class="price-box">
                                                    <span class="price-regular"><span>&#8377;</span><?php echo $row['product_price'];?></span>
                                                    <span class="price-old"><span>&#8377;</span><del><?php echo $row['mrp_price'];?></del></span>
                                                </div>
                                            </div>
                                        </div>
                                       

                                        <!-- product item end -->
                                          <?php } 
                        }?>
                                        
                                    </div>
                                </div>
                          
                            </div>
                            <!-- product tab content end -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- product area end -->

       
         <!-- category -->
        <!-- product area start -->
        <section class="product-area section-padding">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- section title start -->
                        <div class="section-title text-center">
                            <h2 class="title">featured products</h2>
                        </div>
                        <!-- section title start -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="product-container">
                            <!-- product tab menu start -->
                            <!-- <div class="product-tab-menu">
                                <ul class="nav justify-content-center">

                                    <li><a href="#" class="active" id="Entertainment" onclick="getIndexProduct(1)">Entertainment</a></li>
                                    <li><a href="#" class="" id="Storage" onclick="getIndexProduct(2)">Storage</a></li>
                                    <li><a href="#" class="" id="Lying" onclick="getIndexProduct(3)">Lying</a></li>
                                    <li><a href="#" class="" id="Tables" onclick="getIndexProduct(4)">Tables</a></li>
                                </ul>
                            </div> -->
                            <!-- product tab menu end -->

                            <!-- product tab content start -->
                            <div class="tab-content">
                                
                                 <div class="tab-pane fade show active" id="tab1">
                                    <div class="product-carousel-4 slick-row-10 slick-arrow-style text-center" id="plist">
                                        <?php if(isset($featureData)){
                                    foreach($featureData as $row){?>   
                                        <!-- product item start -->
                                        <div class="product-item" style="width: 100%; display: inline-block;">
                                            <figure class="product-thumb">
                                                <a href="<?php echo site_url("Welcome/getProductDetails/".base64_encode($row['product_id']))?>" tabindex="0">
                                                    <img class="pri-img" src="<?php echo base_url().$row['product_image'];?>" style="height: 320px;width: 320px;" alt="product">
                                                    <img class="sec-img" src="<?php echo base_url().$row['product_image'];?>" style="height: 320px;width: 320px;" alt="product">
                                                </a>
                                                
                                               
                                            </figure>
                                            <div class="product-caption text-center">
                                               <!--  <div class="product-identity">
                                                    <p class="manufacturer-name"><a href="product-details.html" tabindex="0">Diamond</a></p>
                                                </div>
                                                <ul class="color-categories">
                                                    <li>
                                                        <a class="c-lightblue" href="#" title="LightSteelblue" tabindex="0"></a>
                                                    </li>
                                                    <li>
                                                        <a class="c-darktan" href="#" title="Darktan" tabindex="0"></a>
                                                    </li>
                                                    <li>
                                                        <a class="c-grey" href="#" title="Grey" tabindex="0"></a>
                                                    </li>
                                                    <li>
                                                        <a class="c-brown" href="#" title="Brown" tabindex="0"></a>
                                                    </li>
                                                </ul> -->
                                                <h6 class="product-name">
                                                    <a href="product-details.html" tabindex="0"><?php echo $row['product_title'];?></a>
                                                </h6>
                                                <div class="price-box">
                                                    <span class="price-regular"><span>&#8377;</span><?php echo $row['product_price'];?></span>
                                                    <span class="price-old"><span>&#8377;</span><del><?php echo $row['mrp_price'];?></del></span>
                                                </div>
                                            </div>
                                        </div>
                                       

                                        <!-- product item end -->
                                          <?php } 
                        }?>
                                        
                                    </div>
                                </div>
                          
                            </div>
                            <!-- product tab content end -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- product area end -->

       

       
        

       

       
    </main>

    <!-- Scroll to top start -->
    <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
    </div>
    <!-- Scroll to Top End -->