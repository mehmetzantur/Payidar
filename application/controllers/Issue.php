<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
include_once(dirname(__FILE__) . "/MI_Controller.php");

class Issue extends MI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if (empty($this->GetUserId())) {
            redirect("Register");
        } else {
            $this->load->view('issue/issue_question', $this->GetUserQuestions($this->GetUserId()));
        }

    }


    public function NewQuestion()
    {
        if (empty($this->GetUserId())) {
            redirect("Register");
        } else {
            $this->load->view('issue/issue_newquestion', $this->GetSettings());
        }

    }

    public function GetReply()
    {
        if (empty($this->GetUserId())) {
            redirect("Register");
        } else {
            $id = $this->uri->segment(3);
            $this->load->view('issue/issue_reply', $this->GetReplyWithQuestion($this->GetUserId(), $id));
        }


    }

    public function AddNewQuestion()
    {
        if (empty($this->GetUserId())) {
            redirect("Register");
        } else {

            if (isset($_POST['add'])) {
                $this->form_validation->set_rules("title", "Başlık", "required|trim");
                $this->form_validation->set_rules("question", "Mesaj", "required|trim");
                $error_messages = $this->ErrorMessages();


                if ($this->form_validation->run() == TRUE) {
                    date_default_timezone_set('Europe/Istanbul'); # add your city to set local time zone
                    $now = date('Y-m-d H:i:s');

                    $question = array(
                        "UserId" => $this->GetUserId(),
                        "Title" => $this->input->post("title"),
                        "Time" => $now,
                        "Status" => 0
                    );

                    $result = $this->issuemodel->Add($question); //id

                    if ($result) {
                        $reply = array(
                            "QuestionId" => $result,
                            "UserId" => $this->GetUserId(),
                            "Message" => $this->input->post("question"),
                            "Time" => $now
                        );

                        $resultreply = $this->issuemodel->AddReply($reply);
                        if ($resultreply)
                            redirect("Mesajlarim");
                        else
                            echo "hata reply" . $resultreply;
                    } else
                        echo "Hata" . $result;
                } else
                    $this->load->view('issue/issue_newquestion', $this->GetSettings());


            }

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
                        "UserId" => $this->GetUserId(),
                        "Message" => $this->input->post("message"),
                        "Time" => $now
                    );

                    $resultreply = $this->issuemodel->AddReply($reply);
                    if ($resultreply) {
                        $question = array(
                            "Status" => 0
                        );
                        $resultreply = $this->issuemodel->UpdateQuestion($question,$this->input->post("questionid"));
                        if ($resultreply)
                            redirect($this->ComeBackToUrl());
                    }
                    else
                        echo "hata reply" . $resultreply;
                } else
                    $this->load->view('issue/issue_reply', $this->GetSettings());
            } else
                $this->load->view('issue/issue_reply', $this->GetSettings());



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
                $this->load->view('issue/issue_reply', $this->GetSettings());

        }

    }




}
