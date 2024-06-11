<?php
    header("Content-Type: application/json; charset=utf-8");

    include_once("koneksi.php");
    $full_name = $_POST["full_name"];
    $phone_number = $_POST["phone_number"];
    $full_addres = $_POST["full_addres"];
    $date = $_POST["date"];

    $sql = mysqli_query($db, 
    "insert into tb_datatamu
    (full_name, phone_number, full_addres, date) 
    values
    ('".$full_name."', '".$phone_number."', '".$full_addres."', '".$date."')");

    if($sql) {
        echo json_encode("berhasil");
    } else {
        echo json_encode("error");
    }
?>