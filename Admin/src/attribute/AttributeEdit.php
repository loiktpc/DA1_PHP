
<?php
//  cấu hình thuộc tính 
if (isset($_POST["edit"])) {
    $idatt = $_POST["idatt"];
    $valueatt = $_POST['valueatt'];
    $type = $_POST['type'];
    $attributes = new attributes();
    if (
        !empty($idatt) && !empty($valueatt)
    ) {
        $attributes->Insert_attributes_detail($idatt, $valueatt);
            
            header('location: /index.php?pages=admin&layout=home&modulde=attribute&action=edit&id='.$idatt.'&type='. $type.'');
            ob_end_flush();
    } else {
         $mess = "Vui Lòng Điền Đầy Đủ Thông Tin";
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
                            <h3>Cấu Hình Thuộc Tính Sản Phẩm</h3>
                            <form class="form-valide" action="#" method="post" novalidate="novalidate">
                                <input type="hidden" name="idatt" id="idatt" value="<?php echo $_GET['id'] ?>">
                                <input type="hidden" name="type" id="type" value="<?php echo $_GET['type'] ?>">
                                <?php if($_GET['type']==2) { ?> 
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valueatt">Màu <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control valid" id="valueatt" name="valueatt" aria-required="true" aria-describedby="role_id-error" aria-invalid="false">
                                            <option value="">Lựa Chọn</option>
                                            <option value="black">black</option>
                                            <option value="red">red</option>
                                            <option value="white">white</option>
                                            <option value="pink">pink</option>
                                            <option value="yellow">yellow</option>
                                            <option value="purple">purple</option>
                                            <option value="greenyellow">greenyellow</option>

                                            
                                        </select>
                                    </div>
                                </div>
                                <?php } else { ?>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="valueatt">Giá Trị <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <textarea class="form-control" name="valueatt" id="valueatt" cols="76" rows="3"></textarea>
                                    </div>
                                </div>
                                    <?php }?>
                                <div class="form-group row">
                                    <div class="col-lg-4"></div>
                                    <div class="col-lg-6" style="color: red;">
                                        <?php echo $mess ?? "" ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto">
                                        <button type="submit" class="btn btn-primary" name="edit">Xác Nhận</button>
                                        <a class="btn btn-outline-info"
                                            href="./index.php?pages=admin&layout=home&modulde=attribute&action=list">
                                            Quay Lại
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Cấu Hình Thuộc Tính</h4>
                        <div class="table-responsive">
                            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">

                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-striped table-bordered zero-configuration dataTable" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 150px;">Tên </th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 120px;">Giá Trị</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $Cate = new attributes();
                                                $ShowListCate=$Cate->getallattributes_detail($_GET['id']);
                                                foreach ($ShowListCate as $ShowList):
                                                    extract($ShowList);   
                                                    ?>                                       
                                                    <tr role="row" class="odd">
                                                    <td class="sorting_1"><?php echo $ShowList['nameatribute'] ;?> </td>
                                                        <td><?php echo $ShowList['Attribute_value']; ?>
                                                  
                                                     
                                                    </tr>
                                                 
                                                   
                                                <?php endforeach; ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th rowspan="1" colspan="1">Tên </th>
                                                    <th rowspan="1" colspan="1">Giá Trị </th>
                                                
                                                  
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

