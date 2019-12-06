<html>
<head>
	<title>Tambah Data</title>
</head>
<body>
	<h2>Tambah data baru</h2>
	<form action="<?php echo site_url('main/tambah_act'); ?>" method="post">
		<table>
			<tr>
				<td>NRP</td>
				<td><input type="text" name="nrp"><?php echo $this->session->flashdata('notif'); ?></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td><input type="text" name="nama"></td>
			</tr>
			<tr>
				<td>Tanggal</td>
				<td><input type="text" name="tanggal"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Tambah"> <input type="reset" value="Batal"></td>
			</tr>
		</table>
	</form>	
</body>
</html>