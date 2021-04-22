<!-- Mengisi data Grafik -->
 <?php
  $tahun="";
  $jumlah=null;
    foreach ($santri as $row) { 
            /*perhitungan*/
    $thn_ajrn=$row->thn;
    $tahun.="'$thn_ajrn'".", ";
    $hasil=$row->total;
    $jumlah.="$hasil".", ";
    
  }?>

  <script>
    // Bar Chart Example
var ctx = document.getElementById("myBar");
var myBarChart = new Chart(ctx, {
  type: 'horizontalBar',
  data: {
    labels: [<?=$tahun; ?>],
    datasets: [{
      label: "Jumlah",
      backgroundColor: "#4e73df",
      hoverBackgroundColor: "#2e59d9",
      borderColor: "#4e73df",
      data: [<?=$jumlah;?>],
    }],
  },
  options: {
    maintainAspectRatio: true,
    responsive:true,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 75
      }
    },
    scales: {
      xAxes: [{
        time: {
          max: '<?=$jumlah;?>'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 20
        },
        maxBarThickness: 25,
      }],
      yAxes: [{
        ticks: {
          maxTicksLimit: 15,
          padding: 10,
          // Include a dollar sign in the ticks
/*          callback: function(value, index, values) {
            return '$' + number_format(value);
          }*/
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 25,
      yPadding: 25,
      displayColors: false,
      caretPadding: 10,
      callbacks: {
        /*label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': $' + number_format(tooltipItem.yLabel);
        }*/
      }
    },
  }
})
  </script>
  
