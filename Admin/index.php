<?php
include "./Admin/include/Header.php";
include "./Admin/include/Sidebar.php";

switch ($_GET['pages']) {
    case 'admin':
        switch ($_GET['layout']) {
            case 'home':
                switch ($_GET['modulde'] ?? "") {
                    case 'dashboard':
                        switch ($_GET['action']) {
                            case 'list':
                                include './Admin/src/Dashboard/Dashboard.php';
                                break;
                        }
                        break;
                    case 'product':
                        switch ($_GET['action']) {
                            case 'list':
                                include './Admin/src/products/ProductList.php';
                                break;
                            case 'add':
                                include './Admin/src/products/ProductList.php';
                                break;
                            case 'edit':
                                include './Admin/src/products/ProductList.php';
                                break;
                            default:
                                include './Admin/src/products/ProductList.php';
                                break;
                        }
                        break;
                    case 'user':
                        switch ($_GET['action']) {
                            case 'list':
                                include './Admin/src/users/UserList.php';
                                break;
                            case 'add':
                                include './Admin/src/users/UserList.php';
                                break;
                            case 'edit':
                                include './Admin/src/users/UserList.php';
                                break;
                            default:
                                include './Admin/src/users/UserList.php';
                                break;
                        }
                        break;

                    case 'category':
                        switch ($_GET['action']) {
                            case 'list':
                                include './Admin/src/category/CategoryList.php';
                                break;
                            case 'add':
                                include './Admin/src/category/CategoryList.php';
                                break;
                            case 'edit':
                                include './Admin/src/category/CategoryList.php';
                                break;
                            default:
                                include './Admin/src/category/CategoryList.php';
                                break;
                        }
                        break;

                    case 'order':
                        switch ($_GET['action']) {
                            case 'list':
                                include './Admin/src/order/OrderList.php';
                                break;
                        }
                        break;
                    default:
                        include './Admin/src/Dashboard/Dashboard.php';
                        break;
                }
                break;

        }
        break;


}

include "./Admin/include/Footer.php";