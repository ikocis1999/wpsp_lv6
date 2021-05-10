<!DOCTYPE html>
<html lang="hr">
<head>
	<meta charset="utf‐8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Studenti</title>
</head>
<body>
	<h3>Lista svih studenata</h3>

	<table>
		<thead>
			<tr>
				<th>Redni broj</th>
				<th>JMBAG</th>
				<th>Ime</th>
				<th>Prezie</th>
				<th>Adresa</th>
				<th>Poštanski broj</th>
				<th>Godina studija</th>
				<th>Ostvareni ECTS bodovi</th>
				<th>Prosjek ocjena</th>
				<th>Naziv sobe</th>
			</tr>
		</thead>
		<tbody>
			<?php
				include 'Functions.php';
				foreach ($studenti as $key => $student) {
					echo "
						<tr>
							<td>".($key+1)."</td>
							<td>".$studnet->JMBAG."</td>
							<td>".$studnet->ime."</td>
							<td>".$studnet->prezime."</td>
							<td>".$studnet->adresa."</td>
							<td>".$studnet->PostanskiBroj."</td>
							<td>".$studnet->GodinaStudija."</td>
							<td>".$studnet->OstvareniEcts."</td>
							<td>".$studnet->ProsjekOcjena."</td>
							<td>".$studnet->soba->Naziv."</td>
						</tr>
					";
				}
			?>
		</tbody>
	</table>
</body>
</html>

