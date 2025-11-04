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
								<a href="<?php echo base_url('backend/');?>Category/addProductType" class="btn  btn-round" style="background-color: white; color:black;">Add Product Type</a>

								<a href="<?php echo base_url('backend/');?>Category/getProductTypeReport/<?php if($this->uri->segment(4)!=""){ echo $this->uri->segment(4);}?>/<?php if($this->uri->segment(5)!=""){ echo $this->uri->segment(5);}?>" class="btn  btn-round" style="background-color: skyblue; color:black;">Export to excel</a>

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
			                                                                           <th style="color:#000000;">Product Type</th>
			                                                                           
			                                                                           <th style="color:#000000;">Status</th>
			                                                                          <th style="text-align:center; color:#000;">Action</th>
			                												</tr>
			                											</thead>
			                											<tbody id="searchTable2">
			                											<?php $count = 1; foreach($catmaster as $row): ?>
			                                                                      <tr class="odd gradeX">
	                                                                                         <td><?php echo '&nbsp; &nbsp;'.$count++; ?> </td>
	                                                                                        
	                                                                                         <td><?php print $row['type']; ?></td>
	                                                                                        
	                                                                                        <td><?php print $row['status']; ?></td>
	                                                                                         
	                                                                                        <td style="text-align:center;">
	                                                                                        <a href="<?php echo base_url();?>backend/Category/updateProductType/<?php echo base64_encode($row['type_id']);?>" >
	                                                                                        <button type="button" class="btn btn-primary btn-xs"  style="width:45px" title='Click Here To Update Record'><i class="fa fa-edit" id="elementID"></i></button></a> | 
	                                                                                        
	                                                                                        <a href="<?php echo base_url();?>backend/Category/deleteProductType/<?php echo base64_encode($row['type_id']);?>" > 
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
