<?php $this->load->view('partials/header.php'); ?>

<!-- Page Header -->
<header class="masthead" style="background-image: url('<?php echo base_url(); ?>assets/img/home-bg.jpg')">
      <div class="overlay"></div>
      <div class="container">
         <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
               <div class="site-heading">
                  <h1>Edit Artikel</h1>
               </div>
            </div>
         </div>
      </div>
   </header>

   <div class="container">
      <div class="row">
         <div class="col-md-8">
            <!-- <form method="POST"> -->
            <?php echo form_open_multipart(); ?>
               <div class="form-group">
                  <label>Title</label>
                  <?php echo form_input('title', $blog['title'], 'class="form-control"' ) ?>
               </div>
               <div class="form-group">
                  <label>Url</label>
                  <?php echo form_input('url', $blog['url'], 'class="form-control"') ?>
               </div>
               <div class="form-group">
                  <label>Content</label>
                  <?php echo form_textarea('content', $blog['content'], 'class="form-control"') ?>
               </div>
               <div class="form-group">
                  <label>Cover</label>
                  <?php echo form_upload('cover', $blog['cover'], 'class="form-control"') ?>
               </div>
               <button class="btn btn-primary" type="submit">Simpan Artikel</button>
            </form>
         </div>
      </div>
   </div>

<?php $this->load->view('partials/footer.php'); ?>