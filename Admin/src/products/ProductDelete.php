<?php 
    if (isset($_POST["delete"])) {
        $id_product = $_POST['id_product'] ;
        $namefile = $_POST['namefile'] ;

        $product = new Products();
        // Đường dẫn đầy đủ đến tệp tin cần xóa
        $fileToDelete = "./Public/img/imgshop/$namefile";

        if(!empty($id_product)&& !empty($namefile)){
            // Xóa tệp tin nếu tồn tại
        if (file_exists($fileToDelete)) {
            if (unlink($fileToDelete)) {
                try {
                    $product->Delete_product($id_product);
                   
                    $mess = "Xóa ảnh thành công.";
                    header('location: /index.php?pages=admin&layout=home&modulde=product&action=list');
                    ob_end_flush();
                    echo "Không bao giờ in ra dòng này vì có lỗi trước đó.";
                } catch (Exception $e) {
                    // Xử lý lỗi ở đây
                    // echo "Đã xảy ra lỗi: " . $e->getMessage();
                    $mess ="bị dính khóa ngoại vui lòng xóa ngoại trước" ;
                } 
        } else {
       
        $mess = "Không thể xóa ảnh.";
            }
        } else {
    
    $mess = "Tệp tin không tồn tại.";
    try {
        $product->Delete_product($id_product);
       
        $mess = "Xóa ảnh thành công.";
        header('location: /index.php?pages=admin&layout=home&modulde=product&action=list');
        ob_end_flush();
        echo "Không bao giờ in ra dòng này vì có lỗi trước đó.";
    } catch (Exception $e) {
        // Xử lý lỗi ở đây
        // echo "Đã xảy ra lỗi: " . $e->getMessage();
        $mess ="bị dính khóa ngoại vui lòng xóa ngoại trước" ;
    } 
    
        }
          
        }
     

    }

?>
<div class="content-body" style="min-height: 780px;">
    <!-- row -->

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-validation">
                            <h3>Xóa Sản Phẩm</h3>
                            <span style="color: red;">
                                <?php echo $mess ?? ""  ;
                        ?>
                        </span>
                           
                            <form class="form-valide" action="#" method="post" enctype="multipart/form-data" novalidate="novalidate">
                                <p>Bạn chắc chắn xóa ?</p>
                                <div class="form-group row">
                                    <input type="hidden" value="<?php echo $_GET['id'] ?>" name="id_product">
                                    <input type="hidden" value="<?php echo $_GET['namefile'] ?>" name="namefile">
                                    <div class="col-lg-8 ml-auto">
                                        <button type="submit" name="delete" class="btn btn-primary ">Xác Nhận</button>
                                        <a class="btn btn-outline-info"
                                            href="./index.php?pages=admin&layout=home&modulde=product&action=list">
                                            Quay Lại
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
</div>