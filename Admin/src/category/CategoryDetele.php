<?php
 
if (isset($_POST['DeleteCate'])) {
    $id = $_GET ['id'];  
    if(!empty($id)){
        try {
            $deletecate=new categories();
            $DeleteCategory=$deletecate->delete($id);
            header("location:/index.php?pages=admin&layout=home&modulde=category&action=list");
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
                            <h3>Xóa Phân Loại</h3>
                            <form class="form-valide" action="#" method="post" novalidate="novalidate">
                                <p>Bạn chắc chắn xóa ?</p>
                                <p style="color: red;"> <?php echo $mess ?? "" ?></p>
                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto">
                                        <button type="submit" class="btn btn-primary " name="DeleteCate">Xác Nhận</button>
                                        <a class="btn btn-outline-info"
                                            href="./index.php?pages=admin&layout=home&modulde=category&action=list">
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
