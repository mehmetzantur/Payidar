<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once (dirname(__FILE__) . "../../MI_Controller.php");

class Login extends MI_Controller {

	public function __construct(){
		parent::__construct();
	}
	
	public function index()
	{
		$this->load->view('panel/login');
		
	}
	public function LoginAdmin()
	{
		if(isset($_POST['login']))
        {
            $this->form_validation->set_rules("admin_email","E-Mail","required|trim|valid_email");
            $this->form_validation->set_rules("admin_password","Şifre","required|trim|min_length[6]|max_length[20]");
            $error_messages = $this->ErrorMessages();
            
            if($this->form_validation->run() == TRUE)
            {
                $adminEmail = $this->input->post("admin_email");
                $adminPassword = $this->input->post("admin_password");
                                
                $result = $this->usermodel->Login($adminEmail,$adminPassword,100);
                
                if($result)
                {
                    $adminData = array(
						'adminId' => $result[0]->Id,
						'adminFirstName' => $result[0]->FirstName
					);
					$this->session->set_userdata($adminData);
					redirect("Panel/Home");
					   
                }
                else if(!$result)
				{
					$this->session->set_flashdata('error','Yetkisiz Giriş İşlemi!');
					redirect("Panel/Login"); 
				}
                    
                
            }
            else
            {
                $data['validation_error'] = "Tüm alanları doldurun.";
                $this->load->view('register',$data);
            }
        }
		
		
	}

	public function Test()
    {
        echo "login test";
    }

}