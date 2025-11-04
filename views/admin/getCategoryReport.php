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
								 

								<button  id="btnExportReport" name="btnExportReport" class="btn btn-round" style="background-color: skyblue; color:black;">Export to excel</button>
								<a href="<?php echo base_url('backend/');?>Category/manageCategory" class="btn  btn-round" style="background-color: white; color:black;">back</a>
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
			                										 <table class="table table-striped table-bordered" id="tbl_report" width="100%">
			                											<thead>
			                												<tr>
			                													<th style="color:#000000;">Sr. No.</th>
			                                                                           <th style="color:#000000;">Category Name</th>
			                                                                           
			                                                                           <th style="color:#000000;">Status</th>
			                												</tr>
			                											</thead>
			                											<tbody id="searchTable2">
			                											<?php $count = 1; foreach($catmaster as $row): ?>
			                                                                      <tr class="odd gradeX">
	                                                                                         <td><?php echo '&nbsp; &nbsp;'.$count++; ?> </td>
	                                                                                         
	                                                                                         <td><?php print $row['category_name']; ?></td>
	                                                                                        
	                                                                                        <td><?php print $row['status']; ?></td>
	                                                                                         
	                                                                                        
	                                                                            </tr>
			                                                                           <?php endforeach; ?>
			                											</tbody>
			                										</table>
			                										<div class="dataTables_paginate paging_simple_numbers" id="datatable-default_paginate">
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
