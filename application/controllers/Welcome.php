<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct()
	  {
	    parent::__construct();
	    $this->load->model('registration');
	  }
	public function index()
	{
		$this->home();
	}
	public function tutor_registration()
	{
		$data['a'] = 'Tutor Registration';
		$this->load->view('header',$data);
		//echo "i m iqbal";
		$this->load->view('tutor_registration');
	}
  public function about()
  {
    $data['a'] = 'about';
    $this->load->view('header',$data);
    //echo "i m iqbal";
    $this->load->view('about');
  }
  

	public function home()
	{
		$data['a'] = 'Home';
		$this->load->view('header',$data);
		//echo "i m iqbal";
		$this->load->view('home');
	}
    public function home_after_login()
    {
        $data['a'] = 'Home';
        $this->load->view('header_after_login',$data);
        //echo "i m iqbal";
        //$this->load->view('home');
    }



	public function student_registration()
	{
		$data['a'] = 'Student Registration';
		$this->load->view('header',$data);
		//echo "i m iqbal";
		$this->load->view('student/student_registration');
	}
	public function tutor_login()
	{
		$data['a'] = 'Tutor Login';
		$this->load->view('header',$data);
		//echo "i m iqbal";
		$this->load->view('tutor_login');
	}
	public function student_login()
	{
		$data['a'] = 'Student Login';
		$this->load->view('header',$data);
		$this->load->view('student/student_login');
	}

    public function update_tutor_profile()
    {
       $data['a']='Update Profile';
       $this->load->view('header_after_login',$data);
       $this->load->view('update_tutor_profile');

    }
    public function logout()
    {
      session_destroy();
          $this->home();
    }

    public function tutor_add_course()
    {
       $data['a']='Add Course';
       $this->load->view('header_after_login',$data);
       $this->load->view('tutor_add_course');

    }

    public function tutor_show_course()
    {
       $data['a']='All Course';
       
       $result['res']=$this->registration->show_course();
       
      /* echo '<pre>';
       print_r($resulttt);
       exit();
      */
     
        $this->load->view('header_after_login',$data);
        $this->load->view('tutor_show_course',$result);
/*
        //for codelgniter table show
         $data['a']='All Course';
       
       $result['res']=$this->registration->show_course();
         $this->load->view('header_after_login',$data);
        $this->load->view('tutor_show_course',$result);*/



    }
    public function update_tutor_course($cid=NULL)
    {
        if($cid==null){
            redirect(base_url().'welcome/tutor_show_course');
        }
            $this->registration->tutor_update_course($cid);
        
            redirect(base_url().'welcome/tutor_show_course'); 
    }

    public function delete_tutor_course($cid=NULL)
    {
        if($cid==null){
            redirect(base_url().'welcome/tutor_show_course');
        }
        $this->registration->tutor_delete_course($cid);
       redirect(base_url().'welcome/tutor_show_course'); 
    }

    public function courseadd()
    {
            $this->load->helper(array('form', 'url'));

           $this->load->library('form_validation');

           $this->form_validation->set_rules('title', 'Title', 'required');

           if ($this->form_validation->run() == FALSE)
           {
            //echo "klfdhglkhgkf";
            $this->tutor_add_course();
            }
            else
            {
                $title =$this->input->post('title');
                $tid=$this->session->userdata('id');

                $dataArray = [
                        'title'=>$title,
                        'tid'=>$tid
                                    ];
                $result = $this->registration->tu_add_course($dataArray);

                if ($result >0) {


                    $this->session->set_flashdata('success', 'Course Added successfully');
                    redirect('tutor/addedcourse');
                }
                else
                {
                    echo "wrong";
                }


            }
    }

	 public function valid_tutor()
     {
        $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');

        $this->form_validation->set_rules('pwd', 'Password', 'required',
            array('required' => 'You must provide a %s.')
            );
        $this->form_validation->set_rules('email', 'Email', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->tutor_registration();
        }
        else
        {
           $name =$this->input->post('name');
           $username = $this->input->post('username');
           $email = $this->input->post('email');
           $password = $this->input->post('pwd');
           $gender = $this->input->post('gender');
           $dataArray = [
           'name'=>$name,
           'username'=>$username,
           'email'=>$email,
           'password'=>$password,
           'gender'=>$gender
           ];
           $result = $this->registration->tutor_register($dataArray);

           if($result > 0)
           {
              $this->session->set_flashdata('success', 'New User created successfully');

              redirect('tutor_registration/register');
          }
          else
          {
              $this->session->set_flashdata('error', 'User creation failed');

              redirect('tutor_registration/register');
          }
      }
    }

        public function valid_student()
        {
                $this->load->helper(array('form', 'url'));

                $this->load->library('form_validation');

                $this->form_validation->set_rules('name', 'Name', 'required');
                $this->form_validation->set_rules('username', 'Username', 'required');

                $this->form_validation->set_rules('pwd', 'Password', 'required',
                        array('required' => 'You must provide a %s.')
                );
                $this->form_validation->set_rules('email', 'Email', 'required');

                if ($this->form_validation->run() == FALSE)
                {
                        $this->student_registration();
                }
                else
                {
                	$name =$this->input->post('name');
                	$username = $this->input->post('username');
                	$email = $this->input->post('email');
                	$password = $this->input->post('pwd');
                	$gender = $this->input->post('gender');
                	$dataArray = [
                		'name'=>$name,
                		'username'=>$username,
                		'email'=>$email,
                		'password'=>$password,
                		'gender'=>$gender
                					];
                	$result = $this->registration->student_register($dataArray);
                	
                	if($result > 0)
                	{
                		$this->session->set_flashdata('success', 'New User created successfully');

                	
                    redirect('student_registration/register');
                	}
                	else
                	{
                		$this->session->set_flashdata('error', 'User creation failed');

                	redirect('student_registration/register');
                	}
                }
        }

        public function is_tutor_login()
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('pwd', 'Password', 'required',
                array('required' => 'You must provide a %s.')
                );
            $this->form_validation->set_rules('username', 'Username', 'required');
            if ($this->form_validation->run() == FALSE)
                {
                        $this->tutor_login();
                }
            else
            {
                   $username = $this->input->post('username');
                   $password = $this->input->post('pwd');
                   $result = $this->registration->check_tutor_login($username,$password);

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


                        $this->home_after_login();

                        $this->load->view('tutor_work');
                    }
                    else
                    {
                        //echo("Password Or Username Not Match");
                        $this->session->set_flashdata('error', 'Opsss!! Username or Password Not Match');
                       $this->tutor_login();
                    }
            }

        }

        public function update_tutor_profile_info()
        {/*
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
           $result = $this->registration->tutor_update_info($info);
           $this->session->set_userdata($info);
       // $this->session->set_userdata(['gender'=>$this->input->post('gender')]);
           redirect(base_url().'welcome/update_tutor_profile');
            
        }
}
