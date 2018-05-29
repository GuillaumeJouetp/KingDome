<!-- Graphique de consommation -->


<?php 

switch ($_POST['duree']){
	
	case '1 mois':
		$mois = array('Janvier');
		$conso = array('20');
		
	case '3 mois' :
		$mois = array('Janvier', 'Février', 'Mars');
		$conso = array('20','32','45');
		
	case '6 mois' :
		$mois = array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin');
		$conso = array('20','32','45','59','67','74');
		
	case '1 an' :
		$mois = array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre' ,'Décembre');
		$conso = array('20','32','45','59','67','74','85','93','102','110','122','133');
}


?>

<canvas id="chartUser" width="400" height="200"></canvas>

<script type="text/javascript">
	    	
		var x_datas = <?=json_encode($mois);?>;
		var y_datas = <?=json_encode($conso)?>;
		var ctx = document.getElementById("chartUser").getContext('2d');
		var myChart = new Chart(ctx, {
		    type: 'bar',
		    data: {
		        labels: x_datas,
		        datasets: [{
		            label: 'Consommation',
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
