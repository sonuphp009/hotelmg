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
								<a href="<?php echo base_url('backend/');?>Posts/managePosts" class="btn  btn-round" style="background-color: white; color:black;">Back</a>

								
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
							                	<div class="col-sm-12 form-control">
							                		<h1><?php echo $postInfo['product_title']?></h1>
							                		<input type="hidden" name="product_id" id="product_id" value="<?php echo $postInfo['product_id'];?>">
							                	</div>	
							                	<div class="col-sm-12 form-control">
							                		<p><?php echo $postInfo['product_description']?></p>
							                	</div>	

							                	<div class="col-sm-4 form-control">
							                		<label>Category</label> - <?php echo $postInfo['category_name']?>
							                		
							                	</div>	
							                	<div class="col-sm-4 form-control">
							                		<label>Price</label> - <?php echo $postInfo['product_price']?>
							                		
							                	</div>	
							                	<div class="col-sm-4 form-control">
							                		<label>Status</label> - <?php echo $postInfo['status']?>
							                		
							                	</div>	
							                	
							                		
							                </div>
							                <div class="row">
							                	<div class="col-sm-12 form-control">
							                		<label>Images</label>
							                		
							                	</div>
							                	  <?php 
					                                        $pimgs=$this->Posts_model->getProductImage($postInfo['product_id'],0);
					                                    if(count($pimgs)>0){
					                                        foreach($pimgs as $img)
					                                        { 
					                                  ?>
					                                    <div class="col-sm-1 form-group" style="border-style: solid;
					  											border-color: black;margin-left: 15px;padding: 10px;">
					                                      
					                                      <a href="<?php echo base_url().$img['image_url'];?>" target="_blank" style="margin-top: -10px;">
					                                        <img  id="thumb"  width="50px" height="50px" title="Image"  src="<?php echo base_url().$img['image_url'];?>" />
					                                      </a>
					                                      <span style="margin-left: 20px;" ><a href="<?php echo site_url('backend/Posts/deletePImage/'.base64_encode($img['image_id']));?>" ><i class="fa fa-trash"></i></a></span>
					                                    </div>
					                                <?php }
					                              }?>
							                </div><hr/>
							                <div class="row">
							                	<div class="col-sm-12 form-control">
							                		<h1>Add Product to Type</h1>
							                	</div>
							                </div>
							                 <div class="row">
							                	 <div class="col-sm-12 form-group">
			                                      <label>Product Type</label>
			                                        <select name="type_id" id="type_id" class="form-control" onchange="getTypeAddToProduct()">
			                                        <?php
			                                        $output="";
			                                        if(count($type_info)>0)
			                                        {
			                                          $output.='<option value="">-Select Type-</option>';

			                                          foreach($type_info as $row)
			                                          {
			                                              $output.='<option value="'.$row['type_id'].'">'.$row['type'].'</option>';
			                                          }   
			                                          echo $output;
			                                        }?>
			                                      </select>
			                                    </div>
							                </div><hr>
							                 <div class="row">
							                	 <div class="col-sm-12 form-group">
							                	 	<table class="table table-hover">
							                	 		<thead>
							                	 			<tr>
							                	 				<td>Type</td>
							                	 				<td>Action</td>
							                	 			</tr>
							                	 		</thead>
							                	 		<tbody id="tblproducttype">
									                	 	<?php
									                	 			$chktype2=$this->Posts_model->getCheckProductTypeByPId($postInfo['product_id'],1);
									                	 			// print_r($this->db->last_query());
									                	 			// exit;
									                	 			//'.base_url()."backend/Posts/deleteTypeToTable/".base64_encode($value['type_detail_id']).'
									                	 			$output='';

																	if(count($chktype2)>0)
																	{
																		foreach ($chktype2 as $value) 
																		{
																			$output.='<tr>
																							<td>'.$value['type'].'</td>
																							<td><a onclick="getDeleteTypeDetails('.$value['type_detail_id'].')"><i class="fa fa-trash"></i></a></td>
																						</tr>';
																		}
																	}
																	
																	echo $output;
									                	 	?>
							                	 		</tbody>
							                	 	</table>
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

 