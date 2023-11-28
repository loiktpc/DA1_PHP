<?php

class comment
{

    var $id = null;

    var $product_id = null;

    var $count = null;

    var $view  = null;


    function delete($id)
    {
        $db = new connect();
        $query = "DELETE  FROM comment WHERE id='$id'";
        $result = $db->pdo_execute($query);
        return $result;
    }

    public function update($id, $content)
    {
        $db = new connect();
        $query = "UPDATE `comment` SET `content`='$content' WHERE id= '$id' ";
        $result = $db->pdo_execute($query);
        return $result;
    }
    public function selectall($id) {
        $db = new connect(); 
        $select="SELECT * FROM comment WHERE id= '$id' ";
        $result = $db->pdo_query_one($select);
        return $result;
    }
public function selectid($user_id) {
        $db = new connect(); 
        $select="SELECT id FROM comment WHERE user_id= '$user_id' ";
        $result = $db->pdo_query_one($select);
        return $result;
    }
    function insert($product_id, $content, $user_id)
    {
        $db = new connect();
        $query = "INSERT INTO `comment`( `product_id`, `content`, `user_id`)  VALUES ('$product_id','$content','$user_id')";
        $result = $db->pdo_execute($query);
        return $result;
    }

    public function selectcmt()
    {
        $db = new connect();
        $select = "SELECT products.id,products.name,
        COUNT(comment.content) AS 'soluong',
        MAX(comment.created_at) AS 'moinhat'
        FROM comment JOIN products ON comment.product_id= products.id
        GROUP BY products.id,products.name
        HAVING soluong >0
        ORDER BY soluong DESC";
        $result = $db->pdo_query($select);
        return $result;
    }
    public function selectcmtdetail($productID)
    {
        $db = new connect();
        $select = "SELECT comment.content,comment.created_at,comment.id AS idcmt ,products.id ,users.username
        FROM comment
        JOIN users ON comment.user_id=users.id
        JOIN products ON comment.product_id=products.id
        WHERE products.id=$productID";
        $result = $db->pdo_query($select);
        return $result;
    }
    
    
}
