<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Registration extends CI_Model
{
	   function __construct() {
         parent::__construct();
      }

      public function tutor_register($tutorInfo){
        $this->db->trans_start();
      	$this->db->insert('tutor',$tutorInfo);
      	$id = $this->db->insert_id();
      	$this->db->trans_complete();
      	return $id;
      }

      public function student_register($tutorInfo){
        $this->db->trans_start();
      	$this->db->insert('student',$tutorInfo);
      	$id = $this->db->insert_id();
      	$this->db->trans_complete();
      	return $id;
      }

      public function check_tutor_login($value)
      {
        $username = $this->input->post('username');
        $password = $this->input->post('pwd');
        $this->db->select('*');
        $this->db->from('tutor');
         $this->db->where('username', $username);
        $this->db->where('password', $password);
         $query = $this->db->get();
         $result=$query->row();
         return $result;


      }

      public function tutor_update_info($info)
      {
        $uid=$this->session->userdata('id');
        
        $this->db->where('id',$uid);
        $this->db->update('tutor',$info);
      }
 }