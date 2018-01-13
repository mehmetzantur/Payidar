<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
include_once(dirname(__FILE__) . "/MI_Controller.php");

class Profile extends MI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if (empty($this->GetUserId())) {
            redirect("Register");
        } else {
            $this->load->view('profile', $this->GetUserProfile($this->GetUserId()));
        }
    }

    public function Messages()
    {
        if (empty($this->GetUserId())) {
            redirect("Register");
        } else {
            $this->load->view('profile/message', $this->GetUserQuestions($this->GetUserId()));
        }
    }

    public function GetSendMessage()
    {
        if (empty($this->GetUserId())) {
            redirect("Register");
        } else {
            $this->load->view('profile/newmessage', $this->GetSettings());
        }
    }

    public function SendMessage()
    {

    }


    public function GetMessage()
    {
        if (empty($this->GetUserId())) {
            redirect("Register");
        } else {
            $id = $this->uri->segment(3);
            $this->load->view('profile/getmessage', $this->GetUserMessage($id));


        }
    }

    public function Orders()
    {
        if (empty($this->GetUserId())) {
            redirect("Register");
        } else {
            $this->load->view('profile/order', $this->GetUserProfile($this->GetUserId()));
        }
    }


    public function UpdateProfile()
    {
        if (empty($this->GetUserId())) {
            redirect("Register");
        } else {
            if (isset($_POST['update'])) {

                $this->form_validation->set_rules("firstname", "Ad", "required|trim");
                $this->form_validation->set_rules("lastname", "Soyad", "required|trim");
                $getUser = $this->usermodel->GetWhId($this->GetUserId());
                if ($getUser[0]['Email'] == $this->input->post("email")) {
                    echo $this->input->post("email");
                    $this->form_validation->set_rules("email", "E-Mail", "required|trim|valid_email");
                } else {
                    $this->form_validation->set_rules("email", "E-Mail", "required|trim|valid_email|is_unique[user.email]");
                }

                $this->form_validation->set_rules("password", "Şifre", "required|trim|min_length[6]|max_length[20]");
                $this->form_validation->set_rules("confirm", "Tekrar Şifre", "required|trim|min_length[6]|max_length[20]|matches[password]");
                $this->form_validation->set_rules("telephone", "Telefon", "required|trim");
                $this->form_validation->set_rules("city", "Şehir", "required|trim");
                $this->form_validation->set_rules("address", "Adres", "required|trim");
                $this->form_validation->set_rules("postcode", "Posta Kodu", "required|trim");

                $error_messages = $this->ErrorMessages();


                if ($this->form_validation->run() == TRUE) {

                    date_default_timezone_set('Europe/Istanbul'); # add your city to set local time zone
                    $now = date('Y-m-d H:i:s');
                    $path = "";
                    $config['upload_path'] = 'Uploads/User/';
                    $config['allowed_types'] = '*';
                    $config['encrypt_name'] = true;

                    $this->load->library('upload', $config);
                    $upload = $this->upload->do_upload('image');
                    $path = null;
                    if ($upload) {
                        //$path = $this->upload->data('full_path');
                        $path = $this->upload->data();

                        $source_image = 'Uploads/User/' . $path['file_name'];
                        $new_image = 'Uploads/User/' . $path['file_name'];
                        $width = 400;
                        $height = 450;
                        $this->ImageResize($source_image, $new_image, $width, $height);
                    } else {
                        echo $this->upload->display_errors();
                    }
                    if ($path) {

                        $userData = array(
                            "FirstName" => $this->input->post("firstname"),
                            "LastName" => $this->input->post("lastname"),
                            "Email" => $this->input->post("email"),
                            "Password" => $this->input->post("password"),
                            "Telephone" => $this->input->post("telephone"),
                            "City" => $this->input->post("city"),
                            "Address" => $this->input->post("address"),
                            "PostCode" => $this->input->post("postcode"),
                            "LastTime" => $now,
                            "LastIp" => $this->input->ip_address(),
                            "Image" => $path['file_name']
                        );

                    } else {
                        $userData = array(
                            "FirstName" => $this->input->post("firstname"),
                            "LastName" => $this->input->post("lastname"),
                            "Email" => $this->input->post("email"),
                            "Password" => $this->input->post("password"),
                            "Telephone" => $this->input->post("telephone"),
                            "City" => $this->input->post("city"),
                            "Address" => $this->input->post("address"),
                            "PostCode" => $this->input->post("postcode"),
                            "LastTime" => $now,
                            "LastIp" => $this->input->ip_address()
                        );

                    }

                    $result = $this->usermodel->Update($userData, $this->GetUserId());

                    if ($result){
                        $this->session->set_userdata($userData);
                        $settings['userFirstName'] = $this->input->post("firstname");
                        $this->session->set_flashdata('profile_success', 'Profil bilgileriniz güncellenmiştir.');
                        redirect($this->ComeBackToUrl());
                    }
                    else
                        echo "boş";
                } else
                    $this->load->view('profile', $this->GetUserProfile($this->GetUserId()));


            }
        }

    }


}
