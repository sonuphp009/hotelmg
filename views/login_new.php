<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
            <link rel="icon" href="<?php echo base_url();?>assets/img/wanoway.jpeg" type="image/x-icon"/>

    <title></title>
        <!-- CSS Files -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/atlantis.min.css">

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/demo.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/fonts.min.css">
</head>
<body style="background-image:url('<?php echo base_url();?>assets/site_banners/loginbg4.jpg');background-repeat: no-repeat;background-size: cover;" >
   
    <section class="sign-in-page" >
        
        <div class="container p-0" style="margin-top: 200px;">
            <div class="row bg-white" style="border-radius: 25px;opacity: 0.9;">
                
                <div class="col-md-6 text-center" ><br/><br/>
                    
                                    <img src="<?php echo base_url();?>assets/img/wanoway.jpeg" class="img-fluid mb-4" alt="logo" style="height: 300px;width: 300px;">
                                   
                              
                </div>
                <div class="col-md-6" >
                    <div class="sign-in-from" style="padding:20px;">
                        <h1 class="mb-0">Sign in</h1>
                        <p>Enter your email address and password to access admin panel.</p>
                        <form class="mt-4" action="<?php echo site_url('backend/Login');?>" name="frm_login" id="frm_login" method="post">
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
                            <div class="form-group">
                                <label class="form-label" for="exampleInputEmail1">Username</label>
                                <input type="text" class="form-control mb-0" placeholder="Username"  name="username" id="username">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="exampleInputPassword1">Password</label>
                                
                                <input type="password" class="form-control mb-0" placeholder="Password" name="admin_password" id="admin_password">
                            </div>
                            <div class="d-inline-block w-100">
                                <div class="form-check d-inline-block mt-2 pt-1">
                                    <input type="checkbox" class="form-check-input" id="customCheck11">
                                    <!-- <label class="form-check-label" for="customCheck11">Remember Me</label> -->
                                </div>
                                <button type="submit" class="btn btn-primary float-end" onclick="javascript:return login_validation()" name="btn_login" id="btn_login">Sign in</button>

                                 <!-- <span class="dark-color d-inline-block line-height-2">Don't have an account? <a href="<?php echo site_url('backend/Login/signin');?>">Sign up</a></span> -->

                            </div>
                            <div class="sign-info text-right" style="margin-top:-20px;">
                                <a href="#" class="float-end text-right" >Forgot password?</a>
                            </div>
                            <br/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>   
</body>
</html>
