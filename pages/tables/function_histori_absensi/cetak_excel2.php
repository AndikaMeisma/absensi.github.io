<!DOCTYPE html>
<html>
<head>
	<title>Data Absensi</title>
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
	header("Content-Disposition: attachment; filename=Data Absensi.xls");
	?>
 
	<center>
		<h1>Data Absensi</h1>
	</center>
 
	<table border="1">
		   <tr>
					<th><font face="Berlin Sans FBc">No</font></th>
                    <th><font face="Berlin Sans FBc">Nama</font></th>
                    <th><font face="Berlin Sans FBc">Tanggal</font></th>
                    <th><font face="Berlin Sans FBc">Jam_masuk</font></th>
                    <th><font face="Berlin Sans FBc">Jam_keluar</font></th>	
					<th><font face="Berlin Sans FBc">Kehadiran</font></th>
					<th><font face="Berlin Sans FBc">Keterangan</font></th>
					<th><font face="Berlin Sans FBc">Status</font></th>		
				
		
                  </tr>
		<?php
						require'function.php';
						$sql = "SELECT id_scan, Nama,Tanggal,Jam_masuk,Jam_keluar,Kehadiran,Keterangan,Status FROM table_scan  ORDER BY id_scan DESC ";
						$query = $conn->query($sql);
						$No = +1;
						while($row=$query->fetch_assoc()){
					?>
					<tr>
						<td><font face="Berlin Sans FBc"><?php echo $No++ ;?></font></td>
						<td><font face="Berlin Sans FBc"><?php echo $row['Nama'];?></font></td>
						<td><font face="Berlin Sans FBc"><?php echo $row['Tanggal'];?></font></td>
						<td><font face="Berlin Sans FBc"><?php echo $row['Jam_masuk'];?></font></td>
						<td><font face="Berlin Sans FBc"><?php echo $row['Jam_keluar'];?></font></td>
						<td><font face="Berlin Sans FBc"><?php echo $row['Kehadiran'];?></font></td>
						<td><font face="Berlin Sans FBc"><?php echo $row['Keterangan'];?></font></td>
						<td><font face="Berlin Sans FBc"><?php echo $row['Status'];?></font></td>
					
					</tr>
					<?php
					}
					?>
	</table>
</body>
</html>