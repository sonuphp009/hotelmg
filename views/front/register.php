<section class="vh-100" style="padding:100px;background: rgb(2,0,36);
background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,107,121,1) 35%, rgba(0,212,255,1) 100%);" >
  <div class="container card">
    <div class="row d-flex justify-content-center align-items-center h-100" style="padding:20px;">
      <div class="col-md-9 col-lg-6 col-xl-5">
      	<img class="img-fluid" src="<?php echo base_url();?>assets/img/wanoway.jpeg" alt="logo" style="height: 300px;width: 300px;">
        
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
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
		<form name="frm_addslider" id="frm_addslider" class="needs-validation user-add" method="POST" onsubmit="return registerUser();" enctype="multipart/form-data">
          <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
            <p class="lead fw-normal mb-0 me-3">Sign up </p>
            <button type="button" class="btn btn-primary btn-floating mx-1" style="padding:10px;">
              <i class="fab fa-facebook-f"></i>
            </button>

            <button type="button" class="btn btn-primary btn-floating mx-1" style="padding:10px;">
              <i class="fab fa-twitter"></i>
            </button>

            <button type="button" class="btn btn-primary btn-floating mx-1" style="padding:10px;">
              <i class="fab fa-linkedin-in"></i>
            </button>
          </div>

         <br/>
         <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="text" id="full_name" name="full_name" class="form-control form-control-lg"
              placeholder="Enter full name" required />
            <label class="form-label" for="full_name">Full Name</label>
          </div>

          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="email" id="email" name="email" class="form-control form-control-lg"
              placeholder="Enter a valid email address" required/>
            <label class="form-label" for="email">Email address</label>
          </div>
        
          <div class="row">
	          <!-- Password input -->
	          <div class="form-outline mb-1">
	            <input type="password" id="password" name="password" class="form-control form-control-lg"
	              placeholder="Enter password" required/>
	            <label class="form-label" for="password">Password</label>
	          </div>

	           <!-- Password input -->
	          <div class="form-outline mb-1">
	            <input type="password" id="confirm_password" class="form-control form-control-lg"
	              placeholder="Enter confirm password" onblur="chk_pass()" />
	            <p  id="lbl_confirm_password" required></p>
	          </div>
	     </div>

          

          <div class="text-center text-lg-start mt-4 pt-2">
            <button name="btn_adduser" type="submit" class="btn btn-primary "
              style="padding-left: 2.5rem; padding-right: 2.5rem;padding: 10px;">Sign Up</button>
            <p class="small fw-bold mt-2 pt-1 mb-0">have an account? <a href="<?php echo base_url().'Welcome/login'?>"
                class="link-danger">Login</a></p>
          </div>

        </form>
      </div>
    </div>
  </div>
 
</section>
