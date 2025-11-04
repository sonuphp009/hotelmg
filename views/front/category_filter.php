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
                                    <li class="breadcrumb-item active" aria-current="page">shop</li>
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
                    <!-- sidebar area start -->
                    <div class="col-lg-3 order-2 order-lg-1">
                        <aside class="sidebar-wrapper">
                            <!-- single sidebar start -->
                            <div class="sidebar-single">
                                <h5 class="sidebar-title">categories</h5>
                                <div class="sidebar-body">
                                    <ul class="shop-categories">
                                        <?php if(count($category_list)>0 ){
                                            foreach($category_list as $row){?>
                                        <li ><a <?php if($row['category_id']==$type){?>style="color: #c29958;font-weight: 700;"<?php }?> href="#" onclick="getProductByCategory(<?php echo $row['category_id'];?>)"><?php echo $row['category_name'];?> </a></li>
                                            <?php }
                                        }?>
                                        
                                    </ul>
                                </div>
                            </div>
                            <!-- single sidebar end -->

                           
                            <!-- single sidebar start -->
                            <div class="sidebar-banner">
                                <div class="img-container">
                                    <a href="#">
                                        <img src="assets/img/banner/sidebar-banner.jpg" alt="">
                                    </a>
                                </div>
                            </div>
                            <!-- single sidebar end -->
                        </aside>
                    </div>
                    <!-- sidebar area end -->

                    <!-- shop main wrapper start -->
                    <div class="col-lg-9 order-1 order-lg-2">
                        <div class="shop-product-wrapper">
                            <!-- shop product top wrap start -->
                            <form name="frm_manage_parcels" id="frm_manage_parcels" method="post" action="<?php echo base_url();?>Welcome/managePosts/
                                                <?php if($this->uri->segment(4)!=""){ echo $this->uri->segment(4);}?>/
                                        <?php if($this->uri->segment(5)!=""){ echo $this->uri->segment(5);}?>
                                       ">
                                    <div class="shop-top-bar">
                                        <div class="row align-items-center">
                                            <div class="col-lg-7 col-md-6 order-2 order-md-1">
                                               <!--  <div class="top-bar-left">
                                                    <div class="product-view-mode">
                                                        <a class="active" href="#" data-target="grid-view" data-bs-toggle="tooltip" title="" data-bs-original-title="Grid View" aria-label="Grid View"><i class="fa fa-th"></i></a>
                                                        <a href="#" data-target="list-view" data-bs-toggle="tooltip" title="" data-bs-original-title="List View" aria-label="List View"><i class="fa fa-list"></i></a>
                                                    </div>
                                                    <div class="product-amount">
                                                        <p>Showing 1–16 of 21 results</p>
                                                    </div>
                                                </div> -->
                                            </div>
                                            <div class="col-lg-5 col-md-6 order-1 order-md-2">
                                                <div class="top-bar-right">
                                                    <div class="product-short">
                                                        <p>Sort By : </p>
                                                        <select class="nice-select" name="sortby" style="display: none;" onchange="getSortData()">
                                                            <option value="">Select</option>
                                                            <option value="a_to_z">Name (A - Z)</option>
                                                            <option value="z_to_a">Name (Z - A)</option>
                                                            <option value="low_to_high">Price (Low &gt; High)</option>
                                                            <!-- <option value="date">Rating (Lowest)</option> -->
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            <!-- shop product top wrap start -->

                            <!-- product item list wrapper start -->
                            <div class="shop-product-wrap grid-view row mbn-30">
                                <!-- product single item start -->
                                     <?php if(count($pTypeData)>0){
                                    foreach($pTypeData as $row){?>
                                    <div class="col-md-4 col-sm-6">
   
                                        <!-- product item start -->
                                        <div class="product-item" style="width: 100%; display: inline-block;">
                                            <figure class="product-thumb">
                                                <a href="<?php echo site_url("Welcome/getProductDetails/".base64_encode($row['product_id']))?>" tabindex="0">
                                                    <img class="pri-img" src="<?php echo base_url().$row['product_image'];?>" style="height: 320px;width: 320px;" alt="product">
                                                    <img class="sec-img" src="<?php echo base_url().$row['product_image'];?>" style="height: 320px;width: 320px;" alt="product">
                                                </a>
                                                
                                               
                                            </figure>
                                            <div class="product-caption text-center">
                                               
                                                <h6 class="product-name">
                                                    <a href="product-details.html" tabindex="0"><?php echo $row['product_title'];?></a>
                                                </h6>
                                                <div class="price-box">
                                                    <span class="price-regular"><?php echo $row['product_price'];?></span>
                                                    <span class="price-old"><del><?php echo $row['mrp_price'];?></del></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- product item end -->
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