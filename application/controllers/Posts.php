<?php

class Posts extends CI_Controller
{
    public function index($page = 'home')
    {
        // Check login
        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        } else {
            $data['title'] = 'Latest Posts';

            $data['posts'] = $this->post_model->get_posts();

            $this->load->view('templates/header');
            $this->load->view('posts/index', $data);
            $this->load->view('templates/footer');
        }
    }

    public function view($slug = NULL)
    {
        // Checking login
        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        } else {
            $data['post'] = $this->post_model->get_posts($slug);
            // Checking user
            if($this->session->userdata('user_id')!= $this->post_model->get_posts($slug)['user_id']){
                redirect('posts');
            }

            if (empty($data['post'])) {
                show_404();
            }
            $data['title'] = $data['post']['title'];
            $this->load->view('templates/header');
            $this->load->view('posts/view', $data);
            $this->load->view('templates/footer');
        }
    }

    public function create()
    {
        // Check login
        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        } else {
            $data['title'] = 'Create Tasks';

            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('date', 'Date', 'required');
            $this->form_validation->set_rules('description', 'Description', 'required');
            $this->form_validation->set_rules('priority', 'Priority', 'required');
            if ($this->form_validation->run() === false) {
                $this->load->view('templates/header');
                $this->load->view('posts/create', $data);
                $this->load->view('templates/footer');
            } else {
                $this->post_model->create_post();
                // Set Flash message
                $this->session->set_flashdata('post_created', 'Task have been created');
                redirect('posts');
            }
        }
    }

    public function delete($id)
    {
        // Check login
        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        } else {
            $this->post_model->delete_task($id);
            // Set Flash message
            $this->session->set_flashdata('post_deleted', 'Task have been deleted');
            redirect('posts');
        }
    }

    public function edit($slug)
    {
        // Checking login
        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        } else {
            $data['post'] = $this->post_model->get_posts($slug);

            if (empty($data['post'])) {
                show_404();
            }
            $data['title'] = 'Edit Post';
            $this->load->view('templates/header');
            $this->load->view('posts/edit', $data);
            $this->load->view('templates/footer');

        }
    }

    public function update()
    {
        $this->post_model->update_post();
        // Set Flash message
        $this->session->set_flashdata('post_deleted', 'Task have been updated');
        redirect('posts');
    }
}