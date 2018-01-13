<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
include_once(dirname(__FILE__) . "/MI_Controller.php");

class Product extends MI_Controller
{

    public function __construct()
    {
        parent::__construct();

    }


    public function index()
    {
        $this->load->view('Product');
    }

    public function AllDiscounts()
    {

        $this->load->view('alldiscounts',$this->GetSettings());
    }

    public function AllTheNewests()
    {

        $this->load->view('allthenewests',$this->GetSettings());
    }

    public function AllBestSellers()
    {

        $this->load->view('allbestsellers',$this->GetSettings());
    }

    public function GetProduct()
    {
        $id = $this->uri->segment(3);
        $this->load->view('product', $this->GetProductWhId($id));
    }

    public function GetProductsForCategory()
    {
        $id = $this->uri->segment(3);
        $this->load->view('category',$this->GetProductsForCategoryWh($id));
    }

    public function GetProductsForBrand()
    {
        $id = $this->uri->segment(3);
        $this->load->view('brand',$this->GetProductsForBrandWh($id));
    }

    public function GetSearchedProducts()
    {
        $text = $this->input->post('search');
        $this->load->view('search',$this->GetSearchedProductsWh($text));
    }

    public function AddComment()
    {
        if (isset($_POST['addcomment'])) {

            $this->form_validation->set_rules("txtcomment", "Yorum", "trim|required");
            $error_messages = $this->ErrorMessages();

            if ($this->form_validation->run() == TRUE) {

                date_default_timezone_set('Europe/Istanbul'); # add your city to set local time zone
                $now = date('Y-m-d H:i:s');
                $userId = $this->session->userdata('userId');
                $commentData = array(
                    "Comment" => $this->input->post("txtcomment"),
                    "ProductId" => $this->input->post("productId"),
                    "UserId" => $userId,
                    "Vote" => $this->input->post("rating"),
                    "VoteTime" => $now
                );

                $result = $this->productmodel->AddComment($commentData);

                if ($result) {
                    $this->session->set_flashdata('comment_success', 'Yönetici onaylandıktan sonra yayınlanacaktır.');
                    echo "dsadsadsa";
                    redirect($this->ComeBackToUrl());
                } else
                    echo $result;
            } else {

                //echo 'Yorum alanını doldurun.';
                redirect($this->ComeBackToUrl());
                //$this->load->view('product/addproduct',$data);
            }

        } else {
            echo 'Tüm alanları doldurun.';                                    //$this->load->view('panel/product/addproduct',$data);
        }

    }




}
