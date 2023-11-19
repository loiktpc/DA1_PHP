<?php
class attributes{
    var $id = null ;
    var $name = null ;

    var $type = null ;
    var $note = null ;
    var $valueatt = null ;
    // variant_id mặc định là 1  
    var $variant_id = null ;
     
    function getallattributes()
    {
        $db = new connect();
        $select = "select * from attributes";
        return $db->pdo_query($select);
    }
    function getallattributes_detail($id)
    {
        $db = new connect();
        $select = "SELECT a.name as nameatribute , ad.Attribute_value as Attribute_value, a.description as description from attributes a, attribute_detail ad
         where a.id = ad.Attribute_id and ad.variant_id = 1 and ad.Attribute_id = '$id'";
        return $db->pdo_query($select);
    }
    // select nhánh main để ít lần lập lại 
    function getallattributes_detail_null($id)
    {
        $db = new connect();
        $select = "SELECT a.name as nameatribute , ad.Attribute_value as Attribute_value,
         a.description as description, ad.variant_id as variant_id from attributes a,
          attribute_detail ad where a.id = ad.Attribute_id and ad.variant_id = 1 and a.id = '$id'";
        return $db->pdo_query($select);
    }
    function Insert_attributes($name,$type,$note)
    {
        $db = new connect();
        $select = "INSERT INTO attributes(name,description,type_Attribute) VALUES
        ('$name','$type','$note')";
        return $db->pdo_execute($select);
    }
    function Delete_attributes($id)
    {
        $db = new connect();
        $select = "DELETE FROM attributes WHERE id= '$id' ";
        return $db->pdo_execute($select);
    }
    function Insert_attributes_detail($id,$valueatt)
    {
        $db = new connect();
        $select = "INSERT INTO attribute_detail(variant_id , Attribute_id ,Attribute_value) VALUES
        (1,'$id','$valueatt')";
        return $db->pdo_execute($select);
    }
   

}