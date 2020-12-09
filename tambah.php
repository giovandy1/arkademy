<?php include('koneksi.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>ARISAN JABODETABEK</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container">
			<a class="navbar-brand" href="index.php">DAFTAR PRODUK</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
 
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="index.php">Home</a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="tambah.php">Tambah</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	
	<div class="container" style="margin-top:20px">
		<h2>Daftar Produk</h2>
		
		<hr>
		
		<?php
		if(isset($_POST['submit'])){
			$nama_produk     = $_POST['nama_produk'];
            $harga	        = $_POST['harga'];
            $stok	        =   $_POST['jumlah'];  
            $keterangan 	= $_POST['keterangan'];   
			
			$cek = mysqli_query($koneksi, "SELECT * FROM produk WHERE nama_produk='$nama_produk'") or die(mysqli_error($koneksi));
			
			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO produk (nama_produk, harga, jumlah, keterangan) VALUES('$nama_produk', '$harga', '$stok','$keterangan')") or die(mysqli_error($koneksi));
				
				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="tambah.php";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, NIM sudah terdaftar.</div>';
			}
		}
		?>
		
		<form action="tambah.php" method="post">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NAMA PRODUK</label>
				<div class="col-sm-10">
					<input type="text" name="nama_produk" class="form-control"  required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">HARGA</label>
				<div class="col-sm-10">
					<input type="number" name="harga" class="form-control" required>
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">STOK</label>
				<div class="col-sm-10">
					<input type="number" name="jumlah" class="form-control" required>
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">KETERANGAN</label>
				<div class="col-sm-10">
					<input type="text" name="keterangan" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">&nbsp;</label>
				<div class="col-sm-10">
					<input type="submit" name="submit" class="btn btn-primary" value="SIMPAN">
				</div>
			</div>
		</form>
		
	</div>
    <script>
    $('#frm-mhs').validate({
	rules: {
		nim : {
			digits: true,
			minlength:16,
			maxlength:16
		}
	}
});</script>
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>