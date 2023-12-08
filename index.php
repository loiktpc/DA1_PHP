<?php
session_start();
ob_start();
include "./vendor/autoload.php" ;

include './config/Database.php';
include './config/Config.php';
include './Dao/User.php';
include './Dao/Dashboard.php';
include './Dao/Order.php';
include './Dao/Attribute.php';
include './Dao/Products.php';
include './Dao/Review.php';
include './Dao/CommentPdo.php';
include_once './Site/mail/PHPMailer/index.php';
include_once './Site/UserSendMail/PHPMailer/index.php';


if (isset($_GET['pages'])) {
    switch ($_GET['pages']) {
        case 'login':
            include './Admin/auth/LoginAdmin.php';
            break;
        case 'handleradmin':
                include './Admin/handler/handler.php';
                break;
         case 'print':
                include './Admin/src/payoff/printfbill.php';
                break;
        case 'logout':          
            session_destroy();
            setcookie("username", $_POST["username"], time() - 86400);
            header("Location: ./index.php?pages=site&action=home&layout=home");
            break;
        case 'register':
            include './Admin/auth/RegisterAdmin.php';
            break;
        case 'handler':
                include './Site/src/checkout/handler.php';
                break;
        case 'handlerreview':
                    include './Site/src/detailproduct/handler_review.php';
                    break;
        case 'handlerreviewsend':
                        include './Site/src/detailproduct/sendreview.php';
                        break;            
        case 'admin':
            switch ($_GET['layout']) {
                case 'home':
                    include './Admin/index.php';
                    break;
                default:
                    include './Admin/index.php';
                    break;
            }
            break;


        case 'site':
            switch ($_GET['action']) {
                case 'home':
                    include './Site/index.php';
                    break;
            }
            break;
    }
} else {
    Header('Location: /index.php?pages=site&action=home&layout=home');
}
