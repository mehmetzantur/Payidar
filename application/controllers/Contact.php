<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
include_once(dirname(__FILE__) . "/MI_Controller.php");

class Contact extends MI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('contact', $this->GetSettings());
    }


    public function SendMail()
    {
        if (isset($_POST['sendmail'])) {
            $this->form_validation->set_rules("name", "Ad", "required|trim");
            $this->form_validation->set_rules("email","E-Mail","required|trim|valid_email");
            $this->form_validation->set_rules("message","Mesaj","required|trim");
            $error_messages = $this->ErrorMessages();

            if ($this->form_validation->run() == TRUE) {
                $name = $this->input->post('name');
                $email = $this->input->post('email');
                $message = $this->input->post('message');

                $systeMail = $this->cleanHtmlTags($this->settingsmodel->GetMail()[0]->Detail);
                $systeMailPass = $this->cleanHtmlTags($this->settingsmodel->GetMailPass()[0]->Detail);

                $config = array(

                    "protocol" => "smtp",
                    "smtp_host" => "ssl://smtp.gmail.com",
                    "smtp_port" => "465",
                    "smtp_user" => $systeMail,
                    "smtp_pass" => $systeMailPass,
                    "starttls" => true,
                    "charset" => "utf-8",
                    "mailtype" => "html",
                    "wordwrap" => true,
                    "newline" => "\r\n"
                );

                /*
                stream_context_set_default([
                   'ssl' => [
                       'verify_peer' => false,
                       'verify_peer_name' => false,
                   ]
                ]);
                */

                $this->load->library("email",$config);

                $this->email->from($email ,$name);
                $this->email->to("payidareticaret@gmail.com");
                $this->email->subject("Website İletişim");
                $this->email->message($message);

                $send = $this->email->send();

                $this->email->from("payidareticaret@gmail.com" ,"Motocar");
                $this->email->to($email);
                $this->email->subject("Website İletişim");
                $this->email->message("Mesajınız alınmıştır. Size en yakın zamanda dönüş yapacağız...");

                if ($send){
                    $this->session->set_flashdata('mail_success', 'Mesajınız gönderilmiştir.' . '<br>' . 'Size en yakın zamanda dönüş yapacağız...');
                    redirect($this->ComeBackToUrl());
                }else{
                    $this->session->set_flashdata('mail_danger', 'HATA' . '<br>' . 'Bir hata oluştu...');
                    echo $this->email->print_debugger();
                    redirect($this->ComeBackToUrl());
                }

            }else{
                $this->load->view('contact', $this->GetSettings());
            }
        }


    }


}
