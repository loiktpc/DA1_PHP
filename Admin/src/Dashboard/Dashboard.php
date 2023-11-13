<?php
$dashboard = new Dashboard();
$user = new User();

$product = $dashboard->Count_Products();
$order = $dashboard->Count_Order();
$users = $user->Count_Users();
$product_love = $dashboard->Count_Products_love();
$comment = $dashboard->Count_comment();
$review = $dashboard->Count_Review();
$dataPoints = array(
    array("label" => "Số Lượng Mua Hàng", "y" => $order["total"] ?? "11"),
    array("label" => "Sản Phẩm Yêu Thích", "y" => $product_love["total"] ?? "123"),
    array("label" => "Sản Phẩm", "y" => $product['total'] ?? "123"),
    array("label" => "Khách Hàng", "y" => $users['total_accounts'] ?? "44"),
    array("label" => "Sản Phẩm Được Đánh Giá", "y" => $review["total"] ?? "44"),
    array("label" => "Sản Phẩm Được Bình Luận", "y" => $comment["total"] ?? "44"),

);

?>
<script>
    window.onload = function () {

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
                            <h2 class="text-white">
                                <?php

                                $rows = $dashboard->Count_Products();
                                echo ($rows['total']);
                                ?>
                            </h2>
                            <p class="text-white mb-0">
                                <?php
                                $rows = $dashboard->date_Productsnew();

                                echo ($rows['create_at'] = date("d/m/Y"))
                                    ?>
                            </p>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-2">
                    <div class="card-body">
                        <h3 class="card-title text-white">Đơn Hàng </h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">
                                <?php
                                $rows = $dashboard->Count_Order();
                                echo ($rows['total']);
                                ?>
                            </h2>
                            <p class="text-white mb-0">
                                <?php
                                $rows = $dashboard->date_ordernew();

                                echo ($rows['create_at'] = date("d/m/Y"))
                                    ?>
                            </p>
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
                            <h2 class="text-white">
                                <?php
                                $rows = $user->Count_Users();
                                echo ($rows['total_accounts']);
                                ?>
                            </h2>
                            <p class="text-white mb-0">
                                <?php
                                $rows = $dashboard->date_Usernew();

                                echo ($rows['create_at'] = date("d/m/Y"))
                                    ?>
                            </p>
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
                            <h2 class="text-white">
                                <?php

                                $rows = $dashboard->Count_Products_love();
                                echo ($rows['total']);
                                ?>
                            </h2>
                            <p class="text-white mb-0">
                                <?php
                                $rows = $dashboard->date_Products_love();

                                echo ($rows['create_at'] = date("d/m/Y"))
                                    ?>
                            </p>
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