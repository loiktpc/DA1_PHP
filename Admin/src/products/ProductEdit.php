<div class="content-body" style="min-height: 780px;">
    <!-- row -->

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-validation">
                            <h3>Thêm Sản Phẩm</h3>
                            <form class="form-valide" action="#" method="post" novalidate="novalidate">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-phoneus">Hình Ảnh <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="file" class="form-control" id="val-phoneus" name="val-phoneus"
                                            placeholder="aothun.jpg">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-username">Tên Sản Phẩm <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-username" name="name"
                                            placeholder="Áo thun">
                                    </div>
                                </div>                               
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-email">Giá Tiền <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-email" name="val-email"
                                            placeholder="299.000">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-password">Số Lượng <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="password" class="form-control" id="val-password"
                                            name="val-password" placeholder="1">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-skill">Phân Loại <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control" id="val-skill" name="val-skill">
                                            <option value="">Chọn</option>
                                            <option value="html">Áo thun</option>
                                            <option value="css">Quần jean</option>
                                            <option value="html">Quần thun</option>
                                            <option value="css">Quần short</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="role_id">Lựa Chọn Thuộc Tính <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control valid" id="role_id" name="role_id" aria-required="true" aria-describedby="role_id-error" aria-invalid="false">
                                            <option value="">Lựa Chọn</option>
                                            <option value="1">Màu sắc</option>
                                            <option value="1">Kích Thước</option>
                                           

                                            
                                        </select>
                                    </div>
                                </div>
                               
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-phoneus">Mô Tả <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <textarea class="form-control" name="" id="" cols="76" rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto">
                                        <button type="submit" class="btn btn-primary">Xác Nhận</button>
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
                                                $Cate = new categories();
                                                $ShowListCate=$Cate->getlist();
                                                foreach ($ShowListCate as $ShowList):
                                                    extract($ShowList);   
                                                    ?>                                       
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1"> màu sắc </td>
                                                        <td>
                                                        đỏ
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