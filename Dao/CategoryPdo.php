<?php

class categories
{

    var $id = null;
    var $name = null;
    var $note=null;

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

    public function add($name,$note)
    {
        $db = new connect();
        $query = "INSERT INTO `category`( `name`, `note`) VALUES ('$name','$note')";
        $result = $db->pdo_execute($query);
        return $result;
    }
    public function update($name,$note, $id)
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
}
