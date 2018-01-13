<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once (dirname(__FILE__) . "../../MI_Controller.php");

class Brand extends MI_Controller {

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
            $settings['brand'] = $this->brandmodel->GetAll();
			$this->load->view('panel/brand',$settings);
		}
    }
    

    public function Add(){
		if(isset($_POST['add']))
        {
            $this->form_validation->set_rules("order","Sırası","trim");
            $this->form_validation->set_rules("name","Kategori Adı","trim|required");
            $error_messages = $this->ErrorMessages();

            if($this->form_validation->run() == TRUE)
            {
				$config['upload_path'] = 'Uploads/Brand/';
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
                        
                    $brandData = array(
                        "Name" => $this->input->post("name"),
                        "Order" => $this->input->post("order"),
                        "Image" => $path['file_name']
                    );

                }else {
                    $brandData = array(
                        "Name" => $this->input->post("name"),
                        "Order" => $this->input->post("order")
                    );

                }			
							
                $result = $this->brandmodel->Add($brandData);

                
                if($result)
                {
                    redirect("Panel/Brand");
                }
                else
                    echo $result;
                

            }
            else
            {
                $data['validation_error'] = "Tüm alanları doldurun.";
                $this->load->view('panel/brand/addbrand',$data);
            }
        }
    }
    

    public function Update(){
		if(isset($_POST['update']))
        {
            $this->form_validation->set_rules("order","Sırası","trim");
            $this->form_validation->set_rules("name","Marka Adı","trim|required");
            $error_messages = $this->ErrorMessages();

						if($this->form_validation->run() == TRUE)
            {
							$config['upload_path'] = 'Uploads/Brand/';
							$config['allowed_types'] = '*';
							$config['encrypt_name'] = true;

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
								$brandData = array(
				                        "Order" => $this->input->post("order"),
				                        "Name" => $this->input->post("name"),
                                        "Image" => $path['file_name']
				            );

							}else {
								//echo "dosya boş geldi";
								$brandData = array(
				                        "Order" => $this->input->post("order"),
				                        "Name" => $this->input->post("name")
				            );
							}

                            $id = $this->input->post("hidden");

							$result = $this->brandmodel->Update($brandData,$id);

							if($result)
							{
							    redirect("Panel/Brand");
							}
                            else
                                echo $result;

									

            }
            else
            {
                $data['validation_error'] = "Tüm alanları doldurun.";
                $this->load->view('panel/brand/addbrand',$data);
            }
        }
	}



    public function AddBrand(){
        $settings = $this->GetSettings();
		$this->load->view('panel/brand/addbrand',$settings);
	}
    
    
    public function UpdateBrand($id){
		$id = $this->uri->segment(4);
        $settings = $this->GetSettings();
        $settings['brandWhId'] = $this->brandmodel->GetWhId($id);
		$this->load->view('panel/brand/updatebrand',$settings);
    }


    public function DeleteBrand($id){
		$id = $this->uri->segment(4);
		$this->brandmodel->DeleteWhId($id);
		redirect("Panel/Brand");
	}
    

}