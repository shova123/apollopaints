<?php

class Admin extends MX_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('color_model');
    }

    function sample_list($cat = null)
    {
        $data['page_title'] = "Sample List";
        $data['current'] = "4";
        $data['slug'] = $cat;
        $data['sample_details'] = $this->general_db_model->get_result("samples",'*',"sample_type = '$cat'");
        $this->template->load('template_admin', 'sample_list', $data);
        
    }

    function add_sample($cat = null)
    {
        $data['page_title'] = "Add New Sample";
        $data['function'] = "Add";
        $data['current'] = "4";
        $data['slug'] = $cat;
        if ($this->input->post('submit')) {
            $this->add_edit_sample('',$cat);
            die();

        }
        $this->template->load('template_admin', 'sample_form', $data);
    }

    function edit_sample($id = null,$cat = null,$slug = null)
    {

        $data['page_title'] = "Edit Sample";
        $data['function'] = "Edit";
        $data['current'] = "4";
        $data['slug'] = $cat;
        if ($this->input->post('submit')) {
            $this->add_edit_sample($id,$cat);
            die();
        }

        $data['sample_details'] = $this->general_db_model->get_row("samples", '*', 'sample_id =' . $id);
        $data['sample_images'] = $this->general_db_model->get_result("sample_images", '*', "sample = '$slug'");
        $this->template->load('template_admin', 'sample_form', $data);

    }

    function add_edit_sample($id = null,$cat=null)
    {
        $data['sample_type'] = $cat;
        $data['sample_title'] = $this->input->post('sample_title');
        $data['sample_slug'] = $slug = $this->input->post('sample_slug');
       //  $data['short_note'] = $this->input->post('short_note');
       // $data['featured'] = $this->input->post('featured'); 
         // $data['sample_description'] = $this->input->post('sample_description');
        // $data['html_title'] = $this->input->post('html_title');
        // $data['html_keyword'] = $this->input->post('html_keyword');
        // $data['html_description'] = $this->input->post('html_description');

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
        
        $sample_image = $this->input->post('sample_image');
        $sample_image = $this->input->post('fileList');
        if(!empty($sample_image)){
            $explode = explode(':',$sample_image);
            foreach($explode as $image){
                $post['sample_image'] = $image;
                $post['sample'] = $slug;
            // $data['sample_image'] = $sample_image;
                // if ($id) {
                    // $this->general_db_model->update('sample_images', $post, "sample =  '$slug'");
                    // $this->session->set_flashdata('display_message', 'Page successfully updated.');
                // } else {
                    $this->general_db_model->insert('sample_images', $post);
                    $this->session->set_flashdata('display_message', 'Page successfully added.');
                // }
            }
        }

        if ($id) {
            $this->general_db_model->update('samples', $data, 'sample_id=' . $id);
            $this->session->set_flashdata('display_message', 'Page successfully updated.');
        } else {
            $this->general_db_model->insert('samples', $data);
            $this->session->set_flashdata('display_message', 'Page successfully added.');
        }

        redirect("admin/color_visualizer/sample_list/$cat");

        //$this->template->load('template_admin','sample_form');
    }



    function delete_sample($id=null, $cat=null)
    {
        $sample_details = $this->general_db_model->delete("samples",'sample_id =' . $id);
        $this->session->set_flashdata('display_message', 'Deleted Successfully.');
        redirect("admin/color_visualizer/sample_list/$cat");
    }



    function delete_sample_image()
    {

        $img = $this->input->post('imgName');
        $imgpath = $this->config->item('uploads') . 'samples/' . $img; //echo $imgpath; exit;
        if (@file_exists($imgpath)) {
            unlink($imgpath);
            echo 'Image successfully deleted!';
        } else {
            echo 'File does not exist!';
        }
    }


    function update_sample_status() {
        $id = $this->input->get('id');
        $status = $this->input->get('status');
        if ($status == 'Publish')
            $data['status'] = 'Unpublish';
        else
            $data['status'] = 'Publish';
        $this->general_db_model->update('samples', $data, 'sample_id = '.$id);

        echo $data['status'];
    }


//=================================================COLOR CHOOSER========================================//

    function color_list($cat = null)
    {
        $data['page_title'] = "Color List";
        $data['current'] = "4";
        $data['slug'] = $cat;
        $data['color_details'] = $this->general_db_model->get_result("colors",'*',"color_type = '$cat'");
        $this->template->load('template_admin', 'color_list', $data);
        
    }

    function add_color($cat = null)
    {
        $data['page_title'] = "Add New Color";
        $data['function'] = "Add";
        $data['current'] = "4";
        $data['slug'] = $cat;
        if ($this->input->post('ColorSubmit')) {
            $this->add_edit_color('',$cat);
            die();

        }
        $this->template->load('template_admin', 'color_form', $data);
    }

    function edit_color($id = null,$cat = null,$slug = null)
    {

        $data['page_title'] = "Edit Color";
        $data['function'] = "Edit";
        $data['current'] = "4";
        $data['slug'] = $cat;
        if ($this->input->post('ColorSubmit')) {
            $this->add_edit_color($id,$cat);
            die();
        }

        $data['color_details'] = $this->general_db_model->get_row("colors", '*', 'color_id =' . $id);
        $this->template->load('template_admin', 'color_form', $data);

    }

    function add_edit_color($id = null,$cat=null)
    {
        $data['color_type'] = $cat;
        $data['color_code'] = $this->input->post('color_code');
        $data['order'] = $this->input->post('order');
        $data['status'] = $this->input->post('status');


        if ($id) {
            $this->general_db_model->update('colors', $data, 'color_id=' . $id);
            $this->session->set_flashdata('display_message', 'Page successfully updated.');
        } else {
            $this->general_db_model->insert('colors', $data);
            $this->session->set_flashdata('display_message', 'Page successfully added.');
        }

        redirect("admin/color_visualizer/color_list/$cat");

        //$this->template->load('template_admin','color_form');
    }



    function delete_color($id=null, $cat=null)
    {
        $color_details = $this->general_db_model->delete("colors",'color_id =' . $id);
        $this->session->set_flashdata('display_message', 'Deleted Successfully.');
        redirect("admin/color_visualizer/color_list/$cat");
    }



    function delete_color_image()
    {

        $img = $this->input->post('imgName');
        $imgpath = $this->config->item('uploads') . 'colors/' . $img; //echo $imgpath; exit;
        if (@file_exists($imgpath)) {
            unlink($imgpath);
            echo 'Image successfully deleted!';
        } else {
            echo 'File does not exist!';
        }
    }


    function update_color_status() {
        $id = $this->input->get('id');
        $status = $this->input->get('status');
        if ($status == 'Publish')
            $data['status'] = 'Unpublish';
        else
            $data['status'] = 'Publish';
        $this->general_db_model->update('colors', $data, 'color_id = '.$id);

        echo $data['status'];
    }

}
