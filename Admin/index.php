<?php
ob_start();
include "./Admin/include/Header.php";
include "./Admin/include/Sidebar.php";
require './Dao/CategoryPdo.php';

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
                                include './Admin/src/products/ProductAdd.php';
                                break;
                            case 'edit':
                                include './Admin/src/products/ProductEdit.php';
                                break;
                            case 'handle':
                                    include './Admin/src/products/handler.php';
                                    break;  
                            case 'delete':
                                include './Admin/src/products/ProductDelete.php';
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
                                include './Admin/src/users/UserAdd.php';
                                break;
                            case 'edit':
                                include './Admin/src/users/UserEdit.php';
                                break;
                            case 'delete':
                                include './Admin/src/users/UserDelete.php';
                                break;
                            case 'handleruser':
                                include './Admin/src/users/HandlerUser.php';
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
                                include './Admin/src/category/CategoryAdd.php';
                                break;
                            case 'edit':
                                include './Admin/src/category/CategoryEdit.php';
                                break;
                            case 'delete':
                                include './Admin/src/category/CategoryDetele.php';
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
                            case 'handlerorder':
                                include './Admin/src/order/HandlerOrder.php';
                                break;
                            case 'orderdetail':
                                include './Admin/src/order/OrderDetail.php';
                                break;
                            case 'delete':
                                include './Admin/src/order/OrderDelete.php';
                                break;
                            default:
                                include './Admin/src/order/OrderList.php';
                                break;
                        }
                        break;

                    case 'comment':
                        switch ($_GET['action']) {
                            case 'list':
                                include './Admin/src/comment/CommentList.php';
                                break;
                        
                            default:
                                include './Admin/src/comment/CommentList.php';
                                break;
                        }
                        break;
                case 'commentdetail':
                        switch ($_GET['action']) {
                            case 'list':
                                include './Admin/src/commentdetail/cmtdetailList.php';
                                break;
                            case 'delete':
                                include './Admin/src/commentdetail/cmtdetailDelete.php';
                                break;
                            default:
                                include './Admin/src/comment/CommentList.php';
                                break;
                        }
                        break;
                    case 'commentdetail':
                        switch ($_GET['action']) {
                            case 'list':
                                include './Admin/src/commentdetail/CmtdetailList.php';
                                break ;
                            case 'delete':
                                include './Admin/src/commentdetail/cmtdetailDelete.php';
                                break;
                            default:
                                include './Admin/src/commentdetail/CmtdetailList.php';
                                break;
                        }
                        break;
                        case 'attribute':
                            switch ($_GET['action']) {
                                case 'list':
                                    include './Admin/src/attribute/AttributeList.php';
                                    break;
                                case 'add':
                                    include './Admin/src/attribute/AttributeAdd.php';
                                    break;
                                    case 'edit':
                                    include './Admin/src/attribute/AttributeEdit.php';
                                        break;
                                case 'delete':
                                    include './Admin/src/attribute/AttributeDelete.php';
                                    break;
                                default:
                                    include './Admin/src/attribute/AttributeList.php';
                                    break;
                            }
                            break;

                    case 'review':
                        switch ($_GET['action']) {
                            case 'list':
                                include './Admin/src/review/ReviewList.php';
                                break;
                            case 'delete':
                                include './Admin/src/review/ReviewDelete.php';
                                break;
                            default:
                                include './Admin/src/review/ReviewList.php';
                                break;
                        }
                        break;
                        case 'search':
                            switch ($_GET['action']) {
                                case 'listpay':
                                    include './Admin/src/payoff/ListPay.php';
                                    break;
                                case 'payoff':
                                    include './Admin/src/payoff/PayOff.php';
                                    break;
                                default:
                                    include './Admin/src/review/ReviewList.php';
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


?>