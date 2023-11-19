<?php 
    if(isset($_POST['sreach'])){
        $role_id = $_POST['role_id'] ;
        $review = new Review() ;
        if(!empty($role_id)){
            if($role_id == "all"){
                $rows = "" ;
            }
            if($role_id == 1){
                $rows = $review->GetAllReview_1($role_id);

            }
            if($role_id == 2){
                $rows = $review->GetAllReview_star2($role_id);

            }
            if($role_id == 3){
                $rows = $review->GetAllReview_star3($role_id);

            }
            if($role_id == 4){
                $rows = $review->GetAllReview_star4($role_id);

            }
            if($role_id == 5){
                $rows = $review->GetAllReview_star5($role_id);

            }
           
            
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
                        <h4 class="card-title">Đánh Giá Sản Phẩm</h4>
                        <form class="form-valide" action="#" method="post" novalidate="novalidate">
                        <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="role_id">Tìm Kiếm Đánh giá 
                                    </label>
                                   
                                    <div class="col-lg-6">
                                        <select class="form-control valid" id="role_id" name="role_id" aria-required="true" aria-describedby="role_id-error" aria-invalid="false">
                                            <option value="">Lựa Chọn</option>
                                            <option value="all">tất cả</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>

                                         
                                            
                                        </select>
                                    </div>
                                  
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto">
                                    <button name="sreach" class="btn mb-1 btn-primary">Xác Nhận</button>
                                       
                                    </div>

                                </div>
                               

                        </form>
                        <div class="table-responsive">
                            <div id="DataTables_Table_0_wrapper"
                                class="dataTables_wrapper container-fluid dt-bootstrap4">
                                <h4> <?php if(!empty($role_id)){
                                     if($role_id == "all" ){
                                        echo "Tìm kiếm : tất cả" ;
                                    } else{
                                        echo "Tìm kiếm :". $role_id . "sao"  ;
                                    }
                                }else{
                                    echo "" ;
                                } ?></h4>
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
                                                        style="width: 121.094px;">Hình Ảnh</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 200.438px;"> Sản Phẩm</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Office: activate to sort column ascending"
                                                        style="width: 200.3854px;">Nội Dung</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Age: activate to sort column ascending"
                                                        style="width: 34.9896px;">Đánh Giá </th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Age: activate to sort column ascending"
                                                        style="width: 40px;">Tài Khoản</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Start date: activate to sort column ascending"
                                                        style="width: 80px;">Ngày Bình Luận</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Salary: activate to sort column ascending"
                                                        style="width: 64.1042px;">Thao Tác</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                                            
                                            if(!is_array($rows ?? "")){
                                                    $db = new connect();
                                                    $conn = $db->pdo_get_connection();
                                                    $results_per_page = 5;
                                                    $stmt1 = $conn->prepare("SELECT * FROM review_products");
                                                    $stmt1->execute();
                                                    $number_of_result = $stmt1->rowCount();
                                                    $number_of_page = ceil($number_of_result / $results_per_page);
                                                    if (!isset($_GET['numpage'])) {
                                                        $page = 1;
                                                    } else {
                                                        $page = $_GET['numpage'];
                                                    }
                                                    $page_first_result = ($page - 1) * $results_per_page;
                                                    $stmt = $conn->prepare("SELECT r.star as star ,
                                                     u.username  as  username, r.mess as mess , p.name as name , 
                                                     p.img as img , r.created_at as created_at , r.id as id FROM review_products r ,products p , users u
                                                      where r.product_id = p.id and u.id = r.user_id LIMIT $page_first_result ,$results_per_page");
                                                    $stmt->execute();


                                                 

                                                    
                                                    if ($stmt->rowCount() > 0) {
        
                                                        
                                                foreach ($stmt as $row):
                                                    extract($row);   
                                                ?>

                                                <tr role="row" class="odd">
                                                <td>
                                                        <img width="80px" src="./Public/img/imgshop/<?php echo $img ?>" alt="">
                                                      
                                                    </td>
                                                    <td>
                                                    <?php echo $name ?>

                                                    </td>
                                                    <td>
                                                    <?php echo $mess ?>
                                                    </td>
                                                    <td><span>
                                                    <?php echo $star ?> Sao
                                                        </span></td>
                                                    <td>   <?php echo $username ?></td>
                                                    <td>  <?php echo $created_at ?></td>
                                                    <td class="vertical-align">


                                                        <a
                                                            href="/index.php?pages=admin&layout=home&modulde=review&action=delete&id=<?php echo $id ?>">
                                                            <button style="margin-top: 10px;"
                                                                class="btn mb-1 btn-flat btn-secondary">
                                                                Hủy Đánh Giá
                                                            </button>
                                                        </a>

                                                    </td>
                                                </tr>
                                                <?php endforeach; } 
                                                }else{
                                                    foreach ($rows as $row):
                                                    extract($row);   
                                                ?>

                                                <tr role="row" class="odd">
                                                <td>
                                                        <img width="80px" src="./Public/img/imgshop/<?php echo $img ?>" alt="">
                                                      
                                                    </td>
                                                    <td>
                                                    <?php echo $id ?>

                                                    </td>
                                                    <td>
                                                    <?php echo $mess ?>
                                                    </td>
                                                    <td><span>
                                                    <?php echo $star ?> Sao
                                                        </span></td>
                                                    <td>   <?php echo $username ?></td>
                                                    <td>  <?php echo $created_at ?></td>
                                                    <td class="vertical-align">


                                                        <a
                                                            href="/index.php?pages=admin&layout=home&modulde=review&action=delete&id=<?php echo $id ?>">
                                                            <button style="margin-top: 10px;"
                                                                class="btn mb-1 btn-flat btn-secondary">
                                                                Hủy Đánh Giá
                                                            </button>
                                                        </a>

                                                    </td>
                                                </tr>



                                                    <?php endforeach; }  ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th rowspan="1" colspan="1">Hình Ảnh</th>
                                                    <th rowspan="1" colspan="1">Sản Phẩm</th>
                                                    <th rowspan="1" colspan="1">Nội Dung</th>
                                                    <th rowspan="1" colspan="1">Đánh Giá</th>
                                                    <th rowspan="1" colspan="1">Tài Khoản</th>
                                                    <th rowspan="1" colspan="1">Ngày Bình Luận</th>
                                                    <th rowspan="1" colspan="1">Thao Tác</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-5">
                                        <div class="dataTables_info" id="DataTables_Table_0_info" role="status"
                                            aria-live="polite"></div>
                                    </div>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="dataTables_paginate paging_simple_numbers"
                                            id="DataTables_Table_0_paginate">
                                            <ul class="pagination">
                                            <?php
                                if(isset($number_of_page)){
                                    $current_page = isset($_GET['numpage']) ? $_GET['numpage'] : 1; // Lấy trang hiện tại từ tham số URL hoặc mặc định là 1

                                    for ($page = 1; $page <= $number_of_page; $page++)
                                    {
                                       echo '        
                                   <li class="paginate_button page-item ' . ($page == $current_page ? 'active' : '') . ' "><a href="/index.php?pages=admin&layout=home&modulde=review&action=list&numpage=' . $page . '"
                                   aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0"
                                   class="page-link">' . $page . '</a></li>
                                   '  ?? "";
                                   } 
                                }else{
                                    echo "" ;
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