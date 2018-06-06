<!-- Graphique de consommation -->

<canvas id="chartUser" width="400" height="200"></canvas>

<script type="text/javascript">
<?php 
if(!isset($_POST['duree'])){
	$mois = array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre' ,'Décembre');
	$conso = array('20','32','45','59','67','74','85','93','102','110','122','133');
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
		            label: "Durée d'activation des capteurs",
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
