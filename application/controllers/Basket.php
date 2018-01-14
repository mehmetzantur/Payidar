<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
include_once(dirname(__FILE__) . "/MI_Controller.php");

class Basket extends MI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if (!empty($this->GetUserId())) {
            $this->load->view('basket', $this->GetBasketWhUserIdWithProduct());
        } else {
            redirect('Register');
        }
    }


    public function AddBasket()
    {
        if (!empty($this->GetUserId())) {
            if (isset($_POST['add'])) {
                $this->form_validation->set_rules("amount", "Adet", "trim|required");
                $error_messages = $this->ErrorMessages();

                $userid = $this->session->userdata('userId');
                $productid = $this->input->post("productid");
                $basketData = array();
                $product = $this->productmodel->GetWhId($productid);
                if ($userid == 0) {
                    echo 'Giriş Yapınız';
                } else {
                    if ($this->form_validation->run() == TRUE) {

                        $sameproduct = $this->basketmodel->GetBasketWhUserIdAndProductId($userid, $productid);

                        if ($sameproduct) {
                            $amount = $sameproduct[0]['Amount'];
                            $status = $sameproduct[0]['Status'];
                            $basketid = $sameproduct[0]['Id'];
                            $formamount = $this->input->post("amount");
                            $amount = $formamount + $amount;
                            $updatedBasket = array('Amount' => $amount);
                            if ($status == 0 ) { // sipariş verilmemiş , sepette
                                $basket = $this->basketmodel->IncreaseAmount($basketid, $updatedBasket, $userid);
                            }

                            if ($status == 1) { // onay bekliyor
                                $basket = array("Status" => 0);
                                $basket = $this->basketmodel->Update($basket, $basketid);
                                $basket = $this->basketmodel->IncreaseAmount($basketid, $updatedBasket, $userid);
                            }

                            if ($basket) {
                                $this->session->set_flashdata('basket_success', 'Sepetteki ürünün adeti güncellendi.');
                                redirect($this->ComeBackToUrl());
                            }
                        } else {
                            $price = $this->productmodel->GetWhId();
                            $basketData = array(
                                "UserId" => $userid,
                                "ProductId" => $this->input->post("productid"),
                                "Amount" => $this->input->post("amount"),
                                "Price" => $product[0]['Price'],
                                "Time" => $this->GetTimeNow());


                        }

                        $result = $this->basketmodel->Add($basketData);

                        if ($result) {
                            $this->session->set_flashdata('basket_success', 'Ürün sepete eklendi.');
                            redirect($this->ComeBackToUrl());
                        } else
                            echo $result;


                    } else {
                        $data['validation_error'] = "Tüm alanları doldurun.";
                        redirect($this->ComeBackToUrl());
                    }
                }
            }
        } else {
            redirect('Register');
        }
    }

    public function UpdateBasket()
    {
        if (!empty($this->GetUserId())) {
            if (isset($_POST['update'])) {
                $this->form_validation->set_rules("quantity", "Adeti Giriniz", "trim|required");
                $this->form_validation->set_rules("basketId", "Id Boş", "trim|required");
                $error_messages = $this->ErrorMessages();

                if ($this->form_validation->run() == TRUE) {
                    $basketid = $this->input->post("basketId");
                    $amount = $this->input->post("quantity");
                    $updatedBasket = array('Amount' => $amount);
                    $result = $this->basketmodel->IncreaseAmount($basketid, $updatedBasket, $this->session->userdata('userId'));
                    $this->session->set_flashdata('basket_success', 'Sepetteki ürünün adeti güncellendi.');
                    redirect($this->ComeBackToUrl());
                } else {
                    echo "Adeti Boş Bırakmayın";
                }

            }

            if (isset($_POST['delete'])) {
                $basketid = $this->input->post("basketId");
                $result = $this->basketmodel->DeleteWhId($basketid);
                $this->session->set_flashdata('basket_remove', 'Sepetteki ürün silindi');
                redirect($this->ComeBackToUrl());
            }
        } else {
            redirect('Register');
        }
    }

    public function Checkout()
    {
        if (!empty($this->GetUserId())) {
            $shippingPrice = $this->cleanHtmlTags($this->settingsmodel->GetSetting('Kargo')[0]->Detail);


            $mailMessage="Siparişiniz Alınmıştır...";

            $result = $this->basketmodel->Checkout($this->GetUserId(), $shippingPrice);


            if ($result) {
                $name = "Motocar Oto Bakım Ürünleri";

                $systeMail = $this->cleanHtmlTags($this->settingsmodel->GetMail()[0]['Detail']);
                $systeMailPass = $this->cleanHtmlTags($this->settingsmodel->GetMailPass()[0]['Detail']);

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
                $this->email->to($this->GetUserEmail());
                $this->email->subject("Sipariş Onayı");
                $this->email->message($mailMessage);

                $send = $this->email->send();
                if($send){
                    $this->SetFlashdata('basket_checkout','Siparişiniz gönderildi...');
                    redirect("Order");
                }

            }
        } else {
            redirect('Register');
        }
    }


}
