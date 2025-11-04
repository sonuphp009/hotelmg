<div id="content-page" class="content-page row">
        <div class="col-sm-2">

        </div>
         <div class="col-sm-10">
              <div class="row">
                  <div class="col-lg-12">
                      <!-- Content Header (Page header) -->
                      <div class="content-header">
                        <div class="container-fluid">
                          <div class="row mb-2">
                            <div class="col-sm-6">
                              <h3 class="m-0 text-dark"><?php echo $page_title;?></h3>
                            </div><!-- /.col -->
                            <!-- <div class="col-sm-6">
                              <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard v2</li>
                              </ol>
                            </div> --><!-- /.col -->
                          </div><!-- /.row -->
                        </div><!-- /.container-fluid -->
                      </div>
                  </div>
              </div>
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
       	     <form  name="f1" action="<?php  echo site_url('backend/Documents/updateDocument/'.base64_encode($catInfo[0]['document_id'])); ?>"    enctype="multipart/form-data"  method="post">
                          <div class="row">

                            <div class="col-sm-12 text-center">
                                <label id="lab_login" ></label>
                            </div>
                          </div>
                          <div class="row form-group " style="padding: 10px;">
                            
                              
                               <div class="col-sm-12 form-group">
                                <label>Document Name</label>
                                <input type="text" name="document_name" id="document_name" class="form-control " placeholder="Enter Document Name"  value="<?php echo $catInfo[0]['document_name'];?>">
                              </div>
                              
                               <div class="col-sm-12 form-group text-left ">
                                <label>Status</label>
                                <select name="document_status" id="document_status" class="form-control" required>
                                <option value="">Select Status</option>
                                <option value="Active" <?php if($catInfo[0]['status']=='active'){echo 'selected="selected"';}?>>Active</option>
                                <option value="Inactive" <?php if($catInfo[0]['status']=='inactive'){echo 'selected="selected"';}?>>Inactive</option>
                                </select>
                              </div>
                              
                              
                            </div>
                            <div class="row" style="padding: 10px;">
                              <div class="col-lg-6  col-md-6 col-xs-6">
                                <button id="btn_updateDocument" name="btn_updateDocument" type="submit" class="btn btn-primary" >Submit</button>
                                <a href="<?php echo site_url('backend/Documents/manageDocument');?>" class="btn btn-danger" >
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
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#thumb').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>