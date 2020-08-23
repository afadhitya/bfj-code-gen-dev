<?php

header("Location: data-buku.php"); /* Redirect browser */
include('connection.php');

$dus = $_GET['dusParam'];

$sql = "DELETE FROM buku WHERE nama_dus = '$dus' ";

if ($conn->query($sql) === TRUE) {
    echo "Delete successed";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
exit();
?>