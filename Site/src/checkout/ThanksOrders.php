
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
							<li><a href="#"><span>Mã Đơn Hàng</span> : <?php echo $_GET['code'] ?? "" ?></a></li>
						
							<li><a href="#"><span>Tổng Tiền</span> : <?php echo $_GET['totalmoney'] ?? "" ?></a></li>
							<li><a href="#"><span>Thanh Toán</span> : <?php  if($_GET['pay']=="cash"){echo "Thanh Toán Trực Tiếp";}else{
                                "Thanh Toán Online" ;
                            } ?></a></li>
						</ul>
					</div>
				</div>
                <div class="col-lg-4">
					<div class="details_item">
						<h4>Địa Chỉ Thanh Toán</h4>
						<ul class="list">
                        <li><a href="#"><span>Địa Chỉ</span> :  <?php echo $_GET['address'] ?? "" ?></a></li>
							<li><a href="#"><span>Thành Phố</span> :   <?php echo $_GET['city'] ?? "" ?></a></li>

						</ul>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="details_item">
						<h4>Thông Tin Người Nhận</h4>
						<ul class="list">
							<li><a href="#"><span>Tên Khách Hàng</span> : <?php echo $_GET['name'] ?? "" ?></a></li>
							<li><a href="#"><span>Số Điện Thoại</span> : <?php echo $_GET['phone'] ?? "" ?></a></li>
							<li><a href="#"><span>Lời Nhắn</span> :  <?php echo $_GET['mess'] ?? "..." ?></a></li>
						
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
    // Sử dụng Ajax để gửi request đến một file xóa session
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '/index.php?pages=handler', true);
    xhr.send();

    // Chuyển trang sau khi xóa session
    window.location.href = 'page2.php';
}
</script>