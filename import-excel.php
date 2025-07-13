<?php
// header("Location: data-buku.php?dusParam=$namaDus");

include "connection.php";
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

//jika tombol import ditekan
if(isset($_POST['submit'])){

  $target = basename($_FILES['databuku']['name']);
  move_uploaded_file($_FILES['databuku']['tmp_name'], $target);

  // tambahkan baris berikut untuk mencegah error is not readable
  chmod($_FILES['databuku']['name'],0777);

  $spreadsheet = IOFactory::load($_FILES['databuku']['name']);
  $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

  // jika kosongkan data dicentang jalankan kode berikut
  $drop = isset( $_POST["drop"] ) ? $_POST["drop"] : 0 ;
  if($drop == 1) {
    // kosongkan tabel pegawai
    $truncate ="TRUNCATE TABLE buku";
    mysqli_query($conn, $truncate);
  }

  // import data excel mulai baris ke-2 (karena tabel xls ada header pada baris 1)
  $stmt = $conn->prepare("INSERT into buku (judul_buku, kategori, penulis, penerbit,tahun_terbit,jumlah, nama_dus) values (?, ?, ?, ?, ?, ?, ?)");
  $errorFlag = 0;
  $errorMessage = "";

  for ($i=2; $i<=count($sheetData); $i++) {
    // membaca data (kolom ke-1 sd terakhir)
    $judul  = $sheetData[$i]['B'];
    $kategori   = $sheetData[$i]['C'];
    $penulis = $sheetData[$i]['D'];
    $penerbit = $sheetData[$i]['E'];
    $tahun = $sheetData[$i]['F'];
    $jumlah = $sheetData[$i]['G'];
    $namaDus = $sheetData[$i]['H'];

    // setelah data dibaca, masukkan ke tabel pegawai sql
    $stmt->bind_param("ssssiss", $judul, $kategori, $penulis, $penerbit, $tahun, $jumlah, $namaDus);

    if ($stmt->execute() === TRUE) {
      echo "Berhasil import <br>";
    } else {
      $errorMessage = "Error: " . $stmt->error;
      echo $errorMessage;
      $errorFlag = 1;
    }
  }
  $stmt->close();

  $status = $errorFlag == 1 ? "Gagal" : "Sukses";
  $dateTime = date("Y-m-d H:i:s");
  $remarks = $errorFlag == 1 ? $errorMessage : "";

  $stmt = $conn->prepare("INSERT INTO import_history (tanggal, status, remarks, nama_dus) values (?, ?, ?, ?)");
  $stmt->bind_param("ssss", $dateTime, $status, $remarks, $namaDus);


  if ($stmt->execute() === TRUE) {
    echo "Berhasil save history";
  } else {
    $errorMessage = "Error: " . $stmt->error;
    echo $errorMessage;
  }
  $stmt->close();

  // hapus file xls yang udah dibaca
  unlink($_FILES['databuku']['name']);
  header("Location: data-buku.php?dusParam=$namaDus");
}

?>
