<?php

class Admin extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('login_model');
    }

    function index() {
        $data['page_title'] = "Login Page";
        if ($this->session->userdata('admin_id') != "" && $this->session->userdata('admin_name') != "") {
            redirect('admin/dashboard', 'location');
        } else {
            $this->load->view('login', $data);
        }
    }

    function validuser() {
        if ($this->session->userdata('admin_id') != '' && $this->session->userdata('admin_name') != '') {
            //echo 'admin/dashboard';
            redirect('admin/login/logout');
        } else {
            $username = $this->input->post('username');
            $password = md5(md5($this->input->post('password')));
            $query = $this->login_model->validuser($username, $password);
            if ($query->num_rows() > 0) {
                $row = $query->row();
                $query->free_result();
                $userdata = array(
                    'admin_id' => $row->admin_id,
                    'admin_name' => $row->username,
                    'email' => $row->email,
                );
                $this->session->set_userdata($userdata);
                redirect("admin/dashboard");
            } else {
                $this->session->set_flashdata('error_message', 'Wrong username or password');
                redirect('admin/login');
            }
        }
    }

    function logout() {
        //$log_id = $this->session->userdata('log_id');
        //$this->general_db_model->update('userlog', $value['details'], array('logid' => $logid));
        $this->session->sess_destroy();
        //redirect(admin_url('admin'));
        redirect('admin/login');
    }

}

?>