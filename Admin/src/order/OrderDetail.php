<?php
$order = new Order();
if (isset($_POST["xacnhan"])) {
    $id = $_GET['id'];
    $status_order = $_POST['status_order'];
    $update = $order->UpdateStatusOrder($id, $status_order);
}
?>

<div class="content-body" style="min-height: 780px;">

    <!-- row -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Đơn Hàng Chi Tiết</h4>
                        <div class="row">
                            <div class="col-sm-12 col-md-5">
                                <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">
                                    <?php

                                    $row = $order->Count_OrderDetail();
                                    echo $row['total'] ?> Đơn Hàng
                                </div>
                            </div>

                        </div>
                        <form action="" method="post" class="d-flex">
                            <label class="col-lg-4 col-form-label" for="checkconfrim">Trạng Thái
                            </label>
                            <div class="col-lg-4" bis_skin_checked="1">
                                <?php
                                $rows = $order->getallorderdetail($_GET['id']);
                                foreach ($rows as $rowlist) {
                                    extract($rowlist);
                                ?>
                                    <select class="form-control" id="checkconfrim" name="status_order">
                                        <option value="0" <?php if ($rowlist['status_order'] == 0) {echo 'selected';} ?>>Chưa Xác nhận</option>
                                        <option value="1"<?php if ($rowlist['status_order'] == 1) {echo 'selected';} ?>>Xác nhận đơn hàng</option>
                                        <option value="2"<?php if ($rowlist['status_order'] == 2) {echo 'selected';} ?>>Đang giao hàng</option>
                                        <option value="3"<?php if ($rowlist['status_order'] == 3) {echo 'selected';} ?>>Thành Công</option>
                                    </select>
                                <?php } ?>
                            </div>
                            <button name="xacnhan" class="btn mb-1 btn-primary">Xác Nhận</button>

                        </form>
                        <a class="btn mb-1 btn-outline-info" href="/index.php?pages=admin&layout=home&modulde=order&action=list">

                            Quay Lại
                        </a>
                    </div>
                    <div class="table-responsive">
                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">

                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-striped table-bordered zero-configuration dataTable" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                        <thead>
                                            <tr role="row">

                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 200.438px;"> Sản Phẩm</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 86.3854px;">Giá</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 34.9896px;">Số Lượng</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 200px;">Mã Hóa Đơn </th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 150px;">Ngày Mua</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $rows = $order->GetOrderdetail($_GET['id']);
                                            foreach ($rows as $row) {
                                                extract($row)
                                            ?>

                                                <tr role="row" class="odd">

                                                <td>
                                                    <?php echo $nameproduct ?>
                                                    <strong>Size:  <?php echo $size ?? "" ?>,</strong>
                                                    <strong>Color:  <?php echo $color ?? "" ?></strong>
                                                </td>
                                                <td>
                                                    <?php echo
                                                     number_format( $moneyproduct , 0, ",", ".")
                                                    
                                                     ?>
                                                </td>
                                                <td>
                                                    <?php echo $qty_orderdetail ?>
                                                </td>
                                                <td>
                                                    <?php echo $order_code ?>
                                                </td>
                                                <td>
                                                    <?php echo $created_at ?>
                                                </td>

                                                </tr>
                                            <?php } ?>


                                        </tbody>
                                        <tfoot>
                                            <tr>

                                                <th rowspan="1" colspan="1">Sản Phẩm</th>
                                                <th rowspan="1" colspan="1">Giá</th>
                                                <th rowspan="1" colspan="1">Số Lượng</th>
                                                <th rowspan="1" colspan="1">Mã Hóa Đơn </th>
                                                <th rowspan="1" colspan="1">Ngày Mua</th>

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