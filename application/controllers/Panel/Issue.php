<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
include_once (dirname(__FILE__) . "../../MI_Controller.php");

class Issue extends MI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if (empty($this->GetAdminId())) {
            redirect("Panel/Login");
        } else {
            $this->load->view('panel/issue/issue_question', $this->GetAllQuestions($this->GetUserId()));
        }

    }



    public function GetReply()
    {
        if (empty($this->GetAdminId())) {
            redirect("Panel/Login");
        } else {
            $id = $this->uri->segment(4);
            $this->load->view('panel/issue/issue_reply', $this->GetAllReplyWithQuestion($id));
        }


    }



    public function AddNewReply()
    {
        if (empty($this->GetUserId())) {
            redirect("Register");
        } else {

            if (isset($_POST['reply'])) {
                $this->form_validation->set_rules("questionid", "Soru Id", "required|trim");
                $this->form_validation->set_rules("message", "Mesaj", "required|trim");
                $error_messages = $this->ErrorMessages();


                if ($this->form_validation->run() == TRUE) {
                    date_default_timezone_set('Europe/Istanbul'); # add your city to set local time zone
                    $now = date('Y-m-d H:i:s');

                    $reply = array(
                        "QuestionId" => $this->input->post("questionid"),
                        "UserId" => $this->GetAdminId(),
                        "Message" => $this->input->post("message"),
                        "Time" => $now
                    );

                    $resultreply = $this->issuemodel->AddReply($reply);
                    if ($resultreply) {
                        $question = array(
                            "Status" => 1
                        );
                        $resultreply = $this->issuemodel->UpdateQuestion($question,$this->input->post("questionid"));
                        if ($resultreply)
                            redirect($this->ComeBackToUrl());
                    }
                    else
                        echo "hata reply" . $resultreply;
                } else
                    $this->load->view('panel/issue/issue_reply', $this->GetAllReplyWithQuestion($this->input->post("questionid")));
            } else
                $this->load->view('panel/issue/issue_reply', $this->GetAllReplyWithQuestion($this->input->post("questionid")));



            if (isset($_POST['closeQuestion'])) {
                $this->form_validation->set_rules("questionid", "Başlık", "required|trim");
                $error_messages = $this->ErrorMessages();


                if ($this->form_validation->run() == TRUE) {
                    $question = array(
                        "Status" => 2
                    );
                    $resultreply = $this->issuemodel->UpdateQuestion($question,$this->input->post("questionid"));
                    if ($resultreply)
                        redirect($this->ComeBackToUrl());
                } else
                    echo "Hata" . 'validation hatası';
            } else
                $this->load->view('panel/issue/issue_reply', $this->GetAllReplyWithQuestion($this->input->post("questionid")));

        }

    }




}
