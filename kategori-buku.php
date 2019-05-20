<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body></body>

  <?php
    include('connection.php');

    $sql = "SELECT * FROM kode_buku ORDER BY nomor_kode_buku ASC";
    $result = $conn->query($sql);
    $total = 0;

    if ($result->num_rows > 0) {
  ?>

  <!-- -------NAVBAR-------- -->
  <?php include 'navbar.php';?>
  <!-- -------------------- -->

<div class="container">
  <div class="col-sm-8">
  <table class="table table-bordered table-striped" border="1">
    <thead>
      <tr>
        <th>Kategori</th>
        <th>Inisial</th>
        <th>Kode</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php while($row = $result->fetch_assoc()) { ?>
        <tr>
          <td> <?php echo $row["kategori"]; ?></td>
          <td> <?php echo $row["inisial_kode_buku"];?></td>
          <td> <?php echo $row["nomor_kode_buku"];?></td>
          <td> <a href="/data-keuangan/delete-hutang.php?idHutang=<?php echo $row["id"]?>">Delete</a>
                <a href="/data-keuangan/edit-hutang.php?idHutang=<?php echo $row["id"]?>">Edit</a></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>

  <?php
  } else {
        echo "0 results";
    }
    $conn->close();
  ?>

  <div class="col-sm-4">
  <form action="insert-kategori.php" method="post">
    <div class="form-group">
    <label for="kategori">Kategori: </label>
    <input type="text" class="form-control" id="kategori" name="kategori">
  </div>
  <div class="form-group">
  <label for="inisial_kode_buku">Inisial Kategori: </label>
  <input type="text" class="form-control" id="inisial_kode_buku" name="inisial_kode_buku" >
  </div>

  <div class="form-group">
  <label for="nomor_kode_buku">Nomor Kode Kategori: </label>
  <input type="text" class="form-control" id="nomor_kode_buku" name="nomor_kode_buku" >
  </div>
  <input type="submit" value="Submit" class="btn btn-default">
  </form>

  <h4>Click submit untuk add kategori baru ke database</h4>
</div>
</div>

</body>
</html>
