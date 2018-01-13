<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once (dirname(__FILE__) . "../../MI_Controller.php");

class User extends MI_Controller {

	public function __construct(){
		parent::__construct();
	}


	public function index()
	{
		$session = $this->SessionControlAdmin();

		if(!$session)
		{
			redirect("Panel/Login");
		}
		else
		{
            $settings = $this->GetSettings();
            $settings['users'] = $this->usermodel->GetAll();
			$this->load->view('panel/user',$settings);
		}
	}


    public function Add(){
		if(isset($_POST['add']))
        {
            $this->form_validation->set_rules("firstname","Ad","required|trim");
            $this->form_validation->set_rules("lastname","Soyad","required|trim");
            $this->form_validation->set_rules("email","E-Mail","required|trim|valid_email");
            $this->form_validation->set_rules("password","Şifre","required|trim|min_length[6]|max_length[20]");
            $this->form_validation->set_rules("telephone","Telefon","required|trim");
            $this->form_validation->set_rules("address","Adres","required|trim");
            $this->form_validation->set_rules("postcode","Adres","required|trim");
            $this->form_validation->set_rules("authority","Yetki","required|trim");
            $error_messages = $this->ErrorMessages();

            if ($this->form_validation->run() == TRUE){
                $config['upload_path'] = 'Uploads/User/';
                $config['allowed_types'] = '*';
                $config['encrypt_name'] = true;

                $this->load->library('upload',$config);
                $upload = $this->upload->do_upload('image');
                if ($upload) {
                    //$path = $this->upload->data('full_path');
                      $path = $this->upload->data();
                }else {
                    echo $this->upload->display_errors();
                }

                if($path){
                    $userData = array(
                        "FirstName" => $this->input->post("firstname"),
                        "LastName" => $this->input->post("lastname"),
                        "Email" => $this->input->post("email"),
                        "Password" => $this->input->post("password"),
                        "Telephone" => $this->input->post("telephone"),
                        "Address" => $this->input->post("address"),
                        "PostCode" => $this->input->post("postcode"),
                        "Authority" => $this->input->post("authority"),
                        "Image" => $path['file_name']
                    );
                }else{
                    $userData = array(
                        "FirstName" => $this->input->post("firstname"),
                        "LastName" => $this->input->post("lastname"),
                        "Email" => $this->input->post("email"),
                        "Password" => $this->input->post("password"),
                        "Telephone" => $this->input->post("telephone"),
                        "Address" => $this->input->post("address"),
                        "PostCode" => $this->input->post("postcode"),
                        "Authority" => $this->input->post("authority")
                    );
                }

               
                $result = $this->usermodel->Add($userData);
                if($result)
                    redirect("Panel/User");
                else
                    echo $result;
            } else
            {
                $data['validation_error'] = "Tüm alanları doldurun.";
                $this->load->view('panel/user/adduser',$data);
            }

        }
    }
    

    public function Update(){
        
        if(isset($_POST['update']))
        {
            $this->form_validation->set_rules("firstname","Ad","required|trim");
            $this->form_validation->set_rules("lastname","Soyad","required|trim");
            $this->form_validation->set_rules("email","E-Mail","required|trim|valid_email");
            $this->form_validation->set_rules("password","Şifre","required|trim|min_length[6]|max_length[20]");
            $this->form_validation->set_rules("telephone","Telefon","required|trim");
            $this->form_validation->set_rules("address","Adres","required|trim");
            $this->form_validation->set_rules("postcode","Adres","required|trim");
            $this->form_validation->set_rules("authority","Yetki","required|trim");
            
            $error_messages = $this->ErrorMessages();
            if ($this->form_validation->run() == TRUE){
                $config['upload_path'] = 'Uploads/User/';
                $config['allowed_types'] = '*';
                $config['encrypt_name'] = true;

                $this->load->library('upload',$config);
                $upload = $this->upload->do_upload('image');
                if ($upload) {
                    //$path = $this->upload->data('full_path');
                      $path = $this->upload->data();
                }else {
                    echo $this->upload->display_errors();
                }

                if($path){
                    $userData = array(
                        "FirstName" => $this->input->post("firstname"),
                        "LastName" => $this->input->post("lastname"),
                        "Email" => $this->input->post("email"),
                        "Password" => $this->input->post("password"),
                        "Telephone" => $this->input->post("telephone"),
                        "Address" => $this->input->post("address"),
                        "PostCode" => $this->input->post("postcode"),
                        "Authority" => $this->input->post("authority"),
                        "Image" => $path['file_name']
                    );
                }else{
                    $userData = array(
                        "FirstName" => $this->input->post("firstname"),
                        "LastName" => $this->input->post("lastname"),
                        "Email" => $this->input->post("email"),
                        "Password" => $this->input->post("password"),
                        "Telephone" => $this->input->post("telephone"),
                        "Address" => $this->input->post("address"),
                        "PostCode" => $this->input->post("postcode"),
                        "Authority" => $this->input->post("authority")
                    );
                }

                $id = $this->input->post("hidden");
                $result = $this->usermodel->Update($userData,$id);
                if($result)
                    redirect("Panel/User");
                else
                    echo $result;
            } else
            {
                $data['validation_error'] = "Tüm alanları doldurun.";
                $this->load->view('panel/user/adduser',$data);
            }
        }
    }

            

    public function UpdateUser($id){
        $settings = $this->GetSettings();
        $settings['users'] = $this->usermodel->GetWhId($id);
		$this->load->view('panel/user/updateuser',$settings);
    }

    public function AddUser(){
        $settings = $this->GetSettings();
		$this->load->view('panel/user/adduser',$settings);
    }
    
    public function DeleteUser($id){
		$id = $this->uri->segment(4);
		$this->usermodel->DeleteWhId($id);
		redirect("panel/user");
	}
    


}
