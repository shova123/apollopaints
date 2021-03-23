<?php

class Admin extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('page_model');
    }

     function page_list() {
        $data['page_title'] = 'Page List';
        $data['current'] = '';
        $data['page_details'] = $this->general_db_model->get_result("pages", '*');
        //$this->load->view('page_list', $data);
        $this->template->load('template_admin', 'page_list', $data);
    }

    function add_page() {

        $data['page_title'] = "Add New page";
        $data['function'] = "Add";
        $data['current'] = '';
        if ($this->input->post('submit')) {
            $this->add_edit_page();
            die();
        }
        //$this->load->view('page_list', $data);
        $this->template->load('template_admin', 'page_form', $data);
    }

    function edit_page($id = null, $type= null) {
        $data['page_title'] = "Edit page";
        $data['function'] = "Edit";
        $data['current'] = '';
        if ($this->input->post('submit')) {
            $this->add_edit_page($id);
            die();
        }
        $data['details'] = $sub_page = $this->general_db_model->get_row("pages", '*', 'page_id =' . $id);
        // if($type == 'subcontent'){
        // $page_type = $sub_page->sub_content_page;
        // $data["selectedPage"] = $this->general_db_model->get_row('pages','*',"page_type = '$page_type'");
        // }
        //$this->load->view('page_list', $data);
        $this->template->load('template_admin', 'page_form', $data);
    }

    function add_edit_page($id = null) {


        $data['page_title'] = $this->input->post('page_title');

        $data['page_type'] = $this->input->post('page_type');
        $data['sub_content_page'] = $this->input->post('sub_content_page');
        $data['html_title'] = $this->input->post('html_title');
        $data['html_keyword'] = $this->input->post('html_keyword');
        $data['html_description'] = $this->input->post('html_description');
        $data['page_slug'] = $this->input->post('page_slug');
        $data['content'] = $this->input->post('page_content');
        // $data['order'] = $this->input->post('order');
        $data['status'] = $this->input->post('status');
        // $data['home_image'] = $this->input->post('home_image');
        // $home_image = $this->input->post('fileList');
        // if ($home_image != '') {
        //     $data['home_image'] = $home_image;
        // }


        if ($id) {
            $this->general_db_model->update('pages', $data, 'page_id=' . $id);
            $this->session->set_flashdata('display_message', 'Page successfully updated.');
        } else {
            $this->general_db_model->insert('pages', $data);
            $this->session->set_flashdata('display_message', 'Page successfully added.');
        }

        redirect('admin/pages/page_list');

        //$this->template->load('template_admin','page_form');
    }

    function delete_page($id) {

        $this->general_db_model->delete('pages', 'page_id = ' . $id);
        $this->session->set_flashdata('display_message', 'Page successfully deleted.');
        redirect("admin/pages/page_list");
    }
        function delete_page_image(){

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
//////////////////////////////Contact Info//////////////////////////////////////////////

       function contact_list() {
        $data['page_title'] = 'Contact Info';
        $data['current'] = '';
        $data['contact_details'] = $this->general_db_model->get_result("contacts", '*');
        //$this->load->view('page_list', $data);
        $this->template->load('template_admin', 'contact_list', $data);
    }


    function edit_contact($id = null) {
        $data['page_title'] = "Edit contact";
        $data['function'] = "Edit";
        $data['current'] = '';
        if ($this->input->post('submit')) {
            $this->add_edit_contact($id);
            die();
        }
        $data['details'] = $this->general_db_model->get_row("contacts", '*', 'contact_id =' . $id);


        //$this->load->view('page_list', $data);
        $this->template->load('template_admin', 'contact_form', $data);
    }

    function add_edit_contact($id = null) {



        $data['company_name'] = $this->input->post('company_name');
        $data['google_map'] = $this->input->post('google_map');
        $data['working'] = $this->input->post('working');
        $data['email'] = $this->input->post('email');
        $data['contact_no_ph'] = $this->input->post('contact_no_ph');
        // $data['pri_address'] = $this->input->post('pri_address');
         $data['address'] = $this->input->post('address');
//        $page_image = $this->input->post('fileList');
//        $data['page_image'] = $page_image;


        if ($id) {
            $this->general_db_model->update('contacts', $data, 'contact_id=' . $id);
            $this->session->set_flashdata('display_message', 'Page successfully updated.');
        } else {
            $this->general_db_model->insert('contacts', $data);
            $this->session->set_flashdata('display_message', 'Page successfully Added.');
        }

        redirect('admin/pages/contact_list');

        //$this->template->load('template_admin','page_form');
    }

    function delete_contact($id) {

        $this->general_db_model->delete('contacts', 'contact_id = ' . $id);
        $this->session->set_flashdata('display_message', 'Page successfully Deleted.');
        redirect("admin/pages/contact_list");
    }

 


    //=============================================SLIDER IMAGES===============================================//



     function slide_list() {
        $data['page_title'] = 'slide List';
        $data['current'] = '';
        $data['slide_details'] = $this->general_db_model->get_result("slider", '*','status=1');
        //$this->load->view('course_list', $data);
        $this->template->load('template_admin', 'slide_list', $data);
    }

    function add_slide() {

        $data['page_title'] = "Add New course";
        $data['function'] = "Add";
        $data['current'] = '';
        if ($this->input->post('submit')) {
            $this->add_edit_slide();
            die();
        }
        //$this->load->view('course_list', $data);
        $this->template->load('template_admin', 'slide_form', $data);
    }

    function edit_slide($id = null) {
        $data['page_title'] = "Edit slide";
        $data['function'] = "Edit";
        $data['current'] = '';
        if ($this->input->post('submit')) {
            $this->add_edit_slide($id);
            die();
        }
        $data['details'] = $this->general_db_model->get_row("slider", '*', 'slide_id =' . $id);


        //$this->load->view('course_list', $data);
        $this->template->load('template_admin', 'slide_form', $data);
    }

    function add_edit_slide($id = null) {

        //$data['c_id'] = $this->input->post('courseId');
        $data['slide_title'] = $this->input->post('slide_title');
        $data['slide_description'] = $this->input->post('slide_description');

        $data['order'] = $this->input->post('order');
        $data['status'] = $this->input->post('status');


        $data['slide_img'] = $this->input->post('slide_img');//$_FILES["activity_img"]["fileList"];
        $course_image = $this->input->post('fileList');
        $data['slide_img'] = $course_image;


        if ($id) {
            $this->general_db_model->update('slider', $data, 'slide_id=' . $id);
            $this->session->set_flashdata('display_message', 'Page successfully updated.');
        } else {
            $this->general_db_model->insert('slider', $data);
            $this->session->set_flashdata('display_message', 'Page successfully Added.');
        }

        redirect('admin/pages/slide_list');

        //$this->template->load('template_admin','course_form');
    }

    function delete_slide($id) {

        $this->general_db_model->delete('slider', 'slide_id = ' . $id);
        $this->session->set_flashdata('display_message', 'Page successfully Deleted.');
        redirect("admin/pages/slide_list");
    }


    function delete_slide_image(){

        $img = $this->input->post('imgName');
        $imgpath = $this->config->item('uploads').'slide/'.$img;//echo $imgpath; exit;
        if(@file_exists($imgpath)){
            unlink($imgpath);
            echo 'Image successfully deleted!';
        }
        else
        {
            echo 'File does not exist!';
        }
    }


    //=======================================client List=================================================================//


function client_list() {
    $data['page_title'] = 'client List';
    $data['current'] = '';
    $data['client_details'] = $this->general_db_model->get_result("client", '*',"status='1'");
        //$this->load->view('course_list', $data);
    $this->template->load('template_admin', 'client_list', $data);
}

function add_client() {

    $data['page_title'] = "Add New course";
    $data['function'] = "Add";
    $data['current'] = '';
    if ($this->input->post('submit')) {
        $this->add_edit_client();
        die();
    }
        //$this->load->view('course_list', $data);
    $this->template->load('template_admin', 'client_form', $data);
}

function edit_client($id = null) {
    $data['page_title'] = "Edit client";
    $data['function'] = "Edit";
    $data['current'] = '';
    if ($this->input->post('submit')) {
        $this->add_edit_client($id);
        die();
    }
    $data['details'] = $this->general_db_model->get_row("client", '*', 'client_id =' . $id);


        //$this->load->view('course_list', $data);
    $this->template->load('template_admin', 'client_form', $data);
}

function add_edit_client($id = null) {


    $data['client_name'] = $this->input->post('client_name');


    $data['order'] = $this->input->post('order');
    $data['status'] = $this->input->post('status');


        $data['client_image'] = $this->input->post('client_image');//$_FILES["activity_img"]["fileList"];
        $course_image = $this->input->post('fileList');
        $data['client_image'] = $course_image;

        $display_type = $this->input->post('display_type');
        $display = '';
        foreach($display_type as $disp){
            $display = $display.$disp.",";
        }
        $total_display =  trim($display,",");
        $data['display_type'] = $total_display;


        if ($id) {
            $this->general_db_model->update('client', $data, 'client_id=' . $id);
            $this->session->set_flashdata('display_message', 'Page successfully updated.');
        } else {
            $this->general_db_model->insert('client', $data);
            $this->session->set_flashdata('display_message', 'Page successfully Added.');
        }

        redirect('admin/pages/client_list');

        //$this->template->load('template_admin','course_form');
    }

    function delete_client($id) {

        $this->general_db_model->delete('client', 'client_id = ' . $id);
        $this->session->set_flashdata('display_message', 'Page successfully Deleted.');
        redirect("admin/pages/client_list");
    }


    function delete_client_image(){

        $img = $this->input->post('imgName');
        $imgpath = $this->config->item('uploads').'client/'.$img;//echo $imgpath; exit;
        if(@file_exists($imgpath)){
            unlink($imgpath);
            echo 'Image successfully deleted!';
        }
        else
        {
            echo 'File does not exist!';
        }
    }

    //==================================================QUICK LINKS================================================

  function quick_links() {
        $data['page_title'] = 'Link List';
        $data['current'] = '';
        $data['page_details'] = $this->general_db_model->get_result("links", '*');
                //$this->load->view('page_list', $data);
        $this->template->load('template_admin', 'link_list', $data);
    }

    function add_link() {

        $data['page_title'] = "Add New Link";
        $data['function'] = "Add";
        $data['current'] = '';
        if ($this->input->post('linkSubmit')) {
            $this->add_edit_link();
            die();
        }
        //$this->load->view('page_list', $data);
        $this->template->load('template_admin', 'link_form', $data);
    }

    function edit_link($id = null) {
        $data['page_title'] = "Edit Link";
        $data['function'] = "Edit";
        $data['current'] = '';
        if ($this->input->post('linkSubmit')) {
            $this->add_edit_link($id);
            die();
        }
        $data['details'] = $this->general_db_model->get_row("links", '*',"link_id = '$id'");


        //$this->load->view('page_list', $data);
        $this->template->load('template_admin', 'link_form', $data);
    }

    function add_edit_link($id = null) {


        $data['link_title'] = $this->input->post('link_title');
        $data['link_slug'] = $this->input->post('link_slug');
        $data['link'] = $this->input->post('link');
        $data['order'] = $this->input->post('order');
        $data['status'] = $this->input->post('status');

       


        if ($id) {
            $this->general_db_model->update('links', $data, 'link_id=' . $id);
            $this->session->set_flashdata('display_message', 'Page successfully updated.');
        } else {
            $this->general_db_model->insert('links', $data);
            $this->session->set_flashdata('display_message', 'Page successfully Added.');
        }

        redirect("admin/pages/quick_links");

        //$this->template->load('template_admin','page_form');
    }

    function delete_link($id) {

        $this->general_db_model->delete('links', 'link_id = ' . $id);
        $this->session->set_flashdata('display_message', 'Page successfully Deleted.');
        redirect("admin/pages/quick_links");
    }
    #========================================FAQ================================================




    function faq_list() {
        $data['page_title'] = 'FAQ List';
        $data['current'] = '';
        $data['page_details'] = $this->general_db_model->get_result("faq", '*',"status='1'");
        //$this->load->view('page_list', $data);
        $this->template->load('template_admin', 'faq_list', $data);
    }

    function add_faq() {

        $data['page_title'] = "Add New FAQ";
        $data['function'] = "Add";
        $data['current'] = '';
        if ($this->input->post('submit')) {
            $this->add_edit_faq();
            die();
        }
        //$this->load->view('page_list', $data);
        $this->template->load('template_admin', 'faq_form', $data);
    }

    function edit_faq($id = null) {
        $data['page_title'] = "Edit FAQ";
        $data['function'] = "Edit";
        $data['current'] = '';
        if ($this->input->post('submit')) {
            $this->add_edit_faq($id);
            die();
        }
        $data['details'] = $this->general_db_model->get_row("faq", '*', 'faq_id =' . $id);


        //$this->load->view('page_list', $data);
        $this->template->load('template_admin', 'faq_form', $data);
    }

    function add_edit_faq($id = null) {



        $data['faq_title'] = $this->input->post('faq_title');

        $data['faq_description'] = $this->input->post('faq_description');

        $data['order'] = $this->input->post('order');
        $data['status'] = $this->input->post('status');


//        $page_image = $this->input->post('fileList');
//        $data['page_image'] = $page_image;


        if ($id) {
            $this->general_db_model->update('faq', $data, 'faq_id=' . $id);
            $this->session->set_flashdata('display_message', 'Page successfully updated.');
        } else {
            $this->general_db_model->insert('faq', $data);
            $this->session->set_flashdata('display_message', 'Page successfully Added.');
        }

        redirect("admin/pages/faq_list");

        //$this->template->load('template_admin','page_form');
    }

    function delete_faq($id) {

        $this->general_db_model->delete('faq', 'faq_id = ' . $id);
        $this->session->set_flashdata('display_message', 'Page successfully Deleted.');
        redirect("admin/pages/faq_list");
    }

//=============================Social LInks Start=================================================              

    function social_links()
    {
        $data['page_title'] = 'Social Links';
        $data['links_title'] = 'Social Link manage';        
        $data['links'] = $this->general_db_model->get_result('social_links',"*");          
        $data['current'] = '';

        $this->template->load('template_admin','social_list',$data);
    }


    function edit_social($id=null)
    {
        $data['current'] = '';
        if($this->input->post('submitLinks'))
        {
            $this->add_edit($id);
            die();
        }
        $data['details'] = $this->general_db_model->get_row('social_links','*', "id=".$id);  
        //print_r($data['details']);
        $data['links_title'] = 'Edit Social Links';
        $data['current'] = '';
        $this->template->load('template_admin','social_form', $data);
    }

    function add_edit($id=NULL)
    {
        $data['link_title'] = $this->input->post('link_title');

        $data['page_slug'] = $this->input->post('page_slug');
        $data['http_links'] = $this->input->post('http_links');
        $data['status'] = $this->input->post('status');

        if($id)
        {
            $this->general_db_model->update('social_links', $data, 'id = '.$id);
            $this->session->set_flashdata('display_message', 'Links successfully updated.');
        }
        else
        {
            $this->general_db_model->insert('social_links', $data);
            $this->session->set_flashdata('display_message', 'Links successfully added.');
        }       
        redirect('admin/pages/social_links');
    }

    function delete($id)
    {
        $this->general_db_model->delete('social_links', 'id = '.$id);
        $this->session->set_flashdata('display_message', 'Link successfully deleted.');
        redirect('admin/pages/social_links');
    }



        //===============================GALLERY IMAGES=================================

    function gallery_list(){
        $data['page_title'] = "Color Palace";
        $data['current'] = '';
        $data['gallery_details'] = $this->general_db_model->get_result("gallery", '*');
        //$this->load->view('gallery_list', $data);
        $this->template->load('template_admin','gallery_list',$data);
    }

    function add_gallery(){

        $data['page_title'] = "Add New Image";
        $data['function'] = "Add";
        $data['current'] = '';
        if($this->input->post('submit')){
            $this->add_edit_gallery();
            die();
        }
         //$this->load->view('gallery_list', $data);
        $this->template->load('template_admin','gallery_form',$data);
    }

    function edit_gallery($id=null){
        $data['page_title'] = "Edit Image";
        $data['function'] = "Edit";
        $data['current'] = '';
        if($this->input->post('submit')){
            $this->add_edit_gallery($id);
            die();
        }
        $data['gallery_lists'] = $this->general_db_model->get_row("gallery",'*','image_id ='.$id);

        
        //$this->load->view('gallery_list', $data);
        $this->template->load('template_admin','gallery_form',$data);
    }

    function add_edit_gallery($id=null){

            //$data['c_id'] = $this->input->post('galleryId');
        $data['image_title'] = $this->input->post('image_title');
        $data['description'] = $this->input->post('description');
        $data['order'] = $this->input->post('order');
        $data['status'] = $this->input->post('status');
        $data['image_name'] = $this->input->post('image_name');
        $gallery_image = $this->input->post('fileList');
        $data['image_name'] = $gallery_image;

        if($id){
            $this->general_db_model->update('gallery',$data,'image_id='.$id);
            $this->session->set_flashdata('display_message', 'Page successfully updated.');

        }else{
         $this->general_db_model->insert('gallery',$data);
         $this->session->set_flashdata('display_message', 'Page successfully Added.');


     }

     redirect('admin/pages/gallery_list');

        //$this->template->load('template_admin','gallery_form');
 }

 function delete_gallery($id){

    $this->general_db_model->delete('gallery', 'image_id = '.$id);               
    $this->session->set_flashdata('display_message', 'Page successfully Deleted.');    
    redirect("admin/pages/gallery_list");
}

function delete_gallery_image(){

    $img = $this->input->post('imgName');
            $imgpath = $this->config->item('uploads').'gallery/'.$img;//echo $imgpath; exit;
            if(@file_exists($imgpath)){
                unlink($imgpath);
                echo 'Image successfully deleted!';
            }
            else
            {
                echo 'File does not exist!';
            }
        }
            function update_gallery_status() {
        $id = $this->input->get('id');
        $status = $this->input->get('status');
        if ($status == 'Publish')
            $data['status'] = 'Unpublish';
        else
            $data['status'] = 'Publish';
        $this->general_db_model->update('gallery', $data, 'image_id = '.$id);

        echo $data['status'];
    }

    //==================================Travel INFORMATION==============================
        function travel_info() {
            $data['page_title'] = 'Travel Information';
            $data['pages'] = $this->page_model->get_Allpage('travel_info', 'status', 'Publish', 'link', 'info');

            $data['current'] = 10;
            $data['link'] = "info";
            $this->template->load('template_admin', 'travel_list', $data);
        }

        function travel_info_add() {
            if ($this->input->post('submitDetail')) {

                $this->travel_info_add_edit();
                die();
            }
            $data['current'] = 10;
            $data['link'] = "info";
            $data['page_title'] = 'Add Travel Information';
            $this->template->load('template_admin', 'travel_form', @$data);
        }

        function travel_info_edit($id) {
            if ($this->input->post('submitDetail')) {
                $this->travel_info_add_edit($id);
                die();
            }
        // $data['countryList'] = $this->general_db_model->get_row("country","*");
            $data['details'] = $this->general_db_model->getById('travel_info', 'id', $id);
            $data['current'] = 10;
            $data['link'] = "info";
            $data['page_title'] = 'Edit Travel Information';
            $this->template->load('template_admin', 'travel_form', @$data);
        }

        function travel_info_add_edit($id = NULL) {
            $not = array('submitDetail', 'fileList');

            $data = $this->mylibrary->get_post_array($not);
            $home_image = $this->input->post('fileList');
            $data['home_image'] = $home_image;
        //dumparray($data);
            if ($id) {
                $this->general_db_model->update('travel_info', $data, 'id = ' . $id);
                $this->session->set_flashdata('display_message', 'Page successfully updated.');
            } else {
                $this->general_db_model->insert('travel_info', $data);
                $this->session->set_flashdata('display_message', 'Page successfully added.');
            }
            redirect('admin/pages/travel_info');
        }

        function travel_news() {
            $data['page_title'] = 'Travel News/Events';
            $data['pages'] = $this->page_model->get_Allpage('travel_info', 'status', 'Publish', 'link', 'news');

            $data['current'] = 10;
            $data['link'] = "news";
            $this->template->load('template_admin', 'travel_list', $data);
        }

        function travel_news_add() {
            if ($this->input->post('submitDetail')) {

                $this->travel_news_add_edit();
                die();
            }
            $data['current'] = 10;
            $data['link'] = "news";
            $data['page_title'] = 'Add Travel News/Events';
            $this->template->load('template_admin', 'travel_form', @$data);
        }

        function travel_news_edit($id) {
            if ($this->input->post('submitDetail')) {
                $this->travel_news_add_edit($id);
                die();
            }
            $data['details'] = $this->general_db_model->getById('travel_info', 'id', $id);
            $data['current'] = 10;
            $data['link'] = "news";
            $data['page_title'] = 'Edit Travel News/Events';
            $this->template->load('template_admin', 'travel_form', @$data);
        }

        function travel_news_add_edit($id = NULL) {
            $not = array('submitDetail', 'fileList');

            $data = $this->mylibrary->get_post_array($not);
            $home_image = $this->input->post('fileList');
            $data['home_image'] = $home_image;
        //dumparray($data);
            if ($id) {
                $this->general_db_model->update('travel_info', $data, 'id = ' . $id);
                $this->session->set_flashdata('display_message', 'Page successfully updated.');
            } else {
                $this->general_db_model->insert('travel_info', $data);
                $this->session->set_flashdata('display_message', 'Page successfully added.');
            }
            redirect('admin/pages/travel_news');
        }

        function travel_info_delete($id) {
            $this->general_db_model->delete('travel_info', 'id = ' . $id);
            $this->session->set_flashdata('display_message', 'Page successfully deleted.');
            redirect(admin_url('pages/travel_info'));
        }

        function travel_info_delete_image() {
            $img = $this->input->post('imgName');
        $imgpath = $this->config->item('uploads') . 'travel_info/' . $img; //echo $imgpath; exit;
        if (@file_exists($imgpath)) {
            unlink($imgpath);
            echo 'Image successfully deleted!';
        } else {
            echo 'File does not exist!';
        }
    }

    //=======================================ABOUT DROPDOWN=====================

    function about_dropdown() {
        $data['page_title'] = 'About Dropdown Category';
        //echo $query=$this->db->last_query(); exit;
        $data['dropdown_list'] = $this->page_model->get_category("about_dropdown");

        $data['current'] = 8;
        $data['dropsub'] = 1;
        $this->template->load('template_admin', 'about_dropdown_list', $data);
    }

    function about_dropdown_add() {
        if ($this->input->post('submitDetail')) {

            $this->add_edit_about_dropdown();
            die();
        }

        $data['page_title'] = 'Add Category';

        $data['current'] = 8;
        $data['dropsub'] = 1;
        $this->template->load('template_admin', 'about_dropdown_form', @$data);
    }

    function about_dropdown_edit($id) {
        if ($this->input->post('submitDetail')) {
            $this->add_edit_about_dropdown($id);
            die();
        }
        $data['details'] = $this->general_db_model->getById('about_dropdown', 'id', $id);
        //print_r($data['details']);
        $data['page_title'] = "Edit Category";
        $data['current'] = 8;
        $data['dropsub'] = 1;
        $this->template->load('template_admin', 'about_dropdown_form', @$data);
    }

    function add_edit_about_dropdown($id = NULL) {
        //          $not = array('submitDetail','fileList');
        //          $data = $this->mylibrary->get_post_array($not);

        $data['link'] = $this->input->post('link');
        $data['dropdown_title'] = $this->input->post('dropdown_title');
        //$data['sub_menu_type']= $this->input->post('sub_menu_type');
        $data['dropdown_slug'] = $this->input->post('dropdown_slug');

        $data['html_title'] = $this->input->post('html_title');
        $data['html_keyword'] = $this->input->post('html_keyword');
        $data['html_describe'] = $this->input->post('html_describe');

        $data['dropdown_description'] = $this->input->post('dropdown_description');
        $data['order'] = $this->input->post('order');
        $data['status'] = $this->input->post('status');
        $data['home_image'] = $this->input->post('home_image');

        $home_image = $this->input->post('fileList');

        $data['home_image'] = $home_image;

        //$redirectName = $this->input->post('redirectName');
        //dumparray($data);
        if ($id) {
            $this->general_db_model->update('about_dropdown', $data, 'id = ' . $id);
            $this->session->set_flashdata('display_message', 'Page successfully updated.');
        } else {
            $this->general_db_model->insert('about_dropdown', $data);
            $this->session->set_flashdata('display_message', 'Page successfully added.');
        }
        redirect("admin/pages/about_dropdown");
        // $this->template->load('template_admin','about_form', @$data);
    }

    function about_dropdown_delete($id, $link) {
        if ($link = 'content') {
            $this->general_db_model->delete('about_dropdown', 'id = ' . $id);
        }
        if ($link = 'portfolio') {
            $this->general_db_model->delete('about_dropdown', 'id = ' . $id);
            $this->general_db_model->delete('our_team', 'dropdown_id = ' . $id);
        }

        //                        $this->general_db_model->delete('region', 'category_id = '.$id);
        //                        $this->general_db_model->delete('package', 'category_id = '.$id);
        $this->session->set_flashdata('display_message', 'Dropdown successfully deleted.');
        redirect("admin/pages/about_dropdown");
    }

    function delete_about_dropdown_image() {

        $img = $this->input->post('imgName');
        $imgpath = $this->config->item('uploads') . 'banners/' . $img; //echo $imgpath; exit;
        if (@file_exists($imgpath)) {
            unlink($imgpath);
            echo 'Image successfully deleted!';
        } else {
            echo 'File does not exist!';
        }
    }
//=======================================UPdated OUR TEAM===============================
    function our_team() {
        $data['page_title'] = 'Our Team Management';
        $data['our_team'] = $this->page_model->get_category("our_team", "link", "portfolio");

        $data['current'] = 8;
        $data['dropsub'] = 2;
        $this->template->load('template_admin', 'our_team_list', $data);
    }

    function our_team_add() {
        if ($this->input->post('submitDetail')) {

            $this->add_edit_our_team();
            die();
        }

        $data['page_title'] = 'Add Category';
        $data['link'] = "portfolio";
        $data['current'] = 8;
        $data['dropsub'] = 2;
        $data['dropdown_list'] = $this->page_model->get_category("about_dropdown", "link", "portfolio");
        $this->template->load('template_admin', 'our_team_form', @$data);
    }

    function our_team_edit($id) {
        if ($this->input->post('submitDetail')) {
            $this->add_edit_our_team($id);
            die();
        }
        $data['details'] = $this->general_db_model->getById('our_team', 'id', $id);
        $data['dropdown_list'] = $this->page_model->get_category("about_dropdown", "link", "portfolio");
        $data['page_title'] = "Edit Category";
        $data['current'] = 8;
        $data['dropsub'] = 2;
        $this->template->load('template_admin', 'our_team_form', @$data);
    }

    function add_edit_our_team($id = NULL) {
//          $not = array('submitDetail','fileList');
//          $data = $this->mylibrary->get_post_array($not);

        $data['link'] = "portfolio";

        $data['dropdown_id'] = $this->input->post('dropdown_id');
        $data['name'] = $this->input->post('name');
        $data['designation'] = $this->input->post('designation');
        $data['email'] = $this->input->post('email');
        $data['phone'] = $this->input->post('phone');
        //$data['html_describe'] = $this->input->post('html_describe');
        $data['contents'] = $this->input->post('contents');
        $data['order'] = $this->input->post('order');
        $data['status'] = $this->input->post('status');
        $data['home_image'] = $this->input->post('home_image');

        $home_image = $this->input->post('fileList');

        $data['home_image'] = $home_image;

        //$redirectName = $this->input->post('redirectName');
        //dumparray($data);
        if ($id) {
            $this->general_db_model->update('our_team', $data, 'id = ' . $id);
            $this->session->set_flashdata('display_message', 'Page successfully updated.');
        } else {
            $this->general_db_model->insert('our_team', $data);
            $this->session->set_flashdata('display_message', 'Page successfully added.');
        }
        redirect("admin/pages/our_team");
        // $this->template->load('template_admin','about_form', @$data);
    }

    function our_team_delete($id) {
        $this->general_db_model->delete('our_team', 'id = ' . $id);
//                        $this->general_db_model->delete('region', 'category_id = '.$id);
//                        $this->general_db_model->delete('package', 'category_id = '.$id);
        $this->session->set_flashdata('display_message', 'Category successfully deleted.');
        redirect("admin/pages/our_team");
    }

    function delete_our_team_image() {
        $img = $this->input->post('imgName');
        $imgpath = $this->config->item('uploads') . 'our_team/' . $img; //echo $imgpath; exit;
        if (@file_exists($imgpath)) {
            unlink($imgpath);
            echo 'Image successfully deleted!';
        } else {
            echo 'File does not exist!';
        }
    }  


    //============================REVIEW====================================

    function review_list() {
        $data['page_title'] = 'Review List';
        $data['current'] = '';
        $data['page_details'] = $this->general_db_model->get_result("review", '*');
        //$this->load->view('page_list', $data);
        $this->template->load('template_admin', 'review_list', $data);
    }

    function add_review() {

        $data['page_title'] = "Add New review";
        $data['function'] = "Add";
        $data['current'] = '';
        if ($this->input->post('submit')) {
            $this->add_edit_review();
            die();
        }
        $data['activity_details'] = $this->general_db_model->get_WhereNotIn("activity",'display_type','special');
        $data['packageList'] = $this->page_model->get_package('package');
        //$this->load->view('page_list', $data);
        $this->template->load('template_admin', 'review_form', $data);
    }

    function edit_review($id = null) {
        $data['page_title'] = "Edit review";
        $data['function'] = "Edit";
        $data['current'] = '';
        if ($this->input->post('submit')) {
            $this->add_edit_review($id);
            die();
        }
        $data['details'] = $reviewDetails = $this->general_db_model->get_row("review", '*', 'review_id =' . $id);
        $parentPackageActId = $reviewDetails->activity_id;
        $data['page_details'] = $this->general_db_model->get_result("review", '*');

        $data['packageList'] = $this->page_model->get_package('package','activity_id',$parentPackageActId);
        $data['activity_details'] = $this->page_model->get_withoutLike('activity');
        //$this->load->view('page_list', $data);
        $this->template->load('template_admin', 'review_form', $data);
    }

    function add_edit_review($id = null) {

        $data['activity_id'] = $this->input->post('activity_id');
        $data['package_id'] = $this->input->post('package_id');
        $data['review_title'] = $this->input->post('review_title');
        $data['rating'] = $this->input->post('rating');
        $data['review_content'] = $this->input->post('review_content');
        $data['name'] = $this->input->post('name');
        $data['nationality'] = $this->input->post('nationality');
        $display_type = $this->input->post('display_type');
        if(!empty($display_type)){                   
            $display = '';
            foreach($display_type as $disp){
                $display = $display.$disp.",";
            }
            $total_display =  trim($display,",");
            $data['display_type'] = $total_display;
        }
       //  $data['html_title'] = $this->input->post('html_title');
       //  $data['html_keyword'] = $this->input->post('html_keyword');
       //  $data['html_description'] = $this->input->post('html_description');
       //  $data['page_slug'] = $this->input->post('page_slug');
       //  $data['content'] = $this->input->post('page_content');
        $data['order'] = $this->input->post('order');
        $data['status'] = $this->input->post('status');

       //  $data['image'] = $this->input->post('image');
       // $page_image = $this->input->post('fileList');
       // $data['image'] = $page_image;


        if ($id) {
            $this->general_db_model->update('review', $data, 'review_id=' . $id);
            $this->session->set_flashdata('display_message', 'Page successfully updated.');
        } else {
            $this->general_db_model->insert('review', $data);
            $this->session->set_flashdata('display_message', 'Page successfully Added.');
        }

        redirect('admin/pages/review_list');

        //$this->template->load('template_admin','page_form');
    }

    function delete_review($id) {

        $this->general_db_model->delete('review', 'review_id = ' . $id);
        $this->session->set_flashdata('display_message', 'Page successfully Deleted.');
        redirect("admin/pages/review_list");
    }
    
        //===================================VIDEO GALLERY======================================


    function video() {
        $data['current'] =''; 
        $data['videoDetails'] = $this->general_db_model->get_result('video');
        //print_r($data['details']);
        $data['page_title'] = 'Video Highlights';
        $this->template->load('template_admin','video_list', $data);
    }
    
    function add_video() {

        $data['page_title'] = "Add New video";
        $data['function'] = "Add";
        $data['current'] = '';
        if ($this->input->post('videoSubmit')) {
            $this->add_editVideo();
            die();
        }
        
        $this->template->load('template_admin', 'video_form', $data);
    }

    function edit_video($id = null) {
        $data['page_title'] = "Edit video";
        $data['function'] = "Edit";
        $data['current'] = '';
        if ($this->input->post('videoSubmit')) {
            $this->add_editVideo($id);
            die();
        }
        $data['videoDetails'] = $this->general_db_model->get_row("video", '*', 'id =' . $id);
        $this->template->load('template_admin', 'video_form', $data);
    }

    function add_editVideo($id=null) {

        $post['title'] =  $this->input->post('title');
        $post['status'] =  $this->input->post('status');

        $video_link = $this->input->post('video_link'); //cleint upload http://www.youtube.com/watch?v=abhBw-IBLJo
        if (!empty($video_link)) {
            if (strpos($video_link, 'watch')) {
                    $video = explode('?', $video_link); //explode after ? $video[0] = http://www.youtube.com/watch $video[1]=   v=abhBw-IBLJo
                    $string = $video[1]; //$video[1]=   v=abhBw-IBLJo
                    $strlength = strlen($string); //finding $video[1] length
                    $video_id = substr($string, 2, $strlength); // cutting main name from v=abhBw-IBLJo  to  abhBw-IBLJo
                    $post['video_id'] = $video_id;
                    $post['video_link'] = "www.youtube.com/embed/$video_id?feature=player_detailpage";
                }
                if (strpos($video_link, 'embed')) {
                    $videoEmbed = explode('/', $video_link); //explode after / $video[0] = http://www.youtube.com/watch $video[1]=   v=abhBw-IBLJo
                    $beforeVideoID = $videoEmbed[2];
                    $videoEmbedAfter = explode('?', $beforeVideoID);
                    $video_id = $videoEmbedAfter[0];
                    $post['video_id'] = $video_id;
                    $post['video_link'] = $video_link; 
                }
            }
            
        //dumparray($post);
            if ($id) {
                $this->general_db_model->update('video', $post, 'id = ' . $id);
                $this->session->set_flashdata('display_message', 'Page successfully updated.');
            } else {
                $this->general_db_model->insert('video', $post);
                $this->session->set_flashdata('display_message', 'Page successfully Added.');
            }

            redirect('admin/pages/video');
        }
        function delete_video($id=null) {

            $this->general_db_model->delete('video', 'id = ' . $id);
            $this->session->set_flashdata('display_message', 'Page successfully Deleted.');
            redirect("admin/pages/video");
        }

               //=======================================Partner List=================================================================//


        function partner_list() {
            $data['page_title'] = 'Partner List';
            $data['current'] = '';
            $data['partner_details'] = $this->general_db_model->get_result("partner",'*');
        //$this->load->view('course_list', $data);
            $this->template->load('template_admin', 'partner_list', $data);
        }

        function add_partner() {

            $data['page_title'] = "Add New Partner";
            $data['function'] = "Add";
            $data['current'] = '';
            if ($this->input->post('PartnerSubmit')) {
                $this->add_edit_partner();
                die();
            }
        //$this->load->view('course_list', $data);
            $this->template->load('template_admin', 'partner_form', $data);
        }

        function edit_partner($id = null) {
            $data['page_title'] = "Edit Partner";
            $data['function'] = "Edit";
            $data['current'] = '';
            if ($this->input->post('PartnerSubmit')) {
                $this->add_edit_partner($id);
                die();
            }
            $data['details'] = $this->general_db_model->get_row("partner", '*', 'partner_id =' . $id);


        //$this->load->view('course_list', $data);
            $this->template->load('template_admin', 'partner_form', $data);
        }

        function add_edit_partner($id = null) {


            $data['partner_title'] = $this->input->post('partner_name');



            $data['status'] = $this->input->post('status');
            $data['partner_link'] = $this->input->post('partner_link');

        $data['partner_image'] = $this->input->post('partner_image');//$_FILES["activity_img"]["fileList"];
        $course_image = $this->input->post('fileList');
        $data['partner_image'] = $course_image;



        if ($id) {
            $this->general_db_model->update('partner', $data, 'partner_id = ' . $id);
            $this->session->set_flashdata('display_message', 'Page successfully updated.');
        } else {
            $this->general_db_model->insert('partner', $data);
            $this->session->set_flashdata('display_message', 'Page successfully Added.');
        }

        redirect('admin/pages/partner_list');

        //$this->template->load('template','course_form');
    }

    function delete_partner($id) {

        $this->general_db_model->delete('partner', 'partner_id = ' . $id);
        $this->session->set_flashdata('display_message', 'Page successfully Deleted.');
        redirect("admin/pages/partner_list");
    }


    function delete_partner_image(){

        $img = $this->input->post('imgName');
        $imgpath = $this->config->item('uploads').'partner/'.$img;//echo $imgpath; exit;
        if(@file_exists($imgpath)){
            unlink($imgpath);
            echo 'Image successfully deleted!';
        }
        else
        {
            echo 'File does not exist!';
        }
    }
                   //=======================================Affilation List=================================================================//


    function affiliation() {
        $data['page_title'] = 'Affiliation List';
        $data['current'] = '';
        $data['affiliation_details'] = $this->general_db_model->get_result("affiliation",'*');
        //$this->load->view('course_list', $data);
        $this->template->load('template_admin', 'affiliation_list', $data);
    }

    function add_affiliation() {

        $data['page_title'] = "Add New Affiliation";
        $data['function'] = "Add";
        $data['current'] = '';
        if ($this->input->post('AffiliationSubmit')) {
            $this->add_edit_affiliation();
            die();
        }
        //$this->load->view('course_list', $data);
        $this->template->load('template_admin', 'affiliation_form', $data);
    }

    function edit_affiliation($id = null) {
        $data['page_title'] = "Edit Affiliation";
        $data['function'] = "Edit";
        $data['current'] = '';
        if ($this->input->post('AffiliationSubmit')) {
            $this->add_edit_affiliation($id);
            die();
        }
        $data['details'] = $this->general_db_model->get_row("affiliation", '*', 'affiliation_id =' . $id);


        //$this->load->view('course_list', $data);
        $this->template->load('template_admin', 'affiliation_form', $data);
    }

    function add_edit_affiliation($id = null) {


        $data['affiliation_title'] = $this->input->post('affiliation_name');



        $data['status'] = $this->input->post('status');
        $data['affiliation_link'] = $this->input->post('affiliation_link');

        $data['affiliation_image'] = $this->input->post('affiliation_image');//$_FILES["activity_img"]["fileList"];
        $course_image = $this->input->post('fileList');
        $data['affiliation_image'] = $course_image;



        if ($id) {
            $this->general_db_model->update('affiliation', $data, 'affiliation_id = ' . $id);
            $this->session->set_flashdata('display_message', 'Page successfully updated.');
        } else {
            $this->general_db_model->insert('affiliation', $data);
            $this->session->set_flashdata('display_message', 'Page successfully Added.');
        }

        redirect('admin/pages/affiliation');

        //$this->template->load('template','course_form');
    }

    function delete_affiliation($id) {

        $this->general_db_model->delete('affiliation', 'affiliation_id = ' . $id);
        $this->session->set_flashdata('display_message', 'Page successfully Deleted.');
        redirect("admin/pages/affiliation");
    }


    function delete_affiliation_image(){

        $img = $this->input->post('imgName');
        $imgpath = $this->config->item('uploads').'affiliation/'.$img;//echo $imgpath; exit;
        if(@file_exists($imgpath)){
            unlink($imgpath);
            echo 'Image successfully deleted!';
        }
        else
        {
            echo 'File does not exist!';
        }
    }
    //============================Blog====================================

    function blog_list() {
        $data['page_title'] = 'Blog List';
        $data['current'] = '';
        $data['page_details'] = $this->general_db_model->get_result("blog", '*');
        //$this->load->view('page_list', $data);
        $this->template->load('template_admin', 'blog_list', $data);
    }

    function add_blog() {

        $data['page_title'] = "Add New Blog";
        $data['function'] = "Add";
        $data['current'] = '';
        if ($this->input->post('submit')) {
            $this->add_edit_blog();
            die();
        }

        $this->template->load('template_admin', 'blog_form', $data);
    }

    function edit_blog($id = null) {
        $data['page_title'] = "Edit Blog";
        $data['function'] = "Edit";
        $data['current'] = '';
        if ($this->input->post('submit')) {
            $this->add_edit_blog($id);
            die();
        }
        $data['details'] = $reviewDetails = $this->general_db_model->get_row("blog", '*', 'blog_id =' . $id);
//            $parentPackageActId = $reviewDetails->activity_id;
        $data['page_details'] = $this->general_db_model->get_result("blog", '*');

//        $data['packageList'] = $this->page_model->get_package('package','activity_id',$parentPackageActId);
//        $data['activity_details'] = $this->page_model->get_withoutLike('activity');
        //$this->load->view('page_list', $data);
        $this->template->load('template_admin', 'blog_form', $data);
    }

    function add_edit_blog($id = null) {

        $data['blog_title'] = $this->input->post('blog_title');
        $data['date'] = $this->input->post('date');
        $data['blog_slug'] = $this->input->post('blog_slug');
        $data['blog_details'] = $this->input->post('blog_details');
        $data['html_title'] = $this->input->post('html_title');
        $data['html_keywords'] = $this->input->post('html_keywords');
        $data['html_description'] = $this->input->post('html_description');
        $data['status'] = $this->input->post('status');
        $display_type = $this->input->post('display_type');
        if (!empty($display_type)) {
            $display = '';
            foreach ($display_type as $disp) {
                $display = $display . $disp . ",";
            }
            $total_display = trim($display, ",");
            $data['display_type'] = $total_display;
        }
        $data['date'] = $this->input->post('date');

        $data['blog_image'] = $this->input->post('blog_image');
        $page_image = $this->input->post('fileList');
        $data['blog_image'] = $page_image;


        if ($id) {
            $this->general_db_model->update('blog', $data, 'blog_id=' . $id);
            $this->session->set_flashdata('display_message', 'Page successfully updated.');
        } else {
            $this->general_db_model->insert('blog', $data);
            $this->session->set_flashdata('display_message', 'Page successfully Added.');
        }

        redirect('admin/pages/blog_list');

        //$this->template->load('template_admin','page_form');
    }

    function delete_blog($id) {

        $this->general_db_model->delete('blog', 'blog_id = ' . $id);
        $this->session->set_flashdata('display_message', 'Page successfully Deleted.');
        redirect("admin/pages/blog_list");
    }

    function delete_blog_image() {
        $img = $this->input->post('imgName');
        $imgpath = $this->config->item('uploads') . 'blog/' . $img; //echo $imgpath; exit;
        if (@file_exists($imgpath)) {
            unlink($imgpath);
            echo 'Image successfully deleted!';
        } else {
            echo 'File does not exist!';
        }
    }

    function update_blog_status() {
        $id = $this->input->get('id');
        $status = $this->input->get('status');
        if ($status == 'Publish')
            $data['status'] = 'Unpublish';
        else
            $data['status'] = 'Publish';
        $this->general_db_model->update('blog', $data, 'blog_id = ' . $id);

        echo $data['status'];
    }
 //============================NewsLetter====================================

    function newsletter() {
        $data['page_title'] = 'Subscriptions';
        $data['current'] = '';
        $data['newsLetter'] = $this->general_db_model->get_result("newsletter", '*');
        //$this->load->view('page_list', $data);
        $this->template->load('template_admin', 'newsletter', $data);
    }

    function delete_newsletter($id) {

        $this->general_db_model->delete('newsletter', 'id = ' . $id);
        $this->session->set_flashdata('display_message', 'Subscriber successfully Deleted.');
        redirect("admin/pages/newsletter");
    }
    
    function send_mail() {
        $email = $this->input->post('email');
        if (!empty($email)) {
            $display = '';
            foreach ($email as $mail) {
                $display = $display . $mail . ",";
            }
            $total_display = trim($display, ",");
            $data['email'] = $total_display;
        }
        $this->load->helper('directory');
        $this->load->helper('file');
        $map = directory_map('./resources/email_templates/');
//            $a = "./resources/email_templates/Basic/Basic Template 2/index.html";

        $data['folder'] = $map;
//            echo "<pre>"; print_r($map);die;
        $data['page_title'] = "Send Email";
        $data['current'] = '';
        
        if($this->input->post('mailSubmit')){

            $inn['email'] = $emailTo = $this->input->post('mailto');
            $inn['sub'] = $subject = $this->input->post('subject');
            $inn['mes'] = $message = $this->input->post('mail_content');

            $adminEmail = $this->general_db_model->get_row('admins');
            $emailFrom = $adminEmail->email;

//============================
                    // $this->load->helper(array('email'));
                    // $this->load->library(array('email'));
            $config = array();
            $config['useragent'] = "CodeIgniter";
                    $config['mailpath'] = "/usr/bin/sendmail"; // or "/usr/sbin/sendmail"
                    $config['protocol'] = "smtp";
                    $config['smtp_host'] = "mail.webomatic.design";
                    $config['smtp_port'] = "587";
                    $config['mailtype'] = 'html';
                    $config['charset'] = 'utf-8';
                    $config['newline'] = "\r\n";
                    $config['wordwrap'] = FALSE;

                    $this->email->initialize($config);
                    $this->email->from($emailFrom);
//                    $this->email->to($emailTo);
                    $this->email->to($emailTo);
                    $this->email->subject($subject);
                    $this->email->message($message);
                    
//                    echo "<pre>"; print_r($inn);die;
                    if(!$this->email->send()){
                        $this->session->set_flashdata('display_message', 'Your message has not been send Please Try again !!!');
                    }else{
                        $this->session->set_flashdata('display_message', 'Your message has been send.');

                    }
                    redirect("pages/admin/newsletter");
                }
                $this->template->load('template_admin', 'mail_form', $data);
            }

            function ajax() {
                $this->load->dbutil();
                $this->load->helper('file');

                $read_path = $this->input->post('val');
                $readFF = file_get_contents($read_path);

                $full_path = $readFF;
                echo $full_path;
//        $this->load->view('email/ajax', $data);
            }

                //============================testimonial====================================

    function testimonial() {
        $data['page_title'] = 'Testimonials';
        $data['current'] = '';
        $data['page_details'] = $this->general_db_model->get_result("review", '*');
        //$this->load->view('page_list', $data);
        $this->template->load('template_admin', 'review_list', $data);
    }

    function add_testimonial() {

        $data['page_title'] = "Add New Testimonial";
        $data['function'] = "Add";
        $data['current'] = '';
        if ($this->input->post('testiSubmit')) {
            $this->add_edit_testimonial();
            die();
        }
        // $data['activity_details'] = $this->general_db_model->get_WhereNotIn("activity",'display_type','special');
        // $data['packageList'] = $this->page_model->get_package('package');
        //$this->load->view('page_list', $data);
        $this->template->load('template_admin', 'review_form', $data);
    }

    function edit_testimonial($id = null) {
        $data['page_title'] = "Edit Testimonial";
        $data['function'] = "Edit";
        $data['current'] = '';
        if ($this->input->post('testiSubmit')) {
            $this->add_edit_testimonial($id);
            die();
        }
        $data['details'] = $reviewDetails = $this->general_db_model->get_row("review", '*', 'review_id =' . $id);
            $parentPackageActId = $reviewDetails->activity_id;
        $data['page_details'] = $this->general_db_model->get_result("review", '*');

        // $data['packageList'] = $this->page_model->get_package('package','activity_id',$parentPackageActId);
        // $data['activity_details'] = $this->page_model->get_withoutLike('activity');
        //$this->load->view('page_list', $data);
        $this->template->load('template_admin', 'review_form', $data);
    }

    function add_edit_testimonial($id = null) {

        // $data['activity_id'] = $this->input->post('activity_id');
        // $data['package_id'] = $this->input->post('package_id');
        $data['review_title'] = $this->input->post('review_title');
        // $data['rating'] = $this->input->post('rating');
        $data['review_content'] = $this->input->post('review_content');
        $data['name'] = $this->input->post('name');
        // $data['nationality'] = $this->input->post('nationality');
        // $display_type = $this->input->post('display_type');
        // if(!empty($display_type)){                   
        //         $display = '';
        //             foreach($display_type as $disp){
        //                 $display = $display.$disp.",";
        //             }
        //             $total_display =  trim($display,",");
        // $data['display_type'] = $total_display;
        // }
       //  $data['html_title'] = $this->input->post('html_title');
       //  $data['html_keyword'] = $this->input->post('html_keyword');
       //  $data['html_description'] = $this->input->post('html_description');
       //  $data['page_slug'] = $this->input->post('page_slug');
       //  $data['content'] = $this->input->post('page_content');
        $data['order'] = $this->input->post('order');
        $data['status'] = $this->input->post('status');

       //  $data['image'] = $this->input->post('image');
       // $page_image = $this->input->post('fileList');
       // $data['image'] = $page_image;


        if ($id) {
            $this->general_db_model->update('review', $data, 'review_id=' . $id);
            $this->session->set_flashdata('display_message', 'Page successfully updated.');
        } else {
            $this->general_db_model->insert('review', $data);
            $this->session->set_flashdata('display_message', 'Page successfully Added.');
        }

        redirect('admin/pages/testimonial');

        //$this->template->load('template_admin','page_form');
    }

    function delete_testimonial($id) {

        $this->general_db_model->delete('review', 'review_id = ' . $id);
        $this->session->set_flashdata('display_message', 'Page successfully Deleted.');
        redirect("admin/pages/testimonial");
    }
    function update_testi_status() {
        $id = $this->input->get('id');
        $status = $this->input->get('status');
        if ($status == 'Publish')
            $data['status'] = 'Unpublish';
        else
            $data['status'] = 'Publish';
        $this->general_db_model->update('review', $data, 'review_id = '.$id);

        echo $data['status'];
    }
                //============================Store Location====================================

    function store() {
        $data['page_title'] = 'Stores';
        $data['current'] = '';
        $data['store_details'] = $this->general_db_model->get_result("stores", '*');
        //$this->load->view('page_list', $data);
        $this->template->load('template_admin', 'store_list', $data);
    }

    function add_store() {

        $data['page_title'] = "Add New Store";
        $data['function'] = "Add";
        $data['current'] = '';
        if ($this->input->post('storeSubmit')) {
            $this->add_edit_store();
            die();
        }

        $this->template->load('template_admin', 'store_form', $data);
    }

    function edit_store($id = null) {
        $data['page_title'] = "Edit Store";
        $data['function'] = "Edit";
        $data['current'] = '';
        if ($this->input->post('storeSubmit')) {
            $this->add_edit_store($id);
            die();
        }
        $data['details'] = $reviewDetails = $this->general_db_model->get_row("stores", '*', 'store_id =' . $id);

        $this->template->load('template_admin', 'store_form', $data);
    }

    function add_edit_store($id = null) {


        $data['store_title'] = $this->input->post('store_title');
        $data['store_description'] = $this->input->post('store_description');

        $data['order'] = $this->input->post('order');
        $data['status'] = $this->input->post('status');



        if ($id) {
            $this->general_db_model->update('stores', $data, 'store_id=' . $id);
            $this->session->set_flashdata('display_message', 'Page successfully updated.');
        } else {
            $this->general_db_model->insert('stores', $data);
            $this->session->set_flashdata('display_message', 'Page successfully Added.');
        }

        redirect('admin/pages/store');

        //$this->template->load('template_admin','page_form');
    }

    function delete_store($id) {

        $this->general_db_model->delete('stores', 'store_id = ' . $id);
        $this->session->set_flashdata('display_message', 'Page successfully Deleted.');
        redirect("admin/pages/store");
    }
    function update_store_status() {
        $id = $this->input->get('id');
        $status = $this->input->get('status');
        if ($status == 'Publish')
            $data['status'] = 'Unpublish';
        else
            $data['status'] = 'Publish';
        $this->general_db_model->update('review', $data, 'store_id = '.$id);

        echo $data['status'];
    }
        }

        ?>