<?php
if (isset($_POST["delete"])) {
    $idreviews = $_POST["idreviews"];

    if (
        !empty($idreviews)
    ) {
       
        try {
            $Review = new Review();
            $Review->Delete_Review($idreviews);
            Header('Location: /index.php?pages=admin&layout=home&modulde=review&action=list');
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
                            <h3>Hủy Đánh Giá</h3>

                            <form class="form-valide" action="#" method="post" novalidate="novalidate">
                            <input type="hidden" name="idreviews" value="<?php echo $_GET['id'] ?>">
                               
                            <p>Bạn chắc chắn Hủy Đánh Giá ?</p>
                            <p style="color: red;"><?php echo $mess  ?? ""?></p>
                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto">
                                        <button type="submit" name="delete" class="btn btn-primary">Xác Nhận</button>


                                        <a class="btn mb-1 btn-outline-info"
                                            href="/index.php?pages=admin&layout=home&modulde=review&action=list">

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