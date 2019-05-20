<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>The HTML5 Herald</title>
  <meta name="description" content="The HTML5 Herald">
  <meta name="author" content="SitePoint">

  <link rel="stylesheet" href="css/styles.css?v=1.0">

</head>

<body>

	<div class="container container-body" style="margin-top: 300px;" >
      <div>
        <form name="myForm" id="myForm" onSubmit="return validateForm()" action="import-excel.php" method="post" enctype="multipart/form-data">
            <input type="file" id="databuku" name="databuku" />
            <input type="submit" name="submit" value="Import" /><br/>
            <label><input type="checkbox" name="drop" value="1" /> <u>Kosongkan tabel sql terlebih dahulu.</u> </label>
        </form>
      </div>
    </div>

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
</body>
</html>