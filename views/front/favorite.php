<main>
        <!-- breadcrumb area start -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Favorite</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- page main wrapper start -->
        <div class="shop-main-wrapper section-padding">
            <div class="container">
                <div class="row">
                   

                    <!-- shop main wrapper start -->
                    <div class="col-lg-12 order-1 order-lg-2">
                        <div class="shop-product-wrapper">
                           

                            <!-- product item list wrapper start -->
                            <div class="shop-product-wrap grid-view row mbn-30">
                                <!-- product single item start -->
                                     <?php if(count($pTypeData)>0){
                                    foreach($pTypeData as $row){?>
                                    <div class="col-md-3 col-sm-6">
   
                                        <div class="text-center" style="text-align: center;">
                                                <a class="text-center" href="<?php echo site_url("Welcome/getProductDetails/".base64_encode($row['product_id']))?>">
                                                    <img class="" src="<?php echo base_url().$row['product_image'];?>" alt="product" style="width: 250px;height: 250px;">
                                                    <!-- <img class=" sec-img" src="<?php //echo base_url().$row['product_image'];?>" alt="product"> -->
                                                </a>
                                                <p><?php echo $row['product_title'];?></p>
                                                <p><span  class="price-regular">Price &#x20b9; <?php echo $row['product_price'];?></span></p>
                                                <p><span class="price-old">MRP <del>&#x20b9; <?php echo $row['mrp_price'];?></del></span></p>
                                       </div>

                                     </div>
                                          <?php } 
                        }?>
                                        
                               
                                <!-- product single item start -->




                            </div>
                            <!-- product item list wrapper end -->

                            <!-- start pagination area --><br/><br/>
                            <div class="card">
                                <div class="row" style="padding:10px;color:#c29958;">
                                    <div class="col-sm-4"></div>
                                    <div class="col-sm-4 ">
                                        <!-- <ul class="pagination-box"> -->
                                            <?php echo $links; ?>     
                                            <!-- <li><a class="previous" href="#"><i class="pe-7s-angle-left"></i></a></li>
                                            <li class="active"><a href="#">1</a></li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                            <li><a class="next" href="#"><i class="pe-7s-angle-right"></i></a></li> -->
                                        <!-- </ul> -->
                                    </div>
                                </div>
                            </div>
                            <!-- end pagination area -->
                        </div>
                    </div>
                    <!-- shop main wrapper end -->
                </div>
            </div>
        </div>
        <!-- page main wrapper end -->
    </main>