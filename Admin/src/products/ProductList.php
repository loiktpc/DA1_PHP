
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
                                                        aria-label="Age: activate to sort column ascending"
                                                        style="width: 120px;">Phân Loại</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Age: activate to sort column ascending"
                                                        style="width: 200px;">Mô Tả</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Salary: activate to sort column ascending"
                                                        style="width: 64.1042px;">Thao Tác</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    $db = new connect();
                                                    $conn = $db->pdo_get_connection();
                                                    $results_per_page = 4;
                                                    $stmt1 = $conn->prepare("SELECT * FROM products");
                                                    $stmt1->execute();
                                                    $number_of_result = $stmt1->rowCount();
                                                    $number_of_page = ceil($number_of_result / $results_per_page);
                                                    if (!isset($_GET['numpage'])) {
                                                        $page = 1;
                                                    } else {
                                                        $page = $_GET['numpage'];
                                                    }
                                                    $page_first_result = ($page - 1) * $results_per_page;
                                                    $stmt = $conn->prepare("SELECT p.*, c.name as namecaterory ,
                                                    c.id as cateid from products p, category c where c.id = p.category_id  LIMIT $page_first_result ,$results_per_page");
                                                    $stmt->execute();
                                                    if ($stmt->rowCount() > 0) {
        
        
        
        
                                                foreach ($stmt as $row):
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
                                                     echo number_format( $price, 0, ",", ".")                  		 ?>
                                                    </td>
                                                    <td>
                                                    <?php echo $stock		 ?>
                                                    </td>
                                                    <td>
                                                    <?php echo $namecaterory 		 ?>
                                                    </td>
                                                    
                                                    <td class="text-justify ">
                                                    <?php echo $content 		 ?>
                                                    </td>
                                                    <td class="d-flex">
                                                        <a
                                                            href="./index.php?pages=admin&layout=home&modulde=product&action=edit&id=<?php echo $id  ?>&cateroryid=<?php echo $cateid ?>">
                                                            <button style="margin-right: 10px;"
                                                                class="btn mb-1 btn-flat btn-primary">
                                                                Sửa
                                                            </button>
                                                        </a>
                                                        <a
                                                            href="./index.php?pages=admin&layout=home&modulde=product&action=delete&id=<?php echo $id  ?>&namefile=<?php echo $img  ?>">
                                                            <button style="margin-right: 10px;" class="btn mb-1 btn-flat btn-secondary">
                                                                Xóa
                                                            </button>
                                                        </a>
                                                      
                                                    </td>
                                                </tr>
                                                <?php endforeach; } ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th rowspan="1" colspan="1">Hình Ảnh</th>
                                                    <th rowspan="1" colspan="1">Tên Sản Phẩm</th>
                                                    <th rowspan="1" colspan="1">Giá Tiền</th>
                                                    <th rowspan="1" colspan="1">Số Lượng</th>
                                                    <th rowspan="1" colspan="1">Phân Loại</th>
                                                    <th rowspan="1" colspan="1">Mô Tả</th>
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
                                        $dashboard = new Dashboard();
                                        $product = $dashboard->Count_Products();
                                        echo $product['total'] ;                        
                                            ?>
                                            sản phẩm</div>
                                    </div>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="dataTables_paginate paging_simple_numbers"
                                            id="DataTables_Table_0_paginate">
                                            <ul class="pagination">
                                            <?php
                                 // Lấy trang hiện tại từ tham số URL hoặc mặc định là 1           
                                 $current_page = isset($_GET['numpage']) ? $_GET['numpage'] : 1; 
                                for ($page = 1; $page <= $number_of_page; $page++) {
                                    echo '        
                                <li class="paginate_button page-item ' . ($page == $current_page ? 'active' : '') . ' "><a href="/index.php?pages=admin&layout=home&modulde=product&action=list&numpage=' . $page . '"
                                aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0"
                                class="page-link">' . $page . '</a></li>
                                ';
                                }

                                ?>                                                                             
                                           
                                            </ul>
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