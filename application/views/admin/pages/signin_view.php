<div class="page login-page">
  <div class="container">
    <div class="form-outer text-center d-flex align-items-center">
      <div class="form-inner">
        <div class="logo text-uppercase">
          <strong class="text-primary"><a href="<?php echo base_url(); ?>">EKADEMYA</a> </strong><span>ADMIN</span>
        </div>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
        <?php echo form_open(base_url('admin/signin')); ?>
          <div class="form-group">
            <!-- <label for="login-username" class="label-custom">Email</label> -->
            <input id="login-username" type="email" name="adminEmail" placeholder="email" value="<?php echo set_value('adminEmail'); ?>">
            <?php echo form_error('adminEmail'); ?>
          </div>
          <div class="form-group">
            <!-- <label for="login-password" class="label-custom">Password</label> -->
            <input id="login-password" type="password" name="adminPassword" placeholder="password" value="<?php echo set_value('adminPassword'); ?>">
            <?php echo form_error('adminPassword'); ?>
          </div>
          <button class="btn btn-primary" type="submit">Signin</button></a>
            <?php echo form_close(); ?>
            <small class="text-danger">
              <?php echo $this->session->flashdata('error'); ?>
            </small>
        <!-- <a href="#" class="forgot-pass">Forgot Password?</a>
        <small>Do not have an account? </small>
        <a href="register.html" class="signup">Signup</a> -->
      </div>
      <div class="copyrights text-center">
        <p>Design by <a href="https://bootstrapious.com" class="external">Bootstrapious</a></p>
        <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
      </div>
    </div>
  </div>
</div>