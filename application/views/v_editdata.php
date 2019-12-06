<html>
<head>
	<title>Edit Data</title>
</head>
<body>
	<h2>Edit data</h2>
	<?php foreach($data as $d){ ?>
	<form action="<?php echo site_url('main/edit_act'); ?>" method="post">
		<table>
			<tr>
				<td>NRP</td>
				<td><input type="text" name="nrp" value="<?php echo $d->nrp ?>" readonly ><?php echo $this->session->flashdata('notif'); ?></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td><input type="text" name="nama" value="<?php echo $d->nama ?>"></td>
			</tr>
			<tr>
				<td>Tanggal</td>
				<td><input type="text" name="tanggal" value="<?php echo $d->tanggal ?>"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Edit"> <input type="reset" value="Batal"></td>
			</tr>
		</table>
	</form>
	<?php } ?>
</body>
</html>