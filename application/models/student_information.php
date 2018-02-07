<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Student_information extends CI_Model
{
	   function __construct() {
         parent::__construct();
      }

       public function check_student_login($value)
      {
        $username = $this->input->post('username');
        $password = $this->input->post('pwd');
        $this->db->select('*');
        $this->db->from('student');
         $this->db->where('username', $username);
        $this->db->where('password', $password);
         $query = $this->db->get();
         $result=$query->row();
         return $result;


      }

       public function student_update_info($info)
      {
        $uid=$this->session->userdata('id');
        
        $this->db->where('id',$uid);
        $this->db->update('student',$info);
      }

      public function show_allnotice()
      {
        $this->db->select('*');
        $this->db->from('notice');
        $this->db->join('tutor','notice.tid=tutor.id');
        $query = $this->db->get();
        return $query->result();


      }

     /* public function show_lecture()
      {
        $this->db->select('*');
        $this->db->from('uploadfile');
        //$this->db->order_by('tid','DESC');
        $sql=$this->db->get();
        return $sql->result();
      }
*/



       public function show_lecture(){
        $query=$this->db->query("SELECT st.*
                                 FROM uploadfile st");
        return $query->result_array();
    }




}
?>