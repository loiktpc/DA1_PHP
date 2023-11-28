<?php
if (isset($_POST["updatecomment"])) {
    $id = $_GET['idcmt'];
    $idpro=$_GET['idpro'];
    $content = $_POST['message'];
    $commentuser = new comment();
    $update = $commentuser->update($id, $content);
    header('Location: ./index.php?pages=site&action=home&layout=productdetail&id='.$idpro.'');
    exit();
}
$commentuser = new comment();
if (isset($_GET["idcmt"])) {
    $selectcmt = $commentuser->selectall($_GET['idcmt']);
}
?>
<div class="product_image_area ">
    <div class="container">
        <div class="content-body " style="min-height: 400px;">
            <!-- row -->
            <br><br><br><br>
            <div class="col-lg-6">
                <div class="review_box">
                    <h4>Nhập bình luận</h4>
                    <form class="row contact_form" action="" method="post" id="contactForm" novalidate="novalidate">
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea class="form-control" name="message" id="message" rows="1" placeholder="Nhập bình luận"><?php echo $selectcmt['content']; ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 text-right">
                            <button type="submit" value="submit" name="updatecomment" class="btn primary-btn">Gửi</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- #/ container -->
        </div>
    </div>
</div>