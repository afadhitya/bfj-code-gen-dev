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

  <title>Data Buku</title>
  <meta name="description" content="The HTML5 Herald">
  <meta name="author" content="SitePoint">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="css/styles.css?v=1.0">
</head>

<body>
	<div>
			<!-- -------NAVBAR-------- -->
			<?php include 'navbar.php';?>
			<!-- -------------------- -->
	</div>

	<div class="container">
	  <div class="col-sm-12">
		Nama Dus
		<form action="data-buku.php" method="get">
			<select name="dusParam">
				<?php foreach ($arr as $obj) {

					$selected = "";

					if ($dusParam == $obj['dus']) {
						$selected = 'selected="selected"';
					} 

					echo '<option value="' . $obj['dus'] . '"' . $selected .'>' . $obj['dus'] . '</option>';
				}
				?>  
			</select>
			<input type="submit"> 
		</form>
		
	  	<!-- <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for Box"> -->
		<?php
			if ($dusParam != null) {
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
</html>