<?php

if (isset($_POST['login'])) {
	$username = $_POST['username'];
	$passwords = $_POST['passwords'];
	$user = new User();
	$hash = $user->checkUserpass($username);
	if (empty($username) || empty($passwords)) {
		$error['messages'] = "Bạn phải nhập thông tin đầy đủ";
	} else {
		if (isset($hash[0]) && password_verify($passwords, $hash[0]['passwords'])) {
			$_SESSION['username'] = $username;
			$_SESSION['passwords'] = $passwords;
			$result = $user->id($_SESSION['username']);
			$_SESSION['idLogin'] = $result['id'];		
			if (!empty($_POST["remember_me"])) {
				setcookie("username", $_POST["username"], time() + 86400, '/');
			}
			header("Location: ./index.php?pages=site&action=home&layout=home");
		} else {
			$error['messages'] = "Đăng nhập không thành công!";
		}
	}
	ob_end_flush();
}
$google_client = new Google_Client();

$google_client->setClientId('138110660173-ikimao4jvnvi2g9viql516n9louj01m0.apps.googleusercontent.com');
$google_client->setClientSecret('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');
$google_client->setRedirectUri('http://da1.com/index.php?pages=site&action=home&layout=login');
$google_client->addScope('email');
$google_client->addScope('profile');

$google_client->setHttpClient(
    new \GuzzleHttp\Client([
        'verify' => false, // Tắt xác minh chứng chỉ SSL (lưu ý: không an toàn)
    ])
);


if (isset($_GET["code"])) {
    try {
        $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

        if (!isset($token["error"])) {  // nếu lỗi trong quá trình lấy token sẽ có một mảng lỗi
            $google_client->setAccessToken($token['access_token']);  // set token cho $google_client để sử dụng

            $google_service = new Google_Service_Oauth2($google_client);

            $data = $google_service->userinfo->get();  // lấy thông tin người dùng
            $name = $data['given_name'];
            $email = $data['email'];
         


            // kiểm tra tài khoảng theo email người dùng đã có chưa
			$user = new User();
            $info_user = $user->getsendmail($data['email']);
            if (isset($info_user['id'])) {
              
				$result = $user->email( $data['email']);
				$_SESSION['idLogin'] = $result['id'];		
				$_SESSION['username'] = $result['username'];
				$_SESSION['passwords'] = $result['passwords'];
				$_SESSION['role_id'] = $result['role_id'];
				header("Location: http://da1.com/index.php?pages=site&action=home&layout=home");

            } else {
                $user->insert_user_google($data['given_name'],$data['email'],0,2);
				$result = $user->email($data['email']);
				$_SESSION['idLogin'] = $result['id'];		
				$_SESSION['username'] = $result['username'];
				$_SESSION['passwords'] = $result['passwords'];
				$_SESSION['role_id'] = $result['role_id'];

               
				header("Location: http://da1.com/index.php?pages=site&action=home&layout=home");
            }
		
			

        }
    } catch (Exception $e) {
        echo 'Caught exception: ', $e->getMessage(), "\n";
    }
}


?>

<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
	<div class="container">
		<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
			<div class="col-first">
				<h1>Đăng nhập</h1>
				<nav class="d-flex align-items-center">
					<a href="/index.php?pages=site&action=home&layout=home">Trang Chủ<span class="lnr lnr-arrow-right"></span></a>
					<a href="/index.php?pages=site&action=home&layout=login">Đăng nhập</a>
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
					<img class="img-fluid" src="./Public/img/aothun/9.jpg" alt="">

				</div>
			</div>
			<div class="col-lg-6">
				<div class="login_form_inner">
					<h3>Đăng nhập</h3>
					<form class="row login_form" action="" method="post" id="contactForm" novalidate="novalidate">

						<div class="col-md-12 form-group">
							<input type="text" class="form-control" name="username" placeholder="Tên đăng nhập">
						</div>
						<div class="col-md-12 form-group">
							<input type="password" class="form-control" name="passwords" placeholder="Mật khẩu">
						</div>
						<div class="col-lg-4"></div>

						<div class="col-md-12 form-group">
							<div class="creat_account">
								<input type="checkbox" id="f-option2" name="remember_me">
								<label for="f-option2">Lưu đăng nhập?</label>
							</div>
							<div class="" style="color: red;">
								<?php
								echo $error['messages'] ?? "" ?>
							</div>
						</div>
						
						<div class="col-md-12 form-group">
							<button type="submit" name="login" class="primary-btn">Đăng nhập</button>
							<a href="<?= $google_client->createAuthUrl() ?>" class="btn-google m-b-20 ">
                    <img style="width: 15px;" src="./Public/img/imgshop/google-icon-2048x2048-czn3g8x8.png" alt="GOOGLE">
                    Google
                </a>
							<a href="index.php?pages=site&action=home&layout=forgotpass">Quên mật khẩu?</a>
							<a href="index.php?pages=site&action=home&layout=register">Bạn chưa có tài khoản?</a>
						</div>
						
					</form>
				</div>
			</div>
		</div>
	</div>
</section>