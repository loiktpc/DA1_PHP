<?php

if (isset($_POST["AddCate"])) {
    $name = $_POST["name"];
    $note = $_POST['note'];
    $addcate = new categories();
    if (
        !empty($name)
    ) {
        if (strlen($name) >= 6) {
            $AddCategory = $addcate->add($name, $note);
            $mess = $name;
            header('location: /index.php?pages=admin&layout=home&modulde=category&action=list');
            ob_end_flush();
        }
        else {
            $mess = "Tên phân loại phải trên 6 kí tự";
        }
    } else {
         $mess = "Vui Lòng Điền Đầy Đủ Thông Tin";
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
                            <h3>Thêm Thuộc Tính</h3>
                            <form class="form-valide" action="#" method="post" novalidate="novalidate">
                                <div class="form-group row ">
                                    <label class="col-lg-4 col-form-label" for="username">Tên Thuộc Tính <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6 ">
                                        <input type="text" class="form-control" id="username" placeholder="" name="name"
                                            required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="role_id">Kiểu Loại <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control" id="role_id" name="role_id">
                                            <option value="">Lựa Chọn</option>
                                            <option value="1">Text</option>
                                            <option value="2">Color</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="">Ghi Chú <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <textarea class="form-control" name="note" id="" cols="76" rows="3"></textarea>
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
                                        <button type="submit" class="btn btn-primary" name="AddCate">Xác Nhận</button>
                                        <a class="btn btn-outline-info"
                                            href="./index.php?pages=admin&layout=home&modulde=attribute&action=list">
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