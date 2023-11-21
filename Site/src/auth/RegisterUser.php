<?php
if (isset($_POST['register'])) {
    $UserName = $_POST['username'];
    $Email = $_POST['email'];
    $Phone = $_POST['phone'];
    $PassWord = $_POST['passwords'];
    $mahoapass = password_hash($PassWord, PASSWORD_DEFAULT);
    $user = new User();
    $usercheck = $user->checkacc($UserName, $Email, $Phone);
    $pattern = "^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$^";
    $validphone = "/^(0|\+84)(\s|\.)?((3[2-9])|(5[689])|(7[06-9])|(8[1-689])|(9[0-46-9]))(\d)(\s|\.)?(\d{3})(\s|\.)?(\d{3})$/";
    if (empty($_POST['username']) && empty($_POST['passwords']) && empty($_POST['email']) && empty($_POST['phone'])) {
        $valid = 'Vui lòng nhập thông tin';
    } else if ($usercheck) {
        $valid = 'Tài khoản đã tồn tại vui lòng điền thông tin khác!';
    } else if ($mailcheck) {
        $valid_email = 'Email đã được sử dụng,vui lòng điền email khác!';
    } else if (strlen($PassWord) <= 6) {
        $valid_pass = "Mật khẩu phải lớn hơn 6 kí tự";
    } else if (strlen($UserName) <= 6) {
        $valid_name = "Tên phải lớn hơn 6 kí tự";
    } else if (!preg_match($validphone, $Phone)) {
        $valid_phone = "Số điện thoại không đúng định dạng!";
    } else if (!preg_match($pattern, $Email)) {
        $valid_email = "Email không đúng định dạng";
    } else {
        $signupuser = $user->Insert_users($UserName, $mahoapass, $Email, $Phone, 1, 2);
        header("Location: ./index.php?pages=site&action=home&layout=login");
    }
}
?>
<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Đăng ký</h1>
                <nav class="d-flex align-items-center">
                    <a href="index.php">Trang Chủ<span class="lnr lnr-arrow-right"></span></a>
                    <a href="/index.php?pages=site&action=home&layout=register">Đăng ký</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

<!--================Login Box Area =================-->
<section class="login_box_area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="login_box_img">
                    <img class="img-fluid" src="./Public/img/aothun/2.jpg" alt="">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="login_form_inner ">
                    <h3> Đăng ký </h3>
                    <form class="row login_form " action="" method="post" novalidate="novalidate">
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" name="username" placeholder="Tên đăng nhập" required>
                            <div class="col-lg-4"></div>
                            <div class="" style="color: red;">
                                <?php echo $valid_name ?? "" ?>
                            </div>
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="password" class="form-control" name="passwords" placeholder="Mật khẩu" required>
                            <div class="col-lg-4"></div>
                            <div class="" style="color: red;">
                                <?php echo $valid_pass ?? "" ?>
                            </div>
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" name="phone" placeholder="Số điện thoại" required>
                            <div class="col-lg-4"></div>
                            <div class="" style="color: red;">
                                <?php echo $valid_phone ?? "" ?>
                            </div>
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" name="email" placeholder="Địa chỉ Email" required>
                            <div class="col-lg-4"></div>
                            <div class="" style="color: red;">
                                <?php echo $valid_email ?? "" ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-4"></div>
                            <div class="" style="color: red;">
                                <?php echo $valid ?? "" ?>
                            </div>
                        </div>
                        <div class="col-md-12 form-group">
                            <button type="submit" name="register" class="primary-btn">Đăng ký</button>
                            <a href="/index.php?pages=site&action=home&layout=login">Bạn đã có tài khoản?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Login Box Area =================-->