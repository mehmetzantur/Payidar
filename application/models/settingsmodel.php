<?php

class settingsmodel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->db->save_queries = false;
    }

    public function GetAll()
    {
        $query = $this
            ->db
            ->order_by('Id', 'ASC')
            ->get('settings');
        return $query->result_array();

    }

    public function GetCustomPages()
    {
        $query = $this
            ->db
            ->order_by('PageOrder', 'ASC')
            ->where('IsPage',1)
            ->get('settings');
        return $query->result_array();
    }

    public function GetCustomPagesWh($id)
    {
        $query = $this
            ->db
            ->order_by('PageOrder', 'ASC')
            ->where('IsPage',1)
            ->where('Id',$id)
            ->get('settings');
        return $query->result_array();
    }

    public function GetCount()
    {
        $query = $this
            ->db
            ->get('settings');
        return $query->num_rows();

    }

    public function Add($settings)
    {
        $query = $this
            ->db
            ->insert("settings", $settings);
        return $query;
    }

    public function Update($settings, $id)
    {
        $query = $this
            ->db
            ->where('id', $id)
            ->update("settings", $settings);
        return $query = $this->GetWhId($id);
    }


    public function GetWhId($id)
    {
        $query = $this
            ->db
            ->where('Id', $id)
            ->limit(1)
            ->get('settings');
        return $query->result_array();
    }

    public function GetSetting($name)
    {
        $query = $this
            ->db
            ->where('Name', $name)
            ->limit(1)
            ->get('settings');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return 'Title Yok';
        }
    }

    public function DeleteWhId($id)
    {
        $this
            ->db
            ->where('Id', $id)
            ->delete('settings');
    }


}

?>
