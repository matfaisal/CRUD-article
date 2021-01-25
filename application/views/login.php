<?php $this->load->view('partials/header'); ?>

<!-- Page Header -->
<header class="masthead" style="background-image: url('<?php echo base_url(); ?>assets/img/home-bg.jpg')">
   <div class="overlay"></div>
   <div class="container">
      <div class="row">
         <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
               <h1>Login</h1>
               <span 
            </div>
         </div>
      </div>
   </div>
</header>

<div class="container">
   <div class="row">
      <div class="col-lg-6 col-md-8 mx-auto">
         <?php echo $this->session->flashdata('message'); ?>
         <?php echo form_open(); ?>
            <div class="form-group">
               <label for="username">Username</label>
               <input type="text" name="username" class="form-control">
            </div>

            <div class="form-group">
               <label for="password">Password</label>
               <input type="password" name="password" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
         </form>
      </div>
   </div>
</div>

<?php $this->load->view('partials/footer'); ?>