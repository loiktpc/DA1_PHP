<?php 
if (isset($_POST["edit"])) {
    
   

    $nameproduct = $_POST["nameproduct"];
    $price = $_POST["price"];
    $stock = $_POST["stock"];
    $caterory_id = $_POST["caterory_id"];
    $content = $_POST["content"];
    $id_product = $_POST['id_product'] ;
    // attributes id 
    $role_id = $_POST['role_id'] ;
    // test còn tồn tại ảnh không 
   
    // handle img 
    $name_another = ["jpg", "png", "svg"];
    $nameflie = $_FILES["anh"]["name"];
    $duong_dan_anh = "./Public/img/imgshop/$nameflie";
    if (
        !empty($nameproduct) && !empty($caterory_id) && !empty($price) &&
        !empty($stock) && !empty($content)  && !empty($id_product)
    ) 
    {
          // Tập tin đã tồn tại, không cần cập nhật lại
          if (file_exists($duong_dan_anh)) {
                  // Kiểm tra nếu chuỗi chỉ chứa các ký tự số
             if (ctype_digit($price) && ctype_digit($stock)) {
            if(is_numeric($price)&& $price > 0 && is_numeric($stock)&& $stock > 0){
                $product = new products();
                $product->Edit_product_notimg($nameproduct,$price,$stock,$caterory_id,$content,$id_product);
                $attributes = new attributes();
                $ddemo =  $attributes->getallattributes_detail_null($role_id);
                // lập attribute value 
                foreach ($ddemo as $item) {
                    // Truy xuất giá trị của Attribute_value từ mỗi mảng con
                    $attributeValue = $item["Attribute_value"];
                    $nameatribute = $item["nameatribute"];
                    
                    $product->Insert_variant($id_product,$nameatribute,$role_id,$attributeValue);
                }
                header('location: /index.php?pages=admin&layout=home&modulde=product&action=list');
                ob_end_flush();
               
    
            }else{
                $mess = "vui lòng nhập số và không nhập số âm";
            }
        } else {
            $mess ="Vui lòng chỉ nhập số.";
             }
          } else {
              // Tập tin không tồn tại, tiến hành tải lên và cập nhật
              
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
            $product->Edit_product($nameproduct,$price,$stock,$caterory_id,$content,$nameflie,$id_product);
            $attributes = new attributes();
            $ddemo =  $attributes->getallattributes_detail_null($role_id);
            // lập attribute value 
            foreach ($ddemo as $item) {
                // Truy xuất giá trị của Attribute_value từ mỗi mảng con
                $attributeValue = $item["Attribute_value"];
                $nameatribute = $item["nameatribute"];
                
                $product->Insert_variant($id_product,$nameatribute,$role_id,$attributeValue);
            }
            header('location: /index.php?pages=admin&layout=home&modulde=product&action=list');
            ob_end_flush();
           

        }else{
            $mess = "vui lòng nhập số và không nhập số âm";
        }
    } else {
        $mess ="Vui lòng chỉ nhập số.";
         }

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
                            <h3>Sửa Sản Phẩm</h3>
                            <?php
                            $id = $_GET['id'];
                            $product = new Products();
                            $rows = $product->GetProduct_id($id);
                            // var_dump($ddemo)   ;
                            

                            ?>
                               
                            <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="anh"> 
                                    </label>
                                    <div class="col-lg-6">
                                    <img width="80px" src="./Public/img/imgshop/<?php echo $rows['img'] ?>" alt="">
                                        
                                    </div>
                                </div>
                            <form class="form-valide" enctype="multipart/form-data" action="#" method="post" novalidate="novalidate">
                                <input type="hidden" value="<?php echo $rows['id'] ?>" name="id_product" >
                           
                                <div class="form-group row">
                                    
                                    <label class="col-lg-4 col-form-label" for="anh">Hình Ảnh <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="file" class="form-control" id="anh" name="anh"
                                            placeholder=".." value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="nameproduct">Tên Sản Phẩm <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="nameproduct" name="nameproduct"
                                            placeholder="Áo thun" value="<?php echo $rows['name'] ?>">
                                    </div>
                                </div>                               
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="price">Giá Tiền <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="price" name="price"
                                            placeholder="..." value="<?php echo $rows['price'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="stock">Số Lượng <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="stock"
                                            name="stock" placeholder="1" value="<?php echo $rows['stock'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="content">Mô Tả <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                    <textarea class="form-control"  name="content" id="content" cols="76" rows="5" spellcheck="false"><?php echo $rows['content'] ?>
                                        </textarea>
                                      
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
                                                <option  value="<?= $id ?>" <?php if($_GET['cateroryid'] == $id ) 
                                                { echo "selected";
                                                }
                                                ?>>
                                                    <?= $name ?>
                                                </option>
                                                <?php
                                            }


                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="role_id">Biến Thể <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control valid" id="role_id" name="role_id" aria-required="true" aria-describedby="role_id-error" aria-invalid="false">
                                            <option value="">Lựa Chọn</option>

                                           <?php 
                                            $Cate = new attributes();
                                            $ShowListCate=$Cate->getallattributes();
                                            foreach ($ShowListCate as $ShowList):
                                                extract($ShowList);   
                                           ?>
                                            <option value="<?php echo $ShowList['id'] ;?>"> <?php echo $ShowList['name'] ;?></option>

                                          
                                            <?php endforeach; ?>
                                            
                                        </select>
                                    </div>
                                </div>
                               
                               
                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto">
                                        <button type="submit" name="edit" class="btn btn-primary">Xác Nhận</button>
                                        <a class="btn btn-outline-info"
                                            href="/index.php?pages=admin&layout=home&modulde=product&action=list">
                                            Quay Lại
                                        </a>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Cấu Hình Biến Thể</h4>
                        <div class="table-responsive">
                            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">

                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-striped table-bordered zero-configuration dataTable" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 150px;">Thuộc Tính </th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 120px;">Giá trị</th>
                                                 
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $Products = new Products();
                                                $ShowListCate=$Products->Get_variant_productId($_GET['id']);
                                                foreach ($ShowListCate as $ShowList):
                                                    extract($ShowList);   
                                                    ?>                                       
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1"> <?php echo $nameatribute ?></td>
                                                        <td>
                                                        <?php echo $Attribute_value ?>
                                                        </td>
                                                      
                                                     
                                                    </tr>
                                                
                                                <?php endforeach; ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th rowspan="1" colspan="1">Thuộc Tính </th>
                                                    <th rowspan="1" colspan="1">Giá trị </th>
                                                 
                                                  
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