<!DOCTYPE html>
<html>
<head>
	<title>Data Absensi</title>
</head>
<body>
 
	<center>
 
		<h2>DATA ABSENSI</h2>
 
	</center>

 
	<table border="1" style="width: 100%">
				  <tr>
                    <th>No</th>
					<th>Foto</th>
                    <th>Nama</th>
					<th>Nik</th>
                    <th>Departemen</th>
                    <th>Jabatan</th>
                    <th>No Wa</th>	
		
                  </tr>
					<?php
						require'function.php';
						$No = +1;
						$tampil = mysqli_query($conn,"SELECT * FROM semua_pegawai ORDER BY Id_pegawai DESC  ");
						while($d = mysqli_fetch_array($tampil)){
					?>
					<tr>
						<td><?php echo $No++; ?></td>
					<td><img src="img/<?php echo $d['Foto']; ?>"width="50"></td>
					<td><?php echo $d['Nama']; ?></td>
					<td><?php echo $d['Nik']; ?></td>
					<td><?php echo $d['Departemen']; ?></td>
					<td><?php echo $d['Jabatan']; ?></td>
					<td><?php echo $d['No_Wa']; ?></td>
					
					</tr>
					<?php
					}
					?>
	</table>
 
	<script>
		window.print();
	</script>
 
</body>
</html>