<?php

header("Location: data-buku.php"); /* Redirect browser */
include('connection.php');

$dus = $_GET['dusParam'];

$sql = "DELETE FROM buku WHERE nama_dus = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $dus);

if ($stmt->execute() === TRUE) {
    echo "Delete successed";
} else {
    echo "Error: " . $stmt->error;
}
$stmt->close();

$conn->close();
exit();
?>