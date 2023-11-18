<?php
 
if (isset($_POST['delete'])) {
    $id = $_GET ['id'];  
    $delete=new attributes();
    $delete->Delete_attributes($id);
    header("location:/index.php?pages=admin&layout=home&modulde=attribute&action=list");
    ob_end_flush();
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
                            <h3>Xóa Thuộc Tính</h3>
                            <form class="form-valide" action="#" method="post" novalidate="novalidate">
                                <p>Bạn chắc chắn xóa ?</p>
                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto">
                                        <input type="hidden" name="idatt" id="idatt" value="<?php echo $_GET['id'] ?>">
                                        <button type="submit" class="btn btn-primary " name="delete">Xác Nhận</button>
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
