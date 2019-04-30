<?php include('dbconnection.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author"
	content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
<meta name="generator" content="Jekyll v3.8.5">
<title>Dashboard Template Â· Bootstrap</title>
<!-- BootstrapCDN from https://getbootstrap.com/ -->
<link rel="stylesheet"
	href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script
	src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script
	src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<style>
<
link rel ="canonical" href ="https: //getbootstrap.com /docs/4.3
	/examples/dashboard/"><!--Bootstrap core CSS --> <link href ="/docs/4.3
	/dist/css/bootstrap.min.css " rel ="stylesheet" integrity
	="sha384-ggOyR0iXCbMQv3Xipma34MD+dH
	/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin ="anonymous"> <style>.bd-placeholder-img
	{
	font-size: 1.125rem;
	text-anchor: middle;
	-webkit-user-select: none;
	-moz-user-select: none;
	-ms-user-select: none;
	user-select: none;
}

@media ( min-width : 768px) {
	.bd-placeholder-img-lg {
		font-size: 3.5rem;
	}
}
</style>
<!-- Custom styles for this template -->

<link href="dashboard.css" rel="stylesheet">

</head>
<body>
	<nav
		class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
		<a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Company
			name</a> <input class="form-control form-control-dark w-100" type="text"
			placeholder="Search" aria-label="Search">
		<ul class="navbar-nav px-3">
			<li class="nav-item text-nowrap"><a class="nav-link" href="#">Sign
					out</a></li>
		</ul>
	</nav>
		<div class="container-fluid">
		<div class="row">
			<nav class="col-md-2 d-none d-md-block bg-light sidebar">
				<div class="sidebar-sticky">
					<ul class="nav flex-column">
						<li class="nav-item"><a class="nav-link" href="Dashboard.php"> <span
								data-feather="shopping-cart"></span> Dashboard
						</a></li>
						<li class="nav-item"><a class="nav-link" href="orders.php"> <span
								data-feather="file"></span> Orders
						</a></li>
						<li class="nav-item"><a class="nav-link" href="finance.php"> <span
								data-feather="users"></span> Finances
						</a></li>
						<li class="nav-item"><a class="nav-link" href="account_information.php"> <span
								data-feather="users"></span> Account Information
						</a></li>
					</ul>
				</div>	
			</nav>
			
			<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
			<div
				class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
				<h1 class="h1">Products</h1>
				<div class="btn-toolbar mb-2 mb-md-0">
					<div class="btn-group mr-2">
						<button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
						<button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
					</div>
					<button type="button"
						class="btn btn-sm btn-outline-secondary dropdown-toggle">
						<span data-feather="calendar"></span> This week
					</button>
				</div>
			</div>
			
			<h2>Detailed Product List</h2>
			<table>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Part Number</th>
					<th>Product Label</th>
					<th>Starting Inventory</th>
					<th>Inventory Received</th>
					<th>Inventory Shipped</th>
					<th>Quantity On Hand</th>
					<th>Price Per Unit</th>
				</tr>
			<?php 
			$servername = "avl.cs.unca.edu";
			$username = "ewarren1";
			$password = "sql4you";
			$dbname = "ewarren1DBCSCI338";
			
			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			
			$sql = "SELECT * FROM Product";
			
			$result = $conn->query($sql);
			
			if ($result->num_rows > 0) {
			    while($row = $result->fetch_assoc()) {
			        echo "<tr><td>" . $row["idProduct"]. "</td><td>" . $row["productName"]. "</td><td>" . $row["partNumber"]. "</td><td>" . $row["productLabel"]. 
			        "</td><td>" . $row["startingInventory"]. "</td><td>" . $row["invertoryRecieved"]. "</td><td>" . $row["inventoryShipped"]. 
			        "</td><td>" . $row["inventoryOnHand"]. "</td><td>" . $row["price_Per_Unit"]. "</td></tr>";
			    }
			    echo "</table>";
			} else {
			    echo "0 Results";
			}
			
			?>
			</table>
			
			<canvas class="my-4 w-100" id="myChart" width="900" height="100"></canvas>
			
			<h3>Add Inventory</h3>
			<form method="post" action="insert_product.php">
				*Product ID: <input name="idProduct" type="number" min="1" max="9999" required>
				<br>
				*Product Name: <input name="productName" type="text" required>
				<br>
				*Part Number: <input name="partNumber" type="text" required>
				<br>
				Product Description: <input name="productLabel" type="text">
				<br>
				*Starting Inventory: <input name="startingInventory" type="text" required>
				<br> 
				Inventory Received: <input name="invertoryRecieved" type="text">
				<br> 
				Inventory Shipped: <input name="inventoryShipped" type="text">
				<br> 
				*Inventory On Hand: <input name="inventoryOnHand" type="text" required>
				<br>
				*Price Per Unit: <input name="price_Per_Unit" type="number" min="1" max="9999" required>
				<br>
				<input type = "submit" value = "Submit">
			</form>
			
			<canvas class="my-4 w-100" id="myChart" width="900" height="100"></canvas>
			
			<h3>Update Inventory</h3>
			<form method="post" action="update_product.php">
				*ID to Update: <input name="idProduct" type="number" min="1" max="9999" required>
				<br>
				*New Product Name: <input name="productName" type="text" required>
				<br>
				*New Part Number: <input name="partNumber" type="text" required>
				<br>
				New Product Description: <input name="productLabel" type="text">
				<br>
				*New Starting Inventory: <input name="startingInventory" type="text" required>
				<br> 
				New Inventory Received: <input name="invertoryRecieved" type="text">
				<br> 
				New Inventory Shipped: <input name="inventoryShipped" type="text">
				<br> 
				*New Inventory On Hand: <input name="inventoryOnHand" type="text" required>
				<br>
				*New Price Per Unit: <input name="price_Per_Unit" type="number" min="1" max="9999" required>
				<br>
				<input type = "submit" value = "Update">
			</form>
			
			<canvas class="my-4 w-100" id="myChart" width="900" height="100"></canvas>
			
			<h3>Delete Inventory</h3>
			<form method="post" action="delete_product.php">
				ID to Delete: <input name="idProduct" type="number" min="1" max="9999" required>
				<br>
				<input type = "submit" value = "Delete">
			</form>
			
			
			
			
			</main>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
		integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
		crossorigin="anonymous"></script>
	<script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
	<script src="/docs/4.3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o"
		crossorigin="anonymous"></script>
	<script
		src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
	<script
		src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
	<script src="dashboard.js"></script>
</body>
</html>
