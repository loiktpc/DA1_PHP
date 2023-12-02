<?php





$review = new Review();

// Lấy số sao 
$rating = isset($_POST['rating']) ? $_POST['rating'] : 0;
$product_idreview = isset($_POST['product_idreview']) ? $_POST['product_idreview'] : 0;

$rows = $review->GetAllReview_star($rating,$product_idreview);

$count_star =  $review->Count_reviewstar($rating ,$product_idreview );
                                 


echo json_encode(['rating' => $rating, 'reviews' => $rows , 'count' => $count_star]);


?>
