<?php
if (!isset($_SESSION['payoff'])) {
    $_SESSION['payoff'] = [];
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $name = $_GET['name'];
    $img = $_GET['img'];
    $price = $_GET['price'];
    $qty = 1;

    $product = [
        "id" => $id,
        "name" => $name,
        "img" => $img,
        "price" => $price,
        "qty" => $qty
    ];

   
    $found = false;

   
    if (isset($_SESSION['payoff'])) {
     
        foreach ($_SESSION['payoff'] as &$cartItem) {
         
            if ($id == $cartItem['id']) {
             
                $cartItem['qty']++;
                $found = true;
                break;
            }
        }
      
        unset($cartItem);
    }

   
    if (!$found) {
        $_SESSION['payoff'][] = $product;
    }
}


// Khi người dùng click remove
if (isset($_SESSION['payoff'])) {
    if (isset($_POST['removecart'])) {
        $idToRemove = $_POST['id'];
    // var_dump($secondArray);
        foreach ($_SESSION['payoff'] as $key => $product) {
            // var_dump($product);
    
           
            // Kiểm tra nếu sản phẩm có id, color và size khớp với sản phẩm cần xóa
            // var_dump($_SESSION['cart'][$key]["$id"]["$sizeToRemove"]["$colorToRemove"]) ;
            if ($idToRemove == $product['id'] && $colorToRemove == $product['color'] && $sizeToRemove == $product['size']) {
                echo "1" ;
                // Xóa sản phẩm khỏi giỏ hàng
                unset($_SESSION['payoff'][$key]);
                header('Location: /index.php?pages=admin&layout=home&modulde=search&action=payoff');
                ob_end_flush();
                exit(); // Quan trọng để dừng thực thi ngay lập tức sau khi chuyển hướng
            }
        }
    }
}

if (isset($_SESSION['payoff'])) {
    // khi người dùng click cập nhập
    

    if (isset($_POST['update'])) {
        $id = $_POST['id'] ?? "";
   
        $qtyedit = $_POST['editqty'];
        foreach ($_SESSION['payoff'] as $productId => $productDetails) {
            if ($id == $productDetails['id']) {
                $_SESSION['payoff'][$productId]['qty'] = $qtyedit;
                header('Location: /index.php?pages=admin&layout=home&modulde=search&action=payoff');
                ob_end_flush();
                exit();
            }
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
                        <div class="form-validation">
                            <form class="form-valide" action="/index.php?pages=print" method="post" novalidate="novalidate">
                          
                                             <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="valueatt">Tên khách hàng <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="UserName" name="UserName" placeholder="..." required="" aria-required="true">
                                            </div>
                                        </div>
                                                                            <div class="form-group row">
                                            <div class="col-lg-4"></div>
                                            <div class="col-lg-6" style="color: red;">
                                                                                    </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="UserPhone">Số Điện Thoại <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="UserPhone" name="UserPhone" placeholder="..." required="" aria-required="true">
                                            </div>
        
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="moneyhasuser">Số Tiền Khách Hàng Đưa <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="moneyhasuser" name="moneyhasuser" placeholder="..." required="" aria-required="true">
                                            </div>
        
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button type="submit" class="btn btn-primary" name="edit">Xác Nhận</button>
                                                
                                            </div>
                                        </div>
                                        </form>
                                <h4 class="card-title">Giỏ Hàng Thanh Toán</h4>
                               
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
                                        if (isset($_SESSION['payoff'])): ?>
                                        
                                                <?php
                                    
                                                    $total_product = 0;
                                                    $total_bill = 0;
        
        
                                                    ?>
                                                    <?php foreach ($_SESSION['payoff'] as $item): ?>
                                                        <?php
                                                        $total_product = ($item['price'] * $item['qty']) ;
                                                        $total_bill += $total_product;
        
                                                        ?>
                                                        <tr role="row" class="odd">
                                                            <td>
                                                                <img width="80px" src="./Public/img/imgshop/<?php echo $item['img'] ?>" alt="">
                                                              
                                                            </td>
                                                            <td class="sorting_1">
                                                            <?php echo $item['name']	 ?>
                                                            </td>
                                                            <td>
                                                            <?php echo  number_format( $item['price'], 0, ",", ".") ;
                                                           ?>đ
                                                            </td>
                                                            <td >
                                                            <form action="" method="post">
                                                            <input type="hidden" name="id" value=<?php echo $item['id'] ?>>
                                                      
                                                        <input type="number" style="-webkit-appearance: none;-moz-appearance: textfield; width:50px;" name="editqty" id="sst" value="<?php echo $item['qty'] ?>" title="Quantity:"
                                                            class="input-text editqty">
                                                
                                                        <button  class="increase items-count" type="submit" name="update">Cập Nhật</button>
                                                                 </form>
                                                        
                                                        
                                                  
                                                            </td>
                                                            
                                                            
                                                          
                                                            <td class="d-flex">
                                                            <form action="" method="post" id="data_removecart">
                                            <input type="hidden" name="id" value=<?php echo $item['id'] ?>>
                                           
                                        <button class="btn mb-1 btn-flat btn-primary" id="removecart" name="removecart" type="submit" value="<?= $item['id'] ?>" style="cursor: pointer;">
                                            xóa
                                        </button>
                                  
        
                                        </form>
                                                              
                                                            </td>
                                                        </tr>
                                                        <?php endforeach; ?>
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
                                        <div class="d-flex justify-content-end">
                                        <h3 style="margin-right: 15px;">tổng tiền :<?php echo isset($total_bill) ? (number_format($total_bill, 0, ",", ".")) : "" ?> đ</h3>
                                        <!-- <a href="/index.php?pages=print">
        
                                            </a> -->
                                            <!-- <button type="button" class="btn mb-1 btn-info">Thanh Toán</button> -->
                                        </div>
                                     
                                        <?php  endif;  ?>
                                      
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