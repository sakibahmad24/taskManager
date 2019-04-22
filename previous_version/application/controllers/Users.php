<?php

class Users extends CI_Controller{

    // Register user
    public function register()
    {
        $data['title'] = 'Sign Up';

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
        $this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');

        if($this->form_validation->run() == false) {
            $this->load->view('templates/header');
            $this->load->view('users/register', $data);
            $this->load->view('templates/footer');
        } else {

            // Password Encryption
            $enc_password = md5($this->input->post('password'));
            $this->user_model->register($enc_password);

            // Set Flash message
            $this->session->set_flashdata('user_registered', 'You are now registered and can log in');
            redirect('users/login');
        }
    }

    // Login user
    public function login()
    {
        $data['title'] = 'Sign In';

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if($this->form_validation->run() == false) {
            $this->load->view('templates/header');
            $this->load->view('users/login', $data);
            $this->load->view('templates/footer');
        } else {

            // Get Username
            $username = $this->input->post('username');
            // Get encrypted password
            $password = md5($this->input->post('password'));
            // Login User
            $user_id = $this->user_model->login($username, $password);

            if($user_id){
                //Creating session
                $user_data = [
                    'user_id'   => $user_id,
                    'username'  => $username,
                    'logged_in' => true
                ];
                $this->session->set_userdata($user_data);
                // Set Flash message
                $this->session->set_flashdata('user_logged_in', 'You are now logged in');
                redirect('posts');
            } else {
                // Set Flash message
                $this->session->set_flashdata('login_failed', 'Username or password is incorrect');
                redirect('users/login');
            }
        }
    }

    public function logout()
    {
        //Unset user data
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('username');

        // Set Flash message
        $this->session->set_flashdata('user_logged_out', 'You have logged out');
        redirect('users/login');


    }

    // Check if username exists

    public function check_username_exists($username)
    {
        $this->form_validation->set_message('check_username_exists', 'That username is taken. Please choose another');
        if($this->user_model->check_username_exists($username)){
            return true;
        } else {
            return false;
        }
    }

    // Check if email exists

    public function check_email_exists($email)
    {
        $this->form_validation->set_message('check_email_exists', 'That email is taken. Please choose another');
        if($this->user_model->check_email_exists($email)){
            return true;
        } else {
            return false;
        }
    }
}