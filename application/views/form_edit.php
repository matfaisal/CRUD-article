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
            <form method="POST">
               <div class="form-group">
                  <label>Title</label>
                  <input class="form-control" type="text" name="title" value="<?php echo $blog['title']; ?>">
               </div>
               <div class="form-group">
                  <label>Url</label>
                  <input class="form-control" type="text" name="url" value="<?php echo $blog['url']; ?>">
               </div>
               <div class="form-group">
                  <label>Content</label>
                  <textarea  class="form-control"name="content" cols="30" rows="10">
                     <?php echo $blog['content']; ?>
                  </textarea>
               </div>
               <button class="btn btn-primary" type="submit">Simpan Artikel</button>
            </form>
         </div>
      </div>
   </div>

<?php $this->load->view('partials/footer.php'); ?>