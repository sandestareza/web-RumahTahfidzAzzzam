<!-- Mengisi data Grafik -->
<?php
  $kelas="";
  $jumlah=null;
    foreach ($santrikls as $row) { 
            /*perhitungan*/
    $kls=$row->kelas;
    $kelas.="'$kls'".", ";
    $hasil=$row->total;
    $jumlah.="$hasil".", ";
    
  }?>

  <script>
    // Bar Chart Example

  var ctx = document.getElementById("doughnutchart").getContext('2d');
  var data = {
            labels: [<?=$kelas; ?>],
            datasets: [
            {
              label: "Jumlah Santri per kelas",
              data: [<?=$jumlah; ?>],
              backgroundColor: [
                'rgba(54, 162, 235, 1)',
                'rgba(255, 99, 132, 1)',
              ]
            }
            ]
            };
 
  var mydoughnutchart = new Chart(ctx, {
                  type: 'doughnut',
                  data: data,
                options: {
                    maintainAspectRatio: false,
                    responsive: true,
                  tooltips: {
                      backgroundColor: "rgb(255,255,255)",
                      bodyFontColor: "#858796",
                      borderColor: '#dddfeb',
                      borderWidth: 1,
                      xPadding: 15,
                      yPadding: 15,
                      displayColors: false,
                      caretPadding: 10,
                    },
                  Legend: {
                    position: 'bottom',
                  },
                  cutoutPercentage: 65,
                  animation: {
                    animateScale: true,
                    animateRotate: true
                  }
                }
              });
  </script>
  
