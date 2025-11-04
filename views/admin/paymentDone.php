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
       	<div class="row">
							<div class="col-sm-12">
								<section class="card">
									<header class="card-header">
										<div class="card-actions">
											<!-- <button class="btn btn-primary float-right" name="" id="" onClick="fnExcelReportPaymentDone('tbl_pay_done')">Export &nbsp;<i class="fa fa-download"></i></button> -->
										</div>
						
										
									</header>
									
								
									<div class="card-body">
										 <?php if($this->session->flashdata('success')!=""){?>
							                <div class="alert alert-success alert-dismissible fade show " role="alert">
                                         <span><i class="far fa-life-ring"></i></span>
                                         <span> <?php echo $this->session->flashdata('success');?></span>
                                         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                      </div>
							                <?php }?>
							                
							                <?php if($this->session->flashdata('error')!=""){?>
							                <div class="alert alert-danger alert-dismissible fade show " role="alert">
                                         <span><i class="far fa-life-ring"></i></span>
                                         <span> <?php echo $this->session->flashdata('error');?></span>
                                         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                      </div>
							                <?php }?>
                      <div class="row">
                        <div class="col-sm-12" style="overflow-x: scroll;">
              									<?php //$cntusermaster=$this->Inm->get_user_all_admin_res();
              									if(count($postmaster)>0)
              									{
              										?>
              										<table class="table table-striped table-bordered" id="datatable" width="100%">
              											<thead>
              												<tr>
              													   <th style="color:#000000;">Sr. No.</th>
                                          <th style="color:#000000;">Transaction Image</th>
                                           <th style="color:#000000;">Customer Name</th>
                                          <!--  <th style="color:#000000;">Address</th> -->
                                           <th style="color:#000000;">Post Price</th>
                                           <th style="color:#000000;">Date Updated</th>
                                           <!-- <th style="color:#000000;">Post Description</th>	 -->
                                           <th style="color:#000000;">Status</th>
                                           
                                          
              												</tr>
              											</thead>
              											<tbody>
              											<?php $count = 1; foreach($postmaster as $row): ?>
                                        <tr >
                                                           <td><?php echo '&nbsp; &nbsp;'.$count++; ?> </td>
                                                           <td><a href="<?php print base_url()."asset/transaction_img/".$row['transaction_img']; ?>" target="_blank"><img src="<?php print base_url()."asset/transaction_img/".$row['transaction_img']; ?>" class="img-circle" style="height: 100px;width: 100%;"></a></td>
                                                           <td><?php print $row['name']; ?></td>
                                                           <!-- <td><?php //print $row['address']; ?></td> -->
                                                          <td><?php print $row['post_price']; ?></td>
                                                          <td><?php print date('d M Y',strtotime($row['date_updated']));?></td>
                                                         <!--  <td><?php //print $row['post_description']; ?></td> -->
                                                          <td><?php print $row['status']; ?></td>
                                                           
                                                        
                                              </tr>
                                           <?php endforeach; ?>
              											</tbody>
              										</table>
              										<div class="dataTables_paginate paging_simple_numbers" id="datatable-default_paginate">
              										<?php echo $links; ?>					
              									</div>
              									<?php } else {?>
              										<div	 class="alert alert-danger">
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
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
    <!-- /.content -->
          </div>
      </div>
</div>
