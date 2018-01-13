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
						'userFirstName' => $result[0]->FirstName
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
                            'userFirstName' => $result[0]->FirstName
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
