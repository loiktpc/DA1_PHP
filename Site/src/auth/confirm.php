<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Quên mật khẩu</h1>
                <nav class="d-flex align-items-center">
                    <a href="index.php">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
                    <a href="category.html">Quên mật khẩu</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!--================End Tracking Box Area =================-->
<section class="login_box_area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="login_box_img">
                    <img class="img-fluid" src="./Public/img/aothun/4.jpg" alt="">
                    <!-- <div class="hover">
						<h4>New to our website?</h4>
						<p>There are advances being made in science and technology everyday, and a good example of this
							is the</p>
						<a class="primary-btn" href="registration.html">Create an Account</a>
					</div> -->
                </div>
            </div>

            <div class="col-lg-6">
                <div class="login_form_inner">

                    <h3>Xác nhận</h3>
                    <form class="row login_form" action="" method="post" id="contactForm" novalidate="novalidate">
                        <?php
                        if (isset($_POST['submit'])) {
                            $error = array();
                            if ($_POST['text_code'] != $_SESSION['code']) {
                                $error['fail'] = 'Mã xác nhận không hợp lệ!';
                            } else {
                                header('Location: ./index.php?pages=site&action=home&layout=changepass');
                            }
                        }
                        ?>
                        <p class="container text-center text-success">Nhập mã xác nhận được gửi đến email của bạn</p>

                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" id="order" name="text_code" placeholder="Mã xác nhận">
                        </div>
                        <p class="text-danger container text-center pb-2"><?php if (isset($error['fail']))
                                                                                echo $error['fail'];
                                                                            ?></p>
                        <div class="col-md-12 form-group">
                            <button type="submit" name="submit" class="primary-btn">Xác nhận</button>
                            <a href="index.php?pages=site&action=home&layout=login">Đăng nhập?</a>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>