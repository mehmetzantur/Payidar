<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once (dirname(__FILE__) . "../../MI_Controller.php");

class Slider extends MI_Controller {

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
			//$data['category'] = $this->CategoryModel->GetAll();
            //$data['slider'] = $this->sliderModel->GetAll();
            $settings = $this->GetSettings();
            $settings['slider'] = $this->slidermodel->GetAll();
			$this->load->view('panel/slider',$settings);
			
		}
	}


    public function Add(){
		if(isset($_POST['add']))
        {
            $this->form_validation->set_rules("title","Başlık","trim");
			$this->form_validation->set_rules("url","Yönleneceği Adres","trim");
            $error_messages = $this->ErrorMessages();

						if($this->form_validation->run() == TRUE)
            {
							$config['upload_path'] = 'Uploads/Slider/';
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
                               
                                if(isset($_POST['isactive'])){
                                    $IsActive = 1;
                                    }else{
                                    $IsActive = 0;
                                    }
                                    
								$sliderData = array(
				                        "Title" => $this->input->post("title"),
				                        "Url" => $this->input->post("url"),
				                        "IsActive" => (int) $IsActive,
                                        "Image" => $path['file_name']
				            );

				                $result = $this->slidermodel->Add($sliderData);

								if($result)
                {
					             redirect("Panel/Slider");
                }
                else
                      echo $result;
							}else {
								echo "Resim Seçilmedi!!!";
							}

            }
            else
            {
                $data['validation_error'] = "Tüm alanları doldurun.";
                $this->load->view('panel/slider/addslider',$data);
            }
        }
    }
    

    public function Update(){
        
                if(isset($_POST['update']))
                {
                    $this->form_validation->set_rules("title","Başlık","trim");
                    $this->form_validation->set_rules("url","Yönleneceği Adres","trim");
                    $error_messages = $this->ErrorMessages();
        
                                if($this->form_validation->run() == TRUE)
                                {
                                    $config['upload_path'] = 'Uploads/Slider/';
                                    $config['allowed_types'] = '*';
                                    $config['encrypt_name'] = false;
        
                                    $this->load->library('upload',$config);
                                    $upload = $this->upload->do_upload('image');
                                    $path = null;
                                    if ($upload) {
                                        //$path = $this->upload->data('full_path');
                                          $path = $this->upload->data();
                                    }else {
                                        echo $this->upload->display_errors();
                                    }
                                    if ($path) {
                                        if(isset($_POST['isactive'])){
                                            $IsActive = 1;
                                            }else{
                                            $IsActive = 0;
                                            }

                                                $sliderData = array(
                                                "Title" => $this->input->post("title"),
                                                "Url" => $this->input->post("url"),
                                                "IsActive" => (int) $IsActive,
                                                "Image" => $path['file_name']
                                    );
        
                                    }else {
                                        //echo "dosya boş geldi";
                                        if(isset($_POST['isactive'])){
                                            $IsActive = 1;
                                            }else{
                                            $IsActive = 0;
                                            }
                                        $sliderData = array(
                                            "Title" => $this->input->post("title"),
                                            "Url" => $this->input->post("url"),
                                            "IsActive" => (int) $IsActive
                                        );
                                    }
        
                                    $id = $this->input->post("hidden");
                                    $result = $this->slidermodel->Update($sliderData,$id);
        
                                    if($result)
                                    {
                                        redirect("Panel/Slider");
                                    }
                                    else
                                        echo redirect("Panel/Slider");
        
                                }
                                else
                                {
                                    $data['validation_error'] = "Tüm alanları doldurun.";
                                    $this->load->view('panel/product/addproduct',$data);
                                }
                }
    }



    public function AddSlider(){
        $settings = $this->GetSettings();
		$this->load->view('panel/slider/addslider',$settings);
	}

    public function UpdateSlider(){
        $id = $this->uri->segment(4);
        $settings = $this->GetSettings();
        $settings['sliderWhId'] = $this->slidermodel->GetWhId($id);
		$this->load->view('panel/slider/updateslider',$settings);
	}

    public function DeleteSlider($id){
		$id = $this->uri->segment(4);
		$this->slidermodel->DeleteWhId($id);
		redirect("Panel/Slider");
	}
    
}