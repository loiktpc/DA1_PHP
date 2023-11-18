<?php 
class Products{
    var $id = null ;
    var $name = null ;
    var $price = null ;
    var $stock = null ;
    var $create_at = null ;
    var $category_id  = null ;
    var $content  = null ;
    var $img  = null ;
    var $see_product  = null ;
    var $product_id  = null ;
    var $attribute_id  = null ;
    var $attribute_value  = null ;
    
    
    function getAllProduct()
    {
        $db = new connect();
        $select = "SELECT p.*, c.name as namecaterory ,
        c.id as cateid from products p, category c where c.id = p.category_id";
        return $db->pdo_query($select);
    }
    
    public function Insert_product($name,$price,$stock,$category_id,$content,$img )
    {
        $db = new connect();

        $select = "INSERT INTO products(name,price,stock,category_id,content,img ) VALUES 
        (?,?,?,?,?,?)";
        $result = $db->pdo_execute($select,$name,$price,$stock,$category_id,$content,$img);
        return $result;
    }
    public function Edit_product($name,$price,$stock,$category_id,$content,$img,$id )
    {
        $db = new connect();

        $select = "UPDATE products SET name = ? , price = ? ,stock = ? , category_id = ? , content = ?
        , img = ? where id = ? ";
        $result = $db->pdo_execute($select,$name,$price,$stock,$category_id,$content,$img , $id);
        return $result;
    }
    public function Edit_product_notimg($name,$price,$stock,$category_id,$content,$id )
    {
        $db = new connect();

        $select = "UPDATE products SET name = ? , price = ? ,stock = ? , category_id = ? , content = ?
        where id = ? ";
        $result = $db->pdo_execute($select,$name,$price,$stock,$category_id,$content , $id);
        return $result;
    }
    function GetProduct_id($id)
    {
        $db = new connect();
        $select = "SELECT * from products where id = ? ";
        return $db->pdo_query_one($select,$id);
    }
   
     function Get_variant_productId($id)
    {
        $db = new connect();
        $select = " SELECT a.name as nameatribute , ad.Attribute_value as Attribute_value,
        a.description as description from attributes a, attribute_detail ad , 
        variant v where a.id = ad.Attribute_id and v.id = ad.variant_id and v.product_id = ? ";
        return $db->pdo_query($select,$id);
    }
    function Insert_variant($product_id,$name,$attribute_id,$attribute_value)
    {
        $db = new connect();
       
        $select = "INSERT INTO variant(product_id ,name) VALUES 
        ('$product_id','$name');
        SET @last_inserted_id = LAST_INSERT_ID();
        INSERT INTO attribute_detail(variant_id,Attribute_id ,Attribute_value) VALUES 
        (@last_inserted_id,'$attribute_id','$attribute_value')";
      
        return $db->pdo_query($select);
    }
    public function Delete_product($id)
    {
        $db = new connect();

        $select = "DELETE FROM products WHERE id= ? ";
        $result = $db->pdo_execute($select,$id);
        return $result;
    }
}   