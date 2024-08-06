<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('tamplate/assets/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{ asset('tamplate/assets/img/favicon.png')}}">
    <title>@yield('title')</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!-- Nucleo Icons -->
    <link href="{{ asset('tamplate/assets/css/nucleo-icons.css')}}" rel="stylesheet" />
    <link href="{{ asset('tamplate/assets/css/nucleo-svg.css')}}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ asset('tamplate/assets/css/nucleo-svg.css')}}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('../tamplate/assets/css/argon-dashboard.css?v=2.0.4')}}" rel="stylesheet" />
</head>

<body class="g-sidenav-show   bg-gray-100">
  @include('partials.sidebars')
  <main class="main-content position-relative border-radius-lg ">
    @include('partials.navbars')

    <div class="container-fluid py-4">
      @yield('content')
      @include('partials.footer')
    </div>
    
  </main>
  @include('partials.option')

  <!--   Core JS Files   -->
  <script src="{{ asset('tamplate/assets/js/core/popper.min.js')}}"></script>
  <script src="{{ asset('tamplate/assets/js/core/bootstrap.min.js')}}"></script>
  <script src="{{ asset('tamplate/assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
  <script src="{{ asset('tamplate/assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
  <script src="{{ asset('tamplate/assets/js/plugins/chartjs.min.js')}}"></script>
  <script>
    function toggleFields() {
        var tipeTransaksi = document.getElementById('tipe_transaksi').value;
        var simpananFields = document.getElementById('simpanan_fields');
        var pinjamanFields = document.getElementById('pinjaman_fields');
        var tglPinjam = document.getElementById('tgl_pinjam');
        var tglTransaksi = document.getElementById('tgl_transaksi');
        var tglJatuhTempo = document.getElementById('tgl_jatuh_tempo');

        if (tipeTransaksi === 'simpanan') {
            simpananFields.style.display = 'block';
            pinjamanFields.style.display = 'none';
        } else if (tipeTransaksi === 'peminjaman') {
            simpananFields.style.display = 'none';
            pinjamanFields.style.display = 'block';
            tglPinjam.value = tglTransaksi.value;
            updatePinjamanDates();
        } else {
            simpananFields.style.display = 'none';
            pinjamanFields.style.display = 'none';
        }
    }

    function updatePinjamanDates() {
        var tglTransaksi = document.getElementById('tgl_transaksi').value;
        var tglPinjam = document.getElementById('tgl_pinjam');
        var tglJatuhTempo = document.getElementById('tgl_jatuh_tempo');

        tglPinjam.value = tglTransaksi;
        var tglPinjamDate = new Date(tglTransaksi);
        tglPinjamDate.setDate(tglPinjamDate.getDate() + 30);
        var month = ("0" + (tglPinjamDate.getMonth() + 1)).slice(-2);
        var day = ("0" + tglPinjamDate.getDate()).slice(-2);
        var year = tglPinjamDate.getFullYear();
        tglJatuhTempo.value = year + "-" + month + "-" + day;
    }

    var ctx1 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
    gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
    new Chart(ctx1, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Mobile apps",
          tension: 0.4,
          borderWidth: 0,
          pointRadius: 0,
          borderColor: "#5e72e4",
          backgroundColor: gradientStroke1,
          borderWidth: 3,
          fill: true,
          data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#fbfbfb',
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#ccc',
              padding: 20,
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('tamplate/assets/js/argon-dashboard.min.js?v=2.0.4')}}"></script>
</body>

</html>
