 <main>
        <!-- breadcrumb area start -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">my-account</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- my account wrapper start -->
        <div class="my-account-wrapper section-padding">
            <div class="container">
                <div class="section-bg-color">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- My Account Page Start -->
                            <div class="myaccount-page-wrapper">
                                <!-- My Account Tab Menu Start -->
                                <div class="row">
                                    <div class="col-lg-3 col-md-4">
                                        <div class="myaccount-tab-menu nav" role="tablist">
                                            <a href="#" class="<?php if($page_title=="dashboard"){ echo 'active';}?>" data-bs-toggle="tab"><i class="fa fa-dashboard"></i>
                                                Dashboard</a>
                                            <a href="<?php echo site_url('Welcome/manageOrder/'.$user_id)?>" class="<?php if($page_title=="Manage Order"){ echo 'active';}?>" ><i class="fa fa-cart-arrow-down"></i>
                                                Orders</a>
                                            <a href="#" class="<?php if($page_title=="downloads"){ echo 'active';}?>" data-bs-toggle="tab"><i class="fa fa-cloud-download"></i>
                                                Download</a>
                                            <a href="#" class="<?php if($page_title=="payment_method"){ echo 'active';}?>" data-bs-toggle="tab"><i class="fa fa-credit-card"></i>
                                                Payment
                                                Method</a>
                                            <a href="#" class="<?php if($page_title=="addresses"){ echo 'active';}?>" data-bs-toggle="tab"><i class="fa fa-map-marker"></i>
                                                address</a>
                                            <a href="<?php echo base_url().'Welcome/profile/'.base64_encode($user_id)?>" class="<?php if($page_title=="profile"){ echo 'active';}?>"><i class="fa fa-user"></i> Account
                                                Details</a>
                                            <a href="<?php echo site_url('Welcome/logout_user');?>"><i class="fa fa-sign-out"></i> Logout</a>
                                        </div>
                                    </div>
                                    <!-- My Account Tab Menu End -->

                                    <!-- My Account Tab Content Start -->
                                    <div class="col-lg-9 col-md-8">
                                        <div class="tab-content" id="myaccountContent">
                                           

                                            <?php //echo $userData;exit;?>
                                            <!-- Single Tab Content Start -->
                                            <div class="tab-pane fade show active" id="account-info" role="tabpanel">
                                                <div class="myaccount-content">
                                                    <h5>Your Orders</h5>
                                                    <div class="account-details-form">
                                                        <div class="row">
                    <div class="col-sm-12">
                                <section class="card">
                                    
                                <header class="card-header">
                                        <div class="row">
                                            <div class="col-sm-9">
                                            </div>
                                            <!-- <div class="col-sm-3">
                                                <input type="text" name="txt_search" class="form-control" placeholder="Search..." id="search2">
                                            </div> -->
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
                                           <!--  <form class="needs-validation" name="frm_manage_cuisines" id="frm_manage_cuisines" method="post" action="<?php echo base_url();?>Welcome/mcuisinesearch/<?php if($this->uri->segment(4)!=""){ echo $this->uri->segment(4);}?>">
                                                <div class="row">
                                                    <div class="col-md-3 xl-30">
                                                        <input type="date" name="order_date" id="order_date"  class="form-control" value="<?php  if($this->uri->segment(4)!='Na'){ echo $this->uri->segment(4);}?>">
                                                    </div>
                                                    
                                                   <div class="col-md-3 xl-30" >
                                                        <select name="cuisine_status" id="cuisine_status" class="custom-select">
                                                                <option value="">--Status--</option>
                                                                
                                                            </select>
                                                    </div>
                            
                                                    <div class="col-md-3 xl-30" >
                                                            <button class="btn btn-primary" name="btn_search" id="btn_search">Search</button>
                                                            <button class="btn btn-primary" name="btn_clear" id="btn_clear">Clear</button>
                                                                                                    
                                                    </div>
                                                                        
                                                                        
                                                </div>
                                                                        
                                            </form><hr/> -->
                                          <div class="row">
                                            <div class="col-sm-12" style="overflow-x: scroll;">
                                                                <?php //$cntusermaster=$this->Inm->get_user_all_admin_res();
                                                                if(count($orderData)>0)
                                                                {
                                                                    ?>
                                                                     <table class="table table-striped table-bordered" id="datatable tbl_report" width="100%">
                                                                        <thead>
                                                                            <tr>
                                                                                <th style="color:#000000;">Sr. No.</th>
                                                                                      <th style="color:#000000;">Order ID</th>
                                                                                      <th style="color:#000000;">Customer Name</th>
                                                                                       <th style="color:#000000;">Order Date</th>
                                                                                      <th style="color:#000000;">Order Amount</th>
                                                                                       <th style="color:#000000;">Order Note</th>
                                                                                       <th style="color:#000000;">Status</th>
                                                                                      <th style="text-align:center; color:#000;">Action</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody id="searchTable2">
                                                                        <?php $count = 1; foreach($orderData as $row): ?>
                                                                                  <tr class="odd gradeX">
                                                                                             <td><?php echo '&nbsp; &nbsp;'.$count++; ?> </td>
                                                                                             <td><?php print $row['order_no'] ?></td>
                                                                                             <td><?php print $row['name'] ?></td>
                                                                                             <td><?php echo date('d M Y',strtotime($row['order_date']));?></td>
                                                                                             <td><?php print $row['total_amount'] ?></td>
                                                                                            <td><?php print $row['order_note']; ?></td>
                                                                                            <td><?php print $row['order_status']; ?></td>
                                                                                             
                                                                                            <td style="text-align:center;">
                                                                                                <?php //echo base_url().'backend/Category/updateCategory/'. base64_encode($row['order_id']).';?>
                                                                                                  <a href="<?php echo base_url();?>Welcome/viewOrderDetails/<?php echo base64_encode($row['order_id']);?>" >
                                                                                            <button type="button" class=""  style="width:45px" title='Click Here To Update Record'><i class="fa fa-eye" id="elementID"></i></button></a>
                                                                                          <!--   <a href="<?php echo base_url();?>backend/Category/updateCategory/<?php echo base64_encode($row['order_id']);?>" >
                                                                                            <button type="button" class="btn btn-primary btn-xs"  style="width:45px" title='Click Here To Update Record'><i class="fa fa-edit" id="elementID"></i></button></a> | 
                                                                                            
                                                                                            <a href="<?php echo base_url();?>backend/Category/deleteCategory/<?php echo base64_encode($row['order_id']);?>" > 
                                                                                            <button type="button" class="btn btn-primary btn-xs"  style="width:45px" title='Click Here To Update Record'><i class="fa fa-trash"   id="elementID"></i></button></a> -->
                                                                                            </td>
                                                                                </tr>
                                                                                       <?php endforeach; ?>
                                                                        </tbody>
                                                                    </table>
                                                                    <div class="dataTables_paginate paging_simple_numbers" id="datatable-default_paginate">
                                                                    <?php echo $links; ?>                   
                                                                </div>
                                                                <?php } else {?>
                                                                    <div     class="alert alert-danger">
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
                                                    </div>
                                                </div>
                                            </div> <!-- Single Tab Content End -->
                                        </div>
                                    </div> <!-- My Account Tab Content End -->
                                </div>
                            </div> <!-- My Account Page End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- my account wrapper end -->
    </main>
