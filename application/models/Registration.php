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


      public function tu_add_course($title)
      {
        $this->db->trans_start();
        $this->db->insert('course',$title);
        $cid = $this->db->insert_id();
        $this->db->trans_complete();
        return $cid;
      }

      public function show_course()
      {
        $tid=$this->session->userdata('id');
        $this->db->select('*');
        $this->db->from('course');
        $this->db->where('tid',$tid);
        //$this->db->order_by('tid','DESC');
        $sql=$this->db->get();
        return $sql->result();

      /*  //for codelgniter table show
        $tid=$this->session->userdata('id');
         $this->db->select('id,title');
        $this->db->from('course');
        $this->db->where('tid',$tid);
         $sql=$this->db->get();
         return $this->table->generate($sql);
*/


      }

      public function tutor_update_course($cid)
      {
        $this->db->where('cid',$cid);
       $this->db->update('course',['title'=>$this->input->post('course_title')]);
      }

      public function tutor_delete_course($cid)
      {
        $this->db->where('cid',$cid);
       $this->db->delete('course');
      }
 }
