<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MI_Controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library("form_validation");
        $this->load->helper(array('form', 'url', 'date'));
        $this->db->save_queries = false;
    }

    public function SetFlashdata($status, $message)
    {
        return $this->session->set_flashdata($status, $message);
    }

    public function SessionControl()
    {
        $user = $this->session->userdata('userFirstName');
        if (!empty($user))
            return $user;
        else
            return FALSE;
    }

    public function GetUserId()
    {
        $user = $this->session->userdata('userId');
        if (!empty($user))
            return $user;
        else
            return FALSE;
    }

    public function GetAdminId()
    {
        $user = $this->session->userdata('adminId');
        if (!empty($user))
            return $user;
        else
            return FALSE;
    }

    public function SessionControlAdmin()
    {
        $adminFirstName = $this->session->userdata('adminFirstName');
        if (!empty($adminFirstName))
            return $adminFirstName;
        else
            return FALSE;
    }

    public function Logout()
    {
        $this->session->sess_destroy();
        redirect("Home");
    }

    public function LogoutAdmin()
    {
        $this->session->sess_destroy();
        redirect("Panel/Login");
    }

    public function ErrorMessages()
    {
        $error_messages = array(
            "required" => "Bu alanını doldurmak zorundasınız.",
            "valid_email" => "Geçerli bir mail adresi giriniz.",
            "is_unique" => "Bu mail sisteme kayıtlıdır.",
            "min_length" => "En az 6 karakterden oluşmalıdır.",
            "max_length" => "En fazla 20 karakterden oluşmalıdır.",
            "matches" => "Şifreler birbiri ile uyumsuz."
        );

        $this->form_validation->set_error_delimiters('<div class="validError">', '</div>');
        $this->form_validation->set_message($error_messages);
        return $error_messages;
    }


    public function ComeBackToUrl()
    {
        return $this->agent->referrer();
    }

    public function GetTimeNow()
    {
        date_default_timezone_set('Europe/Istanbul'); # add your city to set local time zone
        return date('Y-m-d H:i:s');
    }

    public function ImageResize($source_image, $new_image, $width, $height)
    {
        $config['image_library'] = 'gd2';
        $config['source_image'] = $source_image;
        $config['create_thumb'] = FALSE;
        $config['maintain_ratio'] = FALSE;
        $config['quality'] = '100%';
        $config['width'] = $width;
        $config['height'] = $height;
        $config['new_image'] = $new_image;
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
    }

    public function GetSettings()
    {


        $userid = $this->session->userdata('userId');
        $result = $this->settingsmodel->GetSetting('Title');

        $settings['title'] = strip_tags($result[0]->Detail);

        $result = $this->settingsmodel->GetSetting('Telefon');
        $settings['telefon'] = strip_tags($result[0]->Detail);

        $result = $this->settingsmodel->GetSetting('Adres');
        $settings['address'] = strip_tags($result[0]->Detail);

        $result = $this->settingsmodel->GetSetting('Email');
        $settings['email'] = strip_tags($result[0]->Detail);

        $result = $this->settingsmodel->GetSetting('Logo');
        $settings['logo'] = strip_tags($result[0]->Image);

        $result = $this->settingsmodel->GetSetting('Logo-Mobile');
        $settings['logo_xs'] = strip_tags($result[0]->Image);

        $settings['homeSlider'] = $this->slidermodel->GetAllIsActive();

        $settings['allcategory'] = $this->categorymodel->GetParents();

        $settings['allbrand'] = $this->brandmodel->GetAll();

        $settings['discounts'] = $this->productmodel->GetDiscounts();
        $settings['alldiscounts'] = $this->productmodel->GetAllDiscounts();
        $settings['thenewests'] = $this->productmodel->GetNewests();
        $settings['allthenewests'] = $this->productmodel->GetAllNewests();

        $settings['Bestsellers'] = $this->productmodel->Bestsellers();
        $settings['AllBestsellers'] = $this->productmodel->AllBestsellers();

        $settings['GetBasket'] = $this->basketmodel->GetBasket($userid);

        $settings['userFirstName'] = $this->SessionControl();
        $settings['userId'] = $this->session->userdata('userId');
        $settings['datestring'] = '%d.%m.%Y - %h:%i %a';
        $settings['datestring2'] = '%d.%m.%Y <br> %h:%i %a';

        $shipping = $this->settingsmodel->GetSetting('Kargo');
        $settings['shippingPrice'] = $this->cleanHtmlTags($shipping[0]->Detail);

        $settings['waitingMsgCount'] = $this->issuemodel->GetMsgCount();
        $settings['waitingCommentCount'] = $this->productmodel->GetCommentCount();

        $settings['customPages'] = $this->settingsmodel->GetCustomPages();

        $settings['cityList'] = $this->usermodel->GetCityList();

        return $settings;
    }

    public function GetCustomPagesWh($id)
    {
        $settings = $this->GetSettings();
        $settings['customPagesWh'] = $this->settingsmodel->GetCustomPagesWh($id);
        return $settings;
    }

    public function cleanHtmlTags($data)
    {
        return strip_tags($data);
    }

    public function SplitCategories($item)
    {
        return explode(",", $item);
    }

    // Product Controller
    public function GetProductWhId($id)
    {
        $topcategories = new StdClass;
        $topcategoriesArray[] = "";
        $settings = $this->GetSettings();


        $settings['GetProduct'] = $this->productmodel->GetWhId($id);
        $settings['GetGallery'] = $this->productmodel->GetWhIdGallery($id);

        $catid = $settings['GetProduct'][0]['CategoryId'];
        $brandid = $settings['GetProduct'][0]['BrandId'];
        $productid = $settings['GetProduct'][0]['Id'];


        $settings['GetProductCategory'] = $this->categorymodel->GetWhId($catid);
        $settings['GetProductBrand'] = $this->brandmodel->GetWhId($brandid);
        $settings['GetCommentsWithUserWhId'] = $this->productmodel->GetCommentsWithUserWhId($productid);


        $categories = $this->SplitCategories($settings['GetProduct'][0]['Categories']);
        $catcount = count($categories);
        for ($i = 0; $i <= $catcount - 1; $i++) {
            if ($categories[$i] != 0) {
                $topcategories->Name = $this->categorymodel->GetWhId($categories[$i])[0]['Name'];
                $topcategories->Id = $this->categorymodel->GetWhId($categories[$i])[0]['Id'];
                $topcategoriesArray[$i] = array(
                    'Name' => $topcategories->Name,
                    'Id' => $topcategories->Id
                );
            }
        }

        $settings['GetProductCategories'] = $topcategoriesArray;
        return $settings;
    }

    public function GetProductsForCategoryWh($id)
    {
        $settings = $this->GetSettings();

        $settings['GetProductsForCategory'] = $this->productmodel->GetProductsForCategoryWh($id);
        $settings['GetSelectedCategory'] = $this->categorymodel->GetWhId($id);
        return $settings;
    }

    public function GetProductsForBrandWh($id)
    {
        $settings = $this->GetSettings();

        $settings['GetProductsForBrand'] = $this->productmodel->GetProductsForBrandWh($id);
        return $settings;
    }

    public function GetSearchedProductsWh($text)
    {
        $settings = $this->GetSettings();

        $settings['GetSearchedProducts'] = $this->productmodel->GetSearchedProductsWh($text);
        $settings['SearchedText'] = $text;
        return $settings;
    }

    // Product Controller


    // Comment Controller

    public function GetCommentAll()
    {

        $settings = $this->GetSettings();


        $settings['GetCommentAll'] = $this->productmodel->GetCommentAll();
        return $settings;
    }

    // Comment Controller


    // Basket Controller


    public function GetBasketWhUserId()
    {
        $settings = $this->GetSettings();

        $userid = $this->session->userdata('userId');
        $settings['GetBasketWhUserId'] = $this->basketmodel->GetBasketWhUserId($userid);
        return $settings;
    }

    public function GetBasketWhUserIdWithProduct()
    {
        $settings = $this->GetSettings();

        $userid = $this->session->userdata('userId');
        $settings['GetBasketWhUserIdWithProduct'] = $this->basketmodel->GetBasketWhUserIdWithProduct($userid);
        return $settings;
    }


    // Basket Controller


    // Profile Controller

    public function GetUserProfile($id)
    {
        $settings = $this->GetSettings();
        $settings['GetUserProfile'] = $this->usermodel->GetWhId($id);
        return $settings;
    }

    // Profile Controller


    // Issue Controller

    public function GetUserQuestions($userid)
    {
        $settings = $this->GetSettings();
        $settings['GetUserQuestions'] = $this->issuemodel->GetUserQuestions($userid);
        return $settings;
    }

    public function GetReplyWithQuestion($userid, $id)
    {
        $settings = $this->GetSettings();
        $settings['GetUserQuestion'] = $this->issuemodel->GetUserQuestion($userid, $id);
        $settings['GetReply'] = $this->issuemodel->GetReplyWh($id);
        return $settings;
    }

    // Issue Controller


    // Issue Controller PANEL

    public function GetAllQuestions()
    {
        $settings = $this->GetSettings();
        $settings['GetAllQuestions'] = $this->issuemodel->GetAllQuestions();
        return $settings;
    }

    public function GetAllReplyWithQuestion($id)
    {
        $settings = $this->GetSettings();
        $settings['GetQuestion'] = $this->issuemodel->GetQuestion($id);
        $settings['GetReply'] = $this->issuemodel->GetReplyWh($id);
        return $settings;
    }

    // Issue Controller PANEL



    // Order Controller

    public function GetUserOrders($userid)
    {
        $settings = $this->GetSettings();
        $settings['GetUserOrders'] = $this->ordermodel->GetUserOrders($userid);
        return $settings;
    }

    // Order Controller


    // Order Controller PANEL

    public function GetOrders()
    {
        $settings = $this->GetSettings();
        $settings['GetOrders'] = $this->ordermodel->GetOrders();
        return $settings;
    }

    // Order Controller PANEL


    // Home Controller PANEL DASHBOARD

    public function Dashboard()
    {
        $settings = $this->GetSettings();

        $issueArray = array(
            'allCount' => $this->issuemodel->GetAllMsgCount(),
            'warningCount' => $this->issuemodel->GetMsgCountWh(0),
            'successCount' => $this->issuemodel->GetMsgCountWh(1),
            'dangerCount' => $this->issuemodel->GetMsgCountWh(2)
        );

        $sliderArray = array(
            'allCount' => $this->slidermodel->GetSliderAllCount(),
            'activeCount' => $this->slidermodel->GetSliderCountWh(1),
            'deactiveCount' => $this->slidermodel->GetSliderCountWh(0)
        );

        $productArray = array(
            'allCount' => $this->productmodel->GetAllProductCount(),
            'amountSum' => $this->productmodel->GetSumAmount()
        );

        $commentArray = array(
            'allCount' => $this->productmodel->GetCommentAllCount(),
            'activeCount' => $this->productmodel->GetCommentCountWh(1),
            'deactiveCount' => $this->productmodel->GetCommentCountWh(0)
        );

        $orderArray = array(
            'allCount' => $this->ordermodel->GetOrderAllCount(),
            'warningCount' => $this->ordermodel->GetOrderCountWh(2),
            'successCount' => $this->ordermodel->GetOrderCountWh(1),
            'dangerCount' => $this->ordermodel->GetOrderCountWh(-1)
        );

        $categoryArray = array(
            'allCount' => $this->categorymodel->GetCategoryAllCount()
        );

        $brandArray = array(
            'allCount' => $this->brandmodel->GetBrandAllCount()
        );

        $userArray = array(
            'allCount' => $this->usermodel->GetUserAllCount(),
            'userCount' => $this->usermodel->GetUserAdminCount(10),
            'adminCount' => $this->usermodel->GetUserAdminCount(100)
        );

        $settingsArray = array(
            'allCount' => $this->settingsmodel->GetCount()
        );

        $settings['dashboard'] = array(
            'Issue' => $issueArray,
            'Slider' => $sliderArray,
            'Product' => $productArray,
            'Comment' => $commentArray,
            'Order' => $orderArray,
            'Category' => $categoryArray,
            'Brand' => $brandArray,
            'User' => $userArray,
            'Settings' => $settingsArray
        );


        return $settings;
    }

    // Home Controller PANEL DASHBOARD
}
