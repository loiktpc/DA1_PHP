<?php

class Dashboard
{



    public function Count_Products()
    {
        $db = new connect();

        $select = "SELECT COUNT(*) AS total FROM products";
        $result = $db->pdo_query_one($select);
        return $result;
    }
    public function date_Productsnew()
    {
        $db = new connect();

        $select = "SELECT MAX(create_at) as create_at FROM products";
        $result = $db->pdo_query_one($select);
        return $result;
    }
    public function date_Usernew()
    {
        $db = new connect();

        $select = "SELECT MAX(create_at) FROM users";
        $result = $db->pdo_query_one($select);
        return $result;
    }
    public function Count_Products_love()
    {
        $db = new connect();

        $select = "SELECT COUNT(*) AS total FROM product_favourite";
        $result = $db->pdo_query_one($select);
        return $result;
    }
    public function date_Products_love()
    {
        $db = new connect();

        $select = "SELECT MAX(create_at) FROM product_favourite";
        $result = $db->pdo_query_one($select);
        return $result;
    }
    public function Count_Order()
    {
        $db = new connect();

        $select = "SELECT COUNT(*) AS total FROM orders";
        $result = $db->pdo_query_one($select);
        return $result;
    }
    public function date_ordernew()
    {
        $db = new connect();

        $select = "SELECT MAX(create_at) FROM orders";
        $result = $db->pdo_query_one($select);
        return $result;
    }
    public function Count_comment()
    {
        $db = new connect();

        $select = "SELECT COUNT(*) AS total FROM comment";
        $result = $db->pdo_query_one($select);
        return $result;
    }
    public function Count_Review()
    {
        $db = new connect();

        $select = "SELECT COUNT(*) AS total FROM review_products";
        $result = $db->pdo_query_one($select);
        return $result;
    }
}