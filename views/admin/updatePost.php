<div class="main-panel">
    <div class="content">
        <div class="panel-header bg-primary-gradient">
          <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
              <div>
                <h2 class="text-white pb-2 fw-bold"><?php echo $page_title;?></h2>
                <h5 class="text-white op-7 mb-2"></h5>
              </div>
              <!-- <div class="ml-md-auto py-2 py-md-0">
                <a href="<?php echo base_url('backend/');?>products/manageproducts" class="btn btn-white btn-border btn-round mr-2">Back</a>
              </div> -->
            </div>
          </div>
        </div>
      <div class="page-inner mt--5">
              <!-- Main content -->

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
       	     <form  name="f1" action="<?php  echo site_url('backend/Posts/updateProduct/'.base64_encode($postInfo['product_id'])); ?>"    enctype="multipart/form-data"  method="post">
                          <div class="row">

                            <div class="col-sm-12 text-center">
                                <label id="lab_login" ></label>
                            </div>
                          </div>
                          <div class="row form-group " >
                                 <div class="col-sm-6 form-group">
                                  
                                    <label>Category</label>
                                    <select name="category_id" id="category_id" class="form-control" required>
                                      <option value="<?php echo $postInfo['category_id']?>"><?php echo $postInfo['category_name']?></option>
                                    <option value="">Select Category</option>
                                    <?php if(count($catmaster)>0)
                                    {
                                      foreach($catmaster as $row)
                                        {?>
                                        <option value="<?php echo $row['category_id']?>"><?php echo $row['category_name']?></option>
                                  <?php }
                                } ?>
                                    
                                    </select>
                                 
                              </div>
                               <div class="col-sm-6 form-group">
                                  
                                    <label>Sub Category</label>
                                    <select name="subcategory_id" id="subcategory_id" class="form-control" required>
                                     
                                    <option value="">Select Sub Category</option>
                                    <?php 
                                     if(count($subcatmaster)>0)
                                    {
                                      foreach($subcatmaster as $row)
                                        {
                                          if($row['subcategory_id']==$postInfo['subcategory_id'])
                                          {
                                              echo '<option selected value="'.$row['subcategory_id'].'">'.$row['subcategory_name'].'</option>';
                                          }
                                          else
                                          {
                                              echo '<option value="'.$row['subcategory_id'].'">'.$row['subcategory_name'].'</option>';
                                          }
                                          
                                       }
                                } ?>
                                    
                                    </select>
                                 
                              </div>
                             
                              </div>
                                 
                                
                            </div>
                            <div class="row form-group ">

                                <div class="col-sm-6 form-group">
                                  <label>Product Tilte</label>
                                  <input type="text" name="product_title" id="product_title" class="form-control " placeholder="Enter Product Title" onkeydown="return /[a-z_]/i.test(event.key)" value="<?php echo $postInfo['product_title'];?>" >
                                </div>
                                <div class="col-sm-3 form-group">
                                  <label>Product Price</label>
                                  <input type="number" name="product_price" id="product_price" class="form-control " placeholder="Enter Product Price" value="<?php echo $postInfo['product_price'];?>" step="0.01" >
                                </div>
                                <div class="col-sm-3 form-group">
                                  <label>MRP Price</label>
                                  <input type="number" name="mrp_price" id="mrp_price" class="form-control " placeholder="Enter MRP Price" value="<?php echo $postInfo['mrp_price'];?>" step="0.01" >
                                </div>
                                 <div class="col-sm-3 form-group">
                                  <label>Product Size</label>
                                  <input type="text" name="product_size" id="product_size" class="form-control " value="<?php echo $postInfo['product_size'];?>" placeholder="Enter Product Size"  required>
                                </div>
                                <div class="col-sm-3 form-group">
                                  <label>Product Color</label>
                                  <input type="text" name="product_color" id="product_color" class="form-control " placeholder="Enter Product Color" value="<?php echo $postInfo['product_color'];?>" required>
                                </div>
                                <div class="col-sm-3 form-group">
                                  <label>Product Unit</label>

                                    <select name="select_unit" id="select_unit" class="form-control" required>
                                    <option value="<?php echo $postInfo['product_unit'];?>"><?php echo $postInfo['product_unit'];?></option>

                                    <option value="">-Select-</option>
                                    <option value="GM">GM</option>
                                    <option value="KG">KG</option>
                                    </select>
                                </div>
                                <div class="col-sm-3 form-group text-left ">
                                  <label>Status</label>
                                  <select name="product_status" id="product_status" class="form-control" required>
                                  <option value="">Select Status</option>
                                  <option value="Active" <?php if($postInfo['status']=='active'){echo 'selected="selected"';}?>>Active</option>
                                  <option value="Inactive" <?php if($postInfo['status']=='inactive'){echo 'selected="selected"';}?>>Inactive</option>
                                  </select>
                                </div>
                              
                              <div class="col-sm-12 form-group">
                                  <label>Post Description</label>
                                  <textarea name="product_desc" id="product_desc" class="form-control " placeholder="Enter Description"><?php echo $postInfo['product_description'];?></textarea>
                                  
                                </div>

                              
                            </div>
                            <?php                                        
                             $pimgs=$this->Posts_model->getProductImage($postInfo['product_id'],0);
?>
                             <div class="row">
                                 <div class="col-sm-3">
                                <input type="hidden" name="txt_pic" id="txt_pic" value="<?php echo $postInfo['product_image'];?>">
                                      <label class="control-label">Upload Product Image :</label>
                                      <input type="file" name="product_image[]" id="product_image"  onchange="readURL(this);" accept="image/*" class="form-control" capture="" multiple>
                                      
                                </div><hr/>
                                <div class="col-sm-9 form-group">
                                  <div class="row form-group">
                                  <?php 
                                    if(count($pimgs)>0){
                                        foreach($pimgs as $img)
                                        { if($img['url_type']=="image"){
                                  ?>
                                    <div class="col-sm-1 form-group" style="border-style: solid;
  border-color: black;margin-left: 15px;padding: 10px;">
                                      
                                      <a href="<?php echo base_url().$img['image_url'];?>" target="_blank" style="margin-top: -10px;">
                                        <img  id="thumb"  width="50px" height="50px" title="Image"  src="<?php echo base_url().$img['image_url'];?>" />
                                      </a>
                                      <span style="margin-left: 20px;" ><a href="<?php echo site_url('backend/Posts/deletePImage/'.base64_encode($img['image_id']));?>" ><i class="fa fa-trash"></i></a></span>
                                    </div>
                                <?php  }
                                    }
                              }?>
                                </div>
                              </div>
                            </div>
                             <div class="row">
                                <div class="col-sm-3  form-group">
                                        <label class="control-label">Upload Video( ) :</label>
                                        <input type="file" name="video_url" id="video_url"   class="form-control" value="<?php echo $postInfo['product_image'];?>" >
                                        
                                  </div>
                                 <div class="col-sm-9 form-group">
                                  <div class="row form-group">

                                  <?php 
                                    if(count($pimgs)>0){
                                        foreach($pimgs as $img)
                                        { 
                                          if($img['url_type']=="video"){
                                  ?>
                                  <input type="hidden" name="video_txt" id="video_txt" value="<?php echo $img['image_url'];?>">
                                    <div class="col-sm-6 form-group" style="border-style: solid; border-color: black;margin-left: 15px;padding: 10px;">
                                      <video width="320" height="240" controls>
                                          <source src="<?php echo base_url().$img['image_url'];?>" type="video/mp4">
                                          <source src="<?php echo base_url().$img['image_url'];?>" type="video/ogg">
                                        Your browser does not support the video tag.
                                        </video>
                                     
                                    </div>
                                <?php }
                                  }
                              }?>
                                </div>
                              </div> 

                            </div>
                            <div class="row" >
                              <div class="col-lg-6  col-md-6 col-xs-6">
                                <button id="btn_updateposts" name="btn_updateposts" type="submit" class="btn btn-primary" >Submit</button>
                                <a href="<?php echo site_url('backend/Posts/managePosts');?>" class="btn btn-danger" >
                                Cancel</a>

                              </div>
                            </div>
                         
                    </form>
              </div>
            </div>

      </div><!--/. container-fluid -->
    </section>
     <!-- /.content -->
          </div>
      </div>
</div>

  <script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#thumb').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files);
        }
    }
</script>