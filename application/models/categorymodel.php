<?php

class categorymodel extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this->load->database();
        $this->db->save_queries = false;
	}

	public function GetAll(){
		$query = $this
			->db
			->order_by('Id', 'ASC')
			->get('category');
		return $query->result_array();

	}


    public function GetCategoryAllCount()
    {
        $query = $this
            ->db
            ->get('category');
        return $query->num_rows();

    }


	public function Add($category)
    {
        $query=$this
            ->db
            ->insert("category",$category);
        return $query;
    }

	public function Update($category,$id)
	{
		$query=$this
			->db
						->where('id',$id)
			->update("category",$category);
		return $query=$this->GetWhId($id);
	}

	public function GetWhId($id)
    {
        $query=$this
            ->db
			->where('Id',$id)
			->limit(1)
            ->get('category');
        return $query->result_array();
	}

	public function objGetWhId($id)
    {
        $query=$this
            ->db
			->where('Id',$id)
			->limit(1)
            ->get('category');
        return $query->result();
	}
	
	public function GetWhParentId($id)
    {
        $query=$this
            ->db
			->where('ParentId',$id)
			->limit(1)
            ->get('category');
        return $query->result_array();
    }


	public function GetParents()
    {
        $cats=$this
            ->db
			->where('ParentId',0)
			->get('category')->result();
			
		foreach($cats as $cat ){
			$cat->sub=$this->GetSubs($cat->Id);
		}	
		return $cats;
	}
	
	public function GetSubs($id)
    {
        $cats=$this
            ->db
			->where('ParentId',$id)
			->get('category')->result();
        foreach($cats as $cat){
			$cat->sub=$this->GetSubs($cat->Id);
		}
		return $cats;
	}
	
    

	public function DeleteWhId($id)
    {
        $this
			->db
			->where('Id',$id)
			->delete('category');
    }


}

?>
