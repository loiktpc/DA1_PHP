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
					<h3>Quên mật khẩu</h3>
					<form class="row login_form" action="" method="post" id="contactForm" novalidate="novalidate">
						<?php

						if (isset($_POST['reset'])) {
							$error = array();
							$email = $_POST['email'];
							$user = new User();
							$mail = new Mailer();
							$result = $user->getsendmail($email);
							$validmail = "^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$^";
							if ($email == "") {
								$error['email'] = 'Không được bỏ trống';
							}
								 else if (!preg_match($validmail, $email)) {
									$error['email'] = "Email không đúng định dạng";
								}
								else {
									if	($result){
										$code = substr(rand(0, 999999), 0, 6);
										$title = "Lấy lại mật khẩu";
										$content = "Mã xác nhận của bạn là : <span style='color:green'>" . $code . "</span> ";
										$mail->sendMail($title, $content, $email);
										$_SESSION['mail'] = $email;
										$_SESSION['code'] = $code;
										header("Location: ./index.php?pages=site&action=home&layout=confirm");
									}
									else{
										$error['email']="Bạn không đăng ký tài khoản bằng email này!";
									}
								
								}	}											
						?>
						<div class="col-md-12 form-group">
							<input type="text" class="form-control" id="order" name="email" placeholder="Nhập email">
						</div>
						<p class="text-danger container text-center"><?php if (isset($error['email']))
																			echo $error['email'];
																		?></p>
						<div class="col-md-12 form-group">
							<button type="submit" name="reset" class="primary-btn">Xác nhận</button>
							<a href="index.php?pages=site&action=home&layout=login">Đăng nhập?</a>

						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>