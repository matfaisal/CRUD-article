<?php 
   class Blog extends CI_Controller {

      public function __construct(){
         parent::__construct();
         $this->load->database();
         $this->load->helper('url');
         $this->load->model('Blog_model');
      }

      public function index(){

         $query = $this->Blog_model->getBlogs();
         $data['blogs'] = $query->result_array();
         $this->load->view('blogs', $data);
      }

      public function detail($url) {

         $query = $this->Blog_model->getSingelBlog('url', $url);
         $data['blog'] = $query->row_array();

         $this->load->view('detail', $data);
      }

      // method untuk menambahkan data
      public function add() {

         if ($this->input->post()) {
            $this->input->post();
            $data['title'] = $this->input->post('title'); // $data['title'] = $_POST['title'];
            $data['content'] = $this->input->post('content'); // $data['content'] = $_POST['content'];
            $data['url'] = $this->input->post('url');
   
            $id = $this->Blog_model->insertBlog($data);
            if ($id)
               echo "Artikel berhasil disimpan";
            else
               echo "Artikel gagal disimpan";
         }
         
         $this->load->view('form_add');
      }

      // method untuk mengedit data
      public function edit($id) {

         $query = $this->Blog_model->getSingelBlog('id', $id);
         $data['blog'] = $query->row_array();

         if ($this->input->post()) {
            $post['title'] = $this->input->post('title');
            $post['url'] = $this->input->post('url');
            $post['content'] = $this->input->post('content');

            $id = $this->Blog_model->updateBlog($id, $post);
            if ($id)
               echo "Artikel berhasil diedit";
            else
               echo "Artikel gagal diedit";
         }

         $this->load->view('form_edit', $data);
      }

      public function delete($id){
         $this->Blog_model->deleteBlog($id);
         redirect('/');
      }
   }
?>