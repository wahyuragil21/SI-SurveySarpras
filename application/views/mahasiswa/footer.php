<!-- Main Footer -->
<footer class="main-footer">
  <strong>Copyright &copy; 2022 <a href="https://adminlte.io">ILMU KOMPUTER FMIPA UNRI</a>.</strong>
  All rights reserved.
  <div class="float-right d-none d-sm-inline-block">
    <b>Version</b> 3.2.0
  </div>
</footer>
</div>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url('assets') ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?php echo base_url('assets') ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets') ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url('assets') ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url('assets') ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url('assets') ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url('assets') ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url('assets') ?>/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo base_url('assets') ?>/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url('assets') ?>/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url('assets') ?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url('assets') ?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url('assets') ?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="<?php echo base_url('assets') ?>/plugins/chart.js/Chart.min.js"></script>
<script src="<?php echo base_url('assets') ?>/plugins/chart.js/Chart.js"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="<?php echo base_url('assets') ?>/dist/js/demo.js"></script> -->
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets') ?>/dist/js/adminlte.min.js"></script>
<!-- Page specific script -->
<script>
  const baseUrl = "<?php echo base_url(); ?>"
  const myChart = (chartType) => {

    $.ajax({
      url: baseUrl + 'diagram_hasil/chart_data/FASILITAS UMUM GEDUNG KULIAH',
      dataType: 'json',
      method: 'get',
      success: data => {
        let chartX = []
        let chartY = []
        data.map(data => {
          chartX.push(data.semester)
          chartY.push(data.hasil)
        })
        const chartData = {
          labels: chartX,
          datasets: [{
            label: 'hasil',
            data: chartY,
            backgroundColor: ['lightcoral'],
            borderColor: ['lightcoral'],
            borderWidth: 4
          }]
        }
        const ctx = document.getElementById('bar').getContext('2d')
        const config = {
          type: chartType,
          data: chartData
        }
        switch (chartType) {
          case 'bar':
            chartData.datasets[0].backgroundColor = ['rgb(255, 99, 132)', 'rgba(56, 86, 255, 0.87)', 'rgb(60, 179, 113)']
            chartData.datasets[0].borderColor = ['rgb(255, 99, 132)', 'rgba(56, 86, 255, 0.87)', 'rgb(60, 179, 113)']
            break;

          default:
            config.options = {
              scales: {
                y: {
                  beginAtzero: true
                }
              }
            }
        }
        const chart = new Chart(ctx, config)
      }
    })
  }
  const myChart2 = (chartType) => {

    $.ajax({
      url: baseUrl + 'diagram_hasil/chart_data/AUDITORIUM GEDUNG KULIAH',
      dataType: 'json',
      method: 'get',
      success: data => {
        let chartX = []
        let chartY = []
        data.map(data => {
          chartX.push(data.semester)
          chartY.push(data.hasil)
        })
        const chartData = {
          labels: chartX,
          datasets: [{
            label: 'hasil',
            data: chartY,
            backgroundColor: ['lightcoral'],
            borderColor: ['lightcoral'],
            borderWidth: 4
          }]
        }
        const ctx = document.getElementById('bar2').getContext('2d')
        const config = {
          type: chartType,
          data: chartData
        }
        switch (chartType) {
          case 'bar':
            chartData.datasets[0].backgroundColor = ['rgb(255, 99, 132)', 'rgba(56, 86, 255, 0.87)', 'rgb(60, 179, 113)']
            chartData.datasets[0].borderColor = ['rgb(255, 99, 132)', 'rgba(56, 86, 255, 0.87)', 'rgb(60, 179, 113)']
            break;

          default:
            config.options = {
              scales: {
                y: {
                  beginAtzero: true
                }
              }
            }
        }
        const chart = new Chart(ctx, config)
      }
    })
  }
  const myChart3 = (chartType) => {

    $.ajax({
      url: baseUrl + 'diagram_hasil/chart_data/RUANG KULIAH',
      dataType: 'json',
      method: 'get',
      success: data => {
        let chartX = []
        let chartY = []
        data.map(data => {
          chartX.push(data.semester)
          chartY.push(data.hasil)
        })
        const chartData = {
          labels: chartX,
          datasets: [{
            label: 'hasil',
            data: chartY,
            backgroundColor: ['lightcoral'],
            borderColor: ['lightcoral'],
            borderWidth: 4
          }]
        }
        const ctx = document.getElementById('bar3').getContext('2d')
        const config = {
          type: chartType,
          data: chartData
        }
        switch (chartType) {
          case 'bar':
            chartData.datasets[0].backgroundColor = ['rgb(255, 99, 132)', 'rgba(56, 86, 255, 0.87)', 'rgb(60, 179, 113)']
            chartData.datasets[0].borderColor = ['rgb(255, 99, 132)', 'rgba(56, 86, 255, 0.87)', 'rgb(60, 179, 113)']
            break;

          default:
            config.options = {
              scales: {
                y: {
                  beginAtzero: true
                }
              }
            }
        }
        const chart = new Chart(ctx, config)
      }
    })
  }

  const myChart4 = (chartType) => {

    $.ajax({
      url: baseUrl + 'diagram_hasil/chart_data/GEDUNG JURUSAN ILMU KOMPUTER',
      dataType: 'json',
      method: 'get',
      success: data => {
        let chartX = []
        let chartY = []
        data.map(data => {
          chartX.push(data.semester)
          chartY.push(data.hasil)
        })
        const chartData = {
          labels: chartX,
          datasets: [{
            label: 'hasil',
            data: chartY,
            backgroundColor: ['lightcoral'],
            borderColor: ['lightcoral'],
            borderWidth: 4
          }]
        }
        const ctx = document.getElementById('bar4').getContext('2d')
        const config = {
          type: chartType,
          data: chartData
        }
        switch (chartType) {
          case 'bar':
            chartData.datasets[0].backgroundColor = ['rgb(255, 99, 132)', 'rgba(56, 86, 255, 0.87)', 'rgb(60, 179, 113)']
            chartData.datasets[0].borderColor = ['rgb(255, 99, 132)', 'rgba(56, 86, 255, 0.87)', 'rgb(60, 179, 113)']
            break;

          default:
            config.options = {
              scales: {
                y: {
                  beginAtzero: true
                }
              }
            }
        }
        const chart = new Chart(ctx, config)
      }
    })
  }

  const myChart5 = (chartType) => {

    $.ajax({
      url: baseUrl + 'diagram_hasil/chart_data/LABORATORIUM SISTEM KOMPUTER',
      dataType: 'json',
      method: 'get',
      success: data => {
        let chartX = []
        let chartY = []
        data.map(data => {
          chartX.push(data.semester)
          chartY.push(data.hasil)
        })
        const chartData = {
          labels: chartX,
          datasets: [{
            label: 'hasil',
            data: chartY,
            backgroundColor: ['lightcoral'],
            borderColor: ['lightcoral'],
            borderWidth: 4
          }]
        }
        const ctx = document.getElementById('bar5').getContext('2d')
        const config = {
          type: chartType,
          data: chartData
        }
        switch (chartType) {
          case 'bar':
            chartData.datasets[0].backgroundColor = ['rgb(255, 99, 132)', 'rgba(56, 86, 255, 0.87)', 'rgb(60, 179, 113)']
            chartData.datasets[0].borderColor = ['rgb(255, 99, 132)', 'rgba(56, 86, 255, 0.87)', 'rgb(60, 179, 113)']
            break;

          default:
            config.options = {
              scales: {
                y: {
                  beginAtzero: true
                }
              }
            }
        }
        const chart = new Chart(ctx, config)
      }
    })
  }

  const myChart6 = (chartType) => {

    $.ajax({
      url: baseUrl + 'diagram_hasil/chart_data/LABORATORIUM  MULTIMEDIA',
      dataType: 'json',
      method: 'get',
      success: data => {
        let chartX = []
        let chartY = []
        data.map(data => {
          chartX.push(data.semester)
          chartY.push(data.hasil)
        })
        const chartData = {
          labels: chartX,
          datasets: [{
            label: 'hasil',
            data: chartY,
            backgroundColor: ['lightcoral'],
            borderColor: ['lightcoral'],
            borderWidth: 4
          }]
        }
        const ctx = document.getElementById('bar6').getContext('2d')
        const config = {
          type: chartType,
          data: chartData
        }
        switch (chartType) {
          case 'bar':
            chartData.datasets[0].backgroundColor = ['rgb(255, 99, 132)', 'rgba(56, 86, 255, 0.87)', 'rgb(60, 179, 113)']
            chartData.datasets[0].borderColor = ['rgb(255, 99, 132)', 'rgba(56, 86, 255, 0.87)', 'rgb(60, 179, 113)']
            break;

          default:
            config.options = {
              scales: {
                y: {
                  beginAtzero: true
                }
              }
            }
        }
        const chart = new Chart(ctx, config)
      }
    })
  }

  const myChart7 = (chartType) => {

    $.ajax({
      url: baseUrl + 'diagram_hasil/chart_data/LABORATORIUM EDP',
      dataType: 'json',
      method: 'get',
      success: data => {
        let chartX = []
        let chartY = []
        data.map(data => {
          chartX.push(data.semester)
          chartY.push(data.hasil)
        })
        const chartData = {
          labels: chartX,
          datasets: [{
            label: 'hasil',
            data: chartY,
            backgroundColor: ['lightcoral'],
            borderColor: ['lightcoral'],
            borderWidth: 4
          }]
        }
        const ctx = document.getElementById('bar7').getContext('2d')
        const config = {
          type: chartType,
          data: chartData
        }
        switch (chartType) {
          case 'bar':
            chartData.datasets[0].backgroundColor = ['rgb(255, 99, 132)', 'rgba(56, 86, 255, 0.87)', 'rgb(60, 179, 113)']
            chartData.datasets[0].borderColor = ['rgb(255, 99, 132)', 'rgba(56, 86, 255, 0.87)', 'rgb(60, 179, 113)']
            break;

          default:
            config.options = {
              scales: {
                y: {
                  beginAtzero: true
                }
              }
            }
        }
        const chart = new Chart(ctx, config)
      }
    })
  }

  const myChart8 = (chartType) => {

    $.ajax({
      url: baseUrl + 'diagram_hasil/chart_data/PERPUSTAKAAN',
      dataType: 'json',
      method: 'get',
      success: data => {
        let chartX = []
        let chartY = []
        data.map(data => {
          chartX.push(data.semester)
          chartY.push(data.hasil)
        })
        const chartData = {
          labels: chartX,
          datasets: [{
            label: 'hasil',
            data: chartY,
            backgroundColor: ['lightcoral'],
            borderColor: ['lightcoral'],
            borderWidth: 4
          }]
        }
        const ctx = document.getElementById('bar8').getContext('2d')
        const config = {
          type: chartType,
          data: chartData
        }
        switch (chartType) {
          case 'bar':
            chartData.datasets[0].backgroundColor = ['rgb(255, 99, 132)', 'rgba(56, 86, 255, 0.87)', 'rgb(60, 179, 113)']
            chartData.datasets[0].borderColor = ['rgb(255, 99, 132)', 'rgba(56, 86, 255, 0.87)', 'rgb(60, 179, 113)']
            break;

          default:
            config.options = {
              scales: {
                y: {
                  beginAtzero: true
                }
              }
            }
        }
        const chart = new Chart(ctx, config)
      }
    })
  }

  const myChart9 = (chartType) => {

    $.ajax({
      url: baseUrl + 'diagram_hasil/chart_data/MUSHOLAH',
      dataType: 'json',
      method: 'get',
      success: data => {
        let chartX = []
        let chartY = []
        data.map(data => {
          chartX.push(data.semester)
          chartY.push(data.hasil)
        })
        const chartData = {
          labels: chartX,
          datasets: [{
            label: 'hasil',
            data: chartY,
            backgroundColor: ['lightcoral'],
            borderColor: ['lightcoral'],
            borderWidth: 4
          }]
        }
        const ctx = document.getElementById('bar9').getContext('2d')
        const config = {
          type: chartType,
          data: chartData
        }
        switch (chartType) {
          case 'bar':
            chartData.datasets[0].backgroundColor = ['rgb(255, 99, 132)', 'rgba(56, 86, 255, 0.87)', 'rgb(60, 179, 113)']
            chartData.datasets[0].borderColor = ['rgb(255, 99, 132)', 'rgba(56, 86, 255, 0.87)', 'rgb(60, 179, 113)']
            break;

          default:
            config.options = {
              scales: {
                y: {
                  beginAtzero: true
                }
              }
            }
        }
        const chart = new Chart(ctx, config)
      }
    })
  }

  myChart('bar')
  myChart2('bar')
  myChart3('bar')
  myChart4('bar')
  myChart5('bar')
  myChart6('bar')
  myChart7('bar')
  myChart8('bar')
  myChart9('bar')

  // $(function() {
  //   $("#example1").DataTable({
  //     "responsive": true,
  //     "lengthChange": false,
  //     "autoWidth": false,
  //     "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
  //   }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  //   $('#example2').DataTable({
  //     "paging": true,
  //     "lengthChange": false,
  //     "searching": false,
  //     "ordering": true,
  //     "info": true,
  //     "autoWidth": false,
  //     "responsive": true,
  //   });
  // });
</script>

</body>

</html>