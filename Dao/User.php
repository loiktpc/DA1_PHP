<?php

class User
{
    var $Id = null;

    var $UserName = null;

    var $PassWord = null;
    var $Email = null;
    var $Address = null;

    var $Phone = null;

    var $create_at = null;

    var $updated_at = null;
    var $Role_id = null;
    var $Status = null;

    public function Insert_users($UserName, $PassWord, $Email, $Phone, $Status, $Role_id)
    {
        $db = new connect();

        $select = "INSERT INTO users(username,passwords,email,phone,user_status,role_id) VALUES('$UserName','$PassWord','$Email',
        '$Phone','$Status','$Role_id')";
        $result = $db->pdo_execute($select);
        return $result;
    }
    function getUserAll()
    {
        $db = new connect();
        $select = "select * from users";
        return $db->pdo_query($select);
    }
    public function GetIduser($Id)
    {
        $db = new connect();

        $select = "SELECT * FROM users WHERE id  = '$Id'";
        $result = $db->pdo_query_one($select);
        return $result;
    }
    public function Update_Users($UserName, $PassWord, $Email, $Phone, $Role_id, $Id)
    {
        $db = new connect();

        $select = "UPDATE users SET username ='$UserName' , passwords ='$PassWord' , email='$Email' ,
         phone='$Phone' , role_id = '$Role_id'  where id ='$Id' ";
        $result = $db->pdo_execute($select);
        return $result;
    }
    public function Delete_Users($Id)
    {
        $db = new connect();

        $select = "DELETE FROM users WHERE id= '$Id' ";
        $result = $db->pdo_execute($select);
        return $result;
    }
    public function Count_Users()
    {
        $db = new connect();

        $select = "SELECT COUNT(*) AS total_accounts FROM users";
        $result = $db->pdo_query_one($select);
        return $result;
    }

    public function Duplicate_Name($UserName)
    {
        $db = new connect();

        $select = "SELECT * FROM users WHERE username = '$UserName'";
        $result = $db->pdo_query($select);
        foreach ($result as $row) {
            $name = $row["username"];
            if ($UserName == $name) {
                return true;
            }
        }
    }

}