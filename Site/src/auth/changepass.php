<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Đổi mật khẩu</h1>
                <nav class="d-flex align-items-center">
                    <a href="index.php">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
                    <a href="category.html">Đổi mật khẩu </a>
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

                </div>
            </div>

            <div class="col-lg-6">
                <div class="login_form_inner">

                    <h3>Xác nhận</h3>
                    <form class="row login_form" action="" method="post" id="contactForm" novalidate="novalidate">
                        <?php

                        if (isset($_POST['changepass'])) {
                            $error = array();
                            if (empty($_POST['newpass']) && empty($_POST['confpass'])) {
                                $error['fail'] = 'Không được bỏ trống!';
                            } else if (strlen($_POST['newpass']) && strlen($_POST['confpass']) < 6) {
                                if ($_POST['newpass'] != $_POST['confpass'])
                                $error['fail'] = "Mật khẩu phải lớn hơn 6 kí tự";
                            }
                           else{ 
                            if ($_POST['newpass'] == $_POST['confpass']) {
                                $error['fail'] = 'Đổi mật khẩu thành công';
                                $user = new User();
                                $pass_hash = password_hash($_POST['newpass'], PASSWORD_DEFAULT);
                                $reset = $user->resetpass($pass_hash, $_SESSION['mail']);
                                header("Location: ./index.php?pages=site&action=home&layout=login");
                               
                            } else {
                                $error['fail'] = 'Nhập lại mật khẩu không khớp!';
                            }
                        }
                        }
                        ?>

                        <div class="col-md-12 form-group">
                            <input type="password" class="form-control" name="newpass" placeholder="Mật khẩu mới">
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="password" class="form-control" name="confpass" placeholder="Nhập lại mật khẩu mới">
                        </div>
                        <p class="text-danger container text-center pb-2"><?php if (isset($error['fail']))
                                                                                echo $error['fail'];
                                                                            ?></p>
                        <div class="col-md-12 form-group">
                            <button type="submit" name="changepass" class="primary-btn">Xác nhận</button>
                            <a href="index.php?pages=site&action=home&layout=login">Đăng nhập?</a>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>