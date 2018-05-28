<canvas id="myChart" width="400" height="200"></canvas>

<script type="text/javascript">

/*On convertit le tableau php en tableau js en passant par du json*/

var x_datas = <?= json_encode(setXDatas($bdd)); ?>;
var y_datas = <?= json_encode(setYDatas($bdd)); ?>;


var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line', /*line bar radar pie doughnut polarArea bubble scatter*/
    data: {
        labels: x_datas,
        datasets: [{
            label: 'Trafic sur le site pour les 7 derniers jours',
            data: y_datas,
            backgroundColor: [
                'rgba(0,  129, 220, 0.5)',
                'rgba(255, 99, 132, 0.5)',
                'rgba(255, 206, 86, 0.5)',
                'rgba(75, 192, 192, 0.5)',
                'rgba(153, 102, 255, 0.5)',
                'rgba(255, 159, 64, 0.5)',
                'rgba(255, 99, 132, 0.5)'
            ],
            borderColor: [
                'rgba(0,  129, 220, 1)',
                'rgba(255,99,132,1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255, 99, 132, 1)'
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
