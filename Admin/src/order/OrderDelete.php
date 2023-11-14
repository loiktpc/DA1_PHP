<?php
$order = new Order();
if (isset($_POST["delete"])) {
    $iduser = $_POST["idorder"];

    if (
        !empty($iduser)
    ) {
        $user = new User();
        $order->Delete_Order($iduser);
        Header('Location: /index.php?pages=admin&layout=home&modulde=order&action=list');
        ob_end_flush();
    }

}
?>

<div class="content-body" style="min-height: 780px;">
    <!-- row -->

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-validation">
                            <h3>Hủy Đơn Hàng</h3>

                            <form class="form-valide" action="#" method="post" novalidate="novalidate">
                                <p>Bạn chắc chắn hủy đơn hàng</p>
                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto">
                                        <button type="submit" name="delete" class="btn btn-primary">Xác Nhận</button>
                                        <input type="hidden" value="<?php echo $_GET['id'] ?>" name="idorder">

                                        <a class="btn mb-1 btn-outline-info"
                                            href="/index.php?pages=admin&layout=home&modulde=order&action=list">

                                            Quay Lại
                                        </a>

                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
</div>