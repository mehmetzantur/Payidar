<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once (dirname(__FILE__) . "../../MI_Controller.php");

class Order extends MI_Controller {

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
			$this->load->view('panel/order', $this->GetOrders());
		}
	}

    public function CancelOrder()
    {
        $session = $this->SessionControlAdmin();
        if (!$session) {
            redirect("Panel/Login");
        } else {
            $basket = array("Status" => -1);
            $basketId = $this->uri->segment(4);
            $result = $this->ordermodel->UpdateOrder($basket, $basketId);
            if($result){
                $this->session->set_flashdata('order_remove', 'Seçilen ürünün siparişi iptal edildi.');
                redirect($this->ComeBackToUrl());
            }
            else
                echo "hata oluştu";
        }
    }

    public function OkOrder()
    {
        $session = $this->SessionControlAdmin();
        if (!$session) {
            redirect("Panel/Login");
        } else {
            $basket = array("Status" => 1);
            $basketId = $this->uri->segment(4);
            $result = $this->ordermodel->UpdateOrder($basket, $basketId);
            if($result){
                $this->session->set_flashdata('order_remove', 'Seçilen ürünün siparişi iptal edildi.');
                redirect($this->ComeBackToUrl());
            }
            else
                echo "hata oluştu";
        }
    }
	
	public function UpdateTracking($basketid)
    {
        if (isset($_POST['tracking'])) {
            $session = $this->SessionControlAdmin();
            if (!$session) {
                redirect("Panel/Login");
            } else {
                $basket = array("TrackingNumber" => $this->input->post("trackingno"));
                $result = $this->ordermodel->UpdateOrder($basket, $basketid);
                if($result){
                    $this->session->set_flashdata('order_remove', 'Seçilen ürünün siparişi iptal edildi.');
                    redirect($this->ComeBackToUrl());
                }
                else
                    echo "hata oluştu";
            }
        }

    }

	public function Logout()
    {
    	$this->LogoutAdmin();
    }

}