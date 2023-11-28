<section class="banner-area organic-breadcrumb">
	<div class="container">
		<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
			<div class="col-first">
				<h1>Liên hệ với chúng tôi</h1>
				<nav class="d-flex align-items-center">
					<a href="/index.php?pages=site&action=home&layout=home">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
					<a href="/index.php?pages=site&action=home&layout=contact">Liên hệ</a>
				</nav>
			</div>
		</div>
	</div>
</section>
<!-- End Banner Area -->

<!--================Contact Area =================-->
<section class="contact_area section_gap_bottom">
	<div class="container">
		<div id="mapBox" class="mapBox" data-lat="9.982087282843965" data-lon="105.75822600395645" data-zoom="13" data-info="PO Box CT16122 Collins Street West, Victoria 8007, Australia." data-mlat="9.982087282843965" data-mlon="105.75822600395645">
		</div>
		<div class="row">
			<div class="col-lg-3">
				<div class="contact_info">
					<div class="info_item">
						<i class="lnr lnr-home"></i>
						<h6>Thường Thạch - Cái Răng - Cần Thơ - Việt Nam</h6>
						<p>Đường Trương Vĩnh Nguyên</p>
					</div>
					<div class="info_item">
						<i class="lnr lnr-phone-handset"></i>
						<h6><a href="#">+84372029102</a></h6>
						<p></p>
					</div>
					<div class="info_item">
						<i class="lnr lnr-envelope"></i>
						<h6><a href="#">nhihtpc05227@fpt.edu.vn</a></h6>
						<p>Liên hệ với chúng tôi </p>
					</div>
				</div>
			</div>
			<div class="col-lg-9">
				<form class="row contact_form" action="" method="post" novalidate="novalidate">
					<?php

					if (isset($_POST['send'])) {
						$name = $_POST['name'];
						$email = $_POST['email'];
						$phone = $_POST['phone'];
						$message = $_POST['message'];
						$mail = new sendmail();
						$validemail = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
						$validphone = "/^(0|\+84)(\s|\.)?((3[2-9])|(5[689])|(7[06-9])|(8[1-689])|(9[0-46-9]))(\d)(\s|\.)?(\d{3})(\s|\.)?(\d{3})$/";
						if (empty($name) && empty($email) && empty($subject) && empty($message)) {
							$error = "Vui lòng nhập dữ liệu!";
						} else if (!preg_match($validemail, $email)) {
							$error = "Email không đúng định dạng!";
						} else if (!preg_match($validphone, $phone)) {
							$error = "Số điện thoại không đúng định dạng!";
						} else {
							$mail->usersendmail($name, $email, $phone, $message);
							echo '<script> alert("Thư của bạn đã được gửi *_*"); </script>';
							header("Location: ./index.php?pages=site&action=home&layout=contact");
						}
					}
					?>
					<div class="col-md-6">
						<div class="form-group">
							<input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên của bạn">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" id="email" name="email" placeholder="Nhập địa chỉ Email">
						</div>
						<div class="form-group">
							<input type="email" class="form-control" id="" name="phone" placeholder="Nhập số điện thoại">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<textarea class="form-control" name="message" id="message" rows="1" placeholder="Mô tả vấn đề"></textarea>
						</div>
						<p class="text-danger"><?php echo $error ?? ""; ?></p>
					</div>

					<div class="col-md-12 text-right">
						<button type="submit" class="primary-btn" name="send">Gửi</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>