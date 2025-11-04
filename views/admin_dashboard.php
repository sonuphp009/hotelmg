<div class="main-panel">
			<div class="content">
				<div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold">Dashboard</h2>
								<!-- <h5 class="text-white op-7 mb-2">Free Bootstrap 4 Admin Dashboard</h5> -->
							</div>
							<div class="ml-md-auto py-2 py-md-0">
								<!-- <a href="#" class="btn btn-white btn-border btn-round mr-2">Manage</a>
								<a href="#" class="btn btn-secondary btn-round">Add Customer</a> -->
							</div>
						</div>
					</div>
				</div>
          <div class="page-inner mt--5">
          <div class="row">
						<div class="col-sm-6 col-md-3">
							<a href="<?php echo base_url().'backend/Category/manageCategory';?>">
								<div class="card card-stats card-round">
									<div class="card-body ">
										<div class="row">
											<div class="col-5">
												<div class="icon-big text-center">
													<i class="flaticon-layers text-warning"></i>
												</div>
											</div>
											<div class="col-7 col-stats">
												<div class="numbers">
													<p class="card-category">Categories</p>
													<h4 class="card-title"><?php echo $category_num;?></h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							</a>
						</div>
						<div class="col-sm-6 col-md-3">
							<a href="<?php echo base_url().'backend/Category/manageSubCategory';?>">

							<div class="card card-stats card-round">
								<div class="card-body ">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
												<i class="flaticon-shapes-1 text-success"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
											<div class="numbers">
												<p class="card-category">Sub Categories</p>
												<h4 class="card-title"><?php echo $subcategory_num;?></h4>
											</div>
										</div>
									</div>
								</div>
							</div>
							</a>
						</div>
						<div class="col-sm-6 col-md-3">
							<a href="<?php echo base_url().'backend/Posts/managePosts';?>">
							<div class="card card-stats card-round">
								<div class="card-body">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
												<i class="flaticon-home text-danger"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
											<div class="numbers">
												<p class="card-category">Rooms</p>
												<h4 class="card-title"><?php echo $posts;?></h4>
											</div>
										</div>
									</div>
								</div>
							</div>
							</a>
						</div>
						<div class="col-sm-6 col-md-3">
							<a href="<?php echo base_url().'backend/Posts/managePosts';?>">
							<div class="card card-stats card-round">
								<div class="card-body">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
												<i class="flaticon-home text-danger"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
											<div class="numbers">
												<p class="card-category">Book Rooms</p>
												<h4 class="card-title"><?php echo $posts;?></h4>
											</div>
										</div>
									</div>
								</div>
							</div>
							</a>
						</div>
						<div class="col-sm-6 col-md-3">
							<!-- <div class="card card-stats card-round">
								<div class="card-body">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
												<i class="flaticon-user-2
												 text-primary"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
											<div class="numbers">
												<p class="card-category">Customer</p>
												<h4 class="card-title">+45K</h4>
											</div>
										</div>
									</div>
								</div>
							</div> -->
						</div>
					</div>
          </div>
			</div>
			
</div>
		
		
		<!-- End Custom template -->
