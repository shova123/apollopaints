<?php

class Admin extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('dashboard_model');
    }

    public function index() {
        $data['page_title'] = 'Dashboard';
        $data['current'] = 1;
        if ($this->session->userdata('admin_id') != "" && $this->session->userdata('admin_name') != "") {
            $adminID = $this->session->userdata('admin_id');
            $data['admin_details'] = $this->dashboard_model->get_admins('admins', 'admin_id', $adminID);
            $this->template->load('template_admin', 'dashboard', $data);
        }else{
            redirect('admin/login');
        }



    }
}

?>