<?php

class ordermodel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->db->save_queries = false;
    }


    public function GetOrderAllCount()
    {
        $query = $this
            ->db
            ->get('basket');
        return $query->num_rows();

    }

    public function GetOrderCountWh($status)
    {
        $query = $this
            ->db
            ->where('Status', $status)
            ->get('basket');
        return $query->num_rows();

    }

    public function GetUserOrders($userid)
    {
        $query = $this
            ->db
            ->select('basket.Id as basketId,
                 basket.UserId as basketUserId,
                 basket.ProductId as basketProductId,
                 basket.Amount as basketAmount,
                 basket.Price as basketTotal,
                 basket.Time as basketTime,
                 basket.Status as basketStatus,
                 basket.TrackingNumber as basketTrackingNumber,

                 product.Id as productId,
                 product.Name as productName,
                 product.Price as productPrice,
                 product.Image as productImage,

                 user.Id as userId'
            )
            ->order_by('basketStatus', 'DESC')
            ->from('basket')
            ->where('UserId', $userid)
            ->where('Status !=', 0)
            ->join('user', 'user.Id = basket.UserId ')
            ->join('product', 'product.Id = basket.ProductId ')
            ->get();
        return $query->result_array();
    }

    public function GetOrders()
    {
        $query = $this
            ->db
            ->select('basket.Id as basketId,
                 basket.UserId as basketUserId,
                 basket.ProductId as basketProductId,
                 basket.Amount as basketAmount,
                 basket.Price as basketTotal,
                 basket.Time as basketTime,
                 basket.Status as basketStatus,
                 basket.TrackingNumber as basketTrackingNumber,

                 product.Id as productId,
                 product.Name as productName,
                 product.Price as productPrice,
                 product.Image as productImage,

                 user.Id as userId,
                 user.FirstName as userFirstName,
                 user.LastName as userLastName'
            )
            ->order_by('basketStatus', 'DESC')
            ->order_by('basketTime', 'DESC')
            ->from('basket')
            ->where('Status !=',0)
            ->join('user', 'user.Id = basket.UserId ')
            ->join('product', 'product.Id = basket.ProductId ')
            ->get();
        return $query->result_array();
    }


    public function UpdateOrder($basket,$basketid)
    {
        $query = $this
            ->db
            ->where('Id', $basketid)
            ->update("basket", $basket);
        return $query=1;
    }
}

?>


