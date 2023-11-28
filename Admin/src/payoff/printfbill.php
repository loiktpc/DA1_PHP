<style>
    /* -------------------------------------
    GLOBAL
    A very basic CSS reset
------------------------------------- */
* {
    margin: 0;
    padding: 0;
    font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
    box-sizing: border-box;
    font-size: 14px;
}

img {
    max-width: 100%;
}

body {
    -webkit-font-smoothing: antialiased;
    -webkit-text-size-adjust: none;
    width: 100% !important;
    height: 100%;
    line-height: 1.6;
}

/* Let's make sure all tables have defaults */
table td {
    vertical-align: top;
}

/* -------------------------------------
    BODY & CONTAINER
------------------------------------- */
body {
    background-color: #f6f6f6;
}

.body-wrap {
    background-color: #f6f6f6;
    width: 100%;
}

.container {
    display: block !important;
    max-width: 600px !important;
    margin: 0 auto !important;
    /* makes it centered */
    clear: both !important;
}

.content {
    max-width: 600px;
    margin: 0 auto;
    display: block;
    padding: 20px;
}

/* -------------------------------------
    HEADER, FOOTER, MAIN
------------------------------------- */
.main {
    background: #fff;
    border: 1px solid #e9e9e9;
    border-radius: 3px;
}

.content-wrap {
    padding: 20px;
}

.content-block {
    /* padding: 0 0 10px; */
}

.header {
    width: 100%;
    margin-bottom: 20px;
}

.footer {
    width: 100%;
    clear: both;
    color: #999;
    padding: 20px;
}
.footer a {
    color: #999;
}
.footer p, .footer a, .footer unsubscribe, .footer td {
    font-size: 12px;
}

/* -------------------------------------
    TYPOGRAPHY
------------------------------------- */
h1, h2, h3 {
    font-family: "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
    color: #000;
    margin: 20px 0 0;
    line-height: 1.2;
    font-weight: 400;
}

h1 {
    font-size: 32px;
    font-weight: 500;
}

h2 {
    font-size: 24px;
}

h3 {
    font-size: 18px;
}

h4 {
    font-size: 14px;
    font-weight: 600;
}

p, ul, ol {
    margin-bottom: 10px;
    font-weight: normal;
}
p li, ul li, ol li {
    margin-left: 5px;
    list-style-position: inside;
}

/* -------------------------------------
    LINKS & BUTTONS
------------------------------------- */
a {
    color: #1ab394;
    text-decoration: underline;
}

.btn-primary {
    text-decoration: none;
    color: #FFF;
    background-color: #1ab394;
    border: solid #1ab394;
    border-width: 5px 10px;
    line-height: 2;
    font-weight: bold;
    text-align: center;
    cursor: pointer;
    display: inline-block;
    border-radius: 5px;
    text-transform: capitalize;
}

/* -------------------------------------
    OTHER STYLES THAT MIGHT BE USEFUL
------------------------------------- */
.last {
    margin-bottom: 0;
}

.first {
    margin-top: 0;
}

.aligncenter {
    text-align: center;
}

.alignright {
    text-align: right;
}

.alignleft {
    text-align: left;
}

.clear {
    clear: both;
}

/* -------------------------------------
    ALERTS
    Change the class depending on warning email, good email or bad email
------------------------------------- */
.alert {
    font-size: 16px;
    color: #fff;
    font-weight: 500;
    padding: 20px;
    text-align: center;
    border-radius: 3px 3px 0 0;
}
.alert a {
    color: #fff;
    text-decoration: none;
    font-weight: 500;
    font-size: 16px;
}
.alert.alert-warning {
    background: #f8ac59;
}
.alert.alert-bad {
    background: #ed5565;
}
.alert.alert-good {
    background: #1ab394;
}

/* -------------------------------------
    INVOICE
    Styles for the billing table
------------------------------------- */
.invoice {
    margin: 40px auto;
    text-align: left;
    width: 80%;
}
.invoice td {
    padding: 5px 0;
}
.invoice .invoice-items {
    width: 100%;
}
.invoice .invoice-items td {
    border-top: #eee 1px solid;
}
.invoice .invoice-items .total td {
    border-top: 2px solid #333;
    border-bottom: 2px solid #333;
    font-weight: 700;
}

/* -------------------------------------
    RESPONSIVE AND MOBILE FRIENDLY STYLES
------------------------------------- */
@media only screen and (max-width: 640px) {
    h1, h2, h3, h4 {
        font-weight: 600 !important;
        margin: 20px 0 5px !important;
    }

    h1 {
        font-size: 22px !important;
    }

    h2 {
        font-size: 18px !important;
    }

    h3 {
        font-size: 16px !important;
    }

    .container {
        width: 100% !important;
    }

    .content, .content-wrap {
        padding: 10px !important;
    }

    .invoice {
        width: 100% !important;
    }
}
</style>
<?php
    $moneyUser =  $_POST['moneyhasuser'] ?? "";

?>
<table class="body-wrap">
    <tbody><tr>
        <td></td>
        <td class="container" width="600">
            <div class="content">
                <table class="main" width="100%" cellpadding="0" cellspacing="0">
                    <tbody><tr>
                        <td class="content-wrap aligncenter">
                            <table width="100%" cellpadding="0" cellspacing="0">
                                <tbody>
                                    <tr>
                                    <td class="content-block">
                                        <h2 style="text-align: center;">Shop Cửa Hàng Quần Áo NLP</h2>
                                        
                                    </td>
                                </tr>
                              
                                <tr>
                                    <td class="content-block">
                                        <table class="invoice">
                                       
                                            <tbody>
                                                <tr style="text-align: center;">
                                                <h3 style="text-align: center;">cảm ơn quý khách</h3>
                                        <h4  style="text-align: center;
                                        margin-top: 15px;" >Giờ Mở Cửa: 9:00 - 21:00</h4>
                                                <td>
                                                    <p><strong>Địa chỉ</strong>: Số 288, Nguyễn Văn Linh, phường An Khánh, quận Ninh Kiều, Tp. Cần Thơ.</p>
                                    <p><strong>Điện thoại liên hệ</strong> :  090.1759.222</p>
                                    <p><strong>Email</strong>:  caodangfpt@fpt.edu.vn</p>
                                    </td>
                                            </tr>
                                            <tr>
                                    <td>
                                        <span>Tên Khách Hàng: <?php echo $_POST['UserName'] ?? "" ?></span>
                                       
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>SĐT: <?php echo $_POST['UserPhone'] ?? "" ?></span>
                                       
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>Tiền Khách Hàng: <?php 
                                       echo   number_format( $moneyUser, 0, ",", ".")?? "" ;
                                        ?>đ</span>
                                       
                                    </td>
                                </tr>
                                            <tr>
                                                <td>
                                                    <table class="invoice-items" cellpadding="0" cellspacing="0">
                                                    <thead>
                                            <th>sản phẩm</th>
                                            <th>Số lượng</th>
                                            <th>đơn giá</th>
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
                                                            <tr>
                                                            <td style="max-width: 100%;width: 76%;">  <?php echo $item['name']	 ?></td>
                                                            <td style="text-align: center;"><?php echo $item['qty'] ?></td>
                                                            <td class="alignright">   <?php echo  number_format( $item['price'], 0, ",", ".") ;
                                                   ?>đ</td>
                                                        </tr>
                                                <?php endforeach; ?>
                                                       
                                                <tr style="text-align: center;" >
                                                            <td></td>
                                                            <td  width="80%">Tiền Trả Khách Hàng: </td>
                                                            <td class="alignright">  <?php $pay_customers = abs($total_bill -  $moneyUser) ; 
                                                            echo isset($pay_customers) ? (number_format($pay_customers, 0, ",", ".")) : "" ?>đ</td>
                                                            
                                                        </tr>  
                                                        <tr class="total">
                                                            <td></td>
                                                            <td  width="80%">Tổng Tiền: </td>
                                                            <td class="alignright">  <?php echo isset($total_bill) ? (number_format($total_bill, 0, ",", ".")) : "" ?>đ</td>
                                                               
                                                        </tr>
                                                  
                                <?php  endif;  ?>
                                                    
                                                    </tbody></table>
                                                </td>
                                                <td></td>
                                                <tr>
                                    <td class="content-block" style="text-align: center;">
                                      <strong>* Khách vui lòng kiểm tra đơn hàng tại shop và <br>
                                        tiền trước khi rời khỏi shop *</strong>
                                    </td>
                                   
                                </tr>
                                            </tr>
                                        </tbody></table>
                                    </td>
                                </tr>
                               
                                <tr>
                                    <td class="content-block">
                                    <button onclick="window.print()">In Bill</button>
                                    <button onclick="clearSessionAndRedirect()">quay lại admin</button>

                                    </td>
                                </tr>
                             
                            </tbody></table>
                        </td>
                    </tr>
                </tbody></table>
              
        </td>
        <td></td>
    </tr>
</tbody></table>
<script>
function clearSessionAndRedirect() {
   
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '/index.php?pages=handleradmin', true);
    xhr.send();

  
    window.location.href = '/index.php?pages=admin&layout=home&modulde=Dashboard&action=list';
}
</script>