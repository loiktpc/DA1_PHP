<?php
include './config/Database.php';
include './config/Config.php';
include './Dao/User.php';
include './Dao/Dashboard.php';


if (isset($_GET['pages'])) {
    switch ($_GET['pages']) {
        case 'login':
            include './Admin/auth/LoginAdmin.php';
            break;
        case 'register':
            include './Admin/auth/RegisterAdmin.php';
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