

<link rel='stylesheet' href='https://unpkg.com/bulma@0.9.1/css/bulma.min.css'>
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<section id='app' class='hero is-link is-fullheight'>
        <div class='hero-body'>
            <div class='container'>
                <div class='columns has-text-centered'>
                    <div class='column'>
                        <h1 style='font-size: 2.5rem'>Altura</h1>
                        <div class='colum ha s-text-centeredn'>
                            <p class="text-left">Altura Minima: <strong class='has-text-white'> </strong></p>
                            <div class="h5 mb-0 text-white font-weight-bold text-gray-800" id="altMin">  </div>
                            <p class="text-left">Altura máxima: <strong class='has-text-white'></strong></p>
                            <div class="h5 mb-0 text-white font-weight-bold text-gray-800" id="altMax"> </div>
                        </div>
                        <div class="card-body">
                            <canvas class="chart-area" id="altChart"></canvas>
                        </div>
          
        </div>
                    </div>
                   
                </div>
                
                <a class="btn btn-warning" href="{{route('graficas')}}">Regresar</a>
            </div>
        </div>
</section>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
var socket = io.connect('http://localhost:3000'); // Conectarse al servidor
var altitud =[];
var hora =[];

function actualizarGrafico() {
    var ctx = document.getElementById('altChart').getContext('2d');
    var max = document.getElementById('altMax');
    var min = document.getElementById('altMin');

    altitud.push(sensor.altitud);
    hora.push(sensor.time);
    

	

    var data = {
        labels: Array.from({ length: altitud.length }, (_, i) => i + 1),
        datasets: [{
            label: 'Altura',
            data: altitud,
            backgroundColor: ['#ff5733', '#33ff57'],
            borderColor: 'rgba(0, 0, 0, 1)', // Color de borde
            borderWidth: 2, // Ancho del borde
            fill: true, // Rellenar el área bajo la curva
            lineTension: 0.4 // Tensión de la curva (ajusta según sea necesario)
        }]
    };

    var options = {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    };

    var myChart = new Chart(ctx, {
        type: 'line',
        data: data,
        options: options
    });
}
</script>
