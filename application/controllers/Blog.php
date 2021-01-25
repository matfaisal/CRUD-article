<?php 
   class Blog extends CI_Controller {

      public function __construct(){
         parent::__construct();
         $this->load->database();
         $this->load->helper('url');
         $this->load->model('Blog_model');
         $this->load->library('session');
      }

      public function index($offset = 0){

         // pagination start
         $this->load->library('pagination'); //pertam jangan lupa load library pagination

         $config['base_url'] = site_url('blog/index'); //halaman yang ingin ditambahkan pagination
         $config['total_rows'] = $this->Blog_model->getTotalBlogs();  // untuk menghitung berapa banyak halaman yang akan dibagi
         $config['per_page'] = 3; //
         $this->pagination->initialize($config);

         $query = $this->Blog_model->getBlogs($config['per_page'], $offset);
         $data['blogs'] = $query->result_array();

         // end paginaton


         $this->load->view('blogs', $data);
      }

      public function detail($url) {

         $query = $this->Blog_model->getSingelBlog('url', $url);
         $data['blog'] = $query->row_array();

         $this->load->view('detail', $data);
      }

      // method untuk menambahkan data
      public function add() {

         $this->form_validation->set_rules('title', 'Judul', 'required');
         $this->form_validation->set_rules('url',  'URL', 'required|alpha_dash');
         $this->form_validation->set_rules('content', 'Kontent', 'required');

         if ($this->form_validation->run() === TRUE) {

            $data['title'] = $this->input->post('title'); // $data['title'] = $_POST['title'];
            $data['content'] = $this->input->post('content'); // $data['content'] = $_POST['content'];
            $data['url'] = $this->input->post('url');

            $config['upload_path']          = './uploads/'; // folder digunakan untuk menyimpan folder upload
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 1000;
            $config['max_width']            = 2000;
            $config['max_height']           = 1000;

            $this->load->library('upload',$config );

            // untuk mengecek apakah cover telah tersimpan
            if (! $this->upload->do_upload('cover')) {
               echo $this->upoload->display_errors();

            } else {
               $data['cover'] = $this->upload->data()['file_name'];
            }


            $id = $this->Blog_model->insertBlog($data);
            if ($id){
               $this->session->set_flashdata('message', 
               '<div class="alert alert-success"> Data barhasil disimpan</div>'
               );
               redirect('/');
            } 
            else
            $this->session->set_flashdata('message', 
            '<div class="alert alert-warning"> Data gagal disimpan</div>'
            );
               redirect('/');
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

            $config['upload_path']          = './uploads/'; // folder digunakan untuk menyimpan folder upload
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 1000;
            $config['max_width']            = 2000;
            $config['max_height']           = 1000;

            $this->load->library('upload',$config );

            // untuk mengecek apakah cover telah tersimpan
            $this->upload->do_upload('cover');
            if (!empty($this->upload->data('file_name')) ) {
               $post['cover'] = $this->upload->data('file_name');
            } 

            $id = $this->Blog_model->updateBlog($id, $post);
            if ($id){
               $this->session->set_flashdata('message', '<div class="alert alert-success">Data berhasil di simpan</div>');
               redirect('/');
            }
            else
               $this->session->set_flashdata('message', '<div class="alert alert-success">Data gagal disimpan</div>');
         }

         $this->load->view('form_edit', $data);
      }

      public function delete($id){

         $result = $this->Blog_model->deleteBlog($id);

         if ($result) {
            $this->session->set_flashdata('message', '<div class="alert alert-success">Data berhasil dihapus</div>');
         } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warning">Data gagal dihapus</div>');
         }
         redirect('/');
      }


      // login dan logout
      public function login(){


         if ($this->input->post()) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
   
            if ($username == 'admin' && $password == 'admin') {
   
               $_SESSION['username'] = 'admin';
               redirect('/');
            }
   
            else 
            {
   
               $this->session->set_flashdata('message', '<div class="alert alert-warning">Username/ Password tidak valid</div>');
               redirect('blog/login');
            }
            
         }
         $this->load->view('login');
      }

      public function logout() {
         $this->session->sess_destroy();
         
         redirect('/');
      }

   }
?>