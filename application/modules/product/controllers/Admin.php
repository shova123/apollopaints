<?php

class Admin extends MX_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('product_model');
    }

    function product_list($cat = null)
    {
        if(!empty($cat)){
        $data['page_title'] = ucfirst($cat);
        $data['slug'] = $cat;
        $data['current'] = "3";
        $data['category_details'] = $this->general_db_model->get_result("product_category",'*',"product_link ='$cat'");
        $this->template->load('template_admin', 'category_list', $data);
        }else{
        $data['page_title'] = "Product List";
        $data['current'] = "2";
        $data['product_details'] = $this->general_db_model->get_result("product",'*');
        $this->template->load('template_admin', 'product_list', $data);
        }
    }

    function add_product($cat = null)
    {
        if(!empty($cat)){
        $data['page_title'] = "Add New Category";
        $data['function'] = "Add";
        $data['current'] = "3";
        $data['slug'] = $cat;
        if ($this->input->post('catSubmit')) {
            $this->add_edit_cat('',$cat);
            die();
        }
        $this->template->load('template_admin', 'category_form', $data);
        }else{
        $data['page_title'] = "Add New Product";
        $data['function'] = "Add";
        $data['current'] = "2";
        if ($this->input->post('submit')) {
            $this->add_edit_product();
            die();
        }
        $this->template->load('template_admin', 'product_form', $data);
        }
    }

    function edit_product($id = null,$cat = null)
     {
        if(!empty($cat)){
        $data['page_title'] = "Edit Category";
        $data['function'] = "Edit";
        $data['current'] = "3";
        $data['slug'] = $cat;
        if ($this->input->post('catsubmit')) {
            $this->add_edit_cat($id);
            die();
        }
        $data['cat_details'] = $this->general_db_model->get_row("product_category", '*', 'category_id =' . $id);

        $this->template->load('template_admin', 'category_form', $data);
        }else{
        $data['page_title'] = "Edit Product";
        $data['function'] = "Edit";
        $data['current'] = "2";
        if ($this->input->post('submit')) {
            $this->add_edit_product($id);
            die();
        }
        $data['product_details'] = $this->general_db_model->get_row("product", '*', 'product_id =' . $id);

        $this->template->load('template_admin', 'product_form', $data);
    }
    }

    function add_edit_product($id = null)
    {

        $data['product_title'] = $this->input->post('product_title');
        $data['product_slug'] = $this->input->post('product_slug');
       //  $data['short_note'] = $this->input->post('short_note');
       // $data['featured'] = $this->input->post('featured'); 
         $data['product_description'] = $this->input->post('product_description');
        $data['html_title'] = $this->input->post('html_title');
        $data['html_keyword'] = $this->input->post('html_keyword');
        $data['html_description'] = $this->input->post('html_description');

        //         $display_type = $this->input->post('display_type');
        // if (!empty($display_type)) {
        //     $display = '';
        //     foreach ($display_type as $disp) {
        //         $display = $display . $disp . ",";
        //     }
        //     $total_display = trim($display, ",");
        //     $data['display_type'] = $total_display;
        // }

        $data['order'] = $this->input->post('order');
        $data['status'] = $this->input->post('status');
        $data['product_image'] = $this->input->post('product_image');
        $product_image = $this->input->post('fileList');
        $data['product_image'] = $product_image;


        if ($id) {
            $this->general_db_model->update('product', $data, 'product_id=' . $id);
            $this->session->set_flashdata('display_message', 'Page successfully updated.');
        } else {
            $this->general_db_model->insert('product', $data);
            $this->session->set_flashdata('display_message', 'Page successfully added.');
        }

        redirect('admin/product');

        //$this->template->load('template_admin','product_form');
    }


    function add_edit_cat($id = null,$cat = null)
    {
        $data['product_link'] = $cat;
        $data['category_title'] = $this->input->post('category_title');
        $data['category_slug'] = $this->input->post('category_slug');
       //  $data['short_note'] = $this->input->post('short_note');
       // $data['featured'] = $this->input->post('featured'); 
         $data['category_description'] = $this->input->post('category_description');
        $data['html_title'] = $this->input->post('html_title');
        $data['html_keyword'] = $this->input->post('html_keyword');
        $data['html_description'] = $this->input->post('html_description');

        $data['order'] = $this->input->post('order');
        $data['status'] = $this->input->post('status');
        $data['category_image'] = $this->input->post('category_image');
        $category_image = $this->input->post('fileList');
        $data['category_image'] = $category_image;


        if ($id) {
            $this->general_db_model->update('product_category', $data, 'product_id=' . $id);
            $this->session->set_flashdata('display_message', 'Page successfully updated.');
        } else {
            $this->general_db_model->insert('product_category', $data);
            $this->session->set_flashdata('display_message', 'Page successfully added.');
        }

        redirect("admin/product/product_list/$cat");

        //$this->template->load('template_admin','product_form');
    }

    function delete_product($id)
    {
        $product_details = $this->general_db_model->delete("product",'product_id =' . $id);
        $this->session->set_flashdata('display_message', 'Deleted Successfully.');
        redirect("admin/product/product_list");
    }


        function delete_category($id = null,$cat = null)
    {
        $product_details = $this->general_db_model->delete("product_category",'category_id =' . $id);
        $this->session->set_flashdata('display_message', 'Deleted Successfully.');
        redirect("admin/product/product_list/$cat");
    }
    function delete_product_image()
    {

        $img = $this->input->post('imgName');
        $imgpath = $this->config->item('uploads') . 'product/' . $img; //echo $imgpath; exit;
        if (@file_exists($imgpath)) {
            unlink($imgpath);
            echo 'Image successfully deleted!';
        } else {
            echo 'File does not exist!';
        }
    }

    function delete_category_image()
    {

        $img = $this->input->post('imgName');
        $imgpath = $this->config->item('uploads') . 'category/' . $img; //echo $imgpath; exit;
        if (@file_exists($imgpath)) {
            unlink($imgpath);
            echo 'Image successfully deleted!';
        } else {
            echo 'File does not exist!';
        }
    }
    function update_product_status() {
        $id = $this->input->get('id');
        $status = $this->input->get('status');
        if ($status == 'Publish')
            $data['status'] = 'Unpublish';
        else
            $data['status'] = 'Publish';
        $this->general_db_model->update('product', $data, 'product_id = '.$id);

        echo $data['status'];
    }


    function update_category_status() {
        $id = $this->input->get('id');
        $status = $this->input->get('status');
        if ($status == 'Publish')
            $data['status'] = 'Unpublish';
        else
            $data['status'] = 'Publish';
        $this->general_db_model->update('product_category', $data, 'category_id = '.$id);

        echo $data['status'];
    }

}
