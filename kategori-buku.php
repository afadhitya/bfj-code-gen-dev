<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <?php include 'head-common.php';?>
</head>
<body>

  <?php
    include('connection.php');

    $idPage = 3;

    $sql = "SELECT * FROM kode_buku ORDER BY nomor_kode_buku ASC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $total = 0;

    if ($result->num_rows > 0) {
  ?>

  <!-- -------NAVBAR-------- -->
  <?php include 'navbar.php';?>
  <!-- -------------------- -->

<div class="container" style="margin-top:2rem;">
<div class="row">
  <div class="col-8">
  <table class="table table-bordered table-striped" border="1">
    <thead>
      <tr>
        <th>Kategori</th>
        <th>Inisial</th>
        <th>Kode</th>
        <!-- <th>Action</th> -->
      </tr>
    </thead>
    <tbody>
      <?php while($row = $result->fetch_assoc()) { ?>
        <tr>
          <td> <?php echo $row["kategori"]; ?></td>
          <td> <?php echo $row["inisial_kode_buku"];?></td>
          <td> <?php echo $row["nomor_kode_buku"];?></td>
          <!-- <td> <a href="/data-keuangan/delete-hutang.php?idHutang=<?php echo $row["id"]?>">Delete</a>
                <a href="/data-keuangan/edit-hutang.php?idHutang=<?php echo $row["id"]?>">Edit</a></td> -->
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

  <div class="col-4">
  <h5>Input Kategori Buku</h><br><br>
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
  <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
</div>
</div>

</body>

<?php include 'footer.php';?>
</html>
