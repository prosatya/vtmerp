<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_Model extends CI_Model {


	/****************************************
		## ADD NEW USER FROM REGISTRATION FORM
	******************************************/

	private $email_verify = 'email_varification_code';

	function add_user() 
	{
			$user_data = array(
			'user_name'	=>	$this->input->post('user_name'),
			'password'	=>	$this->input->post('password'),
			'first_name'		=>	$this->input->post('first_name'),	
			'last_name'		=>	$this->input->post('last_name'),	
			'email'				=>	$this->input->post('email'),
			'password'		=>	$this->input->post('password'),	
			'martial_status'	=>	$this->input->post('martial_status'),
			'dob' => $this->input->post('dob'),
			'address'	=>	$this->input->post('address'),
			'city'	=>	$this->input->post('city'),
			'state'	=>	$this->input->post('state'),
			'pincode'	=>	$this->input->post('pincode'),
			'mobile'	=>	$this->input->post('mobile'),
			'phone'	=>	$this->input->post('phone'),
				'createdBy'	=>      $this->session->userdata('user_name'),
			'create_date' => date('Y-m-d'));
			
			if($this->input->post('gender')=='male')
			{
				$user_data['gender'] = 'Male';	
			}else{
				$user_data['gender'] = 'Female';	
			}
			
			$query = $this->db->insert('users',$user_data);
			
			
			if($query){
			$last_user_id = $this->db->insert_id();
			return $last_user_id;
			} else{
			return false;
			}
	}
	/***********************************************************
	 ## CHECK USER LOGGED IN
	 ## RETURN USERDATA IF TRUE
	************************************************************/

	function loginvalidation(){

		$this->db->where('user_name', $this->input->post('user_name'));
		$this->db->where('password', md5($this->input->post('password')));
		$query = $this->db->get('users');
		if($query->num_rows == 1){
			$query = $query->result();
			$data = array(
					'email' 	=> $query[0]->email,
					'user_name' 	=> $query[0]->user_name,
					);
			$this->session->set_userdata($data);
			return true;
		}else{
			return false;
		}
	}
	
	
	function check_user(){
				if($this->session->userdata('email')== TRUE &&
				 $this->session->userdata('user_name')== TRUE)
				{
					return 	true;
				} else{
					return false;
				}
	}

	

	function generateRandomPassword() {
	  //Initialize the random password
	  $password = '';
	  //Initialize a random desired length
	  $desired_length = rand(8, 20);
	  for($length = 0; $length < $desired_length; $length++) {
		//Append a random ASCII character (including symbols)
		$password .= chr(rand(32, 126));
	  }
	  return $password;
	}

	function forgetpassword(){

		$this->db->where('email', $this->input->post('email'));
		$query = $this->db->get('users');
		if($query->num_rows==1){
			$query = $query->result();

			$data = array(
					'user_id' 		=> $query[0]->id,
					'email' 		=> $query[0]->email,
					'user_name' 	=> $query[0]->user_name,
					'password' 	=> $query[0]->password,
				);
			$password = $this->generateRandomPassword();
			$this->send_forgetpassword_email($data['user_id'], $data['email'], $data['user_name'], $data['password']);
			return true;
		}else{
			return false;
		}
	}

	function send_forgetpassword_email($userid, $email, $username, $password){
		$result = '';
		$this->load->library('email');
		$this->email->set_newline("\r\n");
		$this->email->set_mailtype("text or html");

		$this->email->from('magrawal@solutionsofts.com', 'Manoj Agrawal');
		$this->email->to($email);

		$this->email->subject('VMS-1.0 Forget password');
		$user_id= random_string('alnum',16);
		$this->email->message('Hello '.$username.',  Thank you for reset your account password. Please Login and update your password for more Security: Password:'.$password.'Thank you!');
		//$this->email->send();
		//echo $this->email->print_debugger();

		if ($this->email->send()){
				//return $this->saveUserPassword($userid,$password);
				return true;
			
		}else{
			return false;
		}
	}

	function saveUserData($user_id,$data_field,$data_value,$display){
		$user_data = array(
				'user_id' 		 => $user_id,
		);

		$query = $this->db->insert('user_data',$user_data);
		if($query){
			return true;
		} else{
			return false;
		}
	}

	function saveUserPassword($user_id,$password){
		$data = array(
               'password'=> md5($password)
        );
		$this->db->where('id', $user_id );
		$this->db->update('users', $data); 
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		return false;
	}


	function updateUserData(){
		
		$user_data = array(
			'password'	=>	$this->input->post('password'),
			'first_name'		=>	$this->input->post('first_name'),	
			'last_name'		=>	$this->input->post('last_name'),	
			'email'				=>	$this->input->post('email'),
			'martial_status'	=>	$this->input->post('martial_status'),
			'address'	=>	$this->input->post('address'),
			'city'	=>	$this->input->post('city'),
			'state'	=>	$this->input->post('state'),
			'pincode'	=>	$this->input->post('pincode'),
			'mobile'	=>	$this->input->post('mobile'),
			'phone'	=>	$this->input->post('phone'),
			'updatedBy'	   =>	$this->session->userdata('user_name'),
			);
		 
		$this->db->where('id',$this->input->post('id'));
		$this->db->update('users',$user_data); 
	}

	/***
	 *
	* Save Profile
	*/
	function user_profile(){
				
			$this->load->database();	
			$this->db->select('*');
			$this->db->where('email', $this->session->userdata('email'));
			$query = $this->db->get('user_master');
			return $query->result();
	
	}

	function editProfileSave(){
		$com_photo = $this->upload_file('upload_photo');
		$com_reg_document = $this->upload_file('company_reg_doc');

		if(!empty($com_photo) && !empty($com_reg_document)){
			$com_photo = $com_photo['upload_data']['file_name'];
			$com_reg_document = $com_reg_document['upload_data']['file_name'];
				
			foreach ($this->input->post() as $key=>$value){
				 
				if($this->input->post($key."_pp")){
					$user_data= array(
							'user_id' 			=> $this->session->userdata('user_id'),
							'data_field' 		=> $key,
							'data_value' 		=> $value,
							'display_public' 	=> $this->input->post($key."_pp")
					);
					$query = $this->db->insert('user_data',$user_data);
				}
			}
				
			$user_data= array(
					'user_id' 			=> $this->session->userdata('user_id'),
					'data_field' 		=> 'upload_photo',
					'data_value' 		=> $com_photo,
					'display_public' 	=> $this->input->post('upload_photo_pp')
			);
			 
			$query = $this->db->insert('user_data',$user_data);
			
			$user_data= array(
					'user_id' 			=> $this->session->userdata('user_id'),
					'data_field' 		=> 'company_reg_doc',
					'data_value' 		=> $com_reg_document,
					'display_public' 	=> $this->input->post('company_reg_doc_pp')
			);
			$query = $this->db->insert('user_data',$user_data);
			
			if($query){
				return $this->updateUserData(2);
			} else{
				return false;
			}
		}
	}

	function update_profile($profile_data){
		$data = array();
		$data = $profile_data;
		$this->db->where('user_id', $this->session->userdata('user_id'));
		$this->db->update('user_master', $data);	
	    return true;
	}



	function upload_file($fieldName){
		$this->load->library('upload');

		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png|pdf|ppt|mp4|doc|docx|text';
		$config['max_size'] = '2048';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->upload->initialize($config);

		if ( ! $this->upload->do_upload($fieldName))
		{
			return $data = array();

		}
		else
		{
			return $data = array('upload_data' => $this->upload->data());

		}

	}

function resetpasswordvalidation(){
	
		$this->db->where('user_id', $this->session->userdata('user_id'));
		$this->db->where('password', md5($this->input->post('old_password')));
		$query = $this->db->get('user_master');
		if($query->num_rows == 1){
		$data = array('password' => md5($this->input->post('new_password')));
		$this->db->where('user_id', $this->session->userdata('user_id'));
		$this->db->update('user_master', $data);
		return true;
		}
		else {
		return false;
		}
}
function user_car(){
			
		$this->load->database();	
		$this->db->select('*');
		$this->db->where('user_id', $this->session->userdata('user_id'));
	    $query = $this->db->get('user_car');
	    return $query->result();
}

function user_setting(){
	
	    $this->db->select('*');
	    $query = $this->db->from('user_car');
		$this->db->join('user_master', 'user_car.user_name = user_master.user_name');
		$this->db->where('user_car.user_name', $this->session->userdata('user_name'));
		$query = $this->db->get();
		return $query->result();
		
	}
	function getAllUsers($limit, $start)
    { 
		$this->db->limit($limit, $start);
        $query = $this->db->get("users");

        if ($query->num_rows() > 0)
        { 
			return $query->result_array();
        }
        else {return NULL;}

    } 
	public function record_count() {

        return $this->db->count_all("users");

    }

	
	function getUser($id)
    {
		$query = $this->db->query("select * from users where id = $id");
  
        if ($query->num_rows() > 0)
        { 
			return $query->row_array();
        }
        else {return NULL;}
    }   

}

/* End of file User_Model.php */
/* Location: ./application/models/User_Model.php */
?>
