<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once (dirname(__FILE__) . "../../MI_Controller.php");

class Settings extends MI_Controller {

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
            $settings['settings'] = $this->settingsmodel->GetAll();
			$this->load->view('panel/settings',$settings);
		}
    }
    
    public function Add(){
		if(isset($_POST['add']))
        {
            $this->form_validation->set_rules("name","Ayar Adı","trim");
            $this->form_validation->set_rules("detail","Ayar Detay","trim");
            $error_messages = $this->ErrorMessages();

            if($this->form_validation->run() == TRUE)
            {
				$config['upload_path'] = 'Uploads/Settings/';
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
                if ($path) {
                        
                    $settingsData = array(
                        "Name" => $this->input->post("name"),
                        "Detail" => $this->input->post("detail"),
                        "IsPage" => $this->input->post("ispage"),
                        "PageOrder" => $this->input->post("pageorder"),
                        "Image" => $path['file_name']
                    );

                }else {
                    $settingsData = array(
                        "Name" => $this->input->post("name"),
                        "Detail" => $this->input->post("detail"),
                        "IsPage" => $this->input->post("ispage"),
                        "PageOrder" => $this->input->post("pageorder")
                    );

                }			
							
                $result = $this->settingsmodel->Add($settingsData);

                
                if($result)
                {
                    redirect("Panel/Settings");
                }
                else
                    echo $result;
                

            }
            else
            {
                $data['validation_error'] = "Tüm alanları doldurun.";
                $this->load->view('panel/settings/addsettings',$data);
            }
        }
    }



    public function Update(){
        
                if(isset($_POST['update']))
                {
                    $this->form_validation->set_rules("name","Ayar Adı","trim");
                    $this->form_validation->set_rules("detail","Ayar Detay","trim");
                    $error_messages = $this->ErrorMessages();
        
                    if($this->form_validation->run() == TRUE)
                    {
                        $config['upload_path'] = 'Uploads/Settings/';
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
                        if ($path) {
                                
                            $settingsData = array(
                                "Name" => $this->input->post("name"),
                                "Detail" => $this->input->post("detail"),
                                "IsPage" => $this->input->post("ispage"),
                                "PageOrder" => $this->input->post("pageorder"),
                                "Image" => $path['file_name']
                            );
        
                        }else {
                            $settingsData = array(
                                "Name" => $this->input->post("name"),
                                "Detail" => $this->input->post("detail"),
                                "IsPage" => $this->input->post("ispage"),
                                "PageOrder" => $this->input->post("pageorder")
                            );
        
                        }			
        
                        $id = $this->input->post("hidden");
                        $result = $this->settingsmodel->Update($settingsData,$id);

                        if($result)
                        {
                            redirect("Panel/Settings");
                        }
                        else
                            echo $result;
        
                    }
                    else
                    {
                        $data['validation_error'] = "Tüm alanları doldurun.";
                        $this->load->view('panel/settings/addsettings',$data);
                    }
                }
            }

            
    

    public function AddSettings(){
        $settings = $this->GetSettings();
        $settings['settings'] = $this->settingsmodel->GetAll();
		$this->load->view('panel/settings/addsettings',$settings);
    }
    
    public function UpdateSettings($id){
		$id = $this->uri->segment(4);
        $settings = $this->GetSettings();
        $settings['settingsWhId'] = $this->settingsmodel->GetWhId($id);
		$this->load->view('panel/settings/updatesettings',$settings);
	}
    
    public function DeleteSettings($id){
		$id = $this->uri->segment(4);
		$this->settingsmodel->DeleteWhId($id);
        $settings = $this->GetSettings();
        $settings['settings'] = $this->settingsmodel->GetAll();
		redirect("Panel/Settings");
		$this->load->view('panel/settings',$settings);
	}
	

}