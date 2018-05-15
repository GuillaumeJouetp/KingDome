<?php
/**
 * VUE DE LA PAGE MA CONSOMMATION
 * User: Nelly
 * EN ELABORATION
 */
?>

		<head>
			<link rel="stylesheet" href="css/consommation.css">
		</head>

<div id="corps">
			<h1> Ma consommation </h1>
			
			<div id="conso">
			<p> Consommation globable : <strong>-</strong> kWh </p>
			<p> Consommation par habitation : <strong>-</strong> kWh </p>


<!-- Tableau de consommation par habitations -->
			<table>
				<tr>
					<th>Habitation n°</th>
					<th>Consommation (kWh)</th>
			    </tr>
				<tr>
      				<td>1</td>
      				<td>87000</td>
				</tr>
				<tr>
					<td>2</td>
					<td>27000</td>
				</tr>
				<tr>
					<td>3</td>
					<td>0</td>
				</tr>
			</table>
			
			<p> Consommation par pièces : </p>
			<p> Trier par :
			<select name="thelist" onChange="combo(this, 'theinput')">
			</p>
				<option>Habitation 1</option>
				<option>Habitation 2</option>
				<option>Habitation 3</option>
			</select>  
			
<!-- Tableau de consommation par pièces -->
			<table>
				<tr>
					<th>Pièces</th>
					<th>Consommation (kWh)</th>
			    </tr>
				<tr>
      				<td>Cuisine</td>
      				<td>14500</td>
				</tr>
				<tr>
					<td>Salon</td>
					<td>14500</td>
				</tr>
				<tr>
					<td>Salle à manger</td>
					<td>14500</td>
				</tr>
				<tr>
      				<td>Salle de bain</td>
      				<td>14500</td>
				</tr>
				<tr>
      				<td>Chambre 1</td>
      				<td>14500</td>
				</tr>
				<tr>
      				<td>Chambre 2</td>
      				<td>14500</td>
				</tr>
			</table>



    	<script src="..\src\js\Chart.js"></script>
    	
	    <span class="row">
	    <div class="text-center">
	    <canvas id="graphique" width="1000" height="350"></canvas>
	    </div>
	    </span>
    	

<!-- 		<div class="stats">
				<h2>Consommation annuelle</h2>
				<ul>
					<li>Fonction f1 sur 10000 itérations&nbsp;: <span class="percent v70">14,7 ms</span></li>
					<li>Fonction f2 sur 10000 itérations&nbsp;: <span class="percent v30">6,3 ms</span></li>
					<li>Fonction f3 sur 10000 itérations&nbsp;: <span class="percent v100">21 ms</span></li>
				</ul>
			</div>
		 -->
		 </div>
</div>