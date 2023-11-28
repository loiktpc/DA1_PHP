<?php 
    
if(isset($_POST['search'])){
    $name = $_POST['search_input'] ?? "" ;
    if(!empty($name)){
        $DaoSreach = new Products();
        $rows = $DaoSreach->sreach_product($name);
        // var_dump($rows) ;
    }
}
?>

<div class="content-body" style="min-height: 780px;">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Sản phẩm</h4>
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
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Start date: activate to sort column ascending"
                                                        style="width: 150px;">Hình Ảnh</th>
                                                    <th class="sorting_asc" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                        aria-sort="ascending"
                                                        aria-label="Name: activate to sort column descending"
                                                        style="width: 150px;">Tên Sản Phẩm</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 100px;"> Giá Tiền</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Office: activate to sort column ascending"
                                                        style="width: 20px;">Số Lượng</th>
                                                   
                                                 
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Salary: activate to sort column ascending"
                                                        style="width: 64.1042px;">Thao Tác</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                   
        
        
                                                foreach ($rows as $row):
                                                    extract($row);   
                                                ?>
                                                <tr role="row" class="odd">
                                                    <td>
                                                        <img width="80px" src="./Public/img/imgshop/<?php echo $img ?>" alt="">
                                                      
                                                    </td>
                                                    <td class="sorting_1">
                                                    <?php echo $name	 ?>
                                                    </td>
                                                    <td>
                                                    <?php 
                                                        echo number_format( $price, 0, ",", ".")
                                                    ?>
                                                    </td>
                                                    <td>
                                                    <?php echo $stock?>
                                                    </td>                                              
                                                    <td class="d-flex">
                                                        <a
                                                            href="./index.php?pages=admin&layout=home&modulde=search&action=payoff&id=<?php echo $id  ?>&name=<?php echo $name  ?>&img=<?php echo $img ?>&price=<?php echo $price ?>">
                                                            <button style="margin-right: 10px;"
                                                                class="btn mb-1 btn-flat btn-primary">
                                                           Thêm Giỏ Hàng
                                                            </button>
                                                        </a>
                                                       
                                                      
                                                    </td>
                                                </tr>
                                                <?php endforeach;  ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th rowspan="1" colspan="1">Hình Ảnh</th>
                                                    <th rowspan="1" colspan="1">Tên Sản Phẩm</th>
                                                    <th rowspan="1" colspan="1">Giá Tiền</th>
                                                    <th rowspan="1" colspan="1">Số Lượng</th>
                                                
                                                  
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
    </div>
  
</div>