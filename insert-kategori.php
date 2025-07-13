<?php
header("Location: kategori-buku.php"); /* Redirect browser */
include('connection.php');

$kategori = $_POST['kategori'];
$inisialKodeBuku = $_POST['inisial_kode_buku'];
$nomorKodeBuku = $_POST['nomor_kode_buku'];

$sql = "INSERT INTO kode_buku (kategori, inisial_kode_buku, nomor_kode_buku)
VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $kategori, $inisialKodeBuku, $nomorKodeBuku);

if ($stmt->execute() === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}
$stmt->close();

$conn->close();
exit();
?>
