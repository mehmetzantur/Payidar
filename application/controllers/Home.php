<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once (dirname(__FILE__) . "/MI_Controller.php");

class Home extends MI_Controller {

	public function __construct(){
		parent::__construct();
	}
	
	public function index()
	{
		$this->load->view('index',$this->GetSettings());
	}



	public function test()
	{
		echo "test";
	}
	

}
