<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kantin_rehan";

// Buat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Periksa apakah terdapat permintaan POST untuk pengeditan data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data yang dikirimkan melalui POST
    $id = $_POST['id'];
    $full_name = $_POST['full_name'];
    $phone_number = $_POST['phone_number'];
    $full_addres = $_POST['full_addres'];
    $date = $_POST['date'];

    // Query untuk mengupdate data berdasarkan ID
    $sql = "UPDATE tb_datatamu SET full_name='$full_name', phone_number='$phone_number', full_addres='$full_addres', date='$date' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Data updated successfully";
    } else {
        echo "Error updating data: " . $conn->error;
    }
} else {
    echo "No data updated";
}

// Tutup koneksi
$conn->close();
?>
