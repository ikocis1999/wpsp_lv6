<!DOCTYPE html>
<html lang="hr">
<html>
<head>
	<meta charset="utf‐8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sobe</title>
</head>
<body>
	<h3>Lista svih soba</h3>

	<table>
		<thead>
			<tr>
				<th>Redni broj</th>
				<th>Naziv sobe</th>
				<th>Opis sobe</th>
				<th>Kat</th>
				<th>Studenti</th>
			</tr>
		</thead>
		<tbody>
			<?php
				include 'Functions.php';
				foreach ($aSobe as $key => $soba) {
					echo "
						<tr>
							<td>".($key+1)."</td>
							<td>".$soba->Naziv."</td>
							<td>".$soba->Opis."</td>
							<td>".$soba->Kat."</td>	
							
					";
					foreach ($soba->Studenti as $kez => $student) {
						echo "
							<td>".$student->prezime."</td>
						";
					}
					echo "</tr>";		
				}
			?>
		</tbody>
	</table>

</body>
</html>