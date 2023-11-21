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
    public function Updateuser($id,$passwords)
    {
        $db = new connect();
        $select = "UPDATE users SET passwords ='$passwords'  WHERE id ='$id' ";
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
    public function checkUser($username, $passwords)
    {
        $db = new connect();
        $select = "SELECT * FROM users WHERE username='$username' and passwords='$passwords'";
        $result = $db->pdo_query_one($select);
        if ($result != null)
            return true;
        else
            return false;
    }
    public function checkUserpass($username)
    {
        $db = new connect();
        $select = "SELECT passwords FROM users WHERE username='$username' ";
        $result = $db->pdo_query($select);
        return $result;
    }

    public function selletusername($username, $password)
    {
        $db = new connect();
        $select = "SELECT username FROM users WHERE username='$username' and passwords='$password'";
        $result = $db->pdo_query_one($select);
        return $result;
    }
    public function usernamecmt($id)
    {
        $db = new connect();
        $select = "SELECT username FROM users WHERE id='$id' ";
        $result = $db->pdo_query_one($select);
        return $result;
    }
    public function userid($username, $passwords)
    {
        $db = new connect();
        $select = "SELECT id FROM users WHERE username='$username' and passwords='$passwords'";
        $result = $db->pdo_query_one($select);
        return $result;
    }
    public function id($username)
    {
        $db = new connect();
        $select = "SELECT id FROM users WHERE username='$username'";
        $result = $db->pdo_query_one($select);
        return $result;
    }
    public function resetpass($password, $email)
    {
        $db = new connect();
        $query = "UPDATE `users` SET `passwords`='$password' WHERE email = '$email'";
        $result = $db->pdo_execute($query);
        return $result;
    }

    public function getsendmail($email)
    {
        $db = new connect();
        $query = "SELECT * FROM users WHERE email='$email'";
        $result = $db->pdo_query_one($query);
        return $result;
    }
    public function userrole($username, $password)
    {
        $db = new connect();
        $selectpass = "SELECT passwords FROM users WHERE username='$username'";
        $resultpass = $db->pdo_query_one($selectpass);
        if (password_verify($password, $resultpass['passwords'])) {
            $select = "SELECT role_id FROM users WHERE username='$username' ";
            $result = $db->pdo_query_one($select);
            return $result;
        }
    }
  
}
