<?php

// Kiểm tra nếu giỏ hàng không tồn tại, tạo một giỏ hàng mới


if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $name = $_GET['name'];
    $img = $_GET['img'];
    $price = $_GET['price'];
    $color = $_GET['color'];
    $size = $_GET['size'];
    $qty = 1;

    $product = [
        "id" => $id,
        "name" => $name,
        "img" => $img,
        "price" => $price,
        "size" => $size,
        "color" => $color,
        "qty" => $qty
    ];

    // Variable to indicate whether the product is found in the cart
    $found = false;

    // Check if the cart exists
    if (isset($_SESSION['cart'])) {
        // Iterate through each item in the cart
        foreach ($_SESSION['cart'] as &$cartItem) {
            // Check if the product already exists in the cart
            if ($id == $cartItem['id'] && $size == $cartItem['size'] && $color == $cartItem['color']) {
                // If found, increment the quantity
                $cartItem['qty']++;
                $found = true;
                break;
            }
        }
        // Release the reference to the last element in case it's reused
        unset($cartItem);
    }

    // If the product is not found in the cart, add it to the cart
    if (!$found) {
        $_SESSION['cart'][] = $product;
    }
}


// Khi người dùng click remove
if (isset($_SESSION['cart'])) {
    if (isset($_POST['removecart'])) {
        $idToRemove = $_POST['id'];
        $colorToRemove = $_POST['color'];
        $sizeToRemove = $_POST['size'];
      
    // print_r($_SESSION['cart']) ;
    // var_dump($secondArray);
        foreach ($_SESSION['cart'] as $key => $product) {
            // var_dump($product);
    
           
            // Kiểm tra nếu sản phẩm có id, color và size khớp với sản phẩm cần xóa
            // var_dump($_SESSION['cart'][$key]["$id"]["$sizeToRemove"]["$colorToRemove"]) ;
            if ($idToRemove == $product['id'] && $colorToRemove == $product['color'] && $sizeToRemove == $product['size']) {
                echo "1" ;
                // Xóa sản phẩm khỏi giỏ hàng
                unset($_SESSION['cart'][$key]);
                header('Location: /index.php?pages=site&action=home&layout=cart');
                ob_end_flush();
                exit(); // Quan trọng để dừng thực thi ngay lập tức sau khi chuyển hướng
            }
        }
    }
}

if (isset($_SESSION['cart'])) {
    // khi người dùng click cập nhập
    

    if (isset($_POST['update'])) {
        $id = $_POST['id'] ?? "";
    $size = $_POST['size'] ?? "";
    $color = $_POST['color'] ?? "";
        $qtyedit = $_POST['editqty'];
        foreach ($_SESSION['cart'] as $productId => $productDetails) {
            if ($id == $productDetails['id'] && $size == $productDetails['size'] && $color == $productDetails['color']) {
                $_SESSION['cart'][$productId]['qty'] = $qtyedit;
                header('Location: /index.php?pages=site&action=home&layout=cart');
                ob_end_flush();
                exit();
            }
        }
    }
}


?>


<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Giỏ Hàng</h1>
                <nav class="d-flex align-items-center">
                    <a href="/index.php?pages=site&action=home&layout=home">Trang Chủ<span
                            class="lnr lnr-arrow-right"></span></a>
                    <a href="/index.php?pages=site&action=home&layout=cart">Giỏ Hàng</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

<!--================Cart Area =================-->
<section class="cart_area">
    <div class="container">
        <div class="cart_inner">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Sản Phẩm</th>
                            <th scope="col">Đơn Giá</th>
                            <th scope="col">Số Lượng</th>
                            <th scope="col">Số Tiền</th>
                            <th scope="col">Thao Tác</th>
                        </tr>
                    </thead>
                    <tbody>
                   
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
                        <tr>
                            <td>
                                <div class="media">
                                    <div class="d-flex">
                                        <img style="width: 150px; height:120px;" src="./Public/img/imgshop/<?= $item['img'] ?>" alt="">
                                    </div>
                                    <div class="media-body">
                                        <p>
                                        <?php echo $item['name'] ?>
                                       
                                            <strong> kích Thước:  <?php echo $item['size'] ?> ,</strong>
                                            <strong> Màu:  <?php if($item['color']=="greenyellow"){
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
                                       } ?></strong>
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td>
                            <h5><?php echo  number_format( $item['price'], 0, ",", ".") ;
                            ?>đ </h5>
                            </td>
                           
                            <td>
                                <div class="product_count">
                               
                                <form action="" method="post">
                                         <input type="hidden" name="id" value=<?php echo $item['id'] ?>>
                                    <input type="hidden" name="color" value=<?php echo $item['color'] ?> >
                                    <input type="hidden" name="size" value=<?php echo $item['size'] ?>>
                                    <input type="number" style="-webkit-appearance: none;-moz-appearance: textfield;" name="editqty" id="sst" value="<?php echo $item['qty'] ?>" title="Quantity:"
                                        class="input-text editqty">
                               
                                    <button  class="increase items-count" type="submit" name="update">Cập Nhật</button>
                                       </form>
                                       
                                     
                                </div>
                            </td>
                         
                            <td>
                                <h5><?php echo  number_format(  $total_product, 0, ",", ".") ;
                            ?>đ</h5>

                            </td>
                            <td>
                                <form action="" method="post" id="data_removecart">
                                    <input type="hidden" name="id" value=<?php echo $item['id'] ?>>
                                    <input type="hidden" name="color" value=<?php echo $item['color'] ?> >
                                    <input type="hidden" name="size" value=<?php echo $item['size'] ?>>
                                <button class="gray_btn" id="removecart" name="removecart" type="submit" value="<?= $item['id'] ?>" style="cursor: pointer;">
                                    xóa
                                </button>
                          

                                </form>
                              
                            </td>
                        </tr>
                     <?php endforeach; ?>

                        <tr>
                            <td></td>
                            <td></td>
                            <td>
                                      
                          
                            </td>
                            <td>
                                <h5 class="total_price_">Tổng Tiền</h5>
                            </td>
                            <td>
                                <h5>
                                <?php echo isset($total_bill) ? (number_format($total_bill, 0, ",", ".")) : "" ?> đ
                                </h5>
                            </td>
                        </tr>

                        <tr class="out_button_area">
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>

                            </td>

                            <td>
                                <?php
                            
                                if(isset($_SESSION['idLogin'])){
                                ?>
                                <div class="checkout_btn_inner d-flex align-items-center">
                                    <a class="gray_btn" href="/index.php?pages=site&action=home&layout=home">Tiếp Tục Mua Hàng</a>
                                    <a class="primary-btn" href="/index.php?pages=site&action=home&layout=checkout">Xác Nhận Thanh Toán</a>
                                </div>
                                <?php }else{?>
                                <div class="checkout_btn_inner d-flex align-items-center">
                                    <a class="gray_btn" href="/index.php?pages=site&action=home&layout=home">Tiếp Tục Mua Hàng</a>
                                    <a class="primary-btn" href="/index.php?pages=site&action=home&layout=login">Vui Lòng Đăng Nhập Để Thanh Toán</a>
                                </div>
                            </td>
                        </tr>
                        <?php } endif;  ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
        