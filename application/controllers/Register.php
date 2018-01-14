<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once (dirname(__FILE__) . "/MI_Controller.php");

class Register extends MI_Controller {

	public function __construct(){
		parent::__construct();

	}


	public function index()
	{

        $this->load->view('register',$this->GetSettings());

	}


	public function GetForget()
    {
        $this->load->view('getforget',$this->GetSettings());
    }

    public function SendForget()
    {
        if (isset($_POST['sendforget'])) {
            $this->form_validation->set_rules("usermail", "Email", "required|trim|valid_email");
            $error_messages = $this->ErrorMessages();


            if ($this->form_validation->run() == TRUE)
            {
                $usermail = $this->usermodel->GetWhMail($this->input->post("usermail"));
                $userpass = $this->usermodel->GetWhMail($this->input->post("usermail"));

                if (!empty($usermail))
                {
                    $usermail = $this->cleanHtmlTags($usermail[0]['Email']) ;
                    $userpass = $this->cleanHtmlTags($userpass[0]['Password']);

                    $systeMail = $this->cleanHtmlTags($this->settingsmodel->GetMail()[0]['Detail']);
                    $systeMailPass = $this->cleanHtmlTags($this->settingsmodel->GetMailPass()[0]['Detail']);

                    $name = "Motocar E-Ticaret";
                    $message = "Bir adet şifre sıfırlama isteğinde bulundunuz. Şifreniz aşağıdadır. <br> Şifreniz: ".$userpass;

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

                    $this->load->library("email",$config);

                    $this->email->from($systeMail ,$name);
                    $this->email->to($usermail);
                    $this->email->subject("Şifre Sıfırlama");
                    $this->email->message($message);

                    $send = $this->email->send();

                    if ($send){
                        $this->session->set_flashdata('mail_ok', 'Başarılı' . '<br>' . 'Şifreniz emailinize gönderilmiştir.');
                        redirect($this->ComeBackToUrl());
                    }else{
                        $this->session->set_flashdata('mail_danger', 'HATA' . '<br>' . 'Bir hata oluştu...');
                        echo "hata:";
                        echo $this->email->print_debugger();
                        redirect($this->ComeBackToUrl());
                    }
                }else{
                    $this->session->set_flashdata('mail_danger', 'HATA' . '<br>' . 'Böyle bir kullanıcı yok!');
                    redirect($this->ComeBackToUrl());
                }
            }
            else{
                $this->load->view('getforget',$this->GetSettings());
            }
        }
    }

    public function Login()
    {
        if(isset($_POST['login']))
        {
            $this->form_validation->set_rules("login_email","E-Mail","required|trim|valid_email");
            $this->form_validation->set_rules("login_password","Şifre","required|trim|min_length[6]|max_length[20]");
            $error_messages = $this->ErrorMessages();

            if($this->form_validation->run() == TRUE)
            {
                $userEmail = $this->input->post("login_email");
                $userPassword = $this->input->post("login_password");

                $result = $this->usermodel->Login($userEmail,$userPassword,10);

				if($result)
                {
                    $userData = array(
						'userId' => $result[0]->Id,
						'userFirstName' => $result[0]->FirstName,
						'userEmail' => $result[0]->Email
					);
					$this->session->set_userdata($userData);
					redirect("Home");

                }
                else
                    echo $result;

            }
            else
            {
                $data['validation_error'] = "Tüm alanları doldurun.";
                $this->load->view('register',$this->GetSettings());
            }
        }

        if(isset($_POST['register']))
        {
            $this->form_validation->set_rules("firstname","Ad","required|trim");
            $this->form_validation->set_rules("lastname","Soyad","required|trim");
            $this->form_validation->set_rules("email","E-Mail","required|trim|valid_email|is_unique[user.email]");
            $this->form_validation->set_rules("password","Şifre","required|trim|min_length[6]|max_length[20]");
            $this->form_validation->set_rules("confirm","Tekrar Şifre","required|trim|min_length[6]|max_length[20]|matches[password]");
            $this->form_validation->set_rules("telephone","Telefon","required|trim");
            $this->form_validation->set_rules("city","Şehir","required|trim");
            $this->form_validation->set_rules("address","Adres","required|trim");
            $this->form_validation->set_rules("postcode","Adres","required|trim");

            $error_messages = $this->ErrorMessages();


            if($this->form_validation->run() == TRUE){

                $userData = array(
                    "FirstName" => $this->input->post("firstname"),
                    "LastName" => $this->input->post("lastname"),
                    "Email" => $this->input->post("email"),
                    "Password" => $this->input->post("password"),
                    "Telephone" => $this->input->post("telephone"),
                    "City" => $this->input->post("city"),
                    "Address" => $this->input->post("address"),
                    "PostCode" => $this->input->post("postcode"),
                    "Time" => date('Y-m-d H:i:s',time()),
                    "LastTime" => date('Y-m-d H:i:s',time()),
                    "LastIp" => $this->input->ip_address()
                );

                $result = $this->usermodel->Add($userData);
                if($result){
                    $result = $this->usermodel->Login($this->input->post("email"),$this->input->post("password"),10);

                    if($result)
                    {
                        $userData = array(
                            'userId' => $result[0]->Id,
                            'userFirstName' => $result[0]->FirstName,
                            'userEmail' => $result[0]->Email
                        );
                        $this->session->set_userdata($userData);
                        redirect("Home");

                    }
                    else
                        echo $result;
                }
                else
                    echo $result;
            } else
                $this->load->view('register',$this->GetSettings());
        }
    }


}
