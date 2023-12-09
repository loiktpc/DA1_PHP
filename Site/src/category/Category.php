<?php
$db = new connect();
$conn = $db->pdo_get_connection();
$results_per_page = 4;
$id = $_GET['id'];
// Pagination logic
// Assuming you have a category ID available as $category_id
$stmt1 = $conn->prepare("SELECT * FROM products WHERE category_id = :id");
$stmt1->bindParam(':id', $id, PDO::PARAM_INT);
$stmt1->execute();

// Get the total number of products for the specific category
$number_of_result = $stmt1->rowCount();
$number_of_page = ceil($number_of_result / $results_per_page);


$current_page = isset($_GET['numpage']) ? $_GET['numpage'] : 1;
$page = max(1, min($number_of_page, $current_page)); // Ensure $page is within a valid range
$page_first_result = ($page - 1) * $results_per_page;


// Fetch data with parameterized query
$stmt = $conn->prepare("SELECT * FROM products WHERE category_id = :id LIMIT :page_first_result, :results_per_page");
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->bindParam(':page_first_result', $page_first_result, PDO::PARAM_INT);
$stmt->bindParam(':results_per_page', $results_per_page, PDO::PARAM_INT);
$stmt->execute();

// Display the paginated data and pagination links
if ($stmt->rowCount() > 0) { ?>
    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Sản phẩm</h1>
                    <nav class="d-flex align-items-center">
                        <a href="./index.php?pages=site&action=home&layout=home">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
                        <a href="./index.php?pages=site&action=home&layout=home">Sản phẩm<span class="lnr lnr-arrow-right"></span></a>
                        <a href="./index.php?pages=site&action=home&layout=category">Áo thun</a>
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
                        <select class="select-filter" id="select-filter">
                            <option value="0" <?php if (isset($_GET['product']) && $_GET['product'] == 0) {
                                                    echo 'selected';
                                                } ?>>--Lọc
                                Theo--</option>
                            <option value="./index.php?pages=site&action=home&layout=category&id=<?php echo $_GET['id'] ?>&product=new" <?php if (isset($_GET['product']) && $_GET['product'] == 'new') {
                                                                                                                                            echo 'selected';
                                                                                                                                        } ?>>Sắp xếp
                                theo sản phẩm mới nhất</option>
                            <option value="./index.php?pages=site&action=home&layout=category&id=<?php echo $_GET['id'] ?>&product=asc" <?php if (isset($_GET['product']) && $_GET['product'] == 'asc') {
                                                                                                                                            echo 'selected';
                                                                                                                                        } ?>>Giá thấp
                                đến cao</option>
                            <option value="./index.php?pages=site&action=home&layout=category&id=<?php echo $_GET['id'] ?>&product=desc" <?php if (isset($_GET['product']) && $_GET['product'] == 'desc') {
                                                                                                                                                echo 'selected';
                                                                                                                                            } ?>>Giá cao
                                đến thấp</option>
                        </select>
                    </div>

                </div>
                <!-- End Filter Bar -->
                <!-- Start Best Seller -->
                <section class="lattest-product-area pb-40 category-list">
                    <div class="row">
                        <!-- single product -->
                        <?php
                        if (isset($_GET['id'])) {
                            $loai = $_GET['id'];
                            $cate = new categories();
                            if (isset($_GET['product'])) {
                                if ($_GET['product'] == 'asc') {
                                    $orderby = "asc";
                                    $stmt = $cate->sortprice($_GET['id'], $orderby);
                                } else if ($_GET['product'] == 'desc') {
                                    $orderby = "desc";
                                    $stmt = $cate->sortprice($_GET['id'], $orderby);
                                } else {
                                    $stmt = $cate->newproduct($_GET['id']);
                                }
                            }
                            $count = 0;
                            foreach ($stmt as $productAsSame) :
                                extract($productAsSame);
                                $number = number_format($productAsSame['price'], 0, '.', '.');
                                if ($count < $results_per_page) {
                        ?>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="single-product">
                                            <img class="img-fluid" src="./Public/img/imgshop/<?php echo $productAsSame['img']; ?>" alt="">
                                            <div class="product-details">
                                                <h6><?php echo $productAsSame['name']; ?></h6>
                                                <div class="price">
                                                    <h6><?php echo $number; ?>đ</h6>
                                                </div>
                                                <div class="prd-bottom">
                                                    <a href="" class="social-info">
                                                        <span class="lnr lnr-heart <?php echo isset($_SESSION['favorites'][$id]) ? 'tym' : ''; ?>"></span>
                                                        <p class="hover-text">Yêu Thích</p>
                                                    </a>
                                                    <a href="./index.php?pages=site&action=home&layout=productdetail&id=<?php echo $id ?>" class="social-info">
                                                        <span class="lnr lnr-move  <?php echo $id ?>"></span>
                                                        <p class="hover-text">Xem Thêm</p>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        <?php
                                    $count++;
                                }
                            endforeach;
                        } ?>
                    </div>
                </section>
                <!-- Start Filter Bar -->
                <div class="filter-bar d-flex flex-wrap align-items-center">
                    <div class="sorting mr-auto">
                        <!-- Your sorting dropdown code here -->
                    </div>
                    <div class="pagination">

                        <!-- Display "Previous" link -->
                        <a href="./index.php?pages=site&action=home&layout=category&id=<?php echo $_GET['id'] ?>&numpage=<?php echo $page - 1; ?>" class="prev-arrow" <?php echo ($page == 1) ? 'style="pointer-events: none; opacity: 0.5;"' : ''; ?>>
                            <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
                        </a>

                        <!-- Display page links -->
                        <?php
                        for ($i = 1; $i <= $number_of_page; $i++) : ?>
                            <a href="./index.php?pages=site&action=home&layout=category&id=<?php echo $_GET['id'] ?>&numpage=<?php echo $i; ?>" class="<?php echo ($i == $page) ? 'active' : ''; ?>">
                                <?php echo $i; ?>
                            </a>
                        <?php endfor; ?>
                        <!-- Display "Next" link -->
                        <a href="./index.php?pages=site&action=home&layout=category&id=<?php echo $_GET['id'] ?>&numpage=<?php echo $page + 1; ?>" class="next-arrow" <?php echo ($page == $number_of_page) ? 'style="pointer-events: none; opacity: 0.5;"' : ''; ?>>
                            <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                        </a>

                    </div>
                </div>
                <!-- End Filter Bar -->

            <?php
        }
            ?>

            <br>
            <br>
            <!-- End Filter Bar -->
            </div>
        </div>
    </div>