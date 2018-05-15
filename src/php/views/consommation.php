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
    	

<canvas id="myChart" width="400" height="400"></canvas>
<script>
var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>


</div>