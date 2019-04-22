<?php
class Users extends CI_Controller
{
	public function register()
	{
		$this->form_validation->set_rules(
			'first_name',
			'First Name',
			'trim|required|max_length[50]|min_length[2]|xss_clean'
		);
		$this->form_validation->set_rules(
			'last_name',
			'Last Name',
			'trim|required|max_length[50]|min_length[2]|xss_clean'
		);
		$this->form_validation->set_rules(
			'email',
			'Email',
			'trim|required|max_length[100]|min_length[5]|xss_clean|valid_email'
		);
		$this->form_validation->set_rules(
			'username',
			'Username',
			'trim|required|max_length[20]|min_length[6]|xss_clean'
		);
		$this->form_validation->set_rules(
			'password',
			'Password',
			'trim|required|max_length[20]|min_length[6]|xss_clean'
		);
		$this->form_validation->set_rules(
			'password2',
			'Confirm Password',
			'trim|required|max_length[50]|min_length[2]|xss_clean|matches[password]'
		);

		if ($this->form_validation->run() == false) {
			$data['main_content'] = 'users/register';
			$this->load->view('layouts/main', $data);
		} else {
			if ($this->User_model->create_member()) {
				$this->session->set_flashdata(
					'registered',
					'You are now registered and can log in'
				);
				redirect('home/index');
			}
		}
	}

	private function invalid_login()
	{
		$this->session->set_flashdata(
			'login_failed',
			'Sorry, the login info that you have entered is invalid'
		);
		redirect('home/index');
	}

	public function login()
	{
		$this->form_validation->set_rules(
			'username',
			'Username',
			'trim|required|max_length[20]|min_length[6]|xss_clean'
		);
		$this->form_validation->set_rules(
			'password',
			'Password',
			'trim|required|max_length[20]|min_length[6]|xss_clean'
		);

		if ($this->form_validation->run() == false) {
			// nothing
			$this->invalid_login();
		} else {
			//Get from post
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			//Get user id from model
			$user_id = $this->User_model->login_user($username, $password);

			//Validate user
			if ($user_id !== false) {
				//Create array of user data
				$user_data = array(
					'user_id' => $user_id,
					'username' => $username,
					'logged_in' => true
				);
				//Set session userdata
				$this->session->set_userdata($user_data);

				$this->session->set_flashdata(
					'login_success',
					'Yeay, you are logged in'
				);
				redirect('home/index');
			} else {
				//Set error
				$this->invalid_login();
			}
		}
	}

	public function logout()
	{
		//Unset session data
		// $this->session->unset_userdata('logged_in');
		// $this->session->unset_userdata('user_id');
		// $this->session->unset_userdata('username');
		$this->session->sess_destroy();

		$this->session->set_flashdata('logged_out', 'You have been logged out');
		redirect('home/index');
	}
}
?>
