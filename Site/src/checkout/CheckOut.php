<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Thanh Toán</h1>
                <nav class="d-flex align-items-center">

                    <a href="/index.php?pages=site&action=home&layout=home">Trang Chủ<span
                            class="lnr lnr-arrow-right"></span></a>
                    <a href="/index.php?pages=site&action=home&layout=checkout">Thanh Toán</a>

                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

<!--================Checkout Area =================-->
<section class="checkout_area section_gap">
    <div class="container">

        <div class="billing_details">
            <div class="row">
                <div class="col-lg-12">
                    <h3>Điền Thông Tin Đơn Hàng</h3>
                    <form class="row contact_form" action="#" method="post" novalidate="novalidate">

                        <div class="col-md-12 form-group p_star">

                            <input type="text" class="form-control" id="last" name="name" placeholder="Họ Tên">

                        </div>

                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" id="number" name="number"
                                placeholder="Só Điện Thoại">

                        </div>
                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" id="email" name="compemailany" placeholder="Email">

                        </div>
                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" id="email" name="compemailany"
                                placeholder="Thành phố">

                        </div>
                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" id="add1" name="add1" placeholder="Địa Chỉ">


                        </div>



                        <div class="col-md-12 form-group">

                            <textarea class="form-control" name="message" id="message" rows="1"
                                placeholder="Nội dung"></textarea>
                        </div>
                    </form>
                </div>
                <div class="col-lg-12">
                    <div class="order_box">
                        <h2>Hóa Đơn</h2>
                        <ul class="list">
                            <li><a href="#">Sản Phẩm <span>Tổng</span></a></li>
                            <li><a href="#">
                                    BlackberryBlackberry <strong>size:XL</strong><span class="middle">x
                                        02</span> <span class="last">$720.00</span></a></li>
                            <li><a href="#">Fresh Tomatoes <span class="middle"> x 02</span> <span
                                        class="last">$720.00</span></a></li>

                        </ul>
                        <ul class="list list_2">

                            <li><a href="#">Tổng Tiền <span>$2210.00</span></a></li>
                        </ul>
                        <div class="payment_item">
                            <div class="radion_btn">
                                <input type="radio" id="f-option5" name="selector">
                                <label for="f-option5">Thanh Toán Trực Tiếp</label>
                                <div class="check"></div>
                            </div>
                            <p>Thanh Toán Qua Địa Chỉ .</p>
                        </div>
                        <div class="payment_item active">
                            <div class="radion_btn">
                                <input type="radio" id="f-option6" name="selector">
                                <label for="f-option6">Thanh Toán Qua VNPAY </label>
                                <img src="img/product/card.jpg" alt="">
                                <div class="check"></div>
                            </div>
                            <p>Thanh toán qua VNPAY , bạn có thể thanh toán bằng thẻ tín dụng nếu bạn có tài khoản
                                VNPAY.
                                ​.</p>
                        </div>
                        <div class="creat_account">
                            <input type="checkbox" id="f-option4" name="selector">

                            <a href="#">Tôi Đồng ý Với Khoản Trên</a>
                        </div>
                        <button class="primary-btn" style="border: none;">
                            Thanh Toán
                        </button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Checkout Area =================-->