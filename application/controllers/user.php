<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/****************************************************
## Package VMS-1.0
## User controller
## Login, Registration, Message, Notification
## From V 1.0
****************************************************/

class User extends CI_Controller {
	
		public function __construct() {
        parent:: __construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model("User_Model");
        $this->load->library("pagination");
		$this->load->library('session');
    }

		public function index(){
				redirect('main');
		}

		//login function
		public function login(){
				$data = array();
				$this->load->model('User_Model');
				$userdata 	= $this->User_Model->check_user();
				
				if($userdata){
					redirect('user/profile');
				}else{ 	
					$data['main_content'] ='frontend/login';
					$data['meta_title']  = 'Login | VMS-1.0';
					$this->load->view('frontend/login', $data);
				 }
		}

	// Login Validation Function
	// Redirect to profile page as status

		public function loginvalidation(){
		$this->load->model('User_Model');
		$userdata = $this->User_Model->check_user(); //to check the user if already login it will redirect user to home page
			if($userdata)
			{
				redirect('user/profile');
			}else{
					
					$this->load->model('User_Model');
					$query = $this->User_Model->loginvalidation();
					$userdata = array(
				'email' 	=> $this->session->userdata('email'),
				'user_name' => $this->session->userdata('user_name'),
				);
				
				if($query)
				{
					redirect('user/profile');
				} else
				{
					$this->session->set_flashdata('errormessage', 'Invalid User Name or Password!');
					redirect('user/login');
				}
			}
		}

	// Registration function
	// load Registration view
	public function registration(){
	if($this->session->userdata('user_name')) {
		$config = array();
		$config["base_url"] = base_url() . "/user/registration";
		$config["total_rows"] = $this->User_Model->record_count();
		$config["per_page"] = 5;
		$config["uri_segment"] = 3;
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data["records"] = $this->User_Model->getAllUsers($config["per_page"], $page);
		$data["links"] = $this->pagination->create_links();
	
		$data['main_content'] ='frontend/registration';
		$data['meta_title']  = 'Registration | VMS-1.0';
		$this->load->view('frontend/registration', $data);
		
	}else {
		redirect('user/login');
	}
	}
	
	public function edit_user($id = 0){
			
			if($this->session->userdata('user_name')) {
			$data = array();
			if($this->input->post('update')){
				$data['records'] = $this->User_Model->updateUserData();
			}
			$query = $this->User_Model->getUser($id);
				
			$data['fid']['value'] = $query['id'];
			$data['fuser_name']['value'] = $query['user_name'];
			$data['ffirst_name']['value'] = $query['first_name'];
			$data['flast_name']['value'] = $query['last_name'];
			$data['femail']['value'] = $query['email'];
			$data['fmobile']['value'] = $query['mobile'];
			$data['fphone']['value'] = $query['phone'];
			$data['fgender']['value'] = $query['gender'];
			$data['fmartial_status']['value'] = $query['martial_status'];
			$data['fdob']['value'] = $query['dob'];
			$data['faddress']['value'] = $query['address'];
			$data['fcity']['value'] = $query['city'];
			$data['fstate']['value'] = $query['state'];
			$data['fpincode']['value'] = $query['pincode'];
			$data['fpassword']['value'] = $query['password'];
			
			
			$config = array();
  			$config["base_url"] = base_url() . "/user/registration";
			$config["total_rows"] = $this->User_Model->record_count();
			$config["per_page"] = 5;
			$config['use_page_numbers'] = TRUE;
			$this->pagination->initialize($config);
			$data["records"] = $this->User_Model->getAllUsers($config["per_page"],$config['use_page_numbers']);
			$data["links"] = $this->pagination->create_links();
			$data['main_content'] ='frontend/user_edit';
			$data['meta_title']  = 'Registration | VMS-1.0';
			
			$this->load->view('frontend/user_edit', $data);
			}else{
				redirect('user/login');
			}
	}
	
	function get_records(){
			$this->load->model('User_Model');
		 	//$data['records']=$this->mod_names->profile($id);
			$data['records'] = $this->User_Model->get_users();
			$this->load->view('frontend/registration', $data); // load the view with the $data variable
			
	}

	// Registration Vaidation function
	// load Registration view if failed, load success message if true
public function registrationvalidation(){
		if($this->input->post('registration') != ""){
		$this->load->library('session');	
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->database();	
	
		$this->load->model('User_Model');
		$last_id = $this->User_Model->add_user();
		$this->session->set_flashdata('registrationmessage', 'User record saved!');
		redirect('user/registration');
		}

		
	}

	//email verification
	function emailverification() {
			$this->load->library('session');	
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->load->database();	
			$this->load->model('User_Model');
			$ts=$this->uri->total_segments();
			$offset= $this->uri->segment($ts); 
			$user_name =$offset;
			$verify = $this->User_Model->check_verification_email($user_name);
			redirect('user/profile');

	}



	// contactus Vaidation function
	// load contactus view if failed, load success message if true

	public function contactusvalidation(){
	
		$this->load->library('form_validation');
			
		/* Field name, Name, Rules */
		$this->form_validation->set_rules('cname','Full Name','trim|required');
		$this->form_validation->set_rules('csubject','Subject','trim|required');
		$this->form_validation->set_rules('cmail','Email Address','trim|required|valid_email');
		$this->form_validation->set_rules('contactno','Contact No.','trim|required');
		$this->form_validation->set_rules('description','Description','trim|required');
		

	}	

	public function logout(){

		$userdata = array(
				'email' 	=> $this->session->userdata('user_email'),
				'user_name' => $this->session->userdata('user_name'),
				);
		
		$this->load->model('User_Model');
		//$this->User_Model->last_login();		
		//$this->load->library('session');	
		$this->session->sess_destroy();
		$this->session->unset_userdata($userdata);
		
		redirect('user/login');

	}
	
	//forget password
	function forgetpassword(){
		$data = array();
		$data['main_content'] ='frontend/forgotPassword';
		$data['meta_title']  = 'Forget password | VMS-1.0';
		$this->load->view('frontend/forgotPassword', $data);
		if($_POST)
		{
		
		$query = $this->User_Model->forgetpassword();
			if($query){
			$this->session->set_flashdata('errormessage', 'Please verify your password in Email!');
			redirect('user/forgetpassword');
			} else{
			$this->session->set_flashdata('errormessage', 'Invalid Email!');
			redirect('user/forgetpassword');
			}
		}
	}

	//reset password
	function resetpassword()
	{
		$this->load->view('profile/changepassword');	
	}

	
public function profile(){

		/** Check Logged In User */
		$data = array();
		
		if($this->session->userdata('user_name')){
			$data['main_content'] ='frontend/profile';
			$data['meta_title']   = 'Profile | VMS-1.0';
			$this->load->view('frontend/profile', $data);
		} else{
			redirect('user/login');
		}
}

//edit profile
function editprofile(){
		$this->load->library('session');
		$data = array('edit_profile'	=> $this->input->post('edit_profile')); 
		$this->session->set_userdata($data);  
		$this->session->userdata('edit_profile');
		$this->load->database();	
		$this->load->model('User_Model');
		$query = $last_id = $this->User_Model->user_profile();
		$data['query']= $query;		
		$this->profile($data);
}
//update profile
function updateprofile(){
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');	
		$this->form_validation->set_rules('first_name','First name','required|max_length[40]');	
		$this->form_validation->set_rules('last_name','Last name','required|max_length[40]');	
		$this->form_validation->set_rules('house_no','House no','required|max_length[40]');	
		$this->form_validation->set_rules('street','Street','required|max_length[40]');		
		$this->form_validation->set_rules('address','Address line','max_length[80]');	
		$this->form_validation->set_rules('city_name','City name','required|max_length[40]');	
		$this->form_validation->set_rules('postal_code','Postal code','required|numeric|exact_length[6]');				
		$this->form_validation->set_rules('birth_date','Birth year','max_length[40]');
		$this->form_validation->set_rules('age','Age','max_length[40]');
		$this->form_validation->set_rules('occupation','Occupation','max_length[80]');
		$this->form_validation->set_rules('marital_status','Marital Status','max_length[80]');
		
			
		$this->load->library('session');
		$this->session->unset_userdata('edit_profile');
		$data = array('update_profile'	=> $this->input->post('update_profile')); 
		$this->session->set_userdata($data);  
		$this->session->userdata('update_profile');
		$profile_data = array(
		'first_name'=>$this->input->post('first_name'),
		'last_name'=>$this->input->post('last_name'),
		'house_no'=>$this->input->post('house_no'),
		'street'=>$this->input->post('street'),
		'address'=>$this->input->post('address'),
		'city_name'=>$this->input->post('city_name'),
		'postal_code'=>$this->input->post('postal_code'),
		'birth_date'=>$this->input->post('birth_date'),
		'age'=>$this->input->post('age'),
		'occupation'=>$this->input->post('occupation'),
		'marital_status'=>$this->input->post('marital_status'),);
		 $this->session->set_userdata($profile_data);
		
		
		if($this->form_validation->run() == FALSE){
		$this->session->set_flashdata('errormessage', validation_errors('<p>'));
		$this->profile();
			} 
			else{
			$this->load->model('User_Model');
			$query		= $this->User_Model->update_profile($profile_data);	
			if($query){		
			$this->session->unset_userdata('edit_profile');  
         	$this->session->unset_userdata('update_profile');
			$this->session->unset_userdata($profile_data); 
			$this->session->set_flashdata('errormessage', 'your profile has been updated');
			$this->profile();	
			}
			else{
				$this->profile;
			}
			}
	
}
	function back()
	{
	         $this->session->unset_userdata('edit_profile');  
         	 $this->session->unset_userdata('update_profile'); 
			 $this->profile();
	}
//reset password validation
function resetpasswordvalidation(){

			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');	
			$this->form_validation->set_rules('old_password','Old password','required|max_length[40]');	
			$this->form_validation->set_rules('new_password','New password','required|max_length[40]|min_length[5]');	
			$this->form_validation->set_rules('re_password','New password again','required|max_length[40]|matches[new_password]');	
			if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('errormessage', validation_errors('<p>'));
			$this->profile();
			} else{
			$this->load->model('User_Model');
			$query = $this->User_Model->resetpasswordvalidation();		
			if(	$query){
			$this->session->set_flashdata('errormessage', 'Your password has been updated');}
			else{$this->session->set_flashdata('errormessage', 'your current password does not mathch the old password field');}
			$this->profile();}
		}


} 
/* End of file User.php */ /* Location:
./application/controllers/User.php */
