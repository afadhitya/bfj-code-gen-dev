<!DOCTYPE html>
<html>
<?php
include "connection.php";

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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
<body>
    <div>
        <!-- -------NAVBAR-------- -->
        <?php include 'navbar.php';?>
        <!-- -------------------- -->
    </div>
    <div class="container container-body" style="margin-top: 180px;" >
        <div>
            <form name="myForm" id="myForm" onSubmit="return validateForm()" action="import-excel.php" method="post" enctype="multipart/form-data">
                <input type="file" id="databuku" name="databuku" />
                <input type="submit" name="submit" value="Import" /><br/>
                <label><input type="checkbox" name="drop" value="1" /> <u>Kosongkan tabel sql terlebih dahulu.</u> </label>
            </form>
        </div>

        <br>
        <br>
        <br>

        Generate Kode Buku

        <br><br>

        <form action="code-generate.php" method="get" target="_blank">
            <select name="dusParam">
            <?php foreach ($arr as $obj){
                echo '<option value="'. $obj['dus']. '">'.$obj['dus'].'</option>';
            }
            ?>  
            </select>
            <br><br>
            <input type="submit">
        </form>
    </div>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <?php include 'footer.php';?>
    <!-- <footer >
        <div class="container isi-footer">
            <h5 class="text-center font-bold text-footer-custom">Made with 💖 by Achmad Fadhitya for TIM PKM POLBAN &copy; <?php echo date("Y")?>  </h>
        </div>
    </footer> -->

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
  <!-- <footer class="fixed-bottom footer-custom">
        <span class="text-muted">Place sticky footer content here.</span>
    </footer>  -->
</html>
