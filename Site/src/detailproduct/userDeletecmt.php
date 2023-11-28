<?php
    $id = $_GET['id'];
    $idpro=$_GET['idpro'];
    $comment = new comment();
    $Delete = $comment->delete($id);
    header('Location: ./index.php?pages=site&action=home&layout=productdetail&id='.$idpro.'');
    exit();

?>
