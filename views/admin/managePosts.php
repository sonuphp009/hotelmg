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
								<a href="<?php echo base_url('backend/');?>Posts/addPost" class="btn  btn-round" style="background-color: white; color:black;">Add Product</a>
								<a href="<?php echo base_url('backend/');?>Posts/addProductByCsv" class="btn  btn-round" style="background-color: white; color:black;">Add Product CSV</a>

								<a href="<?php echo base_url('backend/');?>Posts/gePostsReport/<?php if($this->uri->segment(4)!=""){ echo $this->uri->segment(4);}?>/<?php if($this->uri->segment(5)!=""){ echo $this->uri->segment(5);}?>/<?php if($this->uri->segment(6)!=""){ echo $this->uri->segment(6);}?>/<?php if($this->uri->segment(7)!=""){ echo $this->uri->segment(7);}?>" class="btn  btn-round" style="background-color: skyblue; color:black;">Export to excel</a>
							</div>
						</div>
					</div>
				</div>
			<div class="page-inner mt--5">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       	<div class="row">
							<div class="col-sm-12">
								<section class="card">
									<header class="card-header">
										<div class="card-actions">
											<!-- <a href="<?php //echo base_url('backend/');?>Posts/addPost" style="decoration:none;"><button class="btn btn-primary float-right" name="" id="">Add Product</button></a> -->
											<form class="needs-validation" name="frm_manage_cuisines" id="frm_manage_cuisines" method="post" action="<?php echo base_url();?>backend/Posts/msubcatsearch/<?php if($this->uri->segment(4)!=""){ echo $this->uri->segment(4);}?>/<?php if($this->uri->segment(5)!=""){ echo $this->uri->segment(5);}?>/<?php if($this->uri->segment(6)!=""){ echo $this->uri->segment(6);}?>/<?php if($this->uri->segment(7)!=""){ echo $this->uri->segment(7);}?>">
														<div class="row">
															<div class="col-md-2 xl-30" >
																<select name="category_id" id="category_id" class="custom-select" >
																<option value="">--Category--</option>
																<?php if(isset($main_catlist) && count($main_catlist)>0){
																foreach($main_catlist as $main) {?>
																<option value="<?php echo $main['category_id'];?>" <?php if($this->uri->segment(4)==$main['category_id']){ echo 'selected="selected"';}?>><?php echo $main['category_name'];?></option>
																<?php }
																}?>																		
																	</select>
															</div>
															<div class="col-sm-2 ">
                                  
                                    
                                    <select name="subcategory_id" id="subcategory_id" class="form-control">nuyyi
                                 		<option value="">- Sub Category -</option>
                                    	<?php if(isset($main_subcatlist) && count($main_subcatlist)>0){
																		foreach($main_subcatlist as $main_r) {?>
																		<option value="<?php echo $main_r['subcategory_id'];?>" <?php if($this->uri->segment(5)==$main_r['subcategory_id']){ echo 'selected="selected"';}?>><?php echo $main_r['subcategory_name'];?></option>
																		<?php }
																		}?>	
                                    </select>
                                 
                              </div>
															<div class="col-md-2 xl-30">
																<input type="text" name="product_title" id="product_title" placeholder="Enter Product" class="form-control" value="<?php  if($this->uri->segment(6)!='Na'){ echo $this->uri->segment(6);}?>">
															</div>
															
															<div class="col-md-2 xl-30" >
																<select name="product_status" id="product_status" class="custom-select">
																		<option value="">--Status--</option>
																		<option value="Active" <?php if($this->uri->segment(7)=="Active"){ echo 'selected="selected"';}?>>Active</option>
																		<option value="Inactive" <?php if($this->uri->segment(7)=="Inactive"){ echo 'selected="selected"';}?>>Inactive</option>
																		<option value="Delete" <?php if($this->uri->segment(7)=="Delete"){ echo 'selected="selected"';}?>>Delete</option>
																	</select>
															</div>
															
															<div class="col-md-3 xl-30" >
																	<button class="btn btn-primary" name="btn_search" id="btn_search">Search</button>
																	<button class="btn btn-primary" name="btn_clear" id="btn_clear">Clear</button>
																											
															</div>
																				
																				
														</div>
																				
													</form>
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
			                										<table class="table table-striped table-bordered" id="datatable" width="100%">
			                											<thead>
			                												<tr style="width: 100%;">
			                													<th style="color:#000000;width: 5%;">Sr. No.</th>
                                                    <th style="color:#000000;width: 15%;">Image</th>
                                                     <th style="color:#000000;width: 25%;">Product Title</th>
                                                     <!-- <th style="color:#000000;width: 25%;">Description</th> -->
                                                     <th style="color:#000000;width: 10%;">Category</th>
                                                      <th style="color:#000000;width: 10%;">Sub Category</th>
                                                     <th style="color:#000000;width: 10%;">Price </th>
                                                     
                                                     <th style="color:#000000;width: 10%;">Status</th>
                                                    <th style="text-align:center; color:#000;width: 20%;">Action</th>
			                												</tr>
			                											</thead>
			                											<tbody>
			                											<?php $count = 1; foreach($catmaster as $row): ?>
                                          			<tr class="odd gradeX">
                                                             <td><?php echo '&nbsp; &nbsp;'.$count++; ?> </td>
                                                             <td style="padding:5px;"><a href="<?php print base_url().$row['product_image']; ?>"><img src="<?php print base_url().$row['product_image']; ?>" class="img-circle" style="height: 50px;width: 50px;"></a></td>
                                                             <td><?php print $row['product_title']; ?></td>
                                                            <!-- <td><?php //print $row['product_description']; ?></td> -->
																														<td><?php print $row['category_name']; ?></td>
																														<td><?php print $row['subcategory_name']; ?></td>
																														<td><?php print $row['product_price']; ?></td>
                                                            <td><?php print $row['status']; ?></td>
                                                             
                                                            <td style="text-align:center;">
                                                            <a href="<?php echo base_url();?>backend/Posts/manageProductDetails/<?php echo base64_encode($row['product_id']);?>" title="View Product Details" >
                                                            <i class="fa fa-eye" id="elementID"></i></a> |
                                                            <a href="<?php echo base_url();?>backend/Posts/updateProduct/<?php echo base64_encode($row['product_id']);?>" title="Edit Product" >
                                                            <i class="fa fa-edit" id="elementID"></i></a> | 
                                                            
                                                            <a href="<?php echo base_url();?>backend/Posts/deleteProduct/<?php echo base64_encode($row['product_id']);?>" title="Delete Product"> 
                                                            <i class="fa fa-trash"   id="elementID"></i></a>
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
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
 <!-- /.content -->
          </div>
      </div>
</div>

 