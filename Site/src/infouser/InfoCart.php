<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Tài Khoản</h1>
                <nav class="d-flex align-items-center">
                    <a href="/index.php?pages=site&action=home&layout=home">Trang Chủ<span class="lnr lnr-arrow-right"></span></a>
                    <a href="/index.php?pages=site&action=home&layout=infocart">Thông tin giỏ hàng</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

<!--================Blog Area =================-->
<section class="blog_area single-post-area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="blog_right_sidebar">

                    <aside class="single_sidebar_widget author_widget">
                        <img width="120px" class="author_img rounded-circle" src="./Public/img/aothun/1.jpg" alt="" />
                        <h4>Charlie Barber</h4>
                        <p>Quản lý thông tin hồ sơ để bảo mật tài khoản
                        </p>

                        <div class="br"></div>
                    </aside>


                    <aside class="single_sidebar_widget post_category_widget">
                        <h4 class="widget_title">Tài Khoản Của Tôi</h4>
                        <ul class="list cat-list">
                            <li>
                                <a href="/index.php?pages=site&action=home&layout=infouser&id=<?php
                                                                                                $usernewpass = new User();
                                                                                                $userInfo = $usernewpass->id($_SESSION['username']);
                                                                                                echo $userInfo['id']; ?>" class="d-flex justify-content-between">
                                    <p>Hồ sơ</p>

                                </a>
                            </li>
                            <li>
                                <a href="/index.php?pages=site&action=home&layout=changpass" class="d-flex justify-content-between">
                                    <p>đổi mật khẩu</p>

                                </a>
                            </li>
                            <li>
                                <a href="/index.php?pages=site&action=home&layout=favoritecart" class="d-flex justify-content-between">
                                    <p>Sản Phẩm Yêu Thích</p>
                                </a>
                            </li>
                            <li>
                                <a href="/index.php?pages=site&action=home&layout=infocart" class="d-flex justify-content-between">

                                    <p>Đơn Hàng</p>

                                </a>
                            </li>

                        </ul>

                    </aside>


                </div>
            </div>
            <div class="col-lg-12 posts-list" style="  height: 350px !important;
    overflow: auto;
    margin-top: 15px;">
                <h3>Thông tin Đơn Hàng</h3>
                <div class="table-responsive ">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Họ Tên</th>
                                <th scope="col">Địa Chỉ</th>
                                <th scope="col">Số Điện Thoại</th>
                                <th scope="col">Số Lượng</th>
                                <th scope="col">Tổng Tiền</th>
                                <th scope="col">Trạng Thái</th>
                                <th scope="col" class="text-center">Thao Tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $order = new Order();
                            $rows = $order->GetOrder($_SESSION['idLogin']);
                            foreach ($rows as $list) :
                                extract($list);
                            ?>
                                <tr>
                                    <td>
                                        <div class="media">
                                            <h5> <?php echo $list['nameorder']; ?></h5>
                                        </div>
                                    </td>
                                    <td>
                                        <h5 style="width: 250px;"> <?php echo $list['addressorder']; ?></h5>
                                    </td>
                                    <td>
                                        <h5><?php echo $list['phone']; ?></h5>

                                    </td>
                                    <td>
                                        <h5><?php
                                            $order = new Order();
                                            $totalqty = $order->sumqty($list['id']);
                                            echo $totalqty['totalqty'];
                                            ?></h5>

                                    </td>
                                    <td>
                                        <h5><?php echo  $price = number_format($list['total'], 0, '.', '.'); ?>đ</h5>

                                    </td>
                                    <td>
                                        <?php
                                        if ($list['status_order'] == 0) {
                                            echo '<span class="badge rounded-pill bg-secondary">Chưa xác nhận</span>';
                                        } else if ($list['status_order'] == 1) {
                                            echo '<span class="badge rounded-pill bg-primary">Đã xác nhận</span>';
                                        } else if ($list['status_order'] == 2) {
                                            echo '<span class="badge rounded-pill bg-warning text-black">Đang giao hàng</span>';
                                        } else {
                                            echo '<span class="badge rounded-pill bg-success">Thành công</span>';
                                        }
                                        ?>
                                    </td>
                                   
                                        <td class="text-center">
                                            <a href="/index.php?pages=site&action=home&layout=infocartdetail&id=<?php echo $list['id']; ?>" class="text-black"><button class="genric-btn info" type="submit">Chi tiết</button></a>
                                        </td>
                                   
                                </tr>

                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>


            </div>

        </div>
    </div>
</section>
<!--================Blog Area =================-->
<!-- Modal delete product -->