<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once (dirname(__FILE__) . "../../MI_Controller.php");

class Comment extends MI_Controller {

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
			$this->load->view('panel/comment',$this->GetCommentAll());
		}
	}


	public function ActiveComment($id){
		$id = $this->uri->segment(4);
		$comment = array('Id' => $id, 'IsActive' => 1);
		$this->productmodel->ActiveCommentWhId($comment);
		redirect("Panel/Comment");
	}

	public function DeActiveComment($id){
		$id = $this->uri->segment(4);
		$comment = array('Id' => $id, 'IsActive' => 0);
		$this->productmodel->DeActiveCommentWhId($comment);
		redirect("Panel/Comment");
	}

    public function DeleteComment($id){
			$id = $this->uri->segment(4);
			$this->productmodel->DeleteCommentWhId($id);
			redirect("Panel/Comment");
		}



}
