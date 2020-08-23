<?php
$idPage = 4;

include "connection.php";

$sql = "SELECT * FROM import_history ORDER BY tanggal DESC";
$result = $conn->query($sql);

$tableRow = "";

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $tableRowNew = "
    <tr>
      <td>" . $row["tanggal"] . "</td>
      <td>" .$row["status"] . "</td>
      <td>" . $row["nama_dus"] . "</td>
      <td>" . $row["remarks"]."</td>
    </tr>";
    $tableRow = $tableRow . $tableRowNew;
  }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <div>
        <!-- -------NAVBAR-------- -->
        <?php include 'navbar.php';?>
        <!-- -------------------- -->
    </div>


    <div class="container" style="margin-top:1rem;">

      <table class="table table-bordered table-striped" border="1">
        <thead>
          <tr>
            <th scope="col">Tanggal</th>
            <th scope="col">Status</th>
            <th scope="col">Nama Dus</th>
            <th scope="col">Remarks</th>
          </tr>
        </thead>
        <tbody>
          <?php echo $tableRow ?>
        </tbody>
      </table>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>