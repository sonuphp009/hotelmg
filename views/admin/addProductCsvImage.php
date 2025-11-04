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
								<!-- <a href="#" class="btn btn-white btn-border btn-round mr-2">Manage</a>
								<a href="#" class="btn btn-secondary btn-round">Add Customer</a> -->
							</div>
						</div>
					</div>
				</div>
			<div class="page-inner mt--5">
				<div class="row">
        <div class="card col-sm-12">
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
       	        <form  name="f1" action="<?php  echo site_url('backend/Posts/addProductImages'); ?>"    enctype="multipart/form-data"  method="post">
                          <div class="row">

                            <div class="col-sm-12 text-center">
                                <label id="lab_login" ></label>
                            </div>
                          </div>
                          <div class="row form-group " style="padding: 10px;">
                            
                              <div class="col-sm-12">
                                <input type="hidden" name="txt_pic" id="txt_pic" >
                                      <label class="control-label">Upload Products Images :</label>
                                       <input class="form-control col-md-6" id="product_images" name="product_images[]" type="file" multiple="multiple" required > 
                                      
                                </div>
                              
                              
                              
                              
                              
                            </div>
                            <div class="row" style="padding: 10px;">
                              <div class="col-lg-6  col-md-6 col-xs-6">
                                <button id="btn_addpimages" name="btn_addpimages" type="submit" class="btn btn-primary" >Submit</button>
                                <a href="<?php echo site_url('backend/Posts/addProductImages');?>" class="btn btn-danger" >
                                Cancel</a>

                              </div>
                            </div>
                         
                    </form>
              </div>
            </div>
			  </div>
		  </div>
			
</div>
		
		
		<!-- End Custom template -->
    