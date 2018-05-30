<!-- Graphique de consommation -->

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
