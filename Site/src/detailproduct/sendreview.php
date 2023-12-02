<?php if (!empty($_POST["message"]) && !empty($_POST["idproduct"]) && !empty($_POST["iduser"])) {
$review = new Review();



$message = $_POST['message'];
$idproduct = $_POST['idproduct'];
$iduser = $_POST['iduser'];
$star = $_POST['starnput'];

$rows = $review->Insert_Review($star,$message,$idproduct,$iduser);
$reviews = $review->GetAllReview_star($star,$idproduct);


$response = [
   
    'reviews' => $reviews,
];
echo json_encode($response);
exit;
} else {
http_response_code(400);
echo 'Bad Request';
exit;
}