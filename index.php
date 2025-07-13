<?php
include "connection.php";

$idPage = 1;

$sql = "SELECT distinct nama_dus FROM buku";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();

$arr = [];
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $arr[]['dus'] = $row["nama_dus"];
    }
} else {
    echo "0 results";
}
$stmt->close();
$conn->close();

require 'index.view.php';
?>
