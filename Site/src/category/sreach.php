<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Sản phẩm</h1>
                <nav class="d-flex align-items-center">
                    <a href="./index.php?pages=site&action=home&layout=home">Trang chủ<span
                            class="lnr lnr-arrow-right"></span></a>
                    <a href="./index.php?pages=site&action=home&layout=home">Sản phẩm</a>
               
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->
<div class="container">
    <div class="row">
        <?php include './Site/include/cate.php'; ?>
        <div class="col-xl-9 col-lg-8 col-md-7">
            <!-- Start Filter Bar -->
            <div class="filter-bar d-flex flex-wrap align-items-center">
                <div class="sorting">
                
                </div>

            </div>
            <!-- End Filter Bar -->
            <!-- Start Best Seller -->
            <section class="lattest-product-area pb-40 category-list">
                <div class="row">
                 
                    <?php 
                    $Products = new Products ;
                    $str = str_replace(' ', '',$_POST['search_input']);
    $stmt = $Products->sreach_product($str) ; 
    if(!empty($stmt)){
foreach ($stmt as $row){
    extract($row);   
                ?>
                <div class="col-lg-3 col-md-6">
                    <div class="single-product">
                        <img class="img-fluid" src="./Public/img/imgshop/<?php echo  $img ?>" alt="">
                        <div class="product-details">
                            <h6><?php echo  $name ?></h6>
                            <div class="price">
                                <h6><?php echo 
                                 number_format($price, 0, ",", ".")
                                  ?>đ</h6>
                            </div>
                            <div class="prd-bottom" style="display: flex;">
                                
                                <form class="form_tym">
                            <input type="hidden" name="userid" value="<?php echo $_SESSION['idLogin'] ?>">
                            <input type="hidden" name="productid" value="<?php echo $id ?>">
                            <a class="social-info send_tym" type="button">
                                <span class="lnr lnr-heart <?php echo isset($_SESSION['favorites'][$id]) ? 'tym' : ''; ?>"></span>
                                <p class="hover-text">Yêu Thích</p>
                            </a>
                           </form>
                                <a href="./index.php?pages=site&action=home&layout=productdetail&id=<?php echo $id ?>" class="social-info">
                                    <span class="lnr lnr-move"></span>
                                    <p class="hover-text">Xem Thêm</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
              <?php } }else{
    ?>
         <h1>sản phẩm không tồn tại</h1>
                <?php } ?>
            </div>
        </div>
    </div>
                </div>
            </section>
            <!-- End Best Seller -->
            <!-- Start Filter Bar -->
          
			<br>
			<br>
            <!-- End Filter Bar -->
        </div>
    </div>
</div>