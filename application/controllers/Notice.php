<?php

class Notice extends CI_Controller {

        function __construct()
          {
            parent::__construct();
            $this->load->model('addnotice');
          }

        public function index()
        {
                $data['a'] = 'Home';
                $this->load->view('header_after_login');
        }

         public function tutor_add_notice()
        {
                $data['a']='Notice';
                 $this->load->view('header_after_login',$data);
                $this->load->view('tutor_add_notice');

        }


        public function tutor_show_notice()
        {
                $data['a']='All Notice';
       
                $result['res']=$this->addnotice->show_notice();
                $this->load->view('header_after_login',$data);
                $this->load->view('tutor_show_notice',$result);

        }
         public function update_tutor_notice($nid=NULL)
        {
            if($nid==null){
                redirect(base_url().'notice/tutor_show_notice');
            }
            $this->addnotice->tutor_update_notice($nid);
        
            redirect(base_url().'notice/tutor_show_notice'); 
        }
        public function delete_tutor_notice($nid=NULL)
        {
            if($nid==null){
            redirect(base_url().'notice/tutor_show_course');
            }
            $this->addnotice->tutor_delete_notice($nid);
            redirect(base_url().'notice/tutor_show_notice'); 
        }




        public function noticeadd()
        {
            $this->load->helper(array('form', 'url'));

            $this->load->library('form_validation');

            $this->form_validation->set_rules('notice', 'Notice', 'required');

            if ($this->form_validation->run() == FALSE)
            {
                    //echo "klfdhglkhgkf";
                    $this->tutor_add_notice();
            }
            else
            {
                $notice =$this->input->post('notice');
                $tid=$this->session->userdata('id');

                $dataArray = [
                'notice'=>$notice,
                'tid'=>$tid
                ];
                $result=$this->addnotice->tu_add_notice($dataArray);

                if ($result >0) {


                    $this->session->set_flashdata('success', 'Notice Added successfully');
                    redirect('noticeadd');
                }
                else
                {
                    echo "wrong";
                }


             }
        }


}
?>