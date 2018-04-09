<?php
/**
 * VUE DE LA PAGE MA CONSOMMATION
 * User: Nelly
 * EN ELABORATION
 */
?>


<!DOCTYPE html>
	<html>
		<head>
			<meta charset="UTF-8">
			<title>Ma consommation</title>
			<link rel="stylesheet" href="C:\Users\Nelly\eclipse-workspace\KingDome2\Conso.css">
		</head>
		<body>

			<h1> Ma consommation </h1>
			<p> Consommation globable : 175000 kWh </p>
			
			
			<p> Consommation par habitation : 80000 kWh </p>


<!-- Tableau de consommation par habitations -->
			<table>
				<tr>
					<th>Habitation n�</th>
					<th>Consommation (kWh)</th>
			    </tr>
				<tr>
      				<td>1</td>
      				<td>-</td>
				</tr>
				<tr>
					<td>2</td>
					<td>-</td>
				</tr>
				<tr>
					<td>3</td>
					<td>-</td>
				</tr>
			</table>
			
			<p> Consommation par pi�ces : </p>
			
			<input type="text" id="theinput" name="theinput" />
			<select name="thelist" onChange="combo(this, 'theinput')">
				<option>Maison 1</option>
				<option>Maison 2</option>
				<option>Maison 3</option>
			</select> 
			
<!-- Tableau de consommation par pi�ces -->
			<table>
				<tr>
					<td>Pi�ces</td>
					<td>Consommation (kWh)</td>
			    </tr>
				<tr>
      				<td>Cuisine</td>
      				<td>-</td>
				</tr>
				<tr>
					<td>Salon</td>
					<td>-</td>
				</tr>
				<tr>
					<td>Salle � manger</td>
					<td>-</td>
				</tr>
				<tr>
      				<td>Salle de bain</td>
      				<td>-</td>
				</tr>
				<tr>
      				<td>Chambre 1</td>
      				<td>-</td>
				</tr>
				<tr>
      				<td>Chambre 2</td>
      				<td>-</td>
				</tr>
			</table>

		</body>
	</html>