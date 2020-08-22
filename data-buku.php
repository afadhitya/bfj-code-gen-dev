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

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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
		Box
		<form action="data-buku.php" method="get">
			<select name="dusParam">
				<?php foreach ($arr as $obj){

					$selected = "";

					if ($dusParam == $obj['dus']) {
						$selected = 'selected="selected"';
					} 
					echo '<option value="'. $obj['dus']. '"' .$selected.'>'.$obj['dus'].'</option>';
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
  <script type="text/javascript">
  	
  	function myFunction() {
	  // Declare variables 
	  var input, filter, table, tr, td, i, txtValue;
	  input = document.getElementById("myInput");
	  filter = input.value.toUpperCase();
	  table = document.getElementById("tableDataBuku");
	  tr = table.getElementsByTagName("tr");

	  // Loop through all table rows, and hide those who don't match the search query
	  for (i = 0; i < tr.length; i++) {
	    td = tr[i].getElementsByTagName("td")[6];
	    if (td) {
	      txtValue = td.textContent || td.innerText;
	      if (txtValue.toUpperCase().indexOf(filter) > -1) {
	        tr[i].style.display = "";
	      } else {
	        tr[i].style.display = "none";
	      }
	    } 
	  }
	}

  </script>
</body>
</html>