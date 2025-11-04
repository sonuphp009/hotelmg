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
                      <div class="col-lg-7">
                       
                          <table class="table">
                              <thead>
                                 <tr>
                                    <th scope="col">Sr.no</th>
                                    <th scope="col">Document Name</th>
                                    <th scope="col">Document</th>
                                    <th scope="col">Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                                <?php
                                if(count($docdetailsInfo)){
                                  $cnt=0;
                                  foreach($docdetailsInfo as $row){
                                      $cnt++;
                                    ?>
                                 <tr>
                                    <th scope="row"><?php echo $cnt;?></th>
                                    <td><?php echo $row['document_name'];?></td>
                                    <td><a href="<?php echo base_url().$row['document_image']?>"><img src="<?php echo base_url().$row['document_image']?>" style="width:100px;height: 100px;"></a></td>
                                    <td><a href="<?php echo base_url().$row['document_image']?>" download>Download</a></td>
                                    
                                 </tr>
                                 <?php }
                               }
                                 ?>
                              </tbody>
                           </table>
                         
                        
                      </div>
                      <div class="col-lg-5"><br/>
                           <form name="frm_upt_admin" id="frm_upt_admin" method="post" action="<?php echo site_url('backend/Posts/completeTask/'.$user_id.'/'.$post_id.'/'.$detail_id);?>" enctype="multipart/form-data">
                             <div class="form-group row">
                             
                              <div class="col-sm-12 text-center">
                                  <h4>Upload document for complete task</h4>
                                </div>
                            </div>
                            <div class="form-group row">
                             
                              <div class="col-sm-12">
                                   <input type="hidden" name="txt_pic2" id="txt_pic2" >
                                      <label class="control-label"> </label>
                                      <input type="file" name="post_image" id="post_image"  onchange="readURL(this);" accept="image/*" class="form-control" capture="" required>
                                      
                                </div><hr/>
                            </div>

                             <div class="form-group row">
                              <label class="col-sm-4 control-label text-lg-right "></label>
                              <div class="col-sm-8">
                                <button type="submit" class="btn btn-primary" name="btn_complete_task" id="btn_complete_task">Complete Task</button>
                                <a href="<?php echo site_url('backend/Posts/managePostsInterest/');?>" class="btn btn-danger">Cancel</a>
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
