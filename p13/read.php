<?php require "Config/database.php" ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="Asset/Css/style.css">
	<title>UTS</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
			<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
				<li class="nav-item ">
					<a class="nav-link" href="index.php">HOME <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="read.php">LIST</a>
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
	<ul><a href="create.php" type="submit" class="btn btn-primary" > Tambah Data </a></ul>
	
	<div class="wrapper">
		<div class="row">
			<?php
				$batas = 5; 
				$halaman = $_GET['halaman'] ?? null;

				if(empty($halaman)){
					$posisi = 0; $halaman = 1;
				}else{
					$posisi = ($halaman-1) * $batas;
				}

				if(isset($_GET['search'])){ 
					$search = $_GET['search']; 
					$sql="SELECT * FROM khalfani WHERE nama or id_pembeli LIKE '%$search%' ORDER BY id_pembeli ASC LIMIT $posisi, $batas"; 
				}
				else{ 
					$sql="SELECT * FROM khalfani ORDER BY id_pembeli ASC LIMIT $posisi, $batas";
				}
				
				$hasil=mysqli_query($conn, $sql); 
				while ($data = mysqli_fetch_array($hasil)) {
			?>
				<div class="col-md-3 produk">
					<a href="detail.php?id=<?= $data['id_pembeli'] ?>"> 
					<br>
						<h4><?= $data['nama'] ?></h4> 
						<br>
						<p class="asal-produk">ID: <?=$data['id_pembeli']?></p>
						<p class="asal-produk">Telephone: <?=$data['HP']?></p>
						<p class="asal-produk">Product Name: <?=$data['Nama_Barang']?></p>
						<p class="asal-produk">Price: <?=$data['Harga']?></p>
					</a> 
				</div> 
			<?php } ?>
		</div> 
		<?php

			if(isset($_GET['search'])){
				$search= $_GET['search']; 
				$query2="SELECT * FROM khalfani WHERE nama OR id_pembeli LIKE '%$search%' ORDER BY id_pembeli DESC"; 
			}else{ 
				$query2="SELECT * FROM khalfani ORDER BY id_pembeli DESC";
			}

			$result2 = mysqli_query($conn, $query2); 
			$jmldata = mysqli_num_rows($result2); 
			$jmlhalaman = ceil($jmldata/$batas);
		?>
		<br>
		<ul class="pagination"> 
			<?php   
				for($i=1;$i<=$jmlhalaman; $i++) {
					if ($i != $halaman) { 
						if(isset($_GET['search'])){ 
							$search = $_GET['search'];
							echo "<li class='page-item'><a class='page-link' href='read.php?halaman=$i&search=$search'>
								  $i</a></li>";
						}else{ 
							echo "<li class='page-item'><a class='page-link' href='read.php?halaman=$i'>$i</a></li>";
						}
					} else {
						echo "<li class='page-item active'><a class='page-link' href='#'>$i</a></li>";
					}
				}
			?>
		</ul> 
	</div>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>

