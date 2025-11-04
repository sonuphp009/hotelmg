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
								<a href="<?php echo base_url('backend/');?>OrderController/manageOrder" class="btn  btn-round" style="background-color: white; color:black;">Back</a>

								
							</div>
						</div>
					</div>
				</div>
			<div class="page-inner mt--5">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       	<div class="row">
							<div class="col-sm-12">
								<section class="card">
									
								
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
							                	<div class="col-sm-12 form-control">
							                		<h1>Order No - <?php echo $orderInfo['order_no']?></h1>
							                		<input type="hidden" name="product_id" id="product_id" value="<?php echo $orderInfo['order_id'];?>">
							                	</div>	
							                	<div class="col-sm-8 form-control">
							                		<p>Customer name - <?php echo $orderInfo['name']?></p>
							                	</div>	

							                	<div class="col-sm-4 form-control">
							                		<label>Order Date</label> - <?php echo date('d M Y',strtotime($orderInfo['order_date']));?>
							                		
							                	</div>	
							                	<div class="col-sm-4 form-control">
							                		<label>Order Note</label> - <?php echo $orderInfo['order_note']?>
							                		
							                	</div>	
							                	<div class="col-sm-4 form-control">
							                		<label>Order Status</label> - <?php echo $orderInfo['order_status']?>
							                		
							                	</div>	
							                	<div class="col-sm-4 form-control">
							                		<label>Order Amount</label> - <?php echo $orderInfo['total_amount']?>
							                		
							                	</div>	
							                		<div class="col-sm-12 form-control">
							                		<p>Delivery Destination - <?php echo $orderInfo['street_address1'].', '.$orderInfo['street_address2'].', '.$orderInfo['city'].', '.$orderInfo['state'].', '.$orderInfo['country']?></p>
							                	</div>
							                </div>
							                <div class="row">
							                	<div class="col-sm-12 form-control">
							                		<label>Order Details</label>
							                		<?php 
							                			$orderData=$this->Order_model->getOrderDetails($orderInfo['order_id'],1);
							                			
							                		?>
							                		<?php //$cntusermaster=$this->Inm->get_user_all_admin_res();
                                                                if(count($orderData)>0)
                                                                {

                                                                    ?>
                                                                     <table class="table table-striped table-bordered" id="datatable tbl_report" width="100%">
                                                                        <thead>
                                                                            <tr>
                                                                                <th class="pro-thumbnail">Thumbnail</th>
																			                                            <th class="pro-title">Product</th>
																			                                            <th class="pro-price">Price</th>
																			                                            <th class="pro-quantity">Quantity</th>
																			                                            <th class="pro-subtotal">Total</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody id="searchTable2">
                                                                       <?php 

																					                                        $subtotal=0;
																					                                        $totalamt=0;
																					                                        if(isset($orderData))
																					                                    	{
																					                                            $i=0;
																					                                    		foreach ($orderData as  $value) 
																					                                    		{
																					                                                $i++;
																					                                                $subtotal+=$value['sub_total'];

																					                                                ?>
																					                                    			
																					                                        <tr>
																					                                            <td class="pro-thumbnail"><a href="#"><img class="img-fluid" src="<?php echo base_url().$value['product_image']?>" alt="Product" style="height: 50px;width: 50px;"/></a></td>
																					                                            <td class="pro-title"><?php echo $value['product_title']?></td>
																					                                            <td class="pro-price">
																					                                                <input type="hidden" name="product_price<?php echo $i;?>" id="product_price<?php echo $i;?>" value="<?php echo $value['product_price']?>">
																					                                                <span><?php echo $value['product_price']?></span>
																					                                            </td>
																					                                            <td class="pro-quantity">
																					                                               <?php echo $value['product_quantity']?>
																					                                            </td>
																					                                            <td class="pro-subtotal"><span><?php echo round($value['sub_total'],2);?></span></td>
																					                                            
																					                                        </tr>
																						                                   <?php }
																					                                        $charges=0;
																					                                       $totalamt=$subtotal+$charges;
																						                                }?>
																						                                 <tr>
																						                                 		<td colspan="4" style="text-align:right;">Total</td>
																						                                 		<td colspan=""><?php echo round($subtotal,2);?></td>
																						                                 </tr>
																						                                <!--  <tr>
																						                                 		<td colspan="4" style="text-align:right;">GST Amount(18%)</td>
																						                                 		<td colspan=""><?php $gstamt=$subtotal*18/100; echo round($gstamt,2);?></td>
																						                                 </tr> -->
                                                                        </tbody>
                                                                    </table>
                                                                    
                                                                <?php } else {?>
                                                                    <div     class="alert alert-danger">
                                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                                        No records found.
                                                                    </div>
                                                                <?php }?>
							                	</div>
							                	
							                </div><hr/>
							              
							                 
			                             
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

 