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
                <!-- Main content -->
                <section class="content">
                  <div class="container-fluid">
                    <div class="card">
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
                        <form  name="f1" action="<?php  echo site_url('backend/Category/updateSubCategory/'.base64_encode($subcatInfo[0]['subcategory_id'])); ?>"    enctype="multipart/form-data"  method="post">
                                      <div class="row">

                                        <div class="col-sm-12 text-center">
                                            <label id="lab_login" ></label>
                                        </div>
                                      </div>
                                      <div class="row form-group " style="padding: 10px;">
                                          <div class="col-sm-12">
                                            <input type="hidden" name="txt_pic" id="txt_pic" value="<?php echo $subcatInfo[0]['subcat_image'];?>">
                                                  <label class="control-label">Upload Subcategory Image:</label>
                                                  <input type="file" name="category_image" id="category_image"  onchange="readURL(this);" accept="image/*" capture="">
                                                  
                                            </div>
                                            <div class="col-sm-12 form-group">
                                              <img  id="thumb"  width="100px" height="100px" title="Image" src="<?php echo base_url('assets/subcategory/').$subcatInfo[0]['subcat_image'];?>" />
                                          </div>
                                          <div class="col-sm-12 form-group">
                                            <label>Category Name</label>
                                              <select name="category_id" id="category_id" class="form-control">
                                              <?php
                                              $output="";
                                              if(count($category_info)>0)
                                              {
                                                $output.='<option value="">-Select Category-</option>';

                                                foreach($category_info as $row)
                                                {
                                                  if($row['category_id']==$subcatInfo[0]['category_id'])
                                                  {
                                                    $output.='<option selected value="'.$row['category_id'].'">'.$row['category_name'].'</option>';
                                                  }
                                                  else
                                                  {
                                                    $output.='<option value="'.$row['category_id'].'">'.$row['category_name'].'</option>';
                                                  }
                                                }   
                                                echo $output;
                                              }?>
                                            </select>
                                          </div>
                                          <div class="col-sm-12 form-group">
                                            <label>Sub Category Name</label>
                                            <input type="text" name="subcategory_name" id="subcategory_name" class="form-control " placeholder="Enter Sub Category Name"   value="<?php echo $subcatInfo[0]['subcategory_name']?>">
                                          </div>
                                          <div class="col-sm-12 form-group text-left ">
                                            <label>Status</label>
                                            <select name="subcategory_status" id="subcategory_status" class="form-control" required>
                                            <option value="">Select Status</option>
                                            <option value="Active" <?php if($subcatInfo[0]['status']=='active'){echo 'selected="selected"';}?>>Active</option>
                                            <option value="Inactive" <?php if($subcatInfo[0]['status']=='inactive'){echo 'selected="selected"';}?>>Inactive</option>
                                            </select>
                                          </div>
                                          
                                          
                                          
                                        </div>
                                        <div class="row" style="padding: 10px;">
                                          <div class="col-lg-6  col-md-6 col-xs-6">
                                            <button id="btn_updatesubcategory" name="btn_updatesubcategory" type="submit" class="btn btn-primary" >Submit</button>
                                            <a href="<?php echo site_url('backend/Category/manageCategory');?>" class="btn btn-danger" >
                                            Cancel</a>


                                          </div>
                                        </div>
                                    
                                </form>
                          </div>
                        </div>

                  </div><!--/. container-fluid -->
                </section>
                <!-- /.content -->
              <!-- /.content -->
          </div>
      </div>
</div>

 	<!-- End Custom template -->
   <script type="text/javascript">
    function readURL(input) {

      var image = document.getElementById("thumb");
      image.src = input.value;       
    }
</script>