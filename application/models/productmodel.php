<?php

class productmodel extends CI_Model
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
            ->get('product');
        return $query->result_array();

    }

    public function GetCommentCount()
    {
        $query = $this
            ->db
            ->where('IsActive', 0)
            ->get('comment');
        return $query->num_rows();

    }

    public function GetCommentAllCount()
    {
        $query = $this
            ->db
            ->get('comment');
        return $query->num_rows();

    }

    public function GetCommentCountWh($isactive)
    {
        $query = $this
            ->db
            ->where('IsActive', $isactive)
            ->get('comment');
        return $query->num_rows();

    }

    public function GetAllProductCount()
    {
        $query = $this
            ->db
            ->get('product');
        return $query->num_rows();

    }

    public function GetSumAmount()
    {
        $query = $this
            ->db
            ->select_sum('Amount')
            ->get('product');
        return $query->result_array();

    }

    public function GetCommentAll()
    {
        $query = $this
            ->db
            ->select('comment.Id as commentId,
								 comment.UserId as commentUserId,
								 comment.ProductId as commentProductId,
								 comment.Vote as commentVote,
								 comment.Comment as commentComment,
								 comment.IsActive as commentIsActive,
								 comment.VoteTime as commentVoteTime,

								 product.Id as productId,
								 product.Name as productName,

								 user.Id as userId,
								 user.FirstName as userFirstName,
								 user.LastName as userLastName'
            )
            ->order_by('commentIsActive', 'ASC')
            ->order_by('commentVoteTime', 'DESC')
            ->from('comment')
            ->join('user', 'user.Id = comment.UserId ')
            ->join('product', 'product.Id = comment.ProductId ')
            ->get();
        return $query->result_array();

    }

    public function ActiveCommentWhId($comment)
    {
        $query = $this
            ->db
            ->where('id', $comment['Id'])
            ->update("comment", $comment);
    }

    public function DeActiveCommentWhId($comment)
    {
        $query = $this
            ->db
            ->where('id', $comment['Id'])
            ->update("comment", $comment);
    }

    public function GetDiscounts()
    {
        $query = $this
            ->db
            ->order_by('LastTime', 'DESC')
            ->limit(10)
            ->where('OldPrice !=', 0)
            ->get('product');
        return $query->result_array();

    }

    public function GetAllDiscounts()
    {
        $query = $this
            ->db
            ->order_by('LastTime', 'DESC')
            ->where('OldPrice !=', 0)
            ->get('product');
        return $query->result_array();

    }

    public function GetNewests()
    {
        $query = $this
            ->db
            ->order_by('LastTime', 'DESC')
            ->limit(10)
            ->where('OldPrice', 0)
            ->get('product');
        return $query->result_array();

    }

    public function GetAllNewests()
    {
        $query = $this
            ->db
            ->order_by('LastTime', 'DESC')
            ->where('OldPrice', 0)
            ->get('product');
        return $query->result_array();

    }

    public function Bestsellers()
    {
        $query = $this
            ->db
            ->order_by('Amount', 'DESC')
            ->limit(10)
            ->get('product');
        return $query->result_array();

    }

    public function AllBestsellers()
    {
        $query = $this
            ->db
            ->order_by('Amount', 'DESC')
            ->get('product');
        return $query->result_array();

    }


    public function GetProductsForCategoryWh($id)
    {
        $query = $this
            ->db
            ->select('           category.Id as categoryId,
								 category.Name as categoryName,
								 

								 product.Id as productId,
								 product.CategoryId as productCategoryId,
								 product.Categories as productCategories,
								 product.Name as productName,
								 product.Price as productPrice,
								 product.Image as productImage'

            )
            ->order_by('productPrice', 'ASC')
            ->from('product')
            ->like('Categories', $id)
            ->join('category', 'category.Id = product.CategoryId ')
            ->get();
        return $query->result_array();
    }

    public function GetProductsForBrandWh($id)
    {
        $query = $this
            ->db
            ->select('           brand.Id as brandId,
								 brand.Name as brandName,
								 

								 product.Id as productId,
								 product.BrandId as productBrandId,
								 product.Categories as productCategories,
								 product.Name as productName,
								 product.Price as productPrice,
								 product.Image as productImage'

            )
            ->order_by('productPrice', 'ASC')
            ->from('product')
            ->where('BrandId', $id)
            ->join('brand', 'brand.Id = product.BrandId ')
            ->get();
        return $query->result_array();
    }

    public function GetSearchedProductsWh($text)
    {
        $query = $this
            ->db
            ->order_by('Price', 'ASC')
            ->like('Name', $text)
            ->get('product');
        return $query->result_array();
    }

    public function AddGallery($galleryData)
    {
        $query = $this
            ->db
            ->insert("gallery", $galleryData);
        return $query;
    }

    public function GetWhIdGallery($id)
    {
        $query = $this
            ->db
            ->where('ProductId', $id)
            ->get('gallery');
        return $query->result_array();
    }

    public function Add($product)
    {
        $query = $this
            ->db
            ->insert("product", $product);
        return $query;
    }

    public function AddComment($commentData)
    {
        $query = $this
            ->db
            ->insert("comment", $commentData);
        return $query;
    }

    public function Update($product, $id)
    {
        $query = $this
            ->db
            ->where('id', $id)
            ->update("product", $product);
        return $query = $this->GetWhId($id);
    }

    public function GetWhId($id)
    {
        $query = $this
            ->db
            ->where('Id', $id)
            ->limit(1)
            ->get('product');
        return $query->result_array();
    }


    public function GetCommentsWithUserWhId($id)
    {
        $query = $this
            ->db
            ->select('comment.Id as commentId,
										 comment.UserId as commentUserId,
										 comment.ProductId as commentProductId,
										 comment.Vote as commentVote,
										 comment.Comment as commentComment,
										 comment.IsActive as commentIsActive,
										 comment.VoteTime as commentVoteTime,

										 user.Id as userId,
										 user.FirstName as userFirstName,
										 user.LastName as userLastName,
										 user.Image as userImage'
            )
            ->order_by('VoteTime', 'DESC')
            ->from('comment')
            ->where('ProductId', $id)
            ->where('IsActive', 1)
            //->join('user', 'comment.UserId = user.Id','right')
            ->join('user', 'user.Id = comment.UserId ')
            ->get();
        return $query->result_array();
    }


    public function DeleteWhId($id)
    {
        $this
            ->db
            ->where('Id', $id)
            ->delete('product');
    }


    public function DeleteCommentWhId($id)
    {
        $this
            ->db
            ->where('Id', $id)
            ->delete('comment');
    }

    public function DeleteGalleryWhId($id)
    {
        $this
            ->db
            ->where('Id', $id)
            ->delete('gallery');
    }


}

?>
