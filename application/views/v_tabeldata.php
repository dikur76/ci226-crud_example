<table border="1">
	<tr>
		<th>No</th>
		<th>Nama</th>
		<th>NRP</th>
		<th>tanggal</th>
		<th></th>
	</tr>
	<?php 
	$countdata = $page==0?$page*$per_page:($page-1)*$per_page;
	$no = 1;
	foreach($data as $row){ 
	?>
	<tr>
		<td><?php echo $countdata+$no; ?></td>
		<td><?php echo $row['nama'] ?></td>
		<td><?php echo $row['nrp'] ?></td>
		<td><?php echo $row['tanggal'] ?></td>
		<td>
		    <?php echo anchor('main/edit/'.$row['nrp'],'Edit')." "; ?>
            <?php echo anchor('main/hapus/'.$row['nrp'],'Hapus'); ?>
		</td>
	</tr>
	<?php $no++; } ?>
</table>
<?php echo $paging; ?>