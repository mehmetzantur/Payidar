<?php

class basketmodel extends CI_Model
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
            ->order_by('Order', 'ASC')
            ->get('basket');
        return $query->result_array();

    }

    public function GetBasket($userid)
    {
        $query = $this
            ->db
            ->where('UserId', $userid)
            ->where('Status', 0)
            ->get('basket');
        return $query->result_array();

    }


    public function Add($basket)
    {
        $query = $this
            ->db
            ->insert("basket", $basket);
        return $query;

    }


    public function IncreaseAmount($basketid, $updatedBasketbasket, $userid)
    {
        $query = $this
            ->db
            ->where('Id', $basketid)
            ->update("basket", $updatedBasketbasket);
        return $query = $this->GetBasket($userid);
    }

    public function GetBasketWhUserIdWithProduct()
    {
        $query = $this
            ->db
            ->select('basket.Id as basketId,
                 basket.UserId as basketUserId,
                 basket.ProductId as basketProductId,
                 basket.Amount as basketAmount,
                 basket.Amount * basket.Price  as basketTotal,
                 basket.Price as basketPrice,
                 basket.Time as basketVoteTime,

                 product.Id as productId,
                 product.Name as productName,
                 product.Image as productImage,

                 user.Id as userId'
            )
            ->order_by('basketId', 'ASC')
            ->from('basket')
            ->where('Status', '0')
            ->join('user', 'user.Id = basket.UserId ')
            ->join('product', 'product.Id = basket.ProductId ')
            ->get();
        return $query->result_array();

    }


    public function GetBasketWhUserId($userid)
    {
        $query = $this
            ->db
            ->where('UserId', $userid)
            ->get('basket');
        return $query->result_array();
    }

    public function GetBasketWhUserIdAndProductId($userid, $productid)
    {
        $query = $this
            ->db
            ->where('UserId', $userid)
            ->where('ProductId', $productid)
            ->where('Status', 0)
            ->get('basket');
        return $query->result_array();
    }


    public function DeleteWhId($id)
    {
        $this
            ->db
            ->where('Id', $id)
            ->delete('basket');
    }

    public function Checkout($userid, $shippingPrice)
    {
        $query = $this
            ->db
            //->query("update basket set Price = (Price*Amount) + ".$shippingPrice." , Status=1 where Status = 0 and UserId = ? ",$userid);
            ->query("update basket set Status=2 where Status = 0 and UserId = ? ", $userid);
        return $query;
    }

    public function Update($basket, $basketid)
    {
        $query = $this
            ->db
            ->where('Id', $basketid)
            ->update("basket", $basket);
        return $query;
    }

}

?>
