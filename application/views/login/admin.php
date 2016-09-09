<!DOCTYPE html>
<html>
<head>
	<title>Membuat login dengan codeigniter | www.malasngoding.com</title>
</head>
<body>
	<h1>Login berhasil !</h1>
	<h2>Hai <?php echo $this->session->userdata("nama"); ?></h2>

	<a href="<?php echo site_url('sistem/barang')?>">Barang</a><br><br>
	<a href="<?php echo site_url('sistem/pembelian')?>">Pembelian</a><br><br>

	<a href="<?php echo base_url('login/logout'); ?>">Logout</a><br><br>
</body>
</html>
