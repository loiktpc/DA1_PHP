<?php
$order = new Order();


?>

<div class="content-body" style="min-height: 780px;">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Đơn Hàng</h4>
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
                                                        style="width: 121.094px;">Họ Tên</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 200.438px;"> Số Điện Thoại</th>

                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Age: activate to sort column ascending"
                                                        style="width: 34.9896px;">Thành Phố</th>

                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Age: activate to sort column ascending"
                                                        style="width: 34.9896px;">Thanh Toán</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Age: activate to sort column ascending"
                                                        style="width: 34.9896px;">Tổng Tiền</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Age: activate to sort column ascending"
                                                        style="width: 200px;">Địa Chỉ</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Start date: activate to sort column ascending"
                                                        style="width: 200px;">Nội Dung</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Salary: activate to sort column ascending"
                                                        style="width: 64.1042px;">Thao Tác</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $rows = $order->GetallOrder();
                                                foreach ($rows as $row) {
                                                    extract($row)
                                                        ?>

                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1">
                                                            <?php echo $nameorder ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $phone ?>
                                                        </td>

                                                        <td>
                                                            <?php echo $city ?>
                                                        </td>
                                                        <td>
                                                            <?php if($transfer_money=="cash"){
                                                                echo "Tiền Mặt" ;
                                                            }else{
                                                                echo "VNPAY";
                                                            } ?>
                                                        </td>
                                                        <td>
                                                           <?php         
                                                               echo   number_format($total, 0, ",", ".")
                                                            ?>đ
                                                        </td>
                                                        <td>
                                                            <?php echo $addressorder ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $mess ?>
                                                        </td>
                                                        <td class="vertical-align">
                                                            <a
                                                                href="/index.php?pages=admin&layout=home&modulde=order&action=orderdetail&id=<?php echo $id ?>">
                                                                <button class="btn mb-1 btn-flat btn-primary">
                                                                    Chi Tiết
                                                                </button>
                                                            </a>

                                                            <a
                                                                href="/index.php?pages=admin&layout=home&modulde=order&action=delete&id=<?php echo $id ?>">
                                                                <button style="margin-top: 10px;"
                                                                    class="btn mb-1 btn-flat btn-secondary">
                                                                    Hủy Đơn Hàng
                                                                </button>
                                                            </a>

                                                        </td>
                                                    </tr>
                                                <?php } ?>


                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th rowspan="1" colspan="1">Họ Tên</th>
                                                    <th rowspan="1" colspan="1">Số Điện Thoại</th>

                                                    <th rowspan="1" colspan="1">Thành Phố</th>
                                                    <th rowspan="1" colspan="1">Thanh Toán</th>
                                                    <th rowspan="1" colspan="1">Địa Chỉ</th>
                                                    <th rowspan="1" colspan="1">Nội Dung</th>
                                                    <th rowspan="1" colspan="1">Thao Tác</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-5">
                                        <div class="dataTables_info" id="DataTables_Table_0_info" role="status"
                                            aria-live="polite">
                                            <?php

                                            $row = $order->Count_Order();
                                            echo $row['total'] ?> Đơn Hàng
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