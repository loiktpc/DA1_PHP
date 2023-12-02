<?php 
class Review{
    var $id = null ;
    var $star = null ;
    var $mess = null ;
    var $product_id  = null ;
    var $user_id  = null ;

    function GetAllReview()
    {
        $db = new connect();
        $select = "SELECT r.star as star ,
        u.username  as  username, r.mess as mess , p.name as name , 
        p.img as img , r.created_at as created_at , r.id as id FROM review_products r ,products p , users u
         where r.product_id = p.id and u.id = r.user_id";
        return $db->pdo_query($select);
    }
    function GetAllReview_1($id)
    {
        $db = new connect();
        $select = "SELECT r.star as star ,
        u.username  as  username, r.mess as mess , p.name as name , 
        p.img as img , r.created_at as created_at , r.id as id FROM review_products r ,products p , users u
         where r.product_id = p.id and u.id = r.user_id and star = '$id'";
        return $db->pdo_query($select);
    }
    function GetAllReview_star2($id)
    {
        $db = new connect();
        $select = "SELECT r.star as star ,
        u.username  as  username, r.mess as mess , p.name as name , 
        p.img as img , r.created_at as created_at , r.id as id FROM review_products r ,products p , users u
         where r.product_id = p.id and u.id = r.user_id and star = '$id'";
        return $db->pdo_query($select);
    }
    function GetAllReview_star3($id)
    {
        $db = new connect();
        $select = "SELECT r.star as star ,
        u.username  as  username, r.mess as mess , p.name as name , 
        p.img as img , r.created_at as created_at , r.id as id FROM review_products r ,products p , users u
         where r.product_id = p.id and u.id = r.user_id and star = '$id'";
        return $db->pdo_query($select);
    }
    function GetAllReview_star4($id)
    {
        $db = new connect();
        $select = "SELECT r.star as star ,
        u.username  as  username, r.mess as mess , p.name as name , 
        p.img as img , r.created_at as created_at , r.id as id FROM review_products r ,products p , users u
         where r.product_id = p.id and u.id = r.user_id and star = '$id'";
        return $db->pdo_query($select);
    }
    function GetAllReview_star5($id)
    {
        $db = new connect();
        $select = "SELECT r.star as star, u.username as username, r.mess as mess, p.name as name, 
        p.img as img, r.created_at as created_at, r.id as id 
 FROM review_products r, products p, users u
 WHERE r.product_id = p.id AND u.id = r.user_id AND r.star = '$id'
 ORDER BY r.created_at DESC;
 ";
        return $db->pdo_query($select);
    }
    function GetAllReview_star($id,$product_id)
    {
        $db = new connect();
        $select = "SELECT r.star as star, u.username as username, r.mess as mess, p.name as name, 
        p.img as img, r.created_at as created_at, r.id as id 
 FROM review_products r, products p, users u
 WHERE r.product_id = p.id AND u.id = r.user_id AND r.star = '$id' and r.product_id = '$product_id'
 ORDER BY r.created_at DESC;
 ";
        return $db->pdo_query($select);
    }
    function Delete_Review($id)
    {
        $db = new connect();

        $select = "DELETE FROM review_products WHERE id= ? ";
        $result = $db->pdo_execute($select,$id);
        return $result;
    }
    function Insert_Review($star,$mess,$product_id,$user_id)
    {
        $db = new connect();

        $select = "INSERT INTO review_products ( star, mess, product_id, user_id) 
        VALUES ( '$star', '$mess', '$product_id', '$user_id' );";
        $result = $db->pdo_execute($select);
        return $result;
    }
    public function Count_reviewstar($id ,$product_id)
    {
        $db = new connect();

        $select = "SELECT COUNT(*) AS total FROM review_products where star = '$id'and product_id = '$product_id'";
        $result = $db->pdo_query_one($select);
        return $result;
    }
    
    
}

?>