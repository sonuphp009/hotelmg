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
                <!-- <a href="<?php echo base_url('backend/');?>Banner/manageBanners" class="btn btn-white btn-border btn-round mr-2">Back</a> -->
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
       	     <form  name="f1" action="<?php  echo site_url('backend/Banner/addBanner'); ?>"    enctype="multipart/form-data"  method="post">
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
                                    <select name="subcategory_id" id="subcategory_id" class="form-control" required>
                                 
                                    
                                    </select>
                                 
                              </div>
                              <div class="col-sm-6  form-group">
                                <input type="hidden" name="txt_pic" id="txt_pic" >
                                      <label class="control-label">Upload Profile Photo( ) :</label>
                                      <input type="file" name="banner_url" id="banner_url"  onchange="readURL(this);" accept="image/*" class="form-control" capture="" required>
                                      
                                </div>
                                 <hr/>
                                <div class="col-sm-6 form-group">
                                    <img  id="thumb"  width="100px" height="100px" title="Image" src="<?php echo base_url().'assets/img/screen.png'?>" />                              
                                  </div>
                              
                            </div>
                            <div class="row form-group ">

                                <div class="col-sm-6 form-group">
                                  <label>Banner Tilte</label>
                                  <input type="text" name="banner_title" id="banner_title" class="form-control " placeholder="Enter Banner Title"  required>
                                </div>
                                
                              <div class="col-sm-12 form-group">
                                  <label>Banner Description</label>
                                  <textarea name="banner_description" id="banner_description" class="form-control " placeholder="Enter Description" required></textarea>
                                  
                                </div>
                                <div class="col-sm-6 form-group">
                                  <label>From Date</label>
                                  <input type="date" name="from_date" id="from_date" class="form-control " placeholder="From Date" min="<?php echo date('Y-m-d')?>" required>
                                </div>
                                 <div class="col-sm-6 form-group">
                                  <label>To Date</label>
                                  <input type="date" name="to_date" id="to_date" class="form-control " placeholder="To Date"  required>
                                </div>
                              
                            </div>
                            <div class="row" >
                              <div class="col-lg-6  col-md-6 col-xs-6">
                                <button id="btn_addbanner" name="btn_addbanner" type="submit" class="btn btn-primary" >Submit</button>
                                <a href="<?php echo site_url('backend/Banner/manageBanners');?>" class="btn btn-danger" >
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