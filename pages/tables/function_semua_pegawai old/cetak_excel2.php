<!DOCTYPE html>
<html>
<head>
	<title>Data Pegawai</title>
</head>
<body>
	<style type="text/css">
	body{
		font-family: sans-serif;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		border: 1px solid #3c3c3c;
		padding: 3px 8px;
 
	}
	a{
		background: blue;
		color: #fff;
		padding: 8px 10px;
		text-decoration: none;
		border-radius: 2px;
	}
	</style>
 
	<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data Pegawai.xls");
	?>
 
	<center>
		<h1>Data Pegawai</h1>
	</center>
 
	<table border="1">
		      <tr>
                    <th>No</th>
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

</body>
</html>