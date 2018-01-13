<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once (dirname(__FILE__) . "../../MI_Controller.php");

class Home extends MI_Controller {

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
			$this->load->view('panel/index', $this->Dashboard());
		}
	}
	
	

	public function Logout()
    {
    	$this->LogoutAdmin();
    }

    public function test()
    {
        $this->load->view('panel/test');
    }

}