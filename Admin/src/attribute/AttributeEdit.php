
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
                            <h3>Cấu Hình Thuộc Tính Sản Phẩm</h3>
                            <form class="form-valide" action="#" method="post" novalidate="novalidate">
                                <div class="form-group row ">
                                    <label class="col-lg-4 col-form-label" for="username">Tên <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6 ">
                                        <input type="text" class="form-control" id="username" placeholder="" name="name"
                                            required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="role_id">Màu <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control valid" id="role_id" name="role_id" aria-required="true" aria-describedby="role_id-error" aria-invalid="false">
                                            <option value="">Lựa Chọn</option>
                                            <option value="1">black</option>
                                            <option value="2">red</option>
                                            <option value="2">white</option>
                                            <option value="2">pink</option>
                                            <option value="2">yellow</option>
                                            <option value="2">gray</option>

                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="">Mô tả <span
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
                    <div class="card-body">
                        <h4 class="card-title">Cấu Hình Thuộc Tính</h4>
                        <div class="table-responsive">
                            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">

                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-striped table-bordered zero-configuration dataTable" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 150px;">Tên </th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 120px;">Màu</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 120px;">Mô Tả</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $Cate = new categories();
                                                $ShowListCate=$Cate->getlist();
                                                foreach ($ShowListCate as $ShowList):
                                                    extract($ShowList);   
                                                    ?>                                       
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1"> màu đỏ </td>
                                                        <td>
                                                        đỏ
                                                        </td>
                                                        <td></td>
                                                     
                                                    </tr>
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1"> S </td>
                                                        <td>
                                                      
                                                        </td>
                                                        <td></td>
                                                       
                                                    </tr>
                                                   
                                                <?php endforeach; ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th rowspan="1" colspan="1">Tên </th>
                                                    <th rowspan="1" colspan="1">Màu </th>
                                                    <th rowspan="1" colspan="1">Mô Tả </th>
                                                  
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-5">
                                        <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Còn <?php 
                                        $Dashboard = new Dashboard();
                                        $rows =  $Dashboard->Count_Caterory();
                                        echo $rows["total"];
                                        ?> phân loại</div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
</div>

