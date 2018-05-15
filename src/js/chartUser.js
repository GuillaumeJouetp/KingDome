var ctx = document.getElementById("chartUser").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"],
        datasets: [{
            label: 'Consommation annuelle',
            data: [12, 19, 3, 5, 2, 3, 12, 19, 3, 5, 2, 19],
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