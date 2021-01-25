<?php $this->load->view('partials/header.php'); ?>

   <!-- Page Header -->
   <header class="masthead" style="background-image: url('<?php echo base_url(); ?>assets/img/home-bg.jpg')">
      <div class="overlay"></div>
      <div class="container">
         <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
               <div class="site-heading">
                  <h1>Selamat Datang</h1>
                  <span class="subheading">di artikel harian Muhammad Faisal</span>
               </div>
            </div>
         </div>
      </div>
   </header>

   <!-- Main Content -->
   <div class="container">
      <div class="row">
         <div class="col-lg-8 col-md-10 mx-auto">
         <!-- flash message -->
         <?php echo $this->session->flashdata('message'); ?>
            <form>
               <input type="text" name="find">
               <button type="submit">Cari</button>
            </form>

            <!-- content -->
            <?php foreach($blogs as $key=>$blog) : ?>
               <div class="post-preview">
                  <a href="<?php echo site_url('blog/detail/'. $blog['url']); ?>">
                     <h2 class="post-title">
                        <?php echo $blog['title']; ?>
                     </h2>
                  </a>
                  <p class="post-mete">Posted on <?php echo $blog['date']; ?>

                     <?php if(isset($_SESSION['username'])) : ?>
                        <a class="btn btn-warning" href="<?php echo site_url('blog/edit/'. $blog['id']); ?>">Edit</a>
                        <a class="btn btn-danger" href="<?php echo site_url('blog/delete/'. $blog['id']); ?>" onclick="return confirm('apakah anda yakin ingin menghapus ?')">Delete</a>
                     <? endif; ?>
                  </p>
                  <p><?php echo $blog['content']; ?></p>
               </div>
               <hr>
            <?php endforeach; ?>
            <?php echo $this->pagination->create_links(); ?>

            
            <!-- Pager -->
            <div class="clearfix">
               <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
            </div>
         </div>
      </div>
   </div>

   <hr>

<?php $this->load->view('partials/footer.php'); ?>