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
								<a href="<?php echo base_url('backend/');?>Category/addCategory" class="btn  btn-round" style="background-color: white; color:black;">Add Category</a>

								<a href="<?php echo base_url('backend/');?>Category/getCategoryReport/<?php if($this->uri->segment(4)!=""){ echo $this->uri->segment(4);}?>/<?php if($this->uri->segment(5)!=""){ echo $this->uri->segment(5);}?>" class="btn  btn-round" style="background-color: skyblue; color:black;">Export to excel</a>

								<!-- <button  id="btnExport" name="btnExport" class="btn btn-round" style="background-color: skyblue; color:black;">Export to excel</button> -->
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
										 <?php if($this->session->flashdata('success')!=""){?>
							                <div class="alert alert-success">
							                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							                    <?php echo $this->session->flashdata('success');?>
							                  </div>
							                <?php }?>
							                
							                <?php if($this->session->flashdata('error')!=""){?>
							                <div class="alert alert-danger">
							                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							                    <?php echo $this->session->flashdata('error');?>
							                  </div>
							                <?php }?>
											<form class="needs-validation" name="frm_manage_cuisines" id="frm_manage_cuisines" method="post" action="<?php echo base_url();?>backend/Category/mcuisinesearch/<?php if($this->uri->segment(4)!=""){ echo $this->uri->segment(4);}?>/<?php if($this->uri->segment(5)!=""){ echo $this->uri->segment(5);}?>">
												<div class="row">
													<div class="col-md-3 xl-30">
														<input type="text" name="cuisine_title" id="cuisine_title" placeholder="Enter  Title" class="form-control" value="<?php  if($this->uri->segment(4)!='Na'){ echo $this->uri->segment(4);}?>">
													</div>
													
													<div class="col-md-3 xl-30" >
														<select name="cuisine_status" id="cuisine_status" class="custom-select">
																<option value="">--Status--</option>
																<option value="Active" <?php if($this->uri->segment(5)=="Active"){ echo 'selected="selected"';}?>>Active</option>
																<option value="Inactive" <?php if($this->uri->segment(5)=="Inactive"){ echo 'selected="selected"';}?>>Inactive</option>
																<option value="Delete" <?php if($this->uri->segment(5)=="Delete"){ echo 'selected="selected"';}?>>Delete</option>
															</select>
													</div>
							
													<div class="col-md-3 xl-30" >
															<button class="btn btn-primary" name="btn_search" id="btn_search">Search</button>
															<button class="btn btn-primary" name="btn_clear" id="btn_clear">Clear</button>
																									
													</div>
																		
																		
												</div>
																		
											</form><hr/>
			                              <div class="row">
			                                <div class="col-sm-12" style="overflow-x: scroll;">
			                									<?php //$cntusermaster=$this->Inm->get_user_all_admin_res();
			                									if(count($catmaster)>0)
			                									{
			                										?>
			                										 <table class="table table-striped table-bordered" id="datatable tbl_report" width="100%">
			                											<thead>
			                												<tr>
			                													<th style="color:#000000;">Sr. No.</th>
			                                                                          <th style="color:#000000;">Image</th>
			                                                                           <th style="color:#000000;">Category Name</th>
			                                                                           
			                                                                           <th style="color:#000000;">Status</th>
			                                                                          <th style="text-align:center; color:#000;">Action</th>
			                												</tr>
			                											</thead>
			                											<tbody id="searchTable2">
			                											<?php $count = 1; foreach($catmaster as $row): ?>
			                                                                      <tr class="odd gradeX">
	                                                                                         <td><?php echo '&nbsp; &nbsp;'.$count++; ?> </td>
	                                                                                         <td><a href="<?php print base_url('assets/category/').$row['category_image']; ?>"><img src="<?php print base_url('assets/category/').$row['category_image']; ?>" class="rounded" style="height: 50px;width: 50px;"></a></td>
	                                                                                         <td><?php print $row['category_name']; ?></td>
	                                                                                        
	                                                                                        <td><?php print $row['status']; ?></td>
	                                                                                         
	                                                                                        <td style="text-align:center;">
	                                                                                        <a href="<?php echo base_url();?>backend/Category/updateCategory/<?php echo base64_encode($row['category_id']);?>" >
	                                                                                        <button type="button" class="btn btn-primary btn-xs"  style="width:45px" title='Click Here To Update Record'><i class="fa fa-edit" id="elementID"></i></button></a> | 
	                                                                                        
	                                                                                        <a href="<?php echo base_url();?>backend/Category/deleteCategory/<?php echo base64_encode($row['category_id']);?>" > 
	                                                                                        <button type="button" class="btn btn-primary btn-xs"  style="width:45px" title='Click Here To Update Record'><i class="fa fa-trash"   id="elementID"></i></button></a>
	                                                                                        </td>
	                                                                            </tr>
			                                                                           <?php endforeach; ?>
			                											</tbody>
			                										</table>
			                										<div class="dataTables_paginate paging_simple_numbers" id="datatable-default_paginate">
			                										<?php echo $links; ?>					
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
