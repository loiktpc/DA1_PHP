<?php

if (isset($_POST["AddUser"])) {
    $UserName = $_POST["UserName"];
    $UserEmail = $_POST["UserEmail"];
    $UserPass = $_POST["UserPass"];
    $UserPhone = $_POST["UserPhone"];
    $role_id = $_POST["role_id"];

    $user = new User();
    $name = $user->Duplicate_Name($UserName);
    if ($name == true ) {
       
        $mess = "Tên đăng nhập đã tồn tại!";
    } else {


        if (
            !empty($UserName) && !empty($UserEmail) && !empty($UserPass) && !empty($UserPhone)
            && !empty($role_id)
        ) {
            if (strlen($UserName) >= 6 && strlen($UserName) < 20) {
                if (preg_match('/^[a-zA-Z0-9._%+-]+@gmail\.com$/', $UserEmail)) {
                    if (is_numeric($UserPhone) && $UserPhone >= 0 && strlen($UserPhone) >= 10) {
                        if (strlen($UserPass) >= 6 && strlen($UserPass) < 20) {
                            $mahoapass = password_hash($UserPass, PASSWORD_DEFAULT);

                            $user->Insert_users($UserName, $mahoapass, $UserEmail, $UserPhone, 1, $role_id);


                            Header('Location: /index.php?pages=admin&layout=home&modulde=user&action=list');
                            ob_end_flush();
                        } else {
                            $mess = "ít nhất 6 kí tự và không 20 kí tự";
                        }
                    } else {
                        $mess = "vui lòng nhập đúng định dạng số ";
                    }

                } else {
                    $mess = "vui lòng nhập đúng định dạng email";
                }

            } else {
                $mess = "tên đăng nhập phải trên 6 kí tự";
            }


        } else {
            $mess = "Vui Lòng Điền Đầy Đủ Thông Tin";
        }
    }


} ?>

<div class="content-body" style="min-height: 780px;">
    <!-- row -->

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-validation">
                            <h3>Thêm Khách Hàng</h3>
                            <form class="form-valide" action="" method="post">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="UserName">Tên Đăng Nhập <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="UserName" name="UserName"
                                            placeholder="..." required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="UserEmail">Email <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="UserEmail" name="UserEmail"
                                            placeholder="..." required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="UserPass">Mật Khẩu <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="password" class="form-control" id="UserPass" name="UserPass"
                                            placeholder="..." required>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="role_id">Phân Quyền <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control" id="role_id" name="role_id">
                                            <option value="">Chọn</option>
                                            <option value="1">ADMIN</option>
                                            <option value="2">USER</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="UserPhone">Số Điện Thoại <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="UserPhone" name="UserPhone"
                                            placeholder="..." required>
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
                                        <button type="submit" name="AddUser" class="btn btn-primary">Xác Nhận</button>
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