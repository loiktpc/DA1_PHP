<?php
if (isset($_POST["delete"])) {
    $iduser = $_POST["iduser"];

    if (
        !empty($iduser)
    ) {
       
        try {
         $user = new User();
        $user->Delete_Users($iduser);
        Header('Location: /index.php?pages=admin&layout=home&modulde=user&action=list');
        ob_end_flush();
            echo "Không bao giờ in ra dòng này vì có lỗi trước đó.";
        } catch (Exception $e) {
           // lỗi in ra dòng này 
            $mess ="bị dính khóa ngoại vui lòng xóa ngoại trước" ;
        }

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
                                <p style="color: red;"><?php echo $mess  ?? ""?></p>
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