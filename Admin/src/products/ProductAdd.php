<?php 
if (isset($_POST["add"])) {
    
    

    $nameproduct = $_POST["nameproduct"];
    $price = $_POST["price"];
    $stock = $_POST["stock"];
    $caterory_id = $_POST["caterory_id"];
    $content = $_POST["content"];
    
    // handle img 
    $name_another = ["jpg", "png", "svg"];
    $nameflie = $_FILES["anh"]["name"];
   
    if (
        !empty($nameproduct) && !empty($caterory_id) && !empty($price) &&
        !empty($stock) && !empty($content) && !empty($nameflie) 
    ) {
        $tmp_name_file = $_FILES["anh"]["tmp_name"];
        $file_size = $_FILES["anh"]["size"];
        $generated_file_name = time() . "-" . $nameflie;

        $contains_img = "./Public/img/imgshop/$nameflie";
        $file_extension = explode('.', $nameflie);
        $file_extension = strtolower(end($file_extension));
        if (in_array($file_extension, $name_another)) {
            if ($file_size < 1000000) {
                move_uploaded_file($tmp_name_file, $contains_img);
            }else{
                $mess = "kích thước ảnh quá lớn ";
            }
        }else{
            $mess = "Định dạng tệp tin không hợp lệ. ";
        }
        // Kiểm tra nếu chuỗi chỉ chứa các ký tự số
        if (ctype_digit($price) && ctype_digit($stock)) {
        if(is_numeric($price)&& $price > 0 && is_numeric($stock)&& $stock > 0){
            $product = new products();
            $product->Insert_product($nameproduct,$price,$stock,$caterory_id,$content,$nameflie);
            header('location: /index.php?pages=admin&layout=home&modulde=product&action=list');
            ob_end_flush();
        }else{
            $mess = "vui lòng nhập số và không nhập số âm";
        }
    } else {
        $mess ="Vui lòng chỉ nhập số.";
    }

    }else{
        $mess = "vui lòng nhập thông tin";
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
                            <h3>Thêm Sản Phẩm</h3>
                           
                            <form class="form-valide" action=""
                             method="post" enctype="multipart/form-data" >
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="">Hình Ảnh <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                      <input type="file" name="anh" id="anh">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="nameproduct">Tên Sản Phẩm <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="nameproduct" name="nameproduct"
                                            placeholder="Áo thun">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="price">Giá Tiền <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="price" name="price"
                                            placeholder="...">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="stock">Số Lượng <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="stock"
                                            name="stock" placeholder="...">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="caterory_id">Phân Loại <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control" id="caterory_id" name="caterory_id">
                                            <option value="">Chọn</option>
                                            <?php
                                            $category = new categories();

                                            $rows = $category->getlist();
                                            foreach ($rows as $row) {
                                                extract($row)
                                                    ?>
                                                <option value="<?= $id ?>">
                                                    <?= $name ?>
                                                </option>
                                                <?php
                                            }


                                            ?>
                                        </select>
                                    </div>
                                </div>
                             
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="content">Mô Tả <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <textarea class="form-control" name="content" id="content" cols="76" rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-4"></div>
                                    <div class="col-lg-6" style="color: red;">
                                        <?php echo $mess ?? "" ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto">
                                        <button type="submit" name="add" class="btn btn-primary">Xác Nhận</button>
                                        <a class="btn btn-outline-info"
                                            href="/index.php?pages=admin&layout=home&modulde=product&action=list">
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