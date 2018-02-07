<?php

class Lectureupload extends CI_Controller {
        
        public function __construct()
        {
          parent::__construct();
          $this->load->database();
          $this->load->helper('url');
          $this->load->helper('form');
          $this->load->model('lupload');
        }
        public function index()
        {
                $data['a'] = 'Home';
                $this->load->view('header_after_login');
        }

         
        public function tutor_add_lecture()
        {
                $data['a']='Lecture';
                 $this->load->view('header_after_login',$data);
                $this->load->view('tutor_add_lecture');

        }

        public function do_upload()
        {
          $url = "../images";
          $image=basename($_FILES['pic']['name']);
          $image=str_replace(' ','|',$image);
          $type = explode(".",$image);
          $type = $type[count($type)-1];
          if (in_array($type,array('jpg','jpeg','png','gif','pdf')))
          {
            $tmppath="images/".uniqid(rand()).".".$type; // uniqid(rand()) function generates unique random number.
            if(is_uploaded_file($_FILES["pic"]["tmp_name"]))
            {
              move_uploaded_file($_FILES['pic']['tmp_name'],$tmppath);
              return $tmppath; // returns the url of uploaded image.
            }
          }
          else
          {
            redirect(base_url() . 'Lectureupload/tutor_add_lecture', 'refresh');// redirect to show file type not support message
          }
        }

        function image_upload()
        {
          $data['tid']=$this->session->userdata('id');
          $data ['image_url']= $this->do_upload();
          $data ['alt']= $this->input->post('alt');
          $result=$this->lupload->tu_add_lecture($data);
          //$this->db->insert('image_upload', $data);
          if ($result >0) {

                $this->session->set_flashdata('success', 'Lecture Added successfully');
                redirect(base_url().'Lectureupload/tutor_add_lecture');
          }
           else
          {
            $this->session->set_flashdata('error', 'Lecture Added Unsuccessfully');
            $this->tutor_add_lecture();
            //redirect(base_url() . 'Lectureupload/tutor_add_lecture');
                   // echo "wrong";
          }
          
        }

        public function tutor_show_lecture()
        {
                $data['a']='All Lecture';
       
                $result['res']=$this->lupload->show_lecture();
                $this->load->view('header_after_login',$data);
                $this->load->view('tutor_show_lecture',$result);

        }

         public function delete_tutor_lecture($lid=NULL)
        {
            if($lid==null){
            redirect(base_url().'Lectureupload/tutor_show_lecture');
            }
            $this->lupload->tutor_delete_lecture($lid);
            redirect(base_url().'Lectureupload/tutor_show_lecture','refresh'); 
        }


}
?>