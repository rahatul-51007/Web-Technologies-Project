<?php
session_start();
require_once '../model/roomUpdateQuery.php';
$method = $_SERVER['REQUEST_METHOD'];
if ($method === "POST") {
    $roomName=$_POST['roomName'];
    $roomQuantity=$_POST['roomQuantity'];
    $roomPrice = $_POST['roomPrice'];
    $_SESSION['roomErrMsg'] = "";
    $_SESSION['quantityErrMsg'] = "";
    $_SESSION['priceErrMsg'] = "";
    $_SESSION['roomName'] = "";
    $_SESSION['roomQuantity']="";
    $_SESSION['roomPrice'] = "";
    $isValid = true;

    if (empty($roomName)) {
        $_SESSION['roomErrMsg'] = "Click edit for update";
        $_SESSION['success'] = "";
        $isValid = false;
    } else {
        $_SESSION['roomName'] = $roomName;
    }

    if (empty($roomQuantity)) {
        $_SESSION['quantityErrMsg'] = "Click edit for update";
        $_SESSION['success'] = "";
        $isValid = false;
    } else {
        $_SESSION['roomQuantity'] = $roomQuantity;
    }
    if (empty($roomPrice)) {
        $_SESSION['priceErrMsg'] = "Price is empty";
        $_SESSION['success'] = "";
        $isValid = false;
    } else {
        $_SESSION['roomPrice'] = $roomPrice;
    }
    
    if ($isValid) {

        $updatePrice = [
            "room_type"=>$roomName,
            "price" => $roomPrice

        ];
        priceController($updatePrice);
    } 
    else {
        header("Location:../views/roomupdate.php");//
        exit();
    }
} else {
    echo "Something went wrong. Please contact the administrator";
}
function priceController($updatePrice)
{
    $status = updatePrice($updatePrice);
    $_SESSION['roomErrMsg'] = "";
    $_SESSION['quantityErrMsg'] = "";
    $_SESSION['priceErrMsg'] = "";
    $_SESSION['success'] = "";
    if ($status===true) {
        $_SESSION['successUpdate'] = "Price updated successfully";
        $_SESSION['roomName'] = "";
        $_SESSION['roomQuantity']="";
        $_SESSION['roomPrice'] = "";
    }
    else{
        $_SESSION['invalidMsgUpdate'] ="Update failed";

    }

    header("Location:../views/roomupdate.php");
}

?>