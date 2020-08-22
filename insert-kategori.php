<?php
header("Location: kategori-buku.php"); /* Redirect browser */
include('connection.php');

$kategori = $_POST['kategori'];
$inisialKodeBuku = $_POST['inisial_kode_buku'];
$nomorKodeBuku = $_POST['nomor_kode_buku'];

$sql = "INSERT INTO kode_buku (kategori, inisial_kode_buku, nomor_kode_buku)
VALUES ('$kategori', '$inisialKodeBuku', '$nomorKodeBuku')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
exit();
?>
