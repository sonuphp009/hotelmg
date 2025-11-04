<section class="ftco-section">
		<div class="container">
			
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="img" style="background-image: url(<?php echo base_url();?>asset/clinic_logo/art.jpg);">
			      </div>
						<div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Login</h3>
			      		</div>
								<div class="w-100">
									<p class="social-media d-flex justify-content-end">
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
									</p>
								</div>
			      	</div>
							<form action="<?php echo site_url('backend/Login');?>" name="frm_login" id="frm_login" method="post" class="signin-form">
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
			      		<div class="form-group mb-3">
			      			<label class="label" for="name">Username</label>
			      			<input type="text" class="form-control" placeholder="Username"  name="username" id="username">
			      			<div id="err_username" class="error_msg"></div> 
			      		</div>
		            <div class="form-group mb-3">
		            	<label class="label" for="password">Password</label>
		              <input type="password" class="form-control" placeholder="Password" name="admin_password" id="admin_password" >
		              <div id="err_admin_password" class="error_msg"></div>
		            </div>
		            <!-- <div class="form-group">
		            	<button  onclick="javascript:return login_validation()" name="btn_login" id="btn_login" class="btn btn-primary" type="submit">Sign In</button>
		            </div> -->
		            <div class="form-group d-md-flex">
		            	<div class="w-50 text-left">
			            	<label class="checkbox-wrap checkbox-primary mb-0">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
										</label>
									</div>
									<div class="w-50 text-md-right">
										<a href="#">Forgot Password</a>
									</div>
		            </div>
		          </form>
		          <p class="text-center">Not a member? <a  href="<?php echo site_url('backend/Login/signin');?>" >Sign Up</a></p>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>
<!-- modal -->
<div class="modal" id="modal_signup" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Sign Up Here</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<div class="row" id="signupdiv" style="background-color: #fff; opacity: 0.9;">
    <div class="col-sm-12 text-center">
      <h1>Sign Up For Free</h1>
    </div>
    <div class="col-sm-12" >
        <form  name="f1" action="<?php  echo site_url('backend/Login/insert_user_signup'); ?>"    enctype="multipart/form-data"  method="post">
					                <div class="row">

					                  <div class="col-sm-12 text-center">
					                      <label id="lab_login" ></label>
					                  </div>
					                </div>
					                <div class="row form-group " style="padding: 10px;">
					                	<div class="col-sm-12 form-group text-left">
					                	<input type="hidden" name="reg_id" id="reg_id">
					                     <!--  <label>User Type</label>
					                      <select name="sel_user_type" id="sel_user_type" class="form-control" required>
					                        <option value="">-Select Type-</option>
					                        <option value="Receptionist">Receptionist</option>
					                        <option value="admin">Doctor</option>
					                        
					                      </select> -->
					                    </div>
					                    <div class="col-sm-12 form-group">
					                    	<input type="hidden" name="txt_pic" id="txt_pic" >
					                      <input type="hidden" name="txt_clinic_id" id="txt_clinic_id" value="5">
					                            <label class="control-label">Upload Profile Photo( ) :</label>
					                            <input type="file" name="fle_option1" id="fle_option1"  onchange="Test.UpdatePreview(this)" accept="image/*" capture="" >
					                        </div>
					                    <div class="col-sm-12 form-group">
					                      <label>Full Name</label>
					                      <input type="text" name="txt_patient_first_name" id="txt_patient_first_name" class="form-control " placeholder="Enter Firsr Name"  required>
					                    </div>
					                    <div class="col-sm-12 form-group text-left ">
					                      <label>Email</label>
					                      <input type="email" name="txt_email" id="txt_email" class="form-control " placeholder="Enter Email"  required>
					                    </div>
					                    
					                    <div class="col-sm-12 form-group text-left ">
					                      <label>Mobile No</label>
					                      <input type="text" name="txt_patient_mobile" id="txt_patient_mobile" class="form-control" placeholder="Enter Mobile Number" onblur="chkPatient()" required>
					                    </div>
					                    <div class="col-sm-12 form-group text-left "><grammarly-extension data-grammarly-shadow-root="true" style="position: absolute; top: 0px; left: 0px; pointer-events: none;" class="cGcvT"></grammarly-extension><grammarly-extension data-grammarly-shadow-root="true" style="mix-blend-mode: darken; position: absolute; top: 0px; left: 0px; pointer-events: none;" class="cGcvT"></grammarly-extension>
					                      <label>Address</label>
					                      <textarea name="txt_patient_address" id="txt_patient_address" class="form-control" placeholder="Enter Address" spellcheck="false" required></textarea>
					                    </div>
					                    
					                    <div class="col-sm-12 form-group text-left ">
					                      <label>Password</label>
					                      <input type="password" name="txt_password" id="txt_password" class="form-control" placeholder="" autocomplete="off" required>
					                    </div>
					                    
					                  </div>
					                  <div class="row" style="padding: 10px;">
					                    <div class="col-lg-6  col-md-6 col-xs-6">
					                      <button id="btn_signup" type="submit" class="btn btn-success " >Submit</button>
					                      <button type="reset" class="btn btn-danger " >Cancel</button>

					                    </div>
					                  </div>
					               
					          </form>

    </div>

</div>
      </div>
     
    </div>
  </div>
</div>
<!-- modal -->