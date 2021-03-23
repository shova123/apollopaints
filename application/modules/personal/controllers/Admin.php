<?php

class Admin extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
    }

    function index() {
        $data['page_title'] = 'Site Settings';
        if ($this->input->post('submit_detail')) {
            //echo "<pre>";
            //print_r($_POST);die;
//			if($this->form_validation())
//			{
            $current_date = date("Y:m:d");
            $admin_name = $this->input->post('adminname');
            $username = $this->input->post('username');
            $old_password = $this->input->post('oldpassword');
            $new_password = $this->input->post('newpassword');
            $email = $this->input->post('email');
            // $message = $this->input->post('message');

            $updateArray['user_image'] = $this->input->post('user_image');
            $user_image = $this->input->post('fileList');


            $date = $current_date;
            if(!empty($admin_name)){
            $updateArray['admin_name'] = $admin_name;
            }
            if(!empty($username)){
            $updateArray['username'] = $username;
            }
            if(!empty($new_password)){
                $updateArray['password'] = md5(md5($new_password));
            }elseif(!empty($new_password)){
                $updateArray['password'] = $old_password;
            }
            if(!empty($email)){
            $updateArray['email'] = $email;
            }
            if(!empty($date)){
            $updateArray['date'] = $date;
            }
            // if(!empty($message)){
            // $updateArray['message'] = $message;
            // }
            if(!empty($user_image)){
            $updateArray['user_image'] = $user_image;
            }
//            $updateArray = array(
//                'admin_name' => $this->input->post('adminname'),
//                'username' => $this->input->post('username'),
//                'password' => md5(md5($this->input->post('password'))),
//                'email' => $this->input->post('email'),
//                'date' => $current_date
//            );
            //print_r($updateArray);die;
            $this->general_db_model->update('admins', $updateArray);
            //die($this->db->last_query());
            redirect('admin/personal');
//			}
        } else {
            $data['validation_error'] = true;
            $data['details'] = $this->general_db_model->get_row('admins', '*');
        }
        $data['current'] = 0;
        $data['prosub'] = 1;
        $data['editProsub'] = 1;
        $this->template->load('template_admin', 'personal_form', @$data);
    }

    function delete_image()
    {
            $img = $this->input->post('imgName');
            $imgpath = $this->config->item('uploads').'banners/'.$img;//echo $imgpath; exit;
            if(@file_exists($imgpath)){
                unlink($imgpath);
                echo 'Image successfully deleted!';
            }
            else
            {
                echo 'File does not exist!';
            }
    }

    function form_validation() {
        $this->form_validation->set_rules('fullname', 'Admin Name', 'trim|required');
        $this->form_validation->set_rules('username', 'User Name', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[confrompassword]');
        $this->form_validation->set_rules('confrompassword', 'Conform password', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        if ($this->form_validation->run() === false) {
            return false;
        } else {
            return true;
        }
    }

}

?>
