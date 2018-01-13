<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
include_once(dirname(__FILE__) . "../../MI_Controller.php");

class Product extends MI_Controller
{

    public function __construct()
    {
        parent::__construct();

    }


    public function index()
    {
        $session = $this->SessionControlAdmin();

        if (!$session) {
            redirect("Panel/Login");
        } else {
            $settings = $this->GetSettings();
            $settings['product'] = $this->productmodel->GetAll();
            $this->load->view('panel/product', $settings);
        }
    }


    public function GetCategories($parentid)
    {
        $cat1 = $this->categorymodel->objGetWhId($parentid);
        foreach ($cat1 as $list) {
            $iid = $this->GetCategories($list->ParentId);
            if ($iid != 0)
                $deneme = "," . $iid;
        }

        return $parentid . @$deneme;
    }

    public function Add()
    {
        if (isset($_POST['add'])) {
            $this->form_validation->set_rules("categoryid", "Kategori", "trim");
            $this->form_validation->set_rules("brandid", "Marka", "trim");
            $this->form_validation->set_rules("order", "Sırası", "trim");
            $this->form_validation->set_rules("name", "Ürün Adı", "trim|required");
            $this->form_validation->set_rules("price", "Ürün Fiyatı", "trim|required");
            $this->form_validation->set_rules("oldprice", "Ürün Eski Fiyatı", "trim");
            $this->form_validation->set_rules("detail", "Ürün Detayı", "trim|required");
            $error_messages = $this->ErrorMessages();

            if ($this->form_validation->run() == TRUE) {
                $config['upload_path'] = 'Uploads/Product/';
                $config['allowed_types'] = '*';
                $config['encrypt_name'] = true;

                date_default_timezone_set('Europe/Istanbul'); # add your city to set local time zone
                $now = date('Y-m-d H:i:s');

                $this->load->library('upload', $config);
                $upload = $this->upload->do_upload('image');
                if ($upload) {
                    //$path = $this->upload->data('full_path');
                    $path = $this->upload->data();

                    $source_image = 'Uploads/Product/' . $path['file_name'];
                    $new_image = 'Uploads/Product/' . $path['file_name'];
                    $width = 1000;
                    $height = 1000;
                    $this->ImageResize($source_image, $new_image, $width, $height);

                } else {
                    echo $this->upload->display_errors();
                }
                if ($path) {
                    $values = $this->input->post("categoryid");
                    $listUpCat = $this->categorymodel->objGetWhId($values);
                    foreach ($listUpCat as $list) {
                        $catwalk = $this->GetCategories($list->ParentId);
                    }

                    $catwalk = $values . "," . $catwalk;


                    $productData = array(
                        "CategoryId" => $this->input->post("categoryid"),
                        "BrandId" => $this->input->post("brandid"),
                        "Order" => $this->input->post("order"),
                        "Name" => $this->input->post("name"),
                        "Price" => $this->input->post("price"),
                        "OldPrice" => $this->input->post("oldprice"),
                        "Detail" => $this->input->post("detail"),
                        "Image" => $path['file_name'],
                        "Categories" => $catwalk,
                        "LastTime" => $now
                    );

                    $result = $this->productmodel->Add($productData);

                    if ($result) {
                        redirect("Panel/Product");
                    } else
                        echo $result;
                } else {
                    echo "Resim Seçilmedi!!!";
                }

            } else {
                $data['validation_error'] = "Tüm alanları doldurun.";
                $this->load->view('panel/product/addproduct', $data);
            }
        }
    }

    public function Update()
    {

        if (isset($_POST['update'])) {
            $this->form_validation->set_rules("categoryid", "Kategori", "trim");
            $this->form_validation->set_rules("brandid", "Marka", "trim");
            $this->form_validation->set_rules("order", "Sırası", "trim");
            $this->form_validation->set_rules("name", "Ürün Adı", "trim|required");
            $this->form_validation->set_rules("price", "Ürün Fiyatı", "trim|required");
            $this->form_validation->set_rules("oldprice", "Ürün Eski Fiyatı", "trim");
            $this->form_validation->set_rules("detail", "Ürün Detayı", "trim|required");
            $error_messages = $this->ErrorMessages();

            if ($this->form_validation->run() == TRUE) {
                $config['upload_path'] = 'Uploads/Product/';
                $config['allowed_types'] = '*';
                $config['encrypt_name'] = true;

                date_default_timezone_set('Europe/Istanbul'); # add your city to set local time zone
                $now = date('Y-m-d H:i:s');

                $this->load->library('upload', $config);
                $upload = $this->upload->do_upload('image');
                $path = null;
                if ($upload) {
                    //$path = $this->upload->data('full_path');
                    $path = $this->upload->data();

                    $source_image = 'Uploads/Product/' . $path['file_name'];
                    $new_image = 'Uploads/Product/' . $path['file_name'];
                    $width = 1000;
                    $height = 1000;
                    $this->ImageResize($source_image, $new_image, $width, $height);

                } else {
                    echo $this->upload->display_errors();
                }
                if ($path) {
                    $values = $this->input->post("categoryid");
                    $listUpCat = $this->categorymodel->objGetWhId($values);
                    foreach ($listUpCat as $list) {
                        $catwalk = $this->GetCategories($list->ParentId);
                    }

                    $catwalk = $values . "," . $catwalk;

                    $productData = array(
                        "CategoryId" => $this->input->post("categoryid"),
                        "BrandId" => $this->input->post("brandid"),
                        "Order" => $this->input->post("order"),
                        "Name" => $this->input->post("name"),
                        "Price" => $this->input->post("price"),
                        "OldPrice" => $this->input->post("oldprice"),
                        "Detail" => $this->input->post("detail"),
                        "Image" => $path['file_name'],
                        "Categories" => $catwalk,
                        "LastTime" => $now
                    );

                } else {
                    //echo "dosya boş geldi";
                    $values = $this->input->post("categoryid");
                    $listUpCat = $this->categorymodel->objGetWhId($values);
                    foreach ($listUpCat as $list) {
                        $catwalk = $this->GetCategories($list->ParentId);
                    }

                    $catwalk = $values . "," . $catwalk;

                    $productData = array(
                        "CategoryId" => $this->input->post("categoryid"),
                        "BrandId" => $this->input->post("brandid"),
                        "Order" => $this->input->post("order"),
                        "Name" => $this->input->post("name"),
                        "Price" => $this->input->post("price"),
                        "OldPrice" => $this->input->post("oldprice"),
                        "Detail" => $this->input->post("detail"),
                        "Categories" => $catwalk,
                        "LastTime" => $now
                    );
                }

                $id = $this->input->post("hidden");
                $result = $this->productmodel->Update($productData, $id);

                if ($result) {
                    redirect("Panel/Product");
                } else
                    echo redirect("Panel/Product");

            } else {
                $data['validation_error'] = "Tüm alanları doldurun.";
                $this->load->view('panel/product/addproduct', $data);
            }
        }
    }

    public function AddGallery()
    {
        if (isset($_POST['upload'])) {
            $config['upload_path'] = 'Uploads/Product/Gallery/';
            $config['allowed_types'] = '*';
            $config['encrypt_name'] = true;

            $this->load->library('upload', $config);
            $upload = $this->upload->do_upload('galleryimage');
            $path = null;
            if ($upload) {
                //$path = $this->upload->data('full_path');
                $path = $this->upload->data();

                $source_image = 'Uploads/Product/Gallery/' . $path['file_name'];
                $new_image = 'Uploads/Product/Gallery/' . $path['file_name'];
                $width = 1000;
                $height = 1000;
                $this->ImageResize($source_image, $new_image, $width, $height);

            } else {
                echo $this->upload->display_errors();
            }
            if ($path) {
                $galleryData = array(
                    "ProductId" => $this->input->post("hidden"),
                    "Image" => $path['file_name']
                );
                $result = $this->productmodel->AddGallery($galleryData);
                if ($result) {
                    redirect("Panel/Product/UpdateProduct/" . $this->input->post("hidden"));
                } else
                    redirect("Panel/Product");
            } else {
                echo "Resim Seçilmedi!!!";
            }
        }
    }

    public function AddProduct()
    {
        $settings = $this->GetSettings();
        $settings['category'] = $this->categorymodel->GetAll();
        $settings['product'] = $this->productmodel->GetAll();
        $settings['brand'] = $this->brandmodel->GetAll();
        $this->load->view('panel/product/addproduct', $settings);
    }

    public function UpdateProduct($id)
    {
        $id = $this->uri->segment(4);
        $settings = $this->GetSettings();

        $settings['category'] = $this->categorymodel->GetAll();
        $settings['productWhId'] = $this->productmodel->GetWhId($id);
        $settings['galleryWhId'] = $this->productmodel->GetWhIdGallery($id);
        $settings['brand'] = $this->brandmodel->GetAll();

        $this->load->view('panel/product/updateproduct', $settings);
    }

    public function DeleteProduct($id)
    {
        $id = $this->uri->segment(4);
        $this->productmodel->DeleteWhId($id);
        $settings = $this->GetSettings();
        $settings['product'] = $this->productmodel->GetAll();
        redirect("Panel/Product");
        $this->load->view('panel/product', $settings);
    }

    public function DeleteGallery($id)
    {
        $id = $this->uri->segment(4);
        $productid = $this->uri->segment(5);
        $this->productmodel->DeleteGalleryWhId($id);
        redirect("Panel/Product/UpdateProduct/" . $productid);
    }


}
