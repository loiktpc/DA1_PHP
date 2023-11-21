<?php

if (isset($_POST['Deletecmt'])) {
    $iddelete = $_GET['iddelete'];
    $delete = new comment();
    try {
        $Deletecmt = $delete->delete($iddelete);
        $mess = "Xóa ảnh thành công.";
        header("location:./index.php?pages=admin&layout=home&modulde=comment&action=list");
        ob_end_flush();
        echo "Không bao giờ in ra dòng này vì có lỗi trước đó.";
    } catch (Exception $e) {
        $mess = "Bị dính khóa ngoại vui lòng xóa ngoại trước";
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
                            <h3>Xóa Phân Loại</h3>
                            <form class="form-valide" action="" method="post" novalidate="novalidate">
                                <p>Bạn chắc chắn xóa ?</p>
                                <p class="text-danger"><?php echo $mess ?? "" ?></p>
                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto">
                                        <button type="submit" class="btn btn-primary " name="Deletecmt">Xác Nhận</button>
                                        <a class="btn btn-outline-info" href="./index.php?pages=admin&layout=home&modulde=comment&action=list">
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