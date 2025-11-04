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
                <a href="<?php echo base_url('backend/');?>Posts/managePosts" class="btn btn-white btn-border btn-round mr-2">Back</a>
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
       	     <form  name="f1" action="<?php  echo site_url('backend/Posts/addPost'); ?>"    enctype="multipart/form-data"  method="post">
                          <div class="row">

                            <div class="col-sm-12 text-center">
                                <label id="lab_login" ></label>
                            </div>
                          </div>
                          <div class="row form-group " >
                                <div class="col-sm-6 form-group">
                                  
                                    <label>Category</label>
                                    <select name="category_id" id="category_id" class="form-control" onchange="getsubcategory()" required>
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
                                    <select name="subcategory_id" id="subcategory_id" class="form-control" >
                                 
                                    
                                    </select>
                                 
                              </div>
                              
                              
                            </div>
                            <div class="row form-group ">

                                <div class="col-sm-6 form-group">
                                  <label>Product Tilte</label>
                                  <input type="text" name="product_title" id="product_title" class="form-control " placeholder="Enter Product Title"  required>
                                </div>
                                <div class="col-sm-3 form-group">
                                  <label>Product Price</label>
                                  <input type="number" step="0.01" name="product_price" id="product_price" class="form-control " placeholder="Enter Product Price"  required>
                                </div>
                                <div class="col-sm-3 form-group">
                                  <label>MRP Price</label>
                                  <input type="number" step="0.01" name="mrp_price" id="mrp_price" class="form-control " placeholder="Enter MRP Price"  required>
                                </div>
                                <div class="col-sm-4 form-group">
                                  <label>Product Size</label>
                                  <input type="text" name="product_size" id="product_size" class="form-control " placeholder="Enter Product Size"  required>
                                </div>
                                <div class="col-sm-4 form-group">
                                  <label>Product Color</label>
                                  <input type="text" name="product_color" id="product_color" class="form-control " placeholder="Enter Product Color"  required>
                                </div>
                                <div class="col-sm-4 form-group">
                                  <label>Product Unit</label>
                                    <select name="select_unit" id="select_unit" class="form-control" required>
                                    <option value="">-Select-</option>
                                    <option value="GM">GM</option>
                                    <option value="KG">KG</option>
                                    </select>
                                </div>
                                
                              <div class="col-sm-12 form-group">
                                  <label>Product Description</label>
                                  <textarea name="product_desc" id="product_desc" class="form-control " placeholder="Enter Description" required></textarea>
                                  
                                </div>
                                
                              
                              
                            </div>
                             <div class="row">
                                <div class="col-sm-3  form-group">
                                  <input type="hidden" name="txt_pic" id="txt_pic" >
                                        <label class="control-label">Upload Product Image( ) :</label>
                                        <input type="file" name="product_image[]" id="product_image"  onchange="readURL(this);" accept="image/*" class="form-control" capture="" multiple required>
                                        
                                  </div>
                                   <hr/>
                                  <div class="col-sm-3 form-group">
                                      <img  id="thumb"  width="100px" height="100px" title="Image" src="<?php echo base_url().'assets/img/screen.png'?>" />                              
                                    </div>

                            </div>
                             <div class="row">
                                <div class="col-sm-3  form-group">
                                        <label class="control-label">Upload Video( ) :</label>
                                        <input type="file" name="video_url" id="video_url"   class="form-control" required>
                                        
                                  </div>
                                   

                            </div>
                            <div class="row" >
                              <div class="col-lg-6  col-md-6 col-xs-6">
                                <button id="btn_addproduct" name="btn_addproduct" type="submit" class="btn btn-primary" >Submit</button>
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
  <!-- /.content -->
          </div>
      </div>
</div>

  <script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#thumb').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>