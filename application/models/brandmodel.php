<?php

class brandmodel extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this->load->database();
        $this->db->save_queries = false;
	}

	public function GetAll(){
		$query = $this
			->db
			->order_by('Order', 'ASC')
			->get('brand');
		return $query->result_array();

	}


    public function GetBrandAllCount()
    {
        $query = $this
            ->db
            ->get('brand');
        return $query->num_rows();

    }


	public function Add($brand)
    {
        $query=$this
            ->db
            ->insert("brand",$brand);
        return $query;
    }

		public function Update($brand,$id)
	    {
	        $query=$this
	            ->db
                ->where('id',$id)
	            ->update("brand",$brand);
	        return $query=$this->GetWhId($id);
	    }

	public function GetWhId($id)
    {
        $query=$this
            ->db
			->where('Id',$id)
			->limit(1)
            ->get('brand');
        return $query->result_array();
	}

	public function DeleteWhId($id)
    {
        $this
			->db
			->where('Id',$id)
			->delete('brand');
    }


}

?>
