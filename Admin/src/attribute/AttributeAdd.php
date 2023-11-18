<?php

if (isset($_POST["add"])) {
    $name = $_POST["name"];
    $type_att = $_POST['type_att'];
    $note = $_POST['note'];
   
    $attributes = new attributes();
    if (
        !empty($name) &&  !empty($type_att)
    ) {
        $attributes->Insert_attributes($name, $note,$type_att);
           
        header('location: /index.php?pages=admin&layout=home&modulde=attribute&action=list');
        ob_end_flush();
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
                                    <label class="col-lg-4 col-form-label" for="name">Tên Thuộc Tính <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6 ">
                                        <input type="text" class="form-control" id="name" placeholder="" name="name"
                                            required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="type_att">Kiểu Loại <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control" id="type_att" name="type_att">
                                            <option value="">Lựa Chọn</option>
                                            <option value="1">Text</option>
                                            <option value="2">Color</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="note">Ghi Chú <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <textarea class="form-control" name="note" id="note" cols="76" rows="3"></textarea>
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
                                        <button type="submit" class="btn btn-primary" name="add">Xác Nhận</button>
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