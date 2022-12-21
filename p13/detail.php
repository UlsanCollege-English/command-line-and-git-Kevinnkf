<?php
require "Config/database.php";
	if($_GET['id'] != null){
		$id = $_GET['id']; 
		$script = "SELECT id_pembeli, nama, alamat, HP, Tgl_Transaksi, Jenis_Barang, Nama_Barang, Jumlah,
		Harga, (Jumlah*Harga) AS total FROM khalfani WHERE id_pembeli=$id ";
		$query = mysqli_query($conn, $script);
		$data = mysqli_fetch_array($query);
	}else{
		header("location: read.php");
	}

	$query2 = null;

	if(isset($_POST['hapus'])) {
		$script2 = "DELETE FROM khalfani WHERE id_pembeli = $id"; 
		$query2 = mysqli_query($conn, $script2);
	}

	if($query2 != null){
		header("location:read.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="Asset/Css/style.css">
	<title>Produk</title>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
			<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
				<li class="nav-item active">
					<a class="nav-link" href="index.php">HOME <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="read.php">LINK</a>
				</li>
			</ul>
			<header>
				<div class="col-8">
				</div>
				<form method="get" class="form-inline my-2 my-lg-0">
					<div class="input-group">
						<div class="form-outline">
							<input type="search" name="search" id="form1" placeholder="Search" class="form-control" />
						</div>
						<input type="submit" class="btn btn-primary" value="Search">
					</div>
				</form>
			</header>
		</div>
	</nav>
	<br>
	<br> 
	<ul>
		<a href="read.php" type="submit" class="btn btn-primary">Kembali</a>
	</ul>
		<div class="wrapper"> 
			<div class="row"> 
				<div class="col-7"> 
					<div class="box-detail-produk">
						<h3><?= $data['nama'] ?></h3> 
						<p> Alamat : <?= $data['alamat'] ?></p> 
						<p> Jenis Barang : <?= $data['Jenis_Barang'] ?></p> 
						<p> Nama Barang : <?= $data['Nama_Barang'] ?></p> 
						<p> HP : <?= $data['HP'] ?></p> 
						<p> Tanggal Transaksi : <?= $data['Tgl_Transaksi'] ?></p> 
						<p> Jenis Barang : <?= $data['Jenis_Barang'] ?></p> 
						<p> Nama Barang : <?= $data['Nama_Barang'] ?></p> 
						<p> Harga : <?= $data['Harga'] ?></p> 
						<p> Jumlah : <?= $data['Jumlah'] ?></p> 
						<p> Total Harga : <?= $data['total'] ?></p> 

					</div> 
					<div class="box-detail-produk">
					<h2>Option</h2> 
					<form method="post">
						<a href="edit.php?id=<?= $data['id_pembeli'] ?>" class="btn btn-warning">Update</a>
						<input type="submit" name="hapus" value="Hapus produk" class="btn btn-danger"> 
					</form> 
				</div>
			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>