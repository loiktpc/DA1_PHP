<?php
class Order
{
    var $Id = null;
    var $order_id = null;
    var $product_id = null;
    var $qty = null;
    var $price = null;
    var $order_code = null;
    var $status = null;
    var $size = null;
    var $color = null;

    public function GetallOrder()
    {
        $db = new connect();
        $select = "SELECT o.id as id ,
        o.name as nameorder,
        o.phone as phone,
        o.address as addressorder,
        o.city as city ,
        u.username as username,
        o.mess as mess ,
        o.total as total,
         o.user_id as userid,
         o.transfer_money as transfer_money
        from orders o, users u
        where o.user_id = u.id";
        return $db->pdo_query($select);
    }

    public function GetOrderdetail($id)
    {
        $db = new connect();

        $select = "SELECT
        p.name as nameproduct , 
        p.price as moneyproduct,
        od.qty as qty_orderdetail ,
        od.order_code as order_code,
        od.created_at as created_at
       
        from orders o, products p , order_detail od
        where od.order_id = o.id AND  od.product_id = p.id and o.id= ?";
        $result = $db->pdo_query($select, $id);
        return $result;
    }
    public function Delete_Order($Id)
    {
        $db = new connect();

        $select = "DELETE FROM orders WHERE id= '$Id' ";
        $result = $db->pdo_execute($select);
        return $result;
    }
    public function Count_Order()
    {
        $db = new connect();

        $select = "SELECT COUNT(*) AS total FROM orders";
        $result = $db->pdo_query_one($select);
        return $result;
    }
    public function Count_OrderDetail()
    {
        $db = new connect();

        $select = "SELECT COUNT(*) AS total FROM order_detail";
        $result = $db->pdo_query_one($select);
        return $result;
    }
    public function Insert_Order_Detail($order_id,$product_id,$qty,$price,$size,$color,$order_code)
    {
        $db = new connect();

        $select = "INSERT INTO order_detail(order_id,product_id,qty,price,size,color,order_code,status) VALUES 
        ('$order_id','$product_id','$qty','$price','$size','$color','$order_code',0)";
        $result = $db->pdo_execute($select);
        return $result;
    }
}