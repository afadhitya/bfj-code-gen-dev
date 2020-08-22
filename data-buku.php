<!doctype html>

<html lang="en">

<?php
include "connection.php";

$dusParam = isset($_GET['dusParam']) ? $_GET['dusParam'] : '';

if ($dusParam != null) {
	$sql = "SELECT * FROM buku WHERE nama_dus = '$dusParam' ORDER BY nama_dus ASC, judul_buku ASC";
	$result = $conn->query($sql);
}

$sql = "SELECT DISTINCT nama_dus FROM buku";
$result2 = $conn->query($sql);

$i = 0;
if ($result2->num_rows > 0) {
	while ($row = $result2->fetch_assoc()) {
		$arr[$i]['dus'] = $row["nama_dus"];
		$i++;
	}
} else {
	echo "0 results";
}
?>

<head>
  <meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="css/styles.css?v=1.0">

	<?php include 'head-common.php';?>
</head>

<body>
	<div>
			<!-- -------NAVBAR-------- -->
			<?php include 'navbar.php';?>
			<!-- -------------------- -->
	</div>

	<div class="container" style="margin-top:1rem;">
	  <div class="col-sm-12" >
		<h6>Nama Dus</h6>
		<div style="margin-bottom:1rem;">
			<form action="data-buku.php" method="get">
				<div class="form-row align-items-center">
					<div class="col-5 my-1">
						<select class="custom-select" name="dusParam">
							<?php foreach ($arr as $obj) {

								$selected = "";

								if ($dusParam == $obj['dus']) {
									$selected = 'selected="selected"';
								} 

								echo '<option value="' . $obj['dus'] . '"' . $selected .'>' . $obj['dus'] . '</option>';
							}
							?>  
						</select>
					</div>
					<div class="col-auto my-1">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>

					<?php 
					if (isset($result->num_rows) > 0) {
					?>
					<div class="col-auto my-1">
						<a class="btn btn-danger" href="delete-dus.php?dusParam=<?php echo $dusParam ?>" role="button">Hapus Data Dus Buku Ini</a>
					</div>
					<?php 
					}
					?>
				</div>
			</form>
		</div>
	
		
	  	<!-- <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for Box"> -->
		<?php
			if (isset($result->num_rows) > 0) {
		?>
	  <table class="table table-bordered table-striped" border="1" id="tableDataBuku">
	    <thead>
	      <tr>
	        <th>Judul Buku</th>
	        <th>Kategori</th>
	        <th>Penulis</th>
	        <th>Penerbit</th>
	        <th>Tahun Terbit</th>
	        <th>Jumlah</th>
	        <th>Nama Dus</th>
	      </tr>
	    </thead>
	    <tbody>
		<?php
			if ($result->num_rows > 0) {
			    // output data of each row
			    while($row = $result->fetch_assoc()) { ?>
			    	<tr>
			          <td> <?php echo $row["judul_buku"]; ?></td>
			          <td> <?php echo $row["kategori"]; ?></td>
			          <td> <?php echo $row["penulis"]; ?></td>
			          <td> <?php echo $row["penerbit"]; ?></td>
			          <td> <?php echo $row["tahun_terbit"]; ?></td>
			          <td> <?php echo $row["jumlah"]; ?></td>
			          <td> <?php echo $row["nama_dus"]; ?></td>
			        </tr>
			    <?php } 
			} else {
			    echo "0 results";
			}
			$conn->close();
		?>
		</tbody>
	  </table>
		<?php
			}
		?>
	</div>
</body>
<?php
if (isset($result->num_rows) > 0) {
	include 'footer.php';
}
?>
</html>