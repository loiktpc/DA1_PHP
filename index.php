<?php
require_once './config/Database.php';
require_once './config/Config.php';


if (isset($_GET['pages'])) {
    switch ($_GET['pages']) {
        case 'login':
            include './Admin/auth/LoginAdmin.php';
            break;
        case 'register':
            include './Admin/auth/register.admin.php';
            break;

        case 'admin':
            switch ($_GET['action']) {
                case 'Dashboard':
                    include './admin/resources/admin/Dashboard.php';
                    break;
                default:
                    include './admin/resources/admin/Dashboard.php';
                    break;
            }
            break;

        case 'product':
            switch ($_GET['action']) {
                case 'list':
                    include './admin/resources/product/ProductList.php';
                    break;
                case 'add':
                    include './admin/resources/product/ProductAdd.php';
                    break;
                case 'edit':
                    include './admin/resources/product/ProductEdit.php';
                    break;
                default:
                    include './admin/resources/product/ProductList.php';
                    break;
            }
            break;
        case 'user':
            switch ($_GET['action']) {
                case 'list':
                    include './admin/resources/user/UserList.php';
                    break;
                case 'add':
                    include './admin/resources/user/UserAdd.php';
                    break;
                case 'edit':
                    include './admin/resources/user/UserEdit.php';
                    break;
                default:
                    include './admin/resources/user/UserList.php';
                    break;
            }
            break;

        case 'category':
            switch ($_GET['action']) {
                case 'list':
                    include './admin/resources/category/CategoryList.php';
                    break;
                case 'add':
                    include './admin/resources/category/CategoryAdd.php';
                    break;
                case 'edit':
                    include './admin/resources/category/CategoryEdit.php';
                    break;
                default:
                    include './admin/resources/category/CategoryList.php';
                    break;
            }
            break;

        case 'order':
            switch ($_GET['action']) {
                case 'list':
                    include './admin/resources/order/OrderList.php';
                    break;
            }
            break;

        case 'site':
            switch ($_GET['action']) {
                case 'home':
                    include './Site/index.php';
                    break;
                // case 'productdetail':
                //     include './Site/src/DetailProduct/DetailProduct.php';
                //     break;
                //         case 'cart':
                //             include './Site/src/Cart/cart.php';
                //             break;
                //         case 'category':
                //             include './Site/src/category/category.php';
                //             break;
                //         case 'login':
                //             include './Site/src/auth/LoginUser.php';
                //             break;
                //         case 'register':
                //             include './Site/src/auth/RegisterUser.php';
                //             break;
            }
            break;
    }
} else {
    Header('Location: /index.php?pages=site&action=home&layout=home');


}