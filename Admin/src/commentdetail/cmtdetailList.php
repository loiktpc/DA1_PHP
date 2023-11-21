<div class="content-body" style="min-height: 780px;">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Bình Luận Chi Tiết</h4>
                        <div class="table-responsive">
                            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">

                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-striped table-bordered zero-configuration dataTable" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 150px;">Tên Tài Khoản</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 150px;">Nội Dung</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 150px;">Ngày Bình Luận</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 64.1042px;">Thao Tác</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $binhluan = new comment();                                                                               
                                                $productID = $_GET['id'] ??"";
                                                $danhsachbinhluan = $binhluan->selectcmtdetail($productID);
                                                foreach ($danhsachbinhluan as $binhluan) :
                                                    extract($binhluan);
                                                    $formattedDate = date('d/m/Y', strtotime($binhluan['created_at']));
                                                ?>
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1"><?= $binhluan['username'] ?> </td>
                                                        <td><?= $binhluan['content'] ?>
                                                        </td>
                                                        <td><?= $formattedDate ?>
                                                        </td>
                                                        <td class="d-flex">
                                                            <a href="./index.php?pages=admin&layout=home&modulde=commentdetail&action=delete&iddelete=<?= $binhluan['idcmt'] ?>">
                                                                <button style="margin-right: 10px;" class="btn mb-1 btn-flat btn-primary">
                                                                    Xóa
                                                                </button>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach;  ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th rowspan="1" colspan="1">Tên Tài Khoản</th>
                                                    <th rowspan="1" colspan="1">Nội Dung</th>
                                                    <th rowspan="1" colspan="1">Ngày Bình Luận</th>
                                                </tr>
                                            </tfoot>
                                        </table>
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