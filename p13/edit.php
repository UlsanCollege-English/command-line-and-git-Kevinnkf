<?php require "Config/database.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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
	<div class="wrapper">
		<div style="color:red">
			<?php
				if($_GET['id'] == null) {
					header("location:read.php");
				}
				$id = $_GET['id']; 
				$script = "SELECT * FROM khalfani WHERE id_pembeli = $id"; 
				$query = mysqli_query($conn, $script); 
				$data = mysqli_fetch_array($query); 

			if (isset($_POST['submit'])) {
					$nama = $_POST['nama'];
					$alamat = $_POST['alamat'];
					$HP = $_POST['HP'];
					$Tgl_Transaksi = $_POST['Tgl_Transaksi'];
					$Jenis_Barang = $_POST['Jenis_Barang'];
					$Nama_Barang = $_POST['Nama_Barang'];
					$Harga = $_POST['Harga'];
					$Jumlah = $_POST['Jumlah'];

					$script = "UPDATE khalfani SET
						nama='$nama',
						alamat='$alamat',
				   	    HP='$HP', 
					    Tgl_Transaksi='$Tgl_Transaksi',
						Jenis_Barang='$Jenis_Barang', 
						Nama_Barang='$Nama_Barang',
						Harga='$Harga',
						Jumlah='$Jumlah'
						WHERE id_pembeli = $id";

					$query = mysqli_query($conn, $script);
					if ($query) {
						header("location: read.php");
					} else {
						echo "gagal mengupload data";
					}
				
			}
			?>
			<br>
		</div>
		<div class="col-6">
			<form method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label> Nama </label>
					<input type="text" class="form-control" name="nama">
				</div>
				<div class="form-group">
					<label> Alamat </label>
					<input type="text" class="form-control" name="alamat">
				</div>
				<div class="form-group">
					<label> Nomor HP </label>
					<input type="text" class="form-control" name="HP">
				</div>
				<div class="form-group">
					<label> Tanggal Transaksi </label>
					<input type="date" class="form-control" name="Tgl_Transaksi">
				</div>
				<div class="form-group">
					<label> Jenis Barang </label>
					<input type="text" class="form-control" name="Jenis_Barang">
				</div>
				<div class="form-group">
					<label> Nama Barang </label>
					<input type="text" class="form-control" name="Nama_Barang">
				</div>
				<div class="form-group">
					<label> Jumlah </label>
					<input type="number" class="form-control" name="Jumlah">
				</div>
				<div class="form-group">
					<label> Harga </label>
					<input type="number" class="form-control" name="Harga">
				</div>
				<input type="submit" class="btn btn-primary" name="submit" value="Upload">
				<a href="detail.php" type="submit" class="btn btn-primary">Cancel</a>
			</form>
			<br><br><br>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>