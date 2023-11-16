
<div class="content-body" style="min-height: 780px;">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Thuộc Tính</h4>
                        <div class="table-responsive">
                            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">

                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-striped table-bordered zero-configuration dataTable" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 150px;">Thuộc Tính</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 120px;">Loại</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 120px;">Ghi Chú</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 64.1042px;">Thao Tác</th>
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
                                                        <td class="sorting_1"><?php echo $ShowList['name'] ;?> </td>
                                                        <td><?php echo $ShowList['note']; ?>
                                                        <td><?php echo $ShowList['note']; ?>
                                                        </td>
                                                        <td class="d-flex">
                                                        <a href="./index.php?pages=admin&layout=home&modulde=attribute&action=edit&id=<?=$id?>">
                                                                <button style="margin-right: 10px;" class="btn mb-1 btn-flat btn-primary">
                                                                 Thuộc Tính
                                                                </button>
                                                            </a>
                                                            <a href="./index.php?pages=admin&layout=home&modulde=attribute&action=delete&id=<?=$id?>">
                                                                <button class="btn mb-1 btn-flat btn-secondary">
                                                                    Xóa
                                                                </button>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th rowspan="1" colspan="1">Tên Phân Loại</th>
                                                    <th rowspan="1" colspan="1">Loại</th>
                                                    <th rowspan="1" colspan="1">Ghi Chú</th>
                                                    <th rowspan="1" colspan="1">Thao Tác</th>
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
