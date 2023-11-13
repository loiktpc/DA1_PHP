<?php
if (isset($_POST["delete"])) {
    $iduser = $_POST["iduser"];

    if (
        !empty($iduser)
    ) {
        $user = new User();
        $user->Delete_Users($iduser);
        Header('Location: /index.php?pages=admin&layout=home&modulde=user&action=list');
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
                            <h3>Xóa Khách Hàng</h3>

                            <form class="form-valide" action="" method="post" novalidate="novalidate">
                                <input type="hidden" name="iduser" value="<?php echo $_GET['id'] ?>">
                                <p>Bạn chắc chắn xóa ?</p>
                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto">
                                        <button type="submit" name="delete" class="btn btn-primary">Xác Nhận</button>


                                        <a class="btn mb-1 btn-outline-info"
                                            href="/index.php?pages=admin&layout=home&modulde=user&action=list">

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