<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {
        	function __construct()
        	  {
        	    parent::__construct();
        	    $this->load->model('student_information');
        	  }
        	public function index()
        	{
        		$this->home();
        	}
          public function home()
          {
            $data['a']='Home';
            $this->load->view('header');
          }
        	

           public function home_after_login_student()
          {
                $data['a'] = 'Home';
                //$info=$this->student_information->show_allnotice();
                $data['res']=$this->student_information->show_allnotice();
                //$data['notice']=$info->notice;
                $this->load->view('student/header_after_login',$data);
                //echo "i m iqbal";
                //$this->load->view('home');
          }

        public function is_student_login()
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('pwd', 'Password', 'required',
                array('required' => 'You must provide a %s.')
                );
            $this->form_validation->set_rules('username', 'Username', 'required');
            if ($this->form_validation->run() == FALSE)
                {
                        $data['a'] = 'Student login';
                        $this->load->view('header',$data);
                        //echo "i m iqbal";
                        $this->load->view('student/student_login');
                }
            else
            {
                   $username = $this->input->post('username');
                   $password = $this->input->post('pwd');
                   $result = $this->student_information->check_student_login($username,$password);

                  /*  echo '<pre>';
                    print_r($result);
                    exit();*/
                    if ($result==TRUE) {
                        $info=array();
                        $info['id']=$result->id;
                        $info['name']=$result->name;
                        $info['username']=$result->username;
                        $info['password']=$result->password;
                        $info['gender']=$result->gender;
                        $this->session->set_userdata($info);


                        $this->home_after_login_student();

                        //$this->load->view('tutor_work');
                    }
                    else
                    {
                        //echo("Password Or Username Not Match");
                        $this->session->set_flashdata('error', 'Opsss!! Username or Password Not Match');
                       $data['a'] = 'Student login';
                        $this->load->view('header',$data);
                        //echo "i m iqbal";
                        $this->load->view('student/student_login');
                    }
            }

        }

    public function logout()
    {
      session_destroy();
          $this->home();
    }



    public function update_student_profile()
    {
       $data['a']='Update Profile';
       $data['res']=$this->student_information->show_allnotice();
       $this->load->view('student/header_after_login',$data);
       $this->load->view('student/update_student_profile');

    }
      public function update_student_profile_info()
        {
        /*
            $info=array();
           $info['name']= $this->input->post('name');
           $info['username'] = $this->input->post('username');
           $info['password'] = $this->input->post('pwd');
           $info['gender'] = $this->input->post('gender');
*/
           $info =[
                'name'=>$this->input->post('name'),
                'username'=>$this->input->post('username'),
                'password'=>$this->input->post('pwd'),
                'gender'=>$this->input->post('gender')
           ];
           $result = $this->student_information->student_update_info($info);
           $this->session->set_userdata($info);
       // $this->session->set_userdata(['gender'=>$this->input->post('gender')]);
           redirect(base_url().'student/update_student_profile');
            
        }
        public function student_show_lecture()
        {
                $data1['a']='All Lecture';
                $data1['res']=$this->student_information->show_allnotice();
       
                //$result['lec']=$this->student_information->show_lecture();
                $this->data['get_data']= $this->student_information->show_lecture();
                $this->load->view('student/header_after_login',$data1);
               //$this->load->view('student/student_show_lecture',$result,$data);

                
                $this->load->view('student/student_show_lecture', $this->data, FALSE);
          
        }


        public function savelikes()
        {
        $ipaddress=$this->session->userdata('id');
        $storyid=$this->input->post('Storyid');


        $fetchlikes=$this->db->query('select likes from uploadfile where lid="'.$storyid.'"');
        $result=$fetchlikes->result();

        $checklikes = $this->db->query('select * from storylikes 
                                        where storyid="'.$storyid.'" 
                                        and ipaddress = "'.$ipaddress.'"');
        $resultchecklikes = $checklikes->num_rows();

        if($resultchecklikes == '0' ){
        if($result[0]->likes=="" || $result[0]->likes=="NULL")
        {
            $this->db->query('update uploadfile set likes=1 where lid="'.$storyid.'"');
        }
        else
        {
            $this->db->query('update uploadfile set likes=likes+1 where lid="'.$storyid.'"');
        }

        $data=array('storyid'=>$storyid,'ipaddress'=>$ipaddress);
        $this->db->insert('storylikes',$data);
        }else{
        $this->db->delete('storylikes', array('storyid'=>$storyid,
                                              'ipaddress'=>$ipaddress));
        $this->db->query('update uploadfile set likes=likes-1 where lid="'.$storyid.'"');
        }

        $this->db->select('likes');
        $this->db->from('uploadfile');
        $this->db->where('lid',$storyid);
        $query=$this->db->get();
        $result=$query->result();

        echo $result[0]->likes;
        }

}
