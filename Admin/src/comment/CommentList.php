<div class="content-body" style="min-height: 780px;">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Bình Luận</h4>
                        <div class="table-responsive">
                            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">

                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-striped table-bordered zero-configuration dataTable" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                            <thead>
                                                <tr role="row">
                                               
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 150px;">Tên Sản Phẩm</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 150px;">Tổng Số Bình Luận</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 150px;">Ngày Bình Luận Mới Nhất</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 64.1042px;">Thao Tác</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $binhluan = new comment();
                                                $danhsachbinhluan = $binhluan->selectcmt();
                                                foreach ($danhsachbinhluan as $binhluan) :
                                                    extract($binhluan); 
                                                    $formattedDate = date('d/m/Y', strtotime($binhluan['moinhat']));                                               
                                                ?>
                                                    <tr role="row" class="odd">                                          
                                                        <td><?= $binhluan['name']?>
                                                        </td>
                                                       <td><?= $binhluan['soluong']?></td>
                                                        <td><?= $formattedDate?></td>
                                                        <td class="d-flex">
                                                            <a href="./index.php?pages=admin&layout=home&modulde=commentdetail&action=list&id=<?=$id?>">
                                                                <button style="margin-right: 10px;" class="btn mb-1 btn-flat btn-primary">
                                                                    Chi Tiết
                                                                </button>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                   
                                                    <th rowspan="1" colspan="1">Tên Sản Phẩm</th>
                                                   <th rowspan="1" colspan="1">Tổng Số Bình Luận</th>
                                                    <th rowspan="1" colspan="1">Ngày Bình Luận Mới Nhất</th>
                                                    <th rowspan="1" colspan="1">Thao Tác</th>
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
    <!-- #/ container -->
</div>