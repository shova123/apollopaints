<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller
{

    function __construct()
    {
        parent:: __construct();
        $this->load->model('home_model');
    }

    public function index()
    {
        $data['current'] = '1';
        $data['homeContent'] = @$header =  $this->general_db_model->get_row("pages","*","page_slug LIKE '%home%' AND status = 'Publish' AND page_type='content'");
        $data['homeSubContent'] = @$header =  $this->general_db_model->get_result("pages","*","sub_content_page LIKE '%home%' AND status = 'Publish'");
        $data['slider_details'] = $this->general_db_model->get_result("slider","*","status = 'Publish'",'order');
        $data['testimonials'] = $this->general_db_model->get_result("review","*","status = 'Publish'",'order');

        $data['html_title'] = @$header->html_title;
        $data['html_keyword'] = @$header->html_title;
        $data['html_description'] = @$header->html_description;

        $this->template->load('template_front','index',$data);
    }

    public function about()
    {
        $data['current'] = '2';
        $data['aboutContent'] = @$header = $this->general_db_model->get_row("pages","*","page_slug LIKE '%about%' AND status ='Publish'AND page_type='content'");
        $data['aboutSubContent'] = $this->general_db_model->get_result("pages","*","sub_content_page LIKE '%about%' AND status = 'Publish'");

        $data['html_title'] = @$header->html_title;
        $data['html_keyword'] = @$header->html_title;
        $data['html_description'] = @$header->html_description;
        $this->template->load('template_front','about',$data);
    }

        public function career()
    {
        $data['current'] = '2';
        $data['aboutContent'] = @$header = $this->general_db_model->get_row("pages","*","page_slug = 'about_us' AND status ='Publish'");
        $data['tabContent'] = $this->general_db_model->get_result("pages","*","status = 'Publish' AND page_type LIKE '%tab%'",'order');

        $data['html_title'] = @$header->html_title;
        $data['html_keyword'] = @$header->html_title;
        $data['html_description'] = @$header->html_description;
        $this->template->load('template_front','career',$data);
    }
        public function store_locator()
    {
        $data['current'] = '2';
        $data['storeContent'] = @$header = $this->general_db_model->get_result("stores","*","status ='Publish'");

        $data['html_title'] = @$header->html_title;
        $data['html_keyword'] = @$header->html_title;
        $data['html_description'] = @$header->html_description;
        $this->template->load('template_front','store-locator',$data);
    }
        public function color_visualizer($type = null)
    {
        $data['current'] = '2';
        if($type == 'sample'){
            $data['interiors'] = $this->general_db_model->get_result('samples','*',"status='publish' AND sample_type='interior'");
            $data['exteriors'] = $this->general_db_model->get_result('samples','*',"status='publish' AND sample_type='exterior'");
           
            $data['interiorSample'] = $this->general_db_model->getByJoin('samples','sample_images','samples.sample_slug = sample_images.sample',"samples.status='publish' AND samples.sample_type='interior'");
            $data['exteriorSample'] = $this->general_db_model->getByJoin('samples','sample_images','samples.sample_slug = sample_images.sample',"samples.status='publish' AND samples.sample_type='exterior'");
//            $this->template->load('template_front','color-visualiser-samples',$data);
            $this->load->view('color-visualiser-samples',$data);
        }elseif($type =='image'){
            $this->load->view('color-visualizer-image',$data);
        }else{
        $data['aboutContent'] = @$header = $this->general_db_model->get_row("pages","*","page_slug = 'about_us' AND status ='Publish'");

        $data['html_title'] = @$header->html_title;
        $data['html_keyword'] = @$header->html_title;
        $data['html_description'] = @$header->html_description;
        $this->template->load('template_front','color-visualizer',$data);
    }
    }
        public function budget_calculator()
    {
        $data['current'] = '2';
        $data['aboutContent'] = @$header = $this->general_db_model->get_row("pages","*","page_slug = 'about_us' AND status ='Publish'");
        $data['tabContent'] = $this->general_db_model->get_result("pages","*","status = 'Publish' AND page_type LIKE '%tab%'",'order');

        $data['html_title'] = @$header->html_title;
        $data['html_keyword'] = @$header->html_title;
        $data['html_description'] = @$header->html_description;
        $this->template->load('template_front','budget_calculation',$data);
    }
        public function expert_advice($sample = null)
    {
        $data['current'] = '2';
        if(!empty($sample)){
            $this->template->load('template_front','expert-advice-samples',$data);


        }else{
        $data['Content'] = @$header = $this->general_db_model->get_row("pages","*","page_slug LIKE '%expert%' AND status ='Publish' AND page_type = 'content'");
        $data['SubContent'] = $this->general_db_model->get_result("pages","*","sub_content_page LIKE '%expert%' AND status = 'Publish'");

        $data['html_title'] = @$header->html_title;
        $data['html_keyword'] = @$header->html_title;
        $data['html_description'] = @$header->html_description;
        $this->template->load('template_front','expert-advice',$data);
    }
    }
        public function color_palace()
    {
        $data['current'] = '2';
        $data['page_title'] = "Color palace";
        $data['gallery'] = $this->general_db_model->get_result("gallery","*","status = 'Publish'",'order');

        $data['html_title'] = @$header->html_title;
        $data['html_keyword'] = @$header->html_title;
        $data['html_description'] = @$header->html_description;
        $this->template->load('template_front','color_palace',$data);
    }
       public function single_page()
    {
        $data['current'] = '2';
        $slug = $this->uri->segment(1);
        $data['singleContent'] = @$header = $this->general_db_model->get_row("pages","*","page_slug LIKE '%$slug%' AND status ='Publish' AND page_type='content'");
        $data['SubContent'] = $this->general_db_model->get_result("pages","*","sub_content_page LIKE '%$slug%' AND status = 'Publish'");

        $data['html_title'] = @$header->html_title;
        $data['html_keyword'] = @$header->html_title;
        $data['html_description'] = @$header->html_description;
        $this->template->load('template_front','single',$data);
    }

   public function product($type = null)
    {
        $data['current'] = '2';
        if(!empty($type)){
        $data['type'] = $type;
        $data['catList'] = $this->general_db_model->get_result('product_category','*',"status = 'Publish' AND product_link = '$type'"); 
        $data['html_title'] = @$header->html_title;
        $data['html_keyword'] = @$header->html_title;
        $data['html_description'] = @$header->html_description;
        $this->template->load('template_front','product',$data);

        }else{
        $data['productList'] = $this->general_db_model->get_result('product','*',"status = 'Publish'"); 
        $data['html_title'] = @$header->html_title;
        $data['html_keyword'] = @$header->html_title;
        $data['html_description'] = @$header->html_description;
        $this->template->load('template_front','product',$data);
    }
    }

    public function contact()
    {
        $data['current'] = '5';
        if ($this->input->post("enquirySubmit")) {
          $recaptcha = $this->input->post('g-recaptcha-response');

            // if (!empty($recaptcha)) {
          $response = $this->recaptcha->verifyResponse($recaptcha);
          if (isset($response['success']) and $response['success'] === true) {

            $emailFrom = $this->input->post('email');
            $message = $this->input->post('message');
            $name = $this->input->post('name');
            $phone = $this->input->post('phone');
            $company_name = $this->input->post('company_name');
            $subject = $this->input->post('subject');



            $messages = "<table width='570' border='0' cellspacing='0' cellpadding='0' align='center' style='color:#1ABE67'>
            <tr>
            <td colspan='2'><h2 style='color:#015e0c;weight:bold;'>Enquiry Details</h2></td>
            </tr>
            <tr>
            <td width='188' height='30'>Name </td>
            <td width='382' height='30'><label>
            $name
            </label></td>
            </tr>
            <tr>
            <td height='30'>Email </td>
            <td height='30'><label>
            $emailFrom
            </label></td>
            </tr>
            <tr>
            <td height='30'>Phone </td>
            <td height='30'><label>
            $phone
            </label></td>
            </tr>
            <tr>
            <td height='30'>Company Name </td>
            <td height='30'><label>
            $company_name
            </label></td>
            </tr>
            <tr>
            <td height='30'>Message</td>
            <td height='108'><label>
            $message
            </label></td>
            </tr>

            </table>";
            $adminEmail = $this->general_db_model->get_row('admins');
            $emailTo = $adminEmail->email;

//============================
                    // $this->load->helper(array('email'));
                    // $this->load->library(array('email'));
            $config = array();
            $config['useragent'] = "CodeIgniter";
                    $config['mailpath'] = "/usr/bin/sendmail"; // or "/usr/sbin/sendmail"
                    $config['protocol'] = "smtp";
                    $config['smtp_host'] = "localhost";
                    $config['smtp_port'] = "25";
                    $config['mailtype'] = 'html';
                    $config['charset'] = 'utf-8';
                    $config['newline'] = "\r\n";
                    $config['wordwrap'] = FALSE;

                    $this->email->initialize($config);
                    $this->email->from($emailFrom, $name);
                    $this->email->to($emailTo);
                    $this->email->subject($subject);
                    $this->email->message($messages);

                    if(!$this->email->send()){

                        $this->session->set_flashdata('success', 'Your message has been send to Administrator we will be in touch');

                    }else{

                        $this->session->set_flashdata('error', 'Your message has not been send Please Try again !!!');
                    }

                // } else {

                //     $this->session->set_flashdata('warning', 'Please verify that you are not a robot');
                // }
                }
            }


            $data['widget'] =$this->recaptcha->getWidget();
            $data['script'] =$this->recaptcha->getScriptTag();
            $data['contact_details'] = $this->general_db_model->get_row("contacts","*");
            // $data['Contact']  = @$header = $this->general_db_model->get_row("pages","*","page_slug = 'contact' AND status ='Publish'");
            $data['Enquiry'] = $this->general_db_model->get_row("pages","*","page_slug = 'enquiry' AND status ='Publish'");

            $data['html_title'] = @$header->html_title;
            $data['html_keyword'] = @$header->html_title;
            $data['html_description'] = @$header->html_description;

            $this->template->load('template_front', 'contact',$data);
        }

public function newsletter()
    {
//        $datestring = "Year: %Y Month: %m Day: %d - %h:%i %a";
//$time = time();

        $post['date'] = date('jS F Y');
        $post['email'] = $email = $this->input->post('ajaxEmail');
        if(!empty($email)){
        $newsletter = $this->general_db_model->get_result('newsletter','*',"email = '$email'");
        if(count($newsletter)>0){
            $message = '*You are alredy subscribed to our newsletter.';
        }else{
            $this->general_db_model->insert('newsletter', $post);
            $message = '*Subscription Successful.';
        }
        echo $message;
        }
    }



   }
