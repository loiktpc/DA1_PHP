<?php 

unset($_SESSION['cart']) ;
unset($_SESSION['order']) ;

if(isset($_POST['userid'])&&isset($_POST['productid'])){
      $productid  = $_POST['productid'] ;
    $product = new Products() ;
     // Kiểm tra xem đã tồn tại trạng thái tym chưa
     $isFavorited = $product->checkFavorite($_POST['userid'], $_POST['productid']);
     if ($isFavorited) {
        // Nếu đã tồn tại, thì hủy tym (xóa trạng thái tym)
        $product->removeFavorite($_POST['userid'],  $_POST['productid']);
        
        echo "false"; // Trả về "false" để thể hiện rằng tym đã bị hủy
    } else {
        // Nếu chưa tồn tại, thêm trạng thái tym
        $result = $product->product_favourite($_POST['userid'] ,$_POST['productid']) ; 
        
      

        echo "true"; // Trả về "true" để thể hiện rằng tym đã được thêm
    }
    
}
?>