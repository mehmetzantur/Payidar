<?php

class issuemodel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->db->save_queries = false;
    }

    public function GetMsgCount()
    {
        $query = $this
            ->db
            ->where('Status', 0)
            ->get('issue_question');
        return $query->num_rows();

    }

    public function GetMsgCountWh($status)
    {
        $query = $this
            ->db
            ->where('Status', $status)
            ->get('issue_question');
        return $query->num_rows();

    }

    public function GetAllMsgCount()
    {
        $query = $this
            ->db
            ->get('issue_question');
        return $query->num_rows();

    }



    public function Add($question)
    {
        $query = $this
            ->db
            ->insert("issue_question", $question);
        return $this->db->insert_id();
    }

    public function AddReply ($reply)
    {
        $query = $this
            ->db
            ->insert("issue_reply", $reply);
        return $query;
    }

    public function UpdateQuestion($question,$id)
    {
        $query=$this
            ->db
            ->where('id',$id)
            ->update("issue_question",$question);
        return true;
    }

    public function GetUserQuestion($userid,$id)
    {
        $query = $this
            ->db
            ->select('issue_question.Id as issue_questionId,
                 issue_question.UserId as issue_questionUserId,
                 issue_question.Title as issue_questionTitle,
                 issue_question.Status as issue_questionStatus,
                 issue_question.Time as issue_questionTime,

                 user.Id as userId,
                 user.FirstName as userFirstName,
                 user.LastName as userLastName,
                 user.Image as userImage'
            )
            ->where('issue_question.Id', $id)
            ->where('issue_question.UserId', $userid)
            ->from('issue_question')
            ->join('user', 'user.Id = issue_question.UserId ')
            ->get();
        return $query->result_array();

    }




    public function GetReplyWh($id)
    {
        $query = $this
            ->db
            ->select('issue_reply.Id as issue_replyId,
                 issue_reply.QuestionId as issue_replyQuestionId,
                 issue_reply.UserId as issue_replyUserId,
                 issue_reply.Message as issue_replyMessage,
                 issue_reply.Time as issue_questionTime,
                 
                 user.Id as userId,
                 user.FirstName as userFirstName,
                 user.LastName as userLastName,
                 user.Image as userImage'
            )
            ->where('QuestionId', $id)
            ->order_by('issue_replyId', 'DESC')
            ->from('issue_reply')
            ->join('user', 'user.Id = issue_reply.UserId ')
            ->get();
        return $query->result_array();
    }

    public function GetAllQuestions()
    {
        $query = $this
            ->db
            ->select('issue_question.Id as issue_questionId,
                 issue_question.UserId as issue_questionUserId,
                 issue_question.Title as issue_questionTitle,
                 issue_question.Status as issue_questionStatus,
                 issue_question.Time as issue_questionTime,

                 user.Id as userId,
                 user.FirstName as userFirstName,
                 user.LastName as userLastName'
            )
            ->order_by('issue_questionStatus', 'ASC')
            ->from('issue_question')
            ->join('user', 'user.Id = issue_question.UserId ')
            ->get();
        return $query->result_array();

    }

    public function GetQuestion($id)
    {
        $query = $this
            ->db
            ->select('issue_question.Id as issue_questionId,
                 issue_question.UserId as issue_questionUserId,
                 issue_question.Title as issue_questionTitle,
                 issue_question.Status as issue_questionStatus,
                 issue_question.Time as issue_questionTime,

                 user.Id as userId,
                 user.FirstName as userFirstName,
                 user.LastName as userLastName,
                 user.Image as userImage'
            )
            ->where('issue_question.Id', $id)
            ->from('issue_question')
            ->join('user', 'user.Id = issue_question.UserId ')
            ->get();
        return $query->result_array();

    }

    public function GetUserQuestions($userid)
    {
        $query = $this
            ->db
            ->select('issue_question.Id as issue_questionId,
                 issue_question.UserId as issue_questionUserId,
                 issue_question.Title as issue_questionTitle,
                 issue_question.Status as issue_questionStatus,
                 issue_question.Time as issue_questionTime,

                 user.Id as userId,
                 user.FirstName as userFirstName,
                 user.LastName as userLastName'
            )
            ->order_by('issue_questionId', 'DESC')
            ->where('issue_question.UserId', $userid)
            ->from('issue_question')
            ->join('user', 'user.Id = issue_question.UserId ')
            ->get();
        return $query->result_array();

    }
}