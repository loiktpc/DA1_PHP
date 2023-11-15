<div class="content-body" style="min-height: 780px;">
    <!-- row -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">khách Hàng</h4>
                        <div class="table-responsive">
                            <div id="DataTables_Table_0_wrapper"
                                class="dataTables_wrapper container-fluid dt-bootstrap4">

                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-striped table-bordered zero-configuration dataTable"
                                            id="DataTables_Table_0" role="grid"
                                            aria-describedby="DataTables_Table_0_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                        aria-sort="ascending"
                                                        aria-label="Name: activate to sort column descending"
                                                        style="width: 121.094px;">Tên đăng Nhập</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 200.438px;"> Số Điện Thoại</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Office: activate to sort column ascending"
                                                        style="width: 86.3854px;">Email</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Age: activate to sort column ascending"
                                                        style="width: 34.9896px;">Trạng Thái</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Age: activate to sort column ascending"
                                                        style="width: 34.9896px;">Phân Quyền</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Start date: activate to sort column ascending"
                                                        style="width: 77.7396px;">Ngày Tạo</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Salary: activate to sort column ascending"
                                                        style="width: 64.1042px;">Thao Tác</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $user = new User();
                                                $rows = $user->getUserAll();
                                                foreach ($rows as $row) {
                                                    extract($row)
                                                        ?>

                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1">
                                                            <?php echo $username ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $phone ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $email ?>

                                                        </td>
                                                        <td>
                                                            <?php echo $user_status == 1 ? "online" : "off" ?>

                                                        </td>
                                                        <td>
                                                            <?php echo $role_id == 1 ? "admin" : "user" ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $create_at ?>
                                                        </td>
                                                        <td class="d-flex">
                                                            <a
                                                                href="/index.php?pages=admin&layout=home&modulde=user&action=edit&id=<?php echo $id ?>">
                                                                <button style="margin-right: 10px;"
                                                                    class="btn mb-1 btn-flat btn-primary">
                                                                    Sửa
                                                                </button>
                                                            </a>

                                                            <a
                                                                href="/index.php?pages=admin&layout=home&modulde=user&action=delete&id=<?php echo $id ?>">
                                                                <button class="btn mb-1 btn-flat btn-secondary">
                                                                    Xóa
                                                                </button>
                                                            </a>

                                                        </td>
                                                    </tr>
                                                <?php } ?>


                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th rowspan="1" colspan="1">Tên Đăng Nhập</th>
                                                    <th rowspan="1" colspan="1">Số Điện Thoại</th>
                                                    <th rowspan="1" colspan="1">Email</th>
                                                    <th rowspan="1" colspan="1">Trạng Thái</th>
                                                    <th rowspan="1" colspan="1">Phân quyền</th>
                                                    <th rowspan="1" colspan="1">Ngày Tạo</th>
                                                    <th rowspan="1" colspan="1">Thao Tác</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-5">
                                        <div class="dataTables_info" id="DataTables_Table_0_info" role="status"
                                            aria-live="polite">Còn
                                            <?php
                                            $rows = $user->Count_Users();
                                            echo ($rows['total_accounts']);
                                            ?> tài khoản
                                        </div>
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