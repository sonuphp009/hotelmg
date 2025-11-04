<div class="main-panel">
		<div class="content">
				<div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold"><?php echo $page_title;?></h2>
								<h5 class="text-white op-7 mb-2"></h5>
							</div>
							<div class="ml-md-auto py-2 py-md-0">
								<!-- <a href="<?php echo base_url('backend/');?>Category/addCategory" class="btn  btn-round" style="background-color: white; color:black;">Add Category</a>
 -->
								<!-- <a href="<?php //echo base_url('backend/');?>Category/getCategoryReport/<?php //if($this->uri->segment(4)!=""){ echo $this->uri->segment(4);}?>/<?php //if($this->uri->segment(5)!=""){ echo $this->uri->segment(5);}?>" class="btn  btn-round" style="background-color: skyblue; color:black;">Export to excel</a> -->

								<button  id="btnExportReportProduct" name="btnExportReportProduct" class="btn btn-round" style="background-color: skyblue; color:black;">Export to excel</button>

								<a href="<?php echo base_url('backend/');?>Posts/managePosts" class="btn  btn-round" style="background-color: white; color:black;">back</a>
							</div>
						</div>
					</div>
				</div>
			<div class="page-inner mt--5">
				<div class="row">
					<div class="col-sm-12">
								<section class="card">
									
								<header class="card-header">
										<div class="row">
											<div class="col-sm-9">
											</div>
											<!-- <div class="col-sm-3">
												<input type="text" name="txt_search" class="form-control" placeholder="Search..." id="search2">
											</div> -->
										</div>
									</header>
								
									<div class="card-body">
										
			                              <div class="row">
			                                <div class="col-sm-12" style="overflow-x: scroll;">
                										<?php //$cntusermaster=$this->Inm->get_user_all_admin_res();
                									if(count($catmaster)>0)
                									{
                										?>
                										<table class="table table-striped table-bordered" id="datatable" width="100%">
                											<thead>
                												<tr style="width: 100%;">
                													<th style="color:#000000;width: 5%;">Sr. No.</th>
                                                                           <th style="color:#000000;width: 15%;">Product Title</th>
                                                                           <th style="color:#000000;width: 25%;">Description</th>
                                                                           <th style="color:#000000;width: 10%;">Category</th>
                                                                            <th style="color:#000000;width: 10%;">Sub Category</th>
                                                                           <th style="color:#000000;width: 10%;">Price </th>
                                                                           
                                                                           <th style="color:#000000;width: 10%;">Status</th>
                												</tr>
                											</thead>
                											<tbody>
                											<?php $count = 1; foreach($catmaster as $row): ?>
                                                                      <tr class="odd gradeX">
                                                                                         <td><?php echo '&nbsp; &nbsp;'.$count++; ?> </td>
                                                                                         
                                                                                         <td><?php print $row['product_title']; ?></td>
                                                                                        <td><?php print $row['product_description']; ?></td>
																																												<td><?php print $row['category_name']; ?></td>
																																												<td><?php print $row['subcategory_name']; ?></td>
																																												<td><?php print $row['product_price']; ?></td>
                                                                                        <td><?php print $row['status']; ?></td>
                                                                                         
                                                                                        
                                                                            </tr>
                                                                           <?php endforeach; ?>
                											</tbody>
                										</table>
                										<div class="dataTables_paginate paging_simple_numbers" id="datatable-default_paginate">
                										<?php //echo $links; ?>					
                									</div>
                									<?php } else {?>
                										<div	 class="alert alert-danger">
                											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                											No records found.
                										</div>
                									<?php }?>
			                                </div>
			                              </div>
									</div>
								</section>
							</div>
				</div>
			</div>
		</div>
			
</div>
		
		
		<!-- End Custom template -->
