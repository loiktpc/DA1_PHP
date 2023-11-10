<?php include "./site/include/header.php" ?>

<?php
switch ($_GET['pages']) {
	case 'site':
		switch ($_GET['action']) {
			case 'home':
				switch ($_GET['layout']) {
					case 'home':
						include './Site/src/home/home.php';
						break;
					case 'productdetail':
						include './Site/src/DetailProduct/DetailProduct.php';
						break;
					case 'cart':
						include './Site/src/Cart/cart.php';
						break;
					case 'category':
						include './Site/src/category/category.php';
						break;
					case 'login':
						include './Site/src/auth/LoginUser.php';
						break;
					case 'register':
						include './Site/src/auth/RegisterUser.php';
						break;
					case 'forgotpass':
						include './Site/src/auth/ForgotPass.php';
						break;
					case 'checkout':
						include './Site/src/checkout/CheckOut.php';
						break;

					case 'contact':
							include './Site/src/contact/ConTact.php';
							break;

					case 'infouser':
						include './Site/src/infouser/InfoUser.php';
						break;
					case 'changpass':
						include './Site/src/infouser/ChangsPass.php';
						break;
					case 'infocart':
						include './Site/src/infouser/InfoCart.php';
						break;
					case 'infocartdetail':
						include './Site/src/infouser/InfoCart_detail.php';
						break;
					case 'favoritecart':
						include './Site/src/infouser/FavoriteCart.php';
						break;

					default:
						include './Site/src/home/home.php';
						break;
				}
				break;
			default:
				include './Site/src/home/home.php';
				break;
		}
		break;


}


?>
<?php
include "./site/include/footer.php"
	?>