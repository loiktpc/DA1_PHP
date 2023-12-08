<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $user = new User();
    $userInfo = $user->id($_SESSION['username']);
    $hash = $user->checkUserpass($_SESSION['username']);
    if (!empty($_POST['passwords']) && !empty($_POST['newpass']) && !empty($_POST['renewpass'])) {
        if (strlen($_POST['newpass']) >= 6 && strlen($_POST['newpass']) <= 20 && strlen($_POST['renewpass']) >= 6 && strlen($_POST['renewpass']) <= 20) {
            if (isset($hash[0]) && password_verify($_POST['passwords'], $hash[0]['passwords'])) {
                if ($_POST['newpass'] == $_POST['renewpass']) {
                    $password_hash = password_hash($_POST['newpass'], PASSWORD_DEFAULT);
                    $user->Updateuser($userInfo['id'], $password_hash);
                    $_SESSION['passwords'] = $_POST['newpass'];
                    echo "<script> alert('Đổi mật khẩu thành công *_*');</script>";
                    // header('Location: ./index.php?pages=site&action=home&layout=changpass');
                    ob_end_flush();
                } else {
                    $error = "Mật khẩu mới và xác nhận mật khẩu mới không khớp!";
                }
            } else {
                $error = "Mật khẩu hiện tại không đúng!";
            }
        } else {
            $error = "Mật khẩu mới phải lớn hơn 6 và nhỏ hơn 20 ký tự!";
        }
    } else {
        $error = "Vui lòng nhập dữ liệu!";
    }
}
?>

<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Tài Khoản</h1>
                <nav class="d-flex align-items-center">
                    <a href="/index.php?pages=site&action=home&layout=home">Trang Chủ<span class="lnr lnr-arrow-right"></span></a>
                    <a href="/index.php?pages=site&action=home&layout=changpass">Đổi mật khẩu</a>
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
            <div class="col-lg-8 posts-list">
                <div class="single-post row">
                </div>
                <div class="comment-form">
                    <h4>Đổi Mẩu Khẩu</h4>
                    <form method="POST" action="">
                        <p class="text-success"><?php echo $sucess ?? ""; ?></p>
                        <div class="form-group ">
                            <input type="password" class="form-control" id="subject" name="passwords" placeholder="Mật Khẩu Hiện Tại" />
                        </div>
                        <div class="form-group ">

                            <input type="password" class="form-control" id="subject" name="newpass" placeholder="Mật khẩu mới" />
                        </div>
                        <div class="form-group ">

                            <input type="password" class="form-control" id="subject" name="renewpass" placeholder="Xác nhận mật khẩu mới" />
                        </div>
                        <p class="text-danger"><?php echo $error ?? ""; ?></p>
                        <button style="border: none;" type="submit" class="primary-btn submit_btn" name="REQUEST_METHOD">Xác Nhận</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-4">
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
        </div>
    </div>
</section>
<!--================Blog Area =================-->
