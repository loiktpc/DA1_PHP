<?php

class categories
{

    var $id = null;
    var $name = null;
    var $note = null;

    public function getlist()
    {
        $db = new connect();
        $query = "SELECT*FROM category";
        $result = $db->pdo_query($query);
        return $result;
    }

    public function getCateById($id)
    {
        $db = new connect();
        $query = "SELECT*FROM category WHERE id=" . $id;
        $result = $db->pdo_query_one($query);
        return $result;
    }

    public function add($name, $note)
    {
        $db = new connect();
        $query = "INSERT INTO `category`( `name`, `note`) VALUES ('$name','$note')";
        $result = $db->pdo_execute($query);
        return $result;
    }
    public function update($name, $note, $id)
    {
        $db = new connect();
        $query = "UPDATE `category` SET `name`='$name',`note`='$note' WHERE id = $id";
        $result = $db->pdo_execute($query);
        return $result;
    }

    public function delete($id)
    {
        $db = new connect();
        $query = "DELETE  FROM category WHERE id='$id'";
        $result = $db->pdo_execute($query);
        return $result;
    }
    public function sreachproducts($id)
    {
        $db = new connect();
        $query = "SELECT * FROM products p , category c WHERE c.id = '$id'  limit 4";
        $result = $db->pdo_query($query);
        return $result;
    }
    public function getProductAsSameKind($category_id)
    {
        $db = new connect();
        $query = "SELECT*FROM products  WHERE category_id='$category_id'";
        $result = $db->pdo_query($query);
        return $result;
    }
    public function sortprice($id, $orderby)
    {
        $db = new connect();
        $query = "SELECT*FROM products where category_id='$id' ORDER BY price $orderby";
        $result = $db->pdo_query($query);
        return $result;
    }
    public function newproduct($id)
    {
        $db = new connect();
        $query = "SELECT*FROM products where category_id='$id' ORDER BY create_at desc";
        $result = $db->pdo_query($query);
        return $result;
    }
    public function countcate($id)
    {
        $db = new connect();
        $query = "SELECT count(*) as countcate FROM products where category_id='$id'";
        $result = $db->pdo_query_one($query);
        return $result;
    }
    public function search($id,$name)
    {
        $db = new connect();
        $query = "SELECT*FROM products where category_id='$id' like %$name%";
        $result = $db->pdo_query($query);
        return $result;
    }
}
