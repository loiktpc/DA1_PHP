<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Thông Tin Đơn Hàng</h1>
					<nav class="d-flex align-items-center">
						<a href="/index.php?pages=site&action=home&layout=home">
                            <button style="border: none; background-color: transparent; color: white;" onclick="clearSessionAndRedirect()">
                                Trang Chủ
                            </button>
                            <span class="lnr lnr-arrow-right"></span></a>
						<a href="/index.php?pages=site&action=home&layout=thanks">Thông Tin Đơn Hàng</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<!--================Order Details Area =================-->
	<section class="order_details section_gap">
        <div class="container">
            <a href="/index.php?pages=site&action=home&layout=home">
                <button  onclick="clearSessionAndRedirect()" class="genric-btn success circle arrow">Tiếp Tục Mua Hàng</button>
            </a>
            <h3 class="title_confirmation">Cảm Ơn. Đơn Đặt Hàng Của Bạn Đã Được Nhận.</h3>
			<div class="row order_d_inner">
                <div class="col-lg-4">
                    <div class="details_item">
						<h4>Thông Tin Đơn Hàng</h4>
						<ul class="list">
							<li><a href="#"><span>Mã Đơn Hàng</span> : <?php echo $_GET['vnp_TxnRef'] ?? "" ?></a></li>
						
							<li><a href="#"><span>Tổng Tiền</span> : <?php echo
                             number_format($_SESSION['order']['total_bill'], 0, ",", ".") ?? "" 
                             ?>đ</a></li>
							<li><a href="#"><span>Kết quả:</span> :  
                     <?php
                    //  var_dump($_SESSION['order']);
                    
                        if ($_GET['vnp_ResponseCode'] == '00') {    
                            $username =  $_SESSION['order']['name']   ;   
                            $userphone =  $_SESSION['order']['phone'] ;
                            $addressuser =  $_SESSION['order']['address'] ;
                            $usercity =  $_SESSION['order']['city'] ;
                            $message =  $_SESSION['order']['message'] ;
                            $total_bill =  $_SESSION['order']['total_bill'] ;
                            $pay =  $_SESSION['order']['pay'] ;
                            $user_id =  $_SESSION['order']['user_id'] ;
                            $code_cart =  $_SESSION['order']['code_cart'] ;
                            
                            $sql = "  INSERT INTO orders(name,phone,address,city,mess,total,status_order,transfer_money,user_id) 
                            VALUES ('$username', '$userphone','$addressuser','$usercity','$message','$total_bill',0,'$pay','$user_id')" ;
                             
                            $user = new connect();
                            $conn = $user->pdo_get_connection();
                            $conn->exec($sql);
                            $last_id = $conn->lastInsertId();
                            $orders = new Order() ; 
 
                            if (isset($_SESSION['cart'])&& isset($_SESSION['order'])) {
                                foreach ($_SESSION['cart'] as $productId) {
                                   //  $name = $productId["name"];
                                    $id = $productId["id"];
                                    $price = $productId["price"];
                                    $qty = $productId["qty"];
                                    $size = $productId["size"];
                                    $color = $productId["color"];
                                   //  echo $name, $id, $money, $qty, $last_id, $code_cart, $pay;
                       
                                    $orders->Insert_Order_Detail($last_id,$id,$qty,$price,$size,$color,$code_cart) ;
                                 
                        
                                }
                            }

                            echo "<span style='color:blue'>GD Thanh cong</span>";


                        } else {
                            echo "<span style='color:red'>GD Khong thanh cong</span>";
                        }
                     
                        ?>

                    </a></li>
							<li><a href="#"><span>Tên Khách Hàng</span> : <?php echo  $_SESSION['order']['name'] ?? "" ?></a></li>

						</ul>
					</div>
				</div>
                <div class="col-lg-4">
					<div class="details_item">
						<h4>Địa Chỉ Thanh Toán</h4>
						<ul class="list">
                        <li><a href="#"><span>Thời gian thanh toán</span> :  <?php echo $_GET['vnp_PayDate'] ?? "" ?></a></li>
                        <li><a href="#"><span>Mã Ngân hàng</span> :   <?php echo $_GET['vnp_BankCode'] ?? "" ?></a></li>
							<li><a href="#"><span>Địa Chỉ</span> :   <?php echo $_SESSION['order']['address'] ?? "" ?></a></li>
							<li><a href="#"><span>Thành Phố</span> :   <?php echo $_SESSION['order']['city'] ?? "" ?></a></li>

						</ul>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="details_item">
						<h4>Thông Tin Người Nhận</h4>
						<ul class="list">
							<li><a href="#"><span>Mã GD Tại VNPAY</span> : <?php echo $_GET['vnp_TransactionNo'] ?? "" ?></a></li>
							<li><a href="#"><span>Mã phản hồi</span> : <?php echo $_GET['vnp_ResponseCode'] ?? "" ?></a></li>
							<li><a href="#"><span>Mã Thanh Toán</span> :  <?php echo $_GET['vnp_OrderInfo'] ?? "..." ?></a></li>
							<li><a href="#"><span>Nội dung</span> :  <?php echo $_SESSION['order']['message'] ?? "..." ?></a></li>
						
						</ul>
					</div>
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
                            <!-- <img style="width: 80px; height:90px;" src="./Public/img/imgshop/<?= $item['img'] ?>" alt=""> -->
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
                      
                        
                        <?php endif;  ?>
                        </form>
                    </div>
                </div>
		</div>
	</section>
   <script>
function clearSessionAndRedirect() {
   
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '/index.php?pages=handler', true);
    xhr.send();

  
    window.location.href = 'page2.php';
}
</script>