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
    <section class="content">
        <div class="row">
              <div class="col-sm-12">
                <section class="card">
                  <header class="card-header">
                    <div class="card-actions">
                      <a href="<?php echo base_url('backend/');?>UserController/addUser" style="decoration:none;"><button class="btn btn-primary float-right" name="" id="">Add User</button></a>
                    </div>
            
                    
                  </header>
                  
                
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
                                <div class="col-sm-12" style="overflow-x: scroll;">
                                  <?php //$cntusermaster=$this->Inm->get_user_all_admin_res();
                                  if(count($cntusermaster)>0)
                                  {
                                    ?>
                                    <table class="table table-striped table-bordered" id="datatable" width="100%">
                                      <thead>
                                        <tr>
                                          <th style="color:#000000;">Sr. No.</th>
                                                                          <th style="color:#000000;">Image</th>
                                                                           <th style="color:#000000;">Name</th>
                                                                           <!-- <th style="color:#000000;">Address</th> -->
                                                                           <th style="color:#000000;">Email</th>
                                                                           <!-- <th style="color:#000000;">User Type</th> -->
                                                                           <th style="color:#000000;">Mobile Number</th>  
                                                                           <th style="color:#000000;">Password</th>
                                                                           <th style="color:#000000;">Status</th>
                                                                          <th style="text-align:center; color:#000;">Action</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                      <?php $count = 1; foreach($cntusermaster as $row): ?>
                                                                      <tr class="odd gradeX">
                                                                                         <td><?php echo '&nbsp; &nbsp;'.$count++; ?> </td>
                                                                                         <td><a href="<?php print base_url().$row['profile_pic']; ?>"><img src="<?php print base_url().$row['profile_pic']; ?>" class="img-circle" style="height: 100px;width: 100px;"></a></td>
                                                                                         <td><?php print $row['full_name']; ?></td>
                                                                                         <!-- <td><?php //print $row['p_address']; ?></td> -->
                                                                                        <td><?php print $row['username']; ?></td>
                                                                                        <!-- <td><?php //print $row['user_type']; ?></td> -->
                                                                                        <td><?php print $row['p_mobile']; ?></td>
                                                                                        <td><?php print $row['password']; ?></td>
                                                                                        <td><?php print $row['status']; ?></td>
                                                                                         
                                                                                        <td style="text-align:center;">
                                                                                        <a href="<?php echo base_url();?>backend/UserController/updateUser/<?php echo base64_encode($row['patient_id']);?>" >
                                                                                        <button type="button" class="btn btn-primary btn-xs"  style="width:45px" title='Click Here To Update Record'><i class="fa fa-edit" id="elementID"></i></button></a> | 
                                                                                        
                                                                                        <a href="<?php echo base_url();?>backend/UserController/deleteUser/<?php echo base64_encode($row['patient_id']);?>" > 
                                                                                        <button type="button" class="btn btn-primary btn-xs"  style="width:45px" title='Click Here To Update Record'><i class="fa fa-trash"   id="elementID"></i></button></a>
                                                                                        </td>
                                                                            </tr>
                                                                           <?php endforeach; ?>
                                      </tbody>
                                    </table>
                                    <div class="dataTables_paginate paging_simple_numbers" id="datatable-default_paginate">
                                    <?php echo $links; ?>         
                                  </div>
                                  <?php } else {?>
                                    <div   class="alert alert-danger">
                                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                      No records found.
                                    </div>
                                  <?php }?>
                                </div>
                              </div>
                  </div>
                </section>
              </div>
            </div>
    </section>
    <!-- /.content -->
          </div>
      </div>
</div>