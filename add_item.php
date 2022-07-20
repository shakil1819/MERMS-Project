<!DOCTYPE html>
<html>

<head>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

	<link rel="stylesheet" href="assets/css/add.css">

</head>

<body>

	<?php
	include "database.php";
	?>


	<div class="container" style="margin-top: 3%;">
		<div class="row">
			<form class="form-horizontal" method="post" style="margin-left: 23%;">
				<div class="form-group">
					<label class="col-lg-2 control-label">ID</label>
					<div class="col-lg-2">
						<input type="text" name="ID">
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-2 control-label">Name</label>
					<div class="col-lg-2">
						<input type="text" name="Name">
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-2 control-label">Model</label>
					<div class="col-lg-2">
						<input type="text" name="Model">
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-2 control-label">Store</label>
					<div class="col-lg-2">
						<input type="text" name="Store">
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-2 control-label">Quantity</label>
					<div class="col-lg-2">
						<input type="text" name="Quantity">
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-2 control-label"></label>
					<div class="col-lg-2">
						<input type="submit" name="save" value="Submit" class="btn btn-primary">
					</div>
				</div>
			</form>
		</div>
	</div>

	<?php
	if (isset($_POST['save'])) {
		$ID = $_POST['ID'];
		$Name = $_POST['Name'];
		$Model = $_POST['Model'];
		$Store = $_POST['Store'];
		$Quantity = $_POST['Quantity'];
		$query = oci_parse($conn, "INSERT INTO item values ('$ID','$Name','$Model','$Store', '$Quantity')");
		$result = oci_execute($query);
		if ($result) {
			echo "Data added Successfully !";
			exit();
		} else {
			echo "Error !";
			exit();
		}
	}

	?>



</body>

</html>