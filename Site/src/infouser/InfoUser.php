<!-- Start Banner Area -->
<?php
if (isset($_POST["EditUser"])) {
    $id = $_GET['id'];
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $validemail = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
    $validphone = "/^(0|\+84)(\s|\.)?((3[2-9])|(5[689])|(7[06-9])|(8[1-689])|(9[0-46-9]))(\d)(\s|\.)?(\d{3})(\s|\.)?(\d{3})$/";
    $mess = '';
    $user = new User();
    $checkname = $user->checkaccname($id, $username);
    $checkemail = $user->checkaccmail($id, $email);
    $checkphone = $user->checkaccphone($id, $phone);
    if (!empty($username) && !empty($email) && !empty($phone)) {
        if (strlen($username) >= 6 && strlen($username) < 20) {
            if (!$checkname) {
                if (preg_match($validemail, $email)) {
                    if (preg_match($validemail, $email) && !$checkemail) {
                        if (preg_match($validphone, $phone)) {
                            if (preg_match($validphone, $phone) && !$checkphone) {
                                $user->updateinfouser($id, $username, $phone, $email);
                                $_SESSION['username'] = $username;
                                $success = "Đổi thông tin thành công *_*";
                                header('Location: ./index.php?pages=site&action=home&layout=infouser&id=' . $_GET['id'] . '');
                                ob_end_flush();
                            } else {
                                $mess = "Số điện thoại đã được sử dụng,vui lòng nhập số điện thoại khác! ";
                            }
                        } else {
                            $mess = "Số điện thoại không đúng định dạng! ";
                        }
                    } else {
                        $mess = "Email đã được sử dụng,vui lòng nhập email khác! ";
                    }
                } else {
                    $mess = "Email không đúng định dạng!";
                }
            } else {
                $mess = "Tên đăng nhập đã được sử dụng,vui lòng nhập tên khác!";
            }
        } else {
            $mess = "Tên đăng nhập phải trên 6 và nhỏ hơn 20 kí tự!";
        }
    } else {
        $mess = "Vui lòng nhập dữ liệu!";
    }
}
$user = new User();
$id = $user->id($_SESSION['username']);
if (isset($_GET["id"])) {
    $showinfo = $user->GetIduser($_GET['id']);
    if ($showinfo !== null) {
        $username = $showinfo['username'];
        $phone = $showinfo['phone'];
        $email = $showinfo['email'];
    } else {
        $username = '';
        $phone = '';
        $email = '';
    }
}

?>
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Tài Khoản</h1>
                <nav class="d-flex align-items-center">
                    <a href="/index.php?pages=site&action=home&layout=home">Trang Chủ<span class="lnr lnr-arrow-right"></span></a>
                    <a href="/index.php?pages=site&action=home&layout=infouser">Thông Tin Tài Khoản</a>
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
                    <h4>Thông tin tài khoản</h4>
                    <form method="post" action="">
                        <p class="text-success"><?php echo $success ?? ""; ?></p>
                        <div class="form-group ">
                            <input type="text" class="form-control" id="subject" name="username" placeholder="Họ Tên" value="<?php echo $showinfo['username']; ?>" />
                        </div>
                        <div class="form-group ">

                            <input type="text" class="form-control" id="subject" value="<?= $phone ?>" name="phone" placeholder="Số điện thoại" />
                        </div>
                        <div class="form-group ">

                            <input type="text" class="form-control" id="subject" name="email" placeholder="email" value="<?= $email ?>" />
                        </div>
                        <p class="text-danger"><?php echo $mess ?? ""; ?></p>
                        <button style="border: none;" name="EditUser" class="primary-btn submit_btn">Lưu thông tin</button>
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
                                <a href="/index.php?pages=site&action=home&layout=infouser&id=<?= $id['id'] ?>" class="d-flex justify-content-between">
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