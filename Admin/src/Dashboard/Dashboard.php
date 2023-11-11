<?php

$dataPoints = array(
    array("label" => "Số Lượng Mua Hàng", "y" => $order["number"] ?? "11"),
    array("label" => "Bình Luận Khách Hàng", "y" => $comment["number"] ?? "123"),
    array("label" => "Sản Phẩm", "y" => $products["number"] ?? "123"),
    array("label" => "Khách Hàng", "y" => $khachhang["number"] ?? "44"),
    array("label" => "Sản Phẩm Được Đánh Giá", "y" => $khachhang["number"] ?? "44"),
    array("label" => "Sản Phẩm Được Bình Luận", "y" => $khachhang["number"] ?? "44"),


);

?>
<script>
window.onload = function() {

    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        exportEnabled: true,
        title: {
            text: "NLP KPI"
        },
        subtitles: [{
            text: ""
        }],
        data: [{
            type: "pie",
            showInLegend: "true",
            legendText: "{label}",
            indexLabelFontSize: 16,
            indexLabel: "{label} - #percent%",
            yValueFormatString: "#,##0",
            dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
        }]
    });
    chart.render();

}
</script>
<div class="content-body">

    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-1">
                    <div class="card-body">
                        <h3 class="card-title text-white">Sản Phẩm</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">4565</h2>
                            <p class="text-white mb-0">11/12/2023</p>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-2">
                    <div class="card-body">
                        <h3 class="card-title text-white">Đơn Hàng Được Mua</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">8541</h2>
                            <p class="text-white mb-0">11/12/2023</p>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-3">
                    <div class="card-body">
                        <h3 class="card-title text-white">Khách Hàng Mới</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">4565</h2>
                            <p class="text-white mb-0">11/12/2023</p>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-4">
                    <div class="card-body">
                        <h3 class="card-title text-white">Sản Phẩm Yêu Thích</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">99</h2>
                            <p class="text-white mb-0">11/12/2023</p>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-heart"></i></span>
                    </div>
                </div>
            </div>
        </div>


        <div id="chartContainer" style="height: 370px; width: 100%;"></div>

    </div>
    <!-- #/ container -->
</div>
<!--**********************************
            Content body end
        ***********************************-->
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>