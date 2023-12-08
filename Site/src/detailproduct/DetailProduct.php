<?php
$product = new Products();
if (isset($_SESSION['username'])) {
    if (isset($_POST['sendcomment'])) {
        if (!empty($_POST['sendcomment']) && !empty($_POST['message'])) {
            $error = array();
            $product_id = $_GET['id'];
            $content = $_POST['message'];
            $user_id = $_SESSION['idLogin'];
            $comment = new comment();
            $insertcmt = $comment->insert($product_id, $content, $user_id);
            header('Location: ./index.php?pages=site&action=home&layout=productdetail&id=' . $product_id . '');
            exit();
        } else {
            $error = "Vui lòng nhập dữ liệu!";
        }
    }
}

if (isset($_POST["updatecomment"])) {
    $id = $_GET['idcmt'];
    $idpro = $_GET['id'];
    $content = $_POST['message'];
    $commentuser = new comment();
    $update = $commentuser->update($id, $content);
    header('Location: ./index.php?pages=site&action=home&layout=productdetail&id=' . $idpro . '');
    exit();
}
if (isset($_POST["deletecomment"])) {
    $id = $_GET['idcmt'];
    $idpro = $_GET['id'];
    $comment = new comment();
    $Delete = $comment->delete($id);
    header('Location: ./index.php?pages=site&action=home&layout=productdetail&id=' . $idpro . '');
    exit();
}

$role = null;
if (isset($_SESSION['username'])) {
    $userrole_id = new User();
    $role = $userrole_id->userrole($_SESSION['username'], $_SESSION['passwords']);
    $id = $userrole_id->id($_SESSION['username']);
}

?>
<style>
    .color__star_review {
        color: #fbd600;
    }
</style>
<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Chi tiết sản phẩm</h1>
                <nav class="d-flex align-items-center">
                    <a href="./index.php?pages=site&action=home&layout=home">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
                    <a href="./index.php?pages=site&action=home&layout=home">Sản phẩm<span class="lnr lnr-arrow-right"></span></a>
                    <a href="./index.php?pages=site&action=home&layout=productdetail">Chi tiết sản phẩm</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

<!--================Single Product Area =================-->
<div class="product_image_area">
    <div class="container">
        <div class="row s_product_inner">
            <?php $rows = $product->getId_Product($_GET['id']);

            foreach ($rows as $row) {
                extract($row);
            ?>
                <div class="col-lg-6">
                    <div class="s_Product_carousel">
                        <div class="single-prd-item">
                            <img class="img-fluid" src="./Public/img/imgshop/<?php echo  $img ?>" alt="">
                        </div>
                        <div class="single-prd-item">
                            <img class="img-fluid" src="./Public/img/imgshop/<?php echo  $img ?>" alt="">
                        </div>
                        <div class="single-prd-item">
                            <img class="img-fluid" src="./Public/img/imgshop/<?php echo  $img ?>" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">

                    <div class="s_product_text">
                        <h3><?php echo $name ?></h3>
                        <h2><?php echo   number_format($price, 0, ",", ".") ?>đ</h2>
                        <ul class="list">
                            <li><a class="active" href="#"><span>Phân loại</span> : <?php echo $namecaterory ?></a></li>
                            <li><a href="#"><span>Còn hàng</span> : còn <?php echo $stock ?> số lượng trong kho</a></li>
                        </ul>
                        <p><?php echo $content ?>.</p>
                        <div class="product__details__option__size pb-2">
                            <span>Kích thước:</span>
                            <?php
                            $stmt = $product->Get_variantProductID_size($_GET['id']);
                            $attributes = []; // Khởi tạo mảng attributes
                            $isFirst = true; // Biến để xác định xem có phải là mục đầu tiên không
                            foreach ($stmt as $row) {
                                extract($row);
                                $class = $isFirst ? 'active' : ''; // Chỉ đánh dấu "active" cho mục đầu tiên
                                $isFirst = false; // Đặt lại giá trị cho lần lặp tiếp theo
                                $attributes[] = $Attribute_value; // Thêm giá trị vào mảng attributes
                            ?>
                                <label for="<?php echo $Attribute_value ?>" class="<?php echo $class; ?>">
                                    <?php echo $Attribute_value ?>
                                    <input type="radio" id="<?php echo $Attribute_value ?>" name="size" value="<?php echo $Attribute_value ?>">
                                </label>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="pb-2 pt-2">
                            <span class="product-colors">Màu sắc:
                                <?php
                                $rows = $product->Get_variantProductID_color($_GET['id']);
                                $attributes = []; // Khởi tạo mảng attributes
                                $isFirst = true; // Biến để xác định xem có phải là mục đầu tiên không
                                foreach ($rows as $row) {
                                    extract($row);
                                    $class = $isFirst ? 'active' : ''; // Chỉ đánh dấu "active" cho mục đầu tiên
                                    $isFirst = false; // Đặt lại giá trị cho lần lặp tiếp theo
                                    $attributes[] = $Attribute_value; // Thêm giá trị vào mảng attributes                          
                                ?>
                                    <span class="color-option <?php echo $Attribute_value ?> <?php echo $class ?>" data-color-primary="#000" data-color="<?php echo $Attribute_value ?>" data-pic="https://github.com/anuzbvbmaniac/Responsive-Product-Card---CSS-ONLY/blob/master/assets/img/jordan_proto.png?raw=true"></span>
                                <?php } ?>
                            </span>

                        </div>
                        <br>

                        <div class="card_area d-flex align-items-center">
                            <script>
                                var selectedSize = null;
                                var selectedColor = null;

                                $('.product__details__option__size input').change(function() {
                                    selectedSize = $('input[name=size]:checked').val();
                                    console.log(selectedSize);

                                    updateCartLink();
                                });

                                $('.color-option').click(function() {
                                    $('.color-option').removeClass('active');
                                    $(this).addClass('active');
                                    selectedColor = $(this).data('color');
                                    console.log(selectedColor);
                                    updateCartLink();
                                });

                                function updateCartLink() {
                                    // Cập nhật liên kết khi có sự thay đổi về kích thước hoặc màu sắc

                                    var cartLink = "./index.php?pages=site&action=home&layout=cart&id=<?php echo $id ?>&img=<?php echo $img ?>&price=<?php echo $price ?>&name=<?php echo $name ?>&size=" + encodeURIComponent(selectedSize ? selectedSize : '<?php echo $stmt['0']['Attribute_value'] ?>') + "&color=" + encodeURIComponent(selectedColor ? selectedColor : '<?php echo $rows['0']['Attribute_value'] ?>');

                                    $('.primary-btn').attr('href', cartLink);
                                }
                            </script>
                            <a class="primary-btn" href="./index.php?pages=site&action=home&layout=cart&id=<?php echo $id ?>&img=<?php echo $img ?>&price=<?php echo $price ?>&name=<?php echo $name ?>&size=<?php echo $stmt['0']['Attribute_value'] ?>&color=<?php echo $rows['0']['Attribute_value'] ?>">Thêm vào giỏ</a>
                            <a class="icon_btn" href="#"><i class="lnr lnr lnr-heart"></i></a>

                        </div>

                    </div>
                <?php }


                ?>
                </div>
        </div>
    </div>
</div>
<!--================End Single Product Area =================-->

<!--================Product Description Area =================-->
<section class="product_description_area">
    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Mô tả</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Bảng size</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Bình luận</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Đánh giá</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                <p>Beryl Cook is one of Britain’s most talented and amusing artists .Beryl’s pictures feature women of
                    all shapes
                    and sizes enjoying themselves .Born between the two world wars, Beryl Cook eventually left Kendrick
                    School in
                    Reading at the age of 15, where she went to secretarial school and then into an insurance office.
                    After moving to
                    London and then Hampton, she eventually married her next door neighbour from Reading, John Cook. He
                    was an
                    officer in the Merchant Navy and after he left the sea in 1956, they bought a pub for a year before
                    John took a
                    job in Southern Rhodesia with a motor company. Beryl bought their young son a box of watercolours,
                    and when
                    showing him how to use it, she decided that she herself quite enjoyed painting. John subsequently
                    bought her a
                    child’s painting set for her birthday and it was with this that she produced her first significant
                    work, a
                    half-length portrait of a dark-skinned lady with a vacant expression and large drooping breasts. It
                    was aptly
                    named ‘Hangover’ by Beryl’s husband and</p>
                <p>It is often frustrating to attempt to plan meals that are designed for one. Despite this fact, we are
                    seeing
                    more and more recipe books and Internet websites that are dedicated to the act of cooking for one.
                    Divorce and
                    the death of spouses or grown children leaving for college are all reasons that someone accustomed
                    to cooking for
                    more than one would suddenly need to learn how to adjust all the cooking practices utilized before
                    into a
                    streamlined plan of cooking that is more efficient for one person creating less</p>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td></td>
                                <td>S</td>
                                <td>M</td>
                                <td>L</td>
                                <td>XL</td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Chiều rộng(cm)</h5>
                                </td>
                                <td>
                                    <h5>58</h5>
                                </td>
                                <td>
                                    <h5>61</h5>
                                </td>
                                <td>
                                    <h5>64.5</h5>
                                </td>
                                <td>
                                    <h5>67.5</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Chiều dài(cm)</h5>
                                </td>
                                <td>
                                    <h5>68</h5>
                                </td>
                                <td>
                                    <h5>69</h5>
                                </td>
                                <td>
                                    <h5>70</h5>
                                </td>
                                <td>
                                    <h5>72</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Dài tay(cm)</h5>
                                </td>
                                <td>
                                    <h5>69</h5>
                                </td>
                                <td>
                                    <h5>70</h5>
                                </td>
                                <td>
                                    <h5>72</h5>
                                </td>
                                <td>
                                    <h5>72</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Chiều cao<br>Cân nặng</h5>
                                </td>
                                <td>
                                    <h5>Cao dưới 1m55<br>Nặng dưới 50kg</h5>
                                </td>
                                <td>
                                    <h5>Cao dưới 1m65<br>Nặng dưới 55kg</h5>
                                </td>
                                <td>
                                    <h5>Cao dưới 1m70<br>Nặng dưới 60kg</h5>
                                </td>
                                <td>
                                    <h5>Cao dưới 1m70<br>Nặng dưới 65kg</h5>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="comment_list">
                            <?php
                            $comment = new comment();
                            $selectcmt = $comment->selectcmtdetail($_GET['id']);
                            foreach ($selectcmt as $list) :
                                extract($list);
                                $formattedDate = date('d/m/Y', strtotime($list['created_at']));
                            ?>
                                <div class="review_item">
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="./Public/img/logo/avatar.jpg" class="rounded-circle m-2" width="50" height="50" alt="">
                                        </div>
                                        <?php if (isset($_SESSION['username']) && $_SESSION['username'] == $list['username']) { ?>
                                            <div class="d-flex user_btn">
                                                <a href="./index.php?pages=site&action=home&layout=productdetail&id=<?php echo $_GET['id']; ?>&idcmt=<?php echo $list['idcmt'] ?>" class="button_style update_btn m-2" data-bs-toggle="modal" data-bs-target="#exampleModal1">Sửa</a>
                                                <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel1">Sửa bình luận</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">

                                                            </div>
                                                            <form action="./index.php?pages=site&action=home&layout=productdetail&id=<?php echo $_GET['id']; ?>&idcmt=<?php echo $list['idcmt'] ?>" method="post">
                                                                <textarea class="form-control" name="message" id="message" rows="3" placeholder="Nhập bình luận"><?php
                                                                                                                                                                    $commentuser = new comment();
                                                                                                                                                                    if (isset($list['idcmt'])) {
                                                                                                                                                                        $selectcmt = $commentuser->selectall($list['idcmt']);
                                                                                                                                                                        echo $selectcmt['content'];
                                                                                                                                                                    }
                                                                                                                                                                    ?></textarea>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Quay lại</button>
                                                                    <button type="submit" class="btn btn-success" name="updatecomment">Cập nhật</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="" class="button_style delete_btn m-2" data-bs-toggle="modal" data-bs-target="#exampleModal">Xóa</a>
                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa bình luận</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Bạn chắc chắn xóa?
                                                            </div>
                                                            <form action="./index.php?pages=site&action=home&layout=productdetail&id=<?php echo $_GET['id']; ?>&idcmt=<?php echo $list['idcmt'] ?>" method="post">
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Quay lại</button>
                                                                    <button type="submit" class="btn btn-danger" name="deletecomment">Xóa</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <div class="media-body">
                                            <h4><?= $list['username'] ?></h4>
                                            <h5><?= $formattedDate ?></h5>
                                            <?php if (isset($_SESSION['username'])) {
                                                if ($role['role_id'] == 1) { ?>
                                                    <a class="reply_btn" href="#">Trả lời</a>
                                            <?php }
                                            } ?>
                                        </div>
                                    </div>
                                    <p class="" style="word-wrap: break-word; width: 250px; "><?= $list['content'] ?></p>
                                </div>
                            <?php endforeach; ?>

                        </div>
                    </div>
                    <?php if (isset($_SESSION['username'])) {
                        if ($role['role_id'] == 2) {
                    ?>
                            <div class="col-lg-6">
                                <div class="review_box">
                                    <h4>Nhập bình luận</h4>
                                    <form class="row contact_form" action="" method="post" id="contactForm" novalidate="novalidate">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <textarea class="form-control" name="message" id="message" rows="1" placeholder="Nhập bình luận"></textarea>
                                            </div>
                                        </div>
                                        <p class="text-danger text-center"><?php echo $error ?? ""; ?></p>
                                        <div class="col-md-12 text-right">
                                            <button type="submit" value="submit" name="sendcomment" class="btn primary-btn">Gửi</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                    <?php }
                    } ?>
                </div>
            </div>
            <div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="row total_rate">

                            <div class="col-6">
                                <div class="box_total">
                                    <h5>Đánh giá</h5>
                                    <h4 class="star_numbber">5.0</h4>
                                    <h6 class="Count_reviewstar">


                                    </h6>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="rating_list" id="ratingList">
                                    <h3><?php $dashboard = new Dashboard();
                                        $rows =  $dashboard->Count_Reviewstar($_GET['id']);
                                        echo $rows["total"] ?? "5";
                                        ?> đánh giá</h3>
                                    <ul class="nav lists" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="review-tab" data-toggle="tab" style="color: black;" href="#review" role="tab" aria-controls="review" aria-selected="false">5 Sao <i class="fa fa-star color__star_review"></i><i class="fa fa-star color__star_review"></i><i class="fa fa-star color__star_review"></i><i class="fa fa-star color__star_review"></i><i class="fa fa-star color__star_review"></i> </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active" id="review-tab-4star" style="color: black;" data-toggle="tab" href="#review" role="tab" aria-controls="review-4star" aria-selected="false">4 Sao <i class="fa fa-star color__star_review"></i><i class="fa fa-star color__star_review"></i><i class="fa fa-star color__star_review"></i><i class="fa fa-star color__star_review"></i> </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active" id="review-tab-4star" style="color: black;" data-toggle="tab" href="#review" role="tab" aria-controls="review-4star" aria-selected="false">3 Sao <i class="fa fa-star color__star_review"></i><i class="fa fa-star color__star_review"></i><i class="fa fa-star color__star_review"></i> </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="contact-tab" style="color: black;" data-toggle="tab" href="#review" role="tab" aria-controls="contact" aria-selected="false">2 Sao <i class="fa fa-star color__star_review"></i><i class="fa fa-star color__star_review"></i> </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="contact-tab" style="color: black;" data-toggle="tab" href="#review" role="tab" aria-controls="contact" aria-selected="false">1 Sao <i class="fa fa-star color__star_review"></i> </a>
                                        </li>
                                    </ul>
                                    <input type="hidden" id="product_idreview" value="<?php echo $_GET['id'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="review_list">
                            <!-- đánh giá  -->
                            <?php
                            $review = new Review();
                            $rows = $review->GetAllReview_star(5, $_GET['id']);
                            foreach ($rows as $row) :
                                extract($row);
                            ?>
                                <div class="review_item">
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="./Public/img/logo/avatar.jpg" style="width:70px;border-radius:50%" alt="">
                                        </div>
                                        <div class="media-body">
                                            <h4> <?php echo $username ?></h4>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <p> <?php echo $mess ?></p>

                                </div>
                            <?php endforeach;  ?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="review_box">
                            <?php if (!empty($_GET['hasreview'])) { ?>
                                <h4>Nhập đánh giá</h4>
                                <p>Đánh giá:</p>
                                <ul class="list">

                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                </ul>
                                <p class="mess_reveiw"></p>
                                <form class="row contact_form" action="contact_process.php" method="post" id="formreview" novalidate="novalidate">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea class="form-control messagereview" name="message" id="message" rows="1" placeholder="Đánh giá" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Đánh giá'"></textarea></textarea>
                                        </div>
                                        <input type="hidden" name="idproduct" id="" value="<?php echo $_GET['id'] ?>">
                                        <input type="hidden" name="iduser" id="" value="<?php echo $_SESSION['idLogin'] ?>">
                                        <input type="hidden" name="starnput" id="" value="5">

                                    </div>
                                    <div class="col-md-12 text-right">
                                        <button type="submit" name="send_review" class="primary-btn">Gửi</button>
                                    </div>
                                </form>
                            <?php } else {
                                echo ' <h4>Xem Đánh Giá</h4>
                                <h5>Bạn Muốn Được Đánh Giá Hãy Nhanh Tay Đặt Hàng Nhé.</h5>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 4 sao -->

    <!-- 4 sao -->
</section>
<!--================End Product Description Area =================-->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6 text-center">
            <div class="section-title">
                <h1>--Có thể bạn cũng thích--</h1>
                <p></p>
            </div>
        </div>
    </div>
</div>
<!-- Start related-product Area -->
<section class="lattest-product-area pb-40 category-list">
    <div class="container">
        <div class="row justify-content-center">
            <!-- single product -->
            <?php
            $product = new Products();
            $productlist = $product->getRandomProducts(4);
            foreach ($productlist as $ProductList) :
                extract($ProductList);
                $price = number_format($ProductList['price'], 0, '.', '.');

            ?>
                <div class="col-lg-3 col-md-6">
                    <div class="single-product">
                        <img class="img-fluid" src="./Public/img/imgshop/<?php echo $ProductList['img']; ?>" alt="">
                        <div class="product-details">
                            <h6><?php echo $ProductList['name']; ?></h6>
                            <div class="price">
                                <h6><?php echo $price; ?>đ</h6>
                            </div>
                            <div class="prd-bottom">
                                <a href="" class="social-info">
                                    <span class="lnr lnr-heart"></span>
                                    <p class="hover-text">Yêu Thích</p>
                                </a>
                                <a href="./index.php?pages=site&action=home&layout=productdetail&id=<?php echo $ProductList['id']; ?>" class="social-info">
                                    <span class="lnr lnr-move"></span>
                                    <p class="hover-text">Xem Thêm</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
</section>
<div class="pb-4"></div>
<br>
<script src="/Site/"></script>


<script>
    $(document).ready(function() {
        // handler submit
        $('#formreview').submit(function(e) {
            e.preventDefault();

            // Serialize form data
            var formData = $(this).serialize();

            var rating = $(this).text().replace(/\D/g, '');

            $.ajax({
                type: 'POST',
                url: '/index.php?pages=handlerreviewsend',
                data: formData,
                success: function(response) {
                    $('.messagereview').val('');
                    // alert(response);
                    var responseObject = JSON.parse(response);
                    renderReviewList(responseObject.reviews);
                },
                error: function(error) {
                    console.error('Lỗi khi gửi đánh giá: ', error);
                }
            });
        });
        var product_idreview = $('#product_idreview').val();
        // handler render star và list
        $('#ratingList ul.nav.lists a').click(function(e) {
            e.preventDefault();

            // Lấy số sao từ text của thẻ a
            var rating = $(this).text().replace(/\D/g, '');


            $.ajax({
                type: 'POST',
                url: '/index.php?pages=handlerreview',
                data: {
                    rating: rating,
                    product_idreview: product_idreview,
                },
                success: function(response) {

                    // Chuyển đổi chuỗi JSON thành đối tượng JavaScript
                    var responseObject = JSON.parse(response);

                    // Lấy giá trị của thuộc tính rating từ đối tượng
                    var ratingValue = responseObject.rating;
                    updateStarList(ratingValue);
                    // Render lại danh sách đánh giá
                    renderReviewList(responseObject.reviews);
                    $('input[name="starnput"]').val(ratingValue);
                    $('.star_numbber').html(ratingValue + ".0")
                    $('.Count_reviewstar').html(responseObject.count.total + "(đánh giá)")

                },
                error: function(error) {
                    console.error('Lỗi khi cập nhật danh sách sao: ', error);
                }
            });
        });

        function renderReviewList(reviews) {
            // Xóa đánh giá hiện tại trong danh sách
            $('.review_list .review_item').remove();

            // Thêm đánh giá mới vào danh sách
            for (var j = 0; j < reviews.length; j++) {
                var review = reviews[j];
                $('.review_list').append('<div class="review_item">' +
                    '<div class="media">' +
                    '<div class="d-flex">' +
                    '<img src="./Public/img/logo/avatar.jpg" style="width:70px;border-radius:50%" alt="">' +
                    '</div>' +
                    '<div class="media-body">' +
                    '<h4>' + review.username + '</h4>' +
                    '<i class="fa fa-star"></i>'.repeat(review.star) +
                    '</div>' +
                    '</div>' +
                    '<p>' + review.mess + '</p>' +
                    '</div>');
            }
        }
        // Hàm cập nhật danh sách số sao
        function updateStarList(rating) {
            // Xóa số sao hiện tại trong danh sách
            $('.list li').remove();
            $('.mess_reveiw .chilrenmess_reveiw').remove();

            // Thêm số sao mới vào danh sách
            for (var i = 0; i < rating; i++) {
                $('.list').append('<li><a href="#"><i class="fa fa-star"></i></a></li>');
            }
            if (rating == 5) {


                $('.mess_reveiw').append(
                    '<span class="chilrenmess_reveiw">xuất sắc</span>'
                )
            } else if (rating == 4) {

                $('.mess_reveiw').append('<span class="chilrenmess_reveiw">tốt</span>')
            } else if (rating == 3) {
                $('.mess_reveiw').append('<span class="chilrenmess_reveiw">bình thường</span>')
            } else if (rating == 2) {
                $('.mess_reveiw').append('<span class="chilrenmess_reveiw">kém</span>')
            } else if (rating == 1) {
                $('.mess_reveiw').append('<span class="chilrenmess_reveiw">rất kém</span>')
            }

        }

    });
</script>