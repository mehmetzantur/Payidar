<?php

class usermodel extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this->load->database();
        $this->db->save_queries = false;
	}
	
	public function GetAll(){
		$query = $this->db->get('user');
		return $query->result_array();
	}


    public function GetCityList(){
        $query = $this->db->get('iller');
        return $query->result_array();
    }
	
	
	public function Add($userData){
		return $this->db->insert('user',$userData);
	}

	public function GetWhId($id)
    {
        $query=$this
            ->db
			->where('Id',$id)
			->limit(1)
            ->get('user');
        return $query->result_array();
    }

    public function GetUserAllCount()
    {
        $query = $this
            ->db
            ->get('user');
        return $query->num_rows();

    }

    public function GetUserAdminCount($aut)
    {
        $query = $this
            ->db
			->where('Authority',$aut)
            ->get('user');
        return $query->num_rows();

    }

	
	public function Update($user,$id)
	{
		$query=$this
			->db
			->where('Id',$id)
			->update("user",$user);
		return $query=$this->GetWhId($id);
	}

	public function DeleteWhId($id)
    {
        $this
			->db
			->where('Id',$id)
			->delete('user');
	}

    public function Login($email, $password, $authority){
        $this->db->where('Email',$email);
        $this->db->where('Password',$password);
		$this->db->where('Authority',$authority);
		$this->db->limit(1);
		$query = $this->db->get('user');
        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return 0;
        }
	}
    
}

?>
