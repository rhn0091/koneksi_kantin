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

// Periksa apakah terdapat permintaan GET untuk penghapusan data
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    // Ambil ID yang dikirimkan melalui GET
    $id = $_GET['id'];

    // Query untuk menghapus data berdasarkan ID
    $sql = "DELETE FROM barang WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Data deleted successfully";
    } else {
        echo "Error deleting data: " . $conn->error;
    }
} else {
    echo "No data deleted";
}

// Tutup koneksi
$conn->close();
?>
