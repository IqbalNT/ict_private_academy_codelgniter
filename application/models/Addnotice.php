<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Addnotice extends CI_Model
{
	   function __construct() {
         parent::__construct();
      }

      public function tu_add_notice($notice)
      {
        $this->db->trans_start();
        $this->db->insert('notice',$notice);
        $nid = $this->db->insert_id();
        $this->db->trans_complete();
        return $nid;
      }
      public function show_notice($value='')
      {
      	$tid=$this->session->userdata('id');
        $this->db->select('*');
        $this->db->from('notice');
        $this->db->where('tid',$tid);
        //$this->db->order_by('tid','DESC');
        $sql=$this->db->get();
        return $sql->result();
      }
      public function tutor_update_notice($nid)
      {
        $this->db->where('nid',$nid);
       $this->db->update('notice',['notice'=>$this->input->post('notice')]);
      }
      public function tutor_delete_notice($nid)
      {
        $this->db->where('nid',$nid);
       $this->db->delete('notice');
      }


}
?>