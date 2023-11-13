<?php

if (isset($_POST['UpdateCate'])) {
    $id = $_GET ['id']; 
    $name = $_POST['name'];
    $note = $_POST['note']; 
    $updatecate=new categories();
if (!empty($name)) {
    if (strlen($name) >= 6) {
        $UpdateCategory=$updatecate->update($name,$note,$id);
        $mess = $name;
        header('location: /index.php?pages=admin&layout=home&modulde=category&action=list');
        ob_end_flush();
    } else {
        $mess = "Tên phân loại phải trên 6 kí tự";
    }
    
}   else{
    $mess = "Vui Lòng Điền Đầy Đủ Thông Tin";
}
} 

 if (isset($_GET['id'])) {
    $updatecate=new categories();
    $showupdate = $updatecate->getCateById($_GET['id']);
    $name = $showupdate['name'];
    $note=$showupdate['note'];
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
                            <h3>Cập Nhật Phân Loại</h3>
                            <form class="form-valide" action="#" method="post" novalidate="novalidate">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-username">Tên Phân Loại <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-username" name="name"
                                            value="<?= $name ?>" placeholder="Áo thun">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-phoneus">Ghi Chú <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <textarea class="form-control" name="note" id="" cols="76"
                                            rows="3"><?= $note ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-4"></div>
                                    <div class="col-lg-6" style="color: red;">
                                        <?php echo $mess ?? "" ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto">
                                        <button type="submit" class="btn btn-primary" name="UpdateCate">Xác
                                            Nhận</button>
                                        <a class="btn btn-outline-info"
                                            href="/index.php?pages=admin&layout=home&modulde=category&action=list">
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