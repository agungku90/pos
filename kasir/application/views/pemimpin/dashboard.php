<section class="section">
			<div class="section-header">
            <h1>Chart.JS</h1>
		  </div>

		  <?php
				foreach($grafik as $data){
					$bulan[] = $data->bulan;
					$jumlah[] = (float) $data->jumlah;
				}
   			 ?>
		  
		  <div class="section-body">
           
			<div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Grafik Penjualan</h4>
                  </div>
                  <div class="card-body">
                    <canvas id="myChart"></canvas>
                  </div>
                </div>
              </div>
              
              </div>
            </div>  
		</div>
  
</section>
<script src="<?php echo base_url(); ?>assets/modules/chart.min.js"></script>

<script type="text/javascript"> 
"use strict";

var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: <?=json_encode($bulan)?>,
    datasets: [{
      label: 'Statistics',
      data:<?=json_encode($jumlah)?> ,
      borderWidth: 2,
      backgroundColor: '#6777ef',
      borderColor: '#6777ef',
      borderWidth: 2.5,
      pointBackgroundColor: '#ffffff',
      pointRadius: 2
    }]
  },
  options: {
    legend: {
      display: false
    },
    scales: {
      yAxes: [{
        gridLines: {
          drawBorder: false,
          color: '#f2f2f2',
        },
        ticks: {
          beginAtZero: true,
          stepSize: 20
        }
      }],
      xAxes: [{
        ticks: {
          display: false
        },
        gridLines: {
          display: false
        }
      }]
    },
  }
});

</script>
