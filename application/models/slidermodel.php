<?php

    class slidermodel extends CI_Model{
        public function __construct(){
            parent::__construct();
            $this->load->database();
            $this->db->save_queries = false;
        }

        public function GetAll(){
            $query = $this
                ->db
                ->order_by('Id', 'ASC')
                ->get('slider');
            return $query->result_array();

        }

        public function GetSliderCount()
        {
            $query = $this
                ->db
                ->where('IsActive', 1)
                ->get('slider');
            return $query->num_rows();

        }

        public function GetSliderAllCount()
        {
            $query = $this
                ->db
                ->get('slider');
            return $query->num_rows();

        }

        public function GetSliderCountWh($status)
        {
            $query = $this
                ->db
                ->where('IsActive', $status)
                ->get('slider');
            return $query->num_rows();

        }

        public function GetAllIsActive(){
            $query = $this
                ->db
                ->order_by('Id', 'ASC')
                ->get('slider');
            return $query->result_array();

        }

        public function Add($slider)
        {
            $query=$this
                ->db
                ->insert("slider",$slider);
            return $query;
        }

        public function Update($slider,$id)
        {
            $query=$this
                ->db
                            ->where('id',$id)
                ->update("slider",$slider);
            return $query=$this->GetWhId($id);
        }

        public function GetWhId($id)
        {
            $query=$this
                ->db
                ->where('Id',$id)
                ->get('slider');
            return $query->result_array();
        }

        public function DeleteWhId($id)
        {
            $this
                ->db
                ->where('Id',$id)
                ->delete('slider');
        }

        

    }
?>