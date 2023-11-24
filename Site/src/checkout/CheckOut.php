<?php 
 if(isset($_POST['buy'])){
    $username = $_POST['username'] ?? "";
    $userphone = $_POST['userphone'] ?? "";
    $usercity = $_POST['usercity'] ?? "";
    $addressuser = $_POST['addressuser'] ?? "";
    $message = $_POST['message'] ?? "";
    $pay = $_POST['bankCode'] ?? ""; // phương thức thanh toán  
    $total_bill = $_POST['total_bill'] ?? ""; 
    $user_id = $_SESSION['idLogin'] ;
    $userphone = preg_replace('/[^0-9]/', '', $userphone);
    if ($pay == "cash"){
        if(
            !empty($username) && !empty($userphone) && !empty($usercity) &&
            !empty($pay)  && !empty($addressuser) && !empty($total_bill)
        ){
            if (is_numeric($userphone)) {
                  // Xử lý khi số điện thoại hợp lệ
                  if (preg_match('/^(09|03|08)\d{8}$/', $userphone)) {
                    $code_cart = rand(1, 10000);

                    $sql = "  INSERT INTO orders(name,phone,address,city,mess,total,status_order,transfer_money,user_id) 
                    VALUES ('$username', '$userphone','$addressuser','$usercity','$message','$total_bill',0,'$pay','$user_id')" ;
                     
                    $user = new connect();
                    $conn = $user->pdo_get_connection();
                    $conn->exec($sql);
                    $last_id = $conn->lastInsertId();
                    order_detail($last_id, $code_cart,$username,$userphone,$addressuser,$usercity,$pay,$total_bill,$message) ;
                } else {
                   $mess = "<span class='mess'> vui lòng nhập đúng dạng số điện thoại </span>
                   "; 
                }
            } else {
                echo 'Vui lòng chỉ nhập số điện thoại hợp lệ.';
              
            }
           
            // echo $username .  $userphone . $usercity . $addressuser . $message  .$pay;
        }
    }
 }

 function order_detail($last_id, $code_cart,$username,$userphone,$addressuser,$usercity,$pay,$total_bill,$message)
 {
    
    $orders = new Order() ; 
 
     if (isset($_SESSION['cart'])) {
         foreach ($_SESSION['cart'] as $productId) {
            //  $name = $productId["name"];
             $id = $productId["id"];
             $price = $productId["price"];
             $qty = $productId["qty"];
             $size = $productId["size"];
             $color = $productId["color"];
            //  echo $name, $id, $money, $qty, $last_id, $code_cart, $pay;

             $orders->Insert_Order_Detail($last_id,$id,$qty,$price,$size,$color,$code_cart) ;
            //  unset($_SESSION['cart']);
             ?>
             <script>
                 alert("Đặt Hàng Thành Công Vui Lòng Kiểm tra Lịch sử Đơn Hàng")
                //  window.location.href = '/index.php?pages=site&action=home&layout=thanks'
             </script>
             <?php
             Header('Location: /index.php?pages=site&action=home&layout=thanks&name='.$username.'&phone='.$userphone.'&address='.$addressuser.'&city='.$usercity.'&pay='.$pay.'&code='.$code_cart.'&totalmoney='.$total_bill.'&mess='.$message.'');
 
         }
     }
 }

?>
<style>
    .mess{
        color: red;
    }
</style>
<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Thanh Toán</h1>
                <nav class="d-flex align-items-center">

                    <a href="/index.php?pages=site&action=home&layout=home">Trang Chủ<span
                            class="lnr lnr-arrow-right"></span></a>
                    <a href="/index.php?pages=site&action=home&layout=checkout">Thanh Toán</a>

                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

<!--================Checkout Area =================-->
<section class="checkout_area section_gap">
    <div class="container">

        <div class="billing_details">
            <div class="row">
                <div class="col-lg-12">
                    <h3>Điền Thông Tin Đơn Hàng</h3>
                    <form class="row contact_form" action="#" method="post" novalidate="novalidate">

                        <div class="col-md-12 form-group p_star">

                            <input type="text" class="form-control" id="username" name="username" placeholder="Họ Tên">
                        <?php if(isset($_POST['buy'])){
                           if(empty($username)) {
                            echo '  <span class="mess"> Vui lòng điền thông tin </span>' ;
                        }else{
                            echo '' ;
                        }
                           
                           }?>
                        </div>

                        <div class="col-md-6 form-group p_star">
                            <input type="number" class="form-control"  id="userphone" name="userphone"
                                placeholder="Số Điện Thoại">
                            <?php
                            echo $mess ?? " " ;
                            if(isset($_POST['buy'])){
                            if(empty($_POST['userphone'])) {
                            echo '  <span class="mess"> Vui lòng điền thông tin </span>' ;
                        }else{
                            echo '' ;
                        }}?>
                        </div>
                       
                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" id="usercity" name="usercity"
                                placeholder="Thành phố">
                            <?php
                            if(isset($_POST['buy'])){
                            if(empty($_POST['usercity'])) {
                            echo '  <span class="mess"> Vui lòng điền thông tin </span>' ;
                        }else{
                            echo '' ;
                        }}?>
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <input type="text" class="form-control" id="addressuser" name="addressuser" placeholder="Địa Chỉ">
                        <?php 
                        if(isset($_POST['buy'])){
                        if(empty($_POST['addressuser'])) {
                            echo '  <span class="mess"> Vui lòng điền thông tin </span>' ;
                        }else{
                            echo '' ;
                        }}?>

                        </div>



                        <div class="col-md-12 form-group">

                            <textarea class="form-control" name="message" id="message" rows="1"
                                placeholder="Nội dung"></textarea>
                        </div>
                    
                </div>
                <div class="col-lg-12">
                    <div class="order_box">
                        <h2>Hóa Đơn</h2>
                        <ul class="list">
                        <li><a href="#">Sản Phẩm <span>Tổng</span></a></li>

                        </ul>
                        <?php 
                    if (isset($_SESSION['cart'])): ?>
                          <?php
               
                            $total_product = 0;
                            $total_bill = 0;


                            ?>
                            <?php foreach ($_SESSION['cart'] as $item): ?>
                                <?php
                                $total_product = ($item['price'] * $item['qty']) ;
                                $total_bill += $total_product;

                                ?>
                        <ul class="list">
                            
                            <li><a href="/index.php?pages=site&action=home&layout=productdetail&id=<?php echo $item['id']  ?>">
                            <img style="width: 80px; height:90px;" src="./Public/img/imgshop/<?= $item['img'] ?>" alt="">
                            <?php echo $item['name'] ?> <strong>kích Thước:  <?php echo $item['size'] ?> ,
                            Màu:  <?php if($item['color']=="greenyellow"){
                                                echo "Xanh" ;
                                            }else if($item['color']=="white"){
                                                echo "Trắng" ; 
                                            }else if($item['color']=="black"){
                                                echo "Đen" ;
                                            }else if($item['color']=="red"){
                                                echo "Đỏ" ;
                                            }else if($item['color']=="pink"){
                                                echo "Hồng" ;    ;
                                            }else if($item['color']=="yellow"){
                                                echo "Vàng" ;  ;
                                           } else if($item['color']=="purple"){
                                            echo "Tím" ; ;
                                       } ?>
                        </strong><span class="middle">x
                        <?php echo $item['qty'] ?>
                    </span> <span class="last">
                                       <?php echo  number_format(  $total_product, 0, ",", ".") ;
                            ?>đ
                    </span></a></li>
                        </ul>
                        <?php endforeach; ?>
                     

                        <ul class="list list_2">

                            <li><a href="#">Tổng Tiền <span>
                            <?php echo isset($total_bill) ? (number_format($total_bill, 0, ",", ".")) : "" ?> đ
                            </span></a></li>
                        </ul>
                        <div class="payment_item">
                            <div class="radion_btn">
                                <input type="radio" id="f-option5" name="bankCode" value="cash">
                                <label for="f-option5">Thanh Toán Trực Tiếp</label>
                                <div class="check"></div>
                            </div>
                            <p>Thanh Toán Qua Địa Chỉ .</p>
                        </div>
                        <div class="payment_item active">
                            <div class="radion_btn">
                                <input type="radio"  id="f-option6" name="bankCode" value="transfer">
                                <label for="f-option6">Thanh Toán Qua VNPAY </label>
                                <img src="img/product/card.jpg" alt="">
                                <div class="check"></div>
                            </div>
                            <p>Thanh toán qua VNPAY , bạn có thể thanh toán bằng thẻ tín dụng nếu bạn có tài khoản
                                VNPAY.
                                ​.</p>
                        </div>
                        <div class="creat_account">
                    <input type="hidden" value="<?= $total_bill ?>" name="total_bill">

                        <?php 
                        if(isset($_POST['buy'])){
                        if(empty($_POST['bankCode'])) {
                            echo '<span class="mess"> Chọn phương thức thanh toán </span>' ;
                        }else{
                            echo '' ;
                        }}?>
                            <!-- <input type="checkbox" id="f-option4" name="selector">

                            <a href="#">Tôi Đồng ý Với Khoản Trên</a> -->
                        </div>
                        <button type="submit" name="buy" class="primary-btn" style="border: none;">
                            Thanh Toán
                        </button>
                        <?php endif;  ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Checkout Area =================-->