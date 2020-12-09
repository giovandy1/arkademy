<?php include('koneksi.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Daftar Produk</title>
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
					<li class="nav-item">
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
		// mendapatkan parameter GET id dari URL
		if(isset($_GET['id'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$id = $_GET['id'];
			
			//query database SELECT tabel mahasiswa berdasarkan id = $id
			$select = mysqli_query($koneksi, "SELECT * FROM produk WHERE id ='$id'") or die(mysqli_error($koneksi));
			
			//jika hasil query = 0 maka muncul pesan error
			if(mysqli_num_rows($select) == 0){
				echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
				exit();
			//jika hasil query > 0
			}else{
				//membuat variabel $data dan menyimpan data row dari query
				$data = mysqli_fetch_assoc($select);
			}
		}
		?>
		
		<?php
		//jika tombol simpan di tekan/klik
		if(isset($_POST['submit'])){
		    $nama_produk     = $_POST['nama_produk'];
            $harga	        = $_POST['harga'];
            $stok	        =   $_POST['jumlah'];  
            $keterangan 	= $_POST['keterangan'];  
			$sql = mysqli_query($koneksi, "UPDATE produk SET nama_produk='$nama_produk', harga='$harga', jumlah='$stok', keterangan='$keterangan' WHERE id ='$id'") or die(mysqli_error($koneksi));
			
			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="edit.php?id='.$id.'";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>
		
		<form action="edit.php?id=<?php echo $id; ?>" method="post">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NAMA PRODUK</label>
				<div class="col-sm-10">
					<input type="text" name="nama_produk" class="form-control" size="4" value="<?php echo $data['nama_produk']; ?>"  required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">HARGA</label>
				<div class="col-sm-10">
					<input type="text" name="harga" class="form-control" value="<?php echo $data['harga']; ?>" required>
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">STOK</label>
				<div class="col-sm-10">
					<input type="text" name="jumlah" class="form-control" value="<?php echo $data['jumlah']; ?>" required>
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">KETERANGAN</label>
				<div class="col-sm-10">
					<input type="text" name="keterangan" class="form-control" value="<?php echo $data['keterangan']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">&nbsp;</label>
				<div class="col-sm-10">
					<input type="submit" name="submit" class="btn btn-primary" value="SIMPAN">
					<a href="index.php" class="btn btn-warning">KEMBALI</a>
				</div>
			</div>
		</form>
		
	</div>
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	
</body>
</html>