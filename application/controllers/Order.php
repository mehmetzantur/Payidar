<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
include_once(dirname(__FILE__) . "/MI_Controller.php");

class Order extends MI_Controller
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
            $this->load->view('order', $this->GetUserOrders($this->GetUserId()));
        }

    }

    public function CancelOrder()
    {
        if (empty($this->GetUserId())) {
            redirect("Register");
        } else {
            $basket = array("Status" => -1);
            $basketId = $this->uri->segment(3);
            $result = $this->ordermodel->UpdateOrder($basket, $basketId);
            if($result){
                $this->session->set_flashdata('order_remove', 'Seçilen ürünün siparişi iptal edildi.');
                redirect($this->ComeBackToUrl());
            }
            else
                echo "hata oluştu";
        }
    }


}
