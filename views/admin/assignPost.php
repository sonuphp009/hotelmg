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
       	    <!-- start: page -->
            <div class="row">
              <div class="col">
                <section class="card">
                  <header class="card-header">
                    <div class="card-actions">
                      
                    </div>
            
                  </header>
                
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
                  <?php if($this->session->flashdata('error_msg')!=""){?>
                  <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('error_msg');?>
                  </div>
                  <?php }?>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-lg-8">
                        <form name="frm_upt_admin" id="frm_upt_admin" method="post" action="<?php echo site_url('backend/Posts/assignToEmployee');?>" enctype="multipart/form-data">
                          <div class="row form-group">

                            <label class="col-sm-4 control-label text-lg-right ">User Details</label>
                            <div class="col-lg-6">
                              <input type="hidden" name="txt_post_id" id="txt_post_id" value="<?php echo $postInfo[0]['post_id']?>">
                              <input type="hidden" name="detail_id" id="detail_id" value="<?php echo $postInfo[0]['detail_id']?>">
                              <?php echo $postInfo[0]['post_title']."<br/>".$postInfo[0]['post_description']."<br/>";?>
                            </div>

                          </div>
                          
                          <div class="row form-group">
                            
                            <label class="col-sm-4 control-label text-lg-right ">Employee Name<span class="error_msg">*</span></label>
                            <div class="col-lg-6">
                              
                               <select name="sel_driver" id="sel_driver" class="form-control" required onchange="checkDriverTask()">
                                                      
                                      <option value="">Select Employee</option>
                                         <?php foreach ($userInfo as $row) 
                                            {
                                                echo "<option value='".$row['patient_id']."'>".$row['full_name'].' '."</option>";
                                            } 
                                                                    
                                             ?>
                                         </select>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-4 control-label text-lg-right "></label>
                            <div class="col-sm-8">
                              <button type="submit" class="btn btn-primary" name="btn_save_admin" id="btn_save_admin">Assign Task</button>
                              <a href="<?php echo site_url('Welcome/postSubmitList');?>" class="btn btn-danger">Cancel</a>
                            </div>
                          </div>
                        </form>
                      </div>

                    </div>
                  <div style="clear:both;margin-bottom: 15px;"></div>
                  
                          
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
