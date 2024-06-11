<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json; charset=utf-8");

$db = mysqli_connect("localhost", "root", "", "kantin_rehan");

$NIS = $_POST["NIS"];
$password = $_POST["password"];

$sql = "SELECT * FROM login WHERE NIS = ? AND password = ?";
$stmt = mysqli_prepare($db, $sql);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "ss", $NIS, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $count = mysqli_num_rows($result);

    if ($count == 1) {
        echo json_encode(["status" => "Success"]);
    } else {
        echo json_encode(["status" => "Error", "message" => "Invalid NIS or password"]);
    }

    mysqli_stmt_close($stmt);
} else {
    echo json_encode(["status" => "Error", "message" => "Database query failed"]);
}

mysqli_close($db);
?>
