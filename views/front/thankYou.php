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
            	<div class="card">
            		<div class="card-body text-center">
			                <div class="row">
			                    <div class="col-12">
			                    	<h1 style="color:green;padding: 5px;">Thank You !</h1>
			                    	<h5 style="padding:5px;">Your order no is - <?php echo $order_no;?></h5>
			                    </div>
			                </div>
			                <div class="row">
			                    <div class="col-12" style="padding:5px;">
			                    	<a href="<?php echo base_url();?>" class="btn btn-sqr">Back to home</a>
			                    </div>
			                </div>
			        </div>
	            </div>
            </div>
        </div>
</main>