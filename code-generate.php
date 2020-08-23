<?php

include('connection.php');
include('KodeBuku.php');

$sql = "SELECT * FROM kode_buku";
$result = $conn->query($sql);
$kodeBukuArr = array();

while ($row = $result->fetch_assoc()) {
  $kodeBuku = new KodeBuku();
  $kodeBuku->kategori = $row['kategori'];
  $kodeBuku->nomorKodeBuku = $row['nomor_kode_buku'];
  $kodeBuku->inisialKodeBuku = $row['inisial_kode_buku'];

  array_push($kodeBukuArr, $kodeBuku);
}

$dusParam=$_GET['dusParam'];

$sql = "SELECT * FROM buku WHERE nama_dus = '$dusParam' ORDER BY judul_buku ASC";
$result = $conn->query($sql);

$count = 0;
$arr = [];
$i = 0;
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $countStok = 0;
    
    while ($countStok < $row["jumlah"]){
      $countKode = 0;
      foreach ($kodeBukuArr as $kodeBukuObj){
        if (strtolower(str_replace(' ', '', $row["kategori"])) == strtolower(str_replace(' ','', $kodeBukuObj->kategori))) {
          $arr[$i]['kategori'] = $kodeBukuObj->inisialKodeBuku;
          $arr[$i]['kode'] =  $kodeBukuObj->nomorKodeBuku;
          break;
        } else {
          $countKode++;
        }

        if (sizeof($kodeBukuArr) == $countKode) {
          echo "kategori ". $row['kategori'] ." tidak terdaftar <br>" ;
        } 
      }  

      $arr[$i]['judul_buku'] = strtoupper(substr($row["judul_buku"],0,1));
      $arr[$i]['penulis'] = strtoupper(substr($row["penulis"],0,3));

      $i++;
      $countStok++;
    }
  }
} else {
  echo "0 results";
}
$conn->close();
?>

<style>
table, th, td {
  border: 1px solid black;
}
</style>

<?php
$row = 0;
$totalBuku = (sizeof($arr));

while ($count < $totalBuku) {
  if ( $row % 8 == 0 && $row != 0) echo "<br><br><br><br><br><br><br>";
?>
  <table width="200" style="width:200mm;height:33mm; border-collapse: collapse;" >
    <tr>
    <?php 
    for ($i = 0; $i < 5; $i++) {
    ?>
      <td align="center" width="148px">
      <?php
      if ($count < $totalBuku) {
        echo "<b>TIM PKM<br>POLBAN</b>" . "<br>";
        echo $arr[$count]['kategori'] . "<br>";
        echo $arr[$count]['kode'] . "<br>";
        echo $arr[$count]['penulis'] . "<br>";
        echo $arr[$count]['judul_buku'] . "<br>";
      }
      
      $count++;
      ?>
      </td>
    <?php 
    }
    ?>
    </tr>
  </table>
  
<?php 
$row++;
} 
?>
