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
        where o.user_id = u.id  ORDER BY o.create_at DESC";
        return $db->pdo_query($select);
    }
    public function getall($id)
    {
        $db = new connect();
        $select = "SELECT * FROM orders WHERE id='$id'";
        return $db->pdo_query($select);
    }
    public function getallorderdetail($id)
    {
        $db = new connect();
        $select = "SELECT orders.id,orders.status_order 
        FROM order_detail JOIN orders ON order_detail.order_id=orders.id
        WHERE orders.id='$id'
        GROUP BY orders.id,orders.status_order";
        return $db->pdo_query($select);
    }
    public function GetOrder($id)
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
        o.status_order as status_order,
        o.transfer_money as transfer_money
        from orders o, users u
        where o.user_id = u.id and o.user_id='$id'";
        $result = $db->pdo_query($select);
        return $result;
    }

    public function selectorderdetail($id)
    {
        $db = new connect();

        $select = "SELECT
        p.name as nameproduct , 
        od.product_id as product_id,
        p.price as moneyproduct,
        od.qty as qty_orderdetail ,
        od.order_code as order_code,
        od.created_at as created_at,
        o.name as name,
        o.user_id as user_id,
        o.status_order as status_order,
        od.price as price,
        o.address as address,
        o.phone as phone,
        o.transfer_money as transfer_money
        from orders o, products p ,order_detail  od
        where od.order_id = o.id AND  od.product_id = p.id and od.order_id= '$id'";
        $result = $db->pdo_query($select, $id);
        return $result;
    }

    public function UpdateStatusOrder($id,$status_order)
    {
        $db = new connect();
        $select = "UPDATE `orders` SET `status_order`='$status_order' WHERE id = '$id' ";
        $result = $db->pdo_execute($select);
        return $result;
    }
    public function GetOrderdetail($id)
    {
        $db = new connect();

        $select = "SELECT
        p.name as nameproduct , 
        p.price as moneyproduct,
        od.qty as qty_orderdetail ,
        od.order_code as order_code,
        od.created_at as created_at,
        od.size as size ,
        od.color as color
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
    public function sumqty($id)
    {
        $db = new connect();

        $select = "SELECT sum(qty) AS totalqty FROM order_detail WHERE order_id='$id' ";
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
    public function Insert_Order_Detail($order_id, $product_id, $qty, $price, $size, $color, $order_code)
    {
        $db = new connect();

        $select = "INSERT INTO order_detail(order_id,product_id,qty,price,size,color,order_code,status) VALUES 
        ('$order_id','$product_id','$qty','$price','$size','$color','$order_code',0)";
        $result = $db->pdo_execute($select);
        return $result;
    }
}
