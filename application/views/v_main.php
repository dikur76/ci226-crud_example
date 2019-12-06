<html>
<head>
	<title>Halaman Utama</title>
</head>
<body>
	<h2>Halaman awal</h2>
	<?php

		echo "Selamat datang, " . $this->session->userdata('session_login') . "</br>";
		echo anchor('login/logout','Logout');
		echo "</br>".$this->session->flashdata('notif')."</br>";
		echo anchor('main/tambah','Tambah Data');
	?>	

</body>
</html>