<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class lupload extends CI_Model {
 
	function __construct() {
        parent::__construct();
    }

    public function tu_add_lecture($lecture)
      {
        $this->db->trans_start();
        $this->db->insert('uploadfile',$lecture);
        $lid = $this->db->insert_id();
        $this->db->trans_complete();
        return $lid;
      }

      public function show_lecture($value='')
      {
      	$tid=$this->session->userdata('id');
        $this->db->select('*');
        $this->db->from('uploadfile');
        $this->db->where('tid',$tid);
        //$this->db->order_by('tid','DESC');
        $sql=$this->db->get();
        return $sql->result();
      }

       public function tutor_delete_lecture($lid)
      {
        $this->db->where('lid',$lid);
       $this->db->delete('uploadfile');
      }
 
 
}