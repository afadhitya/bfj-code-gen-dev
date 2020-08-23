<!DOCTYPE html>
<html>
<?php
include "connection.php";

$idPage = 1;

$sql = "SELECT distinct nama_dus FROM buku";
$result = $conn->query($sql);

$i =0;
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $arr[$i]['dus'] = $row["nama_dus"];
        $i++;
    }
} else {
    echo "0 results";
}
$conn->close();
?>

<head>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <?php include 'head-common.php';?>
</head>    


<body>
  <div>
    <!-- -------NAVBAR-------- -->
    <?php include 'navbar.php';?>
    <!-- -------------------- -->
  </div>
  <div class="container container-body" style="margin-top: 7rem; margin-bottom: 7rem;" >
    <div class="row">
      <div class="col-6">
        <div class="card bg-light mb-3 text-center" style="width: 30rem; height: 20rem; padding-top: 0.1rem;">
          <div class="card-body">
            <h5 class="card-title">Import Data Buku</h5>
            <p class="card-text">
              <span class="badge badge-info">Info</span>
              Gunakan card ini untuk melakukan import excel data buku ke server sebelum melakukan generate kode buku
              <br><br>
              <span class="badge badge-warning">Warning</span>
              File yang dapat diimport hanya excel bertipe xls (bukan xlxs) 
            </p>
            <div>
              <form name="myForm" id="myForm" onSubmit="return validateForm()" action="import-excel.php" method="post" enctype="multipart/form-data"> 
                <div class="custom-file">
                  <!-- <input type="file" class="custom-file-input" id="customFile">
                  <label class="custom-file-label" for="customFile">Choose file</label>
                  <label for="databuku">Upload Excel Data Buku</label> -->
                  <input type="file" class="custom-file-input" id="databuku" name="databuku" />
                  <label class="custom-file-label" for="databuku">Choose file</label>
                  <input style="margin-top:25px;" class="btn btn-primary" type="submit" name="submit" value="Import" /><br/>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <div class="col-6">
        <div class="card bg-light mb-3 text-center" style="width: 30rem; height: 20rem; padding-top: 0.1rem;">
          <div class="card-body">
            <h5 class="card-title">Generate Kode Buku</h5>
            <p class="card-text">
              <span class="badge badge-info">Info</span>
              Gunakan card ini untuk melakukan generate kode buku berdasarkan nama dus tertentu
              <br><br>
              <span class="badge badge-warning">Warning</span>
              Apablia data belum ada, import terlebih dahulu datanya, dan cek apakah sudah berhasil atau belum!
            </p>
            <form action="code-generate.php" method="get" target="_blank">
              <select class="custom-select" name="dusParam">
              <?php foreach ($arr as $obj){
                  echo '<option value="'. $obj['dus']. '">'.$obj['dus'].'</option>';
              }
              ?>  
              </select>
              <br><br>
              <input class="btn btn-primary" type="submit" value="Generate">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include 'footer.php';?>

</body>

<script type="text/javascript">
//    validasi form (hanya file .xls yang diijinkan)
    function validateForm()
    {
        function hasExtension(inputID, exts) {
            var fileName = document.getElementById(inputID).value;
            return (new RegExp('(' + exts.join('|').replace(/\./g, '\\.') + ')$')).test(fileName);
        }

        if(!hasExtension('filepegawaiall', ['.xls'])){
            alert("Hanya file XLS (Excel 2003) yang diijinkan.");
            return false;
        }
    }
</script>
</html>
