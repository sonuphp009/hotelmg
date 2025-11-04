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
       	     <form  name="f1" action="<?php  echo site_url('backend/UserController/addUser'); ?>"    enctype="multipart/form-data"  method="post">
                          <div class="row">

                            <div class="col-sm-12 text-center">
                                <label id="lab_login" ></label>
                            </div>
                          </div>
                          <div class="row form-group " style="padding: 10px;">
                            
                              <div class="col-sm-6">
                                <input type="hidden" name="txt_pic" id="txt_pic" >
                                <input type="hidden" name="txt_clinic_id" id="txt_clinic_id" value="5">
                                      <label class="control-label">Upload Profile Photo( ) :</label>
                                      <input type="file" name="fle_option1" id="fle_option1"  onchange="Test.UpdatePreview(this)" accept="image/*" capture="" >
                                  </div>
                              <div class="col-sm-6 form-group">
                                <label>Full Name</label>
                                <input type="text" name="txt_patient_first_name" id="txt_patient_first_name" class="form-control " placeholder="Enter Firsr Name"  >
                              </div>
                              <div class="col-sm-6 form-group text-left ">
                                <label>Email</label>
                                <input type="email" name="txt_email" id="txt_email" class="form-control " placeholder="Enter Email"  required>
                              </div>
                              
                              <div class="col-sm-6 form-group text-left ">
                                <label>Mobile No</label>
                                <input type="text" name="txt_patient_mobile" id="txt_patient_mobile" class="form-control" placeholder="Enter Mobile Number" onblur="chkPatient()" >
                              </div>
                              <div class="col-sm-6 form-group text-left ">
                                <label>Address</label>
                                <textarea name="txt_patient_address" id="txt_patient_address" class="form-control" placeholder="Enter Address" spellcheck="false" ></textarea>
                              </div>
                              
                              
                              
                            </div>
                            <div class="row" style="padding: 10px;">
                              <div class="col-lg-6  col-md-6 col-xs-6">
                                <button id="btn_adduser" name="btn_adduser" type="submit" class="btn btn-primary" >Submit</button>
                                <button type="reset" class="btn btn-danger" >Cancel</button>

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