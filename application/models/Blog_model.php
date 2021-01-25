<?php
   class Blog_model extends CI_Model {

      public function getBlogs($limit, $offset){

         $filter = $this->input->get('find'); // filtering search artikel
         $this->db->like('title', $filter); // like akan mencari title yang mirip
         // paginaton
         $this->db->limit($limit, $offset);
         $this->db->order_by('date', 'desc');
         return $this->db->get("blog");

         // $query = $this->db->query('SELECT * FROM blog');
         // return $this->db->get('blog');
      }

      public function getTotalBlogs() {
         $filter = $this->input->get('find');
         $this->db->like('title', $filter);
         return $this->db->count_all_results('blog');
      }

      public function getSingelBlog($field, $value){

         // $query = $this->db->query('SELECT * FROM blog WHERE url = "'.$url.'"');
         $this->db->where($field, $value);
         return $this->db->get('blog');
      }

      public function insertBlog($data) {
         $this->db->insert('blog', $data);
         return $this->db->insert_id();
      }

      public function updateBlog($id, $post) {

         $this->db->where('id', $id); // parameter 1 : id, parameter 2 : value dari id yang ingin kita edit
         $this->db->update('blog', $post); //parameter1 : tabel, parameter2 : data yang ingin di perbaharui di database
         return $this->db->affected_rows(); //mengembalikan jumlah baris yang ingin diupdate
      }

      public function deleteBlog($id) {
         $this->db->where('id', $id); // filtering
         $this->db->delete('blog'); // tidak ada parameter2 karena di akan menghapus daya yg ditimpakan 
         return $this->db->affected_rows();
      }

   }
?>