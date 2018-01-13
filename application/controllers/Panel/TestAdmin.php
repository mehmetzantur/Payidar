<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class TestAdmin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        echo "test admin";
        //redirect('Panel/TestAdmin/Test');
        $this->load->view('panel/test');
    }

    public function Test()
    {
        echo "test";
    }
}
