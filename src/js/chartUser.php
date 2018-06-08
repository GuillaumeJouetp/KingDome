<!-- Graphique de consommation -->

<canvas id="chartUser" width="400" height="200"></canvas>

<script type="text/javascript">
<?php 
if(!isset($_POST['duree'])){
	$mois = $bdd->query('SELECT date FROM conso_mois WHERE date >= NOW() - INTERVAL 12 MONTH');
	$mois = $mois->fetchAll();
	$mois= array ($mois[0][0], $mois[1][0], $mois[2][0], $mois[3][0], $mois[4][0], $mois[5][0], $mois[6][0], $mois[7][0], $mois[8][0], $mois[9][0], $mois[10][0], $mois[11][0]);
	$conso = $bdd->query('SELECT conso FROM conso_mois WHERE date >= NOW() - INTERVAL 12 MONTH');
	$conso = $conso->fetchAll();
	$conso=array($conso[0][0], $conso[1][0], $conso[2][0], $conso[3][0], $conso[4][0], $conso[5][0],$conso[6][0], $conso[7][0], $conso[8][0], $conso[9][0], $conso[10][0], $conso[11][0]);
}
?>
	
		var x_datas = <?=json_encode($mois);?>;
		var y_datas = <?=json_encode($conso)?>;
		var ctx = document.getElementById("chartUser").getContext('2d');
		var myChart = new Chart(ctx, {
		    type: 'bar',
		    data: {
		        labels: x_datas,
		        datasets: [{
		            label: "Durée d'activation des capteurs en heures",
		            data: y_datas,
		            backgroundColor: 'rgb(0, 129, 220)',
		            borderColor: 'rgb(0, 129, 220)',
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
