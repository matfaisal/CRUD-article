<?php $this->load->view('partials/header.php'); ?>

   <!-- Page Header -->
   <header class="masthead" style="background-image: url('<?php echo base_url(); ?>assets/img/about-bg.jpg')">
      <div class="overlay"></div>
      <div class="container">
         <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
               <div class="post-heading">
                  <h1>Tambah Artikel</h1>
               </div>
            </div>
         </div>
      </div>
   </header>

   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-8">

            <!-- <form method="POST">   -->
            <?php echo form_open_multipart(); ?>
               <div class="form-group">
                  <label>Title</label>
                  <?php echo form_input('title', null, 'class="form-control"'); ?>
               </div>
               <div class="form-group">
                  <label>Url</label>
                  <?php echo form_input('url', null, 'class="form-control"'); ?>
               </div>
               <div class="form-group">
                  <label>Content</label>
                  <?php echo form_textarea('content', null, 'class="form-control"'); ?>
               </div>
               <div class="form-group">
                  <label>Cover</label>
                  <?php echo form_upload('cover', null, 'class="form-control"'); ?>
               </div>
               <button class="btn btn-primary" type="submit">Simpan Artikel</button>
            </form>

         </div>
      </div>
   </div>


<?php $this->load->view('partials/footer.php'); ?>