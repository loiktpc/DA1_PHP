<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Tài Khoản</h1>
                <nav class="d-flex align-items-center">
                    <a href="/index.php?pages=site&action=home&layout=home">Trang Chủ<span class="lnr lnr-arrow-right"></span></a>
                    <a href="/index.php?pages=site&action=home&layout=infocartdetail">Thông tin giỏ hàng Chi Tiết</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

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
                                                                                                $user = new User();
                                                                                                $userInfo = $user->id($_SESSION['username']);
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
            <div class="col-lg-3  ">
                <div class="blog_info">
                    <div class="post_tag">
                        <h5>
                            Thông Tin Người nhận
                        </h5>

                    </div>



                    <ul class="blog_meta list">
                        <?php
                        $order = new Order();
                        $listorder = $order->getall($_GET['id']);
                        foreach ($listorder as $ListOrder) :
                            extract($ListOrder);
                            $priceorder = number_format($ListOrder['total'], 0, '.', '.');
                        ?>
                            <li><a href="#"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
                                    </svg> <?php echo $ListOrder['name']; ?></a></li>
                            <li><a href="#"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                                        <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5Z" />
                                    </svg> <?php echo $ListOrder['address']; ?></a></li>
                            <li><a href="#"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash" viewBox="0 0 16 16">
                                        <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" />
                                        <path d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2H3z" />
                                    </svg> <?php echo $priceorder ?>đ</a></li>
                            <li><a href="#"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-phone" viewBox="0 0 16 16">
                                        <path d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h6zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z" />
                                        <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                                    </svg> <?php echo $ListOrder['phone']; ?></a></li>
                        <?php endforeach; ?>
                    </ul>

                </div>
            </div>
            <div class="col-lg-9 posts-list" style="  height: 350px !important;
    overflow: auto;
    margin-top: 15px;">
                <h3>Thông tin Đơn Hàng Chi Tiết</h3>
                <div class="table-responsive ">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" style="width:300px">Sản Phẩm</th>
                                <th scope="col" style="width:150px">Số Lượng</th>
                                <th scope="col" style="width:200px">Mã Hóa Đơn</th>
                                <th scope="col" style="width:300px">Hình Thức Thanh Toán</th>
                                <th scope="col" style="width:150px">Giá Tiền</th>
                                <th class="text-center" scope="col" style="width:150px">Thao Tác</th>
                            </tr>

                        </thead>
                        <tbody>
                            <?php
                            $order = new Order();
                            $rows = $order->selectorderdetail($_GET['id']);
                            foreach ($rows as $list) :
                                extract($list);
                                $price = number_format($list['price'], 0, '.', '.');
                            ?>
                                <tr>

                                    <td>
                                        <h5>
                                            <?php echo $list['nameproduct'] ?>
                                        </h5>

                                    </td>
                                    <td>
                                        <h5>
                                            <?php echo $list['qty_orderdetail']; ?>
                                        </h5>
                                    </td>
                                    <td>
                                        <h5>
                                            <?php echo $list['order_code'] ?>
                                        </h5>
                                    </td>
                                    <td>
                                        <h5>
                                            <?php echo $list['transfer_money'] == 'cash' ? 'Thanh toán khi nhận hàng' : 'Chuyển khoản'; ?>

                                        </h5>
                                    </td>
                                    <td>
                                        <h5>
                                            <?php echo $price; ?>đ
                                        </h5>
                                    </td>
                                    <td class="text-center">
                                        <?php if ($list['status_order'] == 3) { ?>
                                            <a href="./index.php?pages=site&action=home&layout=productdetail&id=<?php echo $list['product_id']; ?>&hasreview=<?php echo $list['user_id']; ?>"><button type="button" style="width: 110px;" class="genric-btn primary radius">Đánh Giá</button></a>
                                        <?php } else { ?>
                                            <button type="button" style="width: 110px;" class="btn genric-btn primary radius" disabled>Đánh Giá</button>
                                        <?php }  ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>


            </div>

        </div>
</section>