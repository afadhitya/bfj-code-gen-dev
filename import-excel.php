<?php
include "connection.php";

require "excel_reader.php";

//jika tombol import ditekan
if(isset($_POST['submit'])){

    $target = basename($_FILES['databuku']['name']);
    move_uploaded_file($_FILES['databuku']['tmp_name'], $target);

// tambahkan baris berikut untuk mencegah error is not readable
    chmod($_FILES['databuku']['name'],0777);

    $data = new Spreadsheet_Excel_Reader($_FILES['databuku']['name'],false);

//    menghitung jumlah baris file xls
    $baris = $data->rowcount($sheet_index=0);

//    jika kosongkan data dicentang jalankan kode berikut
    $drop = isset( $_POST["drop"] ) ? $_POST["drop"] : 0 ;
    if($drop == 1){
//             kosongkan tabel pegawai
             $truncate ="TRUNCATE TABLE buku";
             mysqli_query($conn, $truncate);
    };

//    import data excel mulai baris ke-2 (karena tabel xls ada header pada baris 1)
    for ($i=2; $i<=$baris; $i++)
    {
//       membaca data (kolom ke-1 sd terakhir)
      $judul  = $data->val($i, 2);
      $kategori   = $data->val($i, 3);
      $penulis = $data->val($i, 4);
      $penerbit = $data->val($i, 5);
      $tahun = $data->val($i, 6);
      $jumlah = $data->val($i, 7);
      $namaDus = $data->val($i, 8);

//      setelah data dibaca, masukkan ke tabel pegawai sql
      $sql = "INSERT into buku (judul_buku,kategori,penulis,penerbit,tahun_terbit,jumlah, nama_dus)values
      ('$judul','$kategori','$penulis','$penerbit','$tahun', '$jumlah', '$namaDus')";
      if ($conn->query($sql) === TRUE) {
          echo "Berhasil import <br>";
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }  
    }

//    hapus file xls yang udah dibaca
    unlink($_FILES['databuku']['name']);
}

//
 ?>
