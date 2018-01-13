<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
include_once(dirname(__FILE__) . "../../MI_Controller.php");

class Category extends MI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('CategoryModel');
        $this->load->helper(array('form', 'url', 'date'));
        $this->load->library("form_validation");
    }


    public function index()
    {
        $session = $this->SessionControlAdmin();

        if (!$session) {
            redirect("Panel/Login");
        } else {
            $settings = $this->GetSettings();
            $settings['category'] = $this->categorymodel->GetAll();
            $this->load->view('panel/category', $settings);
        }
    }


    public function Add()
    {
        if (isset($_POST['add'])) {
            $this->form_validation->set_rules("subid", "Üst Kategori", "trim");
            $this->form_validation->set_rules("order", "Sırası", "trim");
            $this->form_validation->set_rules("name", "Kategori Adı", "trim|required");
            $error_messages = $this->ErrorMessages();

            if ($this->form_validation->run() == TRUE) {
                $config['upload_path'] = 'Uploads/Category/';
                $config['allowed_types'] = '*';
                $config['encrypt_name'] = true;

                $this->load->library('upload', $config);
                $upload = $this->upload->do_upload('image');
                if ($upload) {
                    //$path = $this->upload->data('full_path');
                    $path = $this->upload->data();
                } else {
                    echo $this->upload->display_errors();
                }
                if ($path) {
                    $categoryData = array(
                        "ParentId" => $this->input->post("parentid"),
                        "Order" => $this->input->post("order"),
                        "Name" => $this->input->post("name"),
                        "Image" => $path['file_name']
                    );

                    $result = $this->categorymodel->Add($categoryData);

                    if ($result) {
                        redirect("Panel/Category");
                    } else
                        echo $result;
                } else {
                    echo "dosya boş geldi";
                }

            } else {
                $data['validation_error'] = "Tüm alanları doldurun.";
                $this->load->view('panel/category/addcategory', $data);
            }
        }
    }

    public function Update()
    {
        if (isset($_POST['update'])) {
            $this->form_validation->set_rules("subid", "Üst Kategori", "trim");
            $this->form_validation->set_rules("order", "Sırası", "trim");
            $this->form_validation->set_rules("name", "Kategori Adı", "trim|required");
            $error_messages = $this->ErrorMessages();

            if ($this->form_validation->run() == TRUE) {
                $config['upload_path'] = 'Uploads/';
                $config['allowed_types'] = '*';
                $config['encrypt_name'] = true;

                $this->load->library('upload', $config);
                $upload = $this->upload->do_upload('image');
                $path = null;
                if ($upload) {
                    //$path = $this->upload->data('full_path');
                    $path = $this->upload->data();
                } else {
                    echo $this->upload->display_errors();
                }
                if ($path) {
                    $categoryData = array(
                        "ParentId" => $this->input->post("parentid"),
                        "Order" => $this->input->post("order"),
                        "Name" => $this->input->post("name"),
                        "Image" => $path['file_name']
                    );

                } else {
                    //echo "dosya boş geldi";
                    $categoryData = array(
                        "ParentId" => $this->input->post("parentid"),
                        "Order" => $this->input->post("order"),
                        "Name" => $this->input->post("name")
                    );
                }

                $id = $this->input->post("hidden");
                $result = $this->categorymodel->Update($categoryData, $id);

                if ($result) {
                    redirect("Panel/Category");
                } else
                    echo $result;

            } else {
                $data['validation_error'] = "Tüm alanları doldurun.";
                $this->load->view('panel/category/addcategory', $data);
            }
        }
    }


    public function AddCategory()
    {
        $settings = $this->GetSettings();
        $settings['category'] = $this->categorymodel->GetAll();
        $this->load->view('panel/category/addcategory', $settings);
    }

    public function UpdateCategory($id)
    {
        $id = $this->uri->segment(4);
        $settings = $this->GetSettings();
        $settings['category'] = $this->categorymodel->GetAll();
        $settings['categoryWhId'] = $this->categorymodel->GetWhId($id);
        $this->load->view('panel/category/updatecategory', $settings);
    }

    public function DeleteCategory($id)
    {
        $id = $this->uri->segment(4);
        $this->categorymodel->DeleteWhId($id);
        $data['category'] = $this->categorymodel->GetAll();
        redirect("Panel/Category");
    }

}
