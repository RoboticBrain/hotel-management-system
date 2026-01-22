<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.118.2">
  <title>sidebar_v1</title>

  <!-- Script para el tema oscuro -->
  {{ Vite::useBuildDirectory('')->withEntryPoints(['resources/js/color-modes.js']) }}

  <!-- Bootstrap 5.3.2 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <!-- Styles -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">

  <!-- JQuery -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="style.css">

  <style>
    body { height: 100%; }
    aside {
      position: fixed;
      overflow: auto;
      height: calc(100vh - 68px);
      justify-content: flex-start;
      align-self: flex-start;
    }
    main {
      position: relative;
      overflow: auto;
      margin-left: auto;
      justify-content: flex-end;
      align-self: flex-end;
    }
    #sidebarshow { display: none; }
    .green-circle {
      width: 15px;
      height: 15px;
      background-color: green;
      border-radius: 10px;
      margin-bottom: 10px;
      margin-left: 5px;
    }
    @media screen and (max-width: 575px) {
      #sidebarshow { display: inline; }
      #sidebartoggle { display: none; }
    }
  </style>

  <script>
    function changeclass() {
      const mclass = $("#main");
      if (mclass.hasClass('col-sm-12')) {
        localStorage.setItem('menushow', 1)
      } else {
        localStorage.setItem('menushow', 0)
      }
      $("#main").toggleClass('col-sm-10 col-sm-12');
    }
  </script>
</head>

<body class="bg-body-tertiary">

  <!-- navbar -->
  <nav class="navbar sticky-top navbar-expand-lg border-bottom bg-body-tertiary">
    <div class="container-fluid">
      <div>
        <button class="btn btn-outline-secondary" type="button" data-bs-toggle="collapse"
          data-bs-target="#collapseWidthExample" aria-expanded="true" aria-controls="collapseWidthExample"
          style="margin-right: 10px; padding: 0px 5px 0px 5px;" id="sidebartoggle" onclick="changeclass()">
          <i class="bi bi-arrows-expand-vertical"></i>
        </button>
        <a class="navbar-brand text-center" href="#">Umbrella Hotel Management System</a>
      </div>

      <div style="display: flex; flex-direction: row; align-items:center">
        <p style="text-align: center; font-weight: bold;">system online</p>
        <div class="green-circle"></div>
      </div>
    </div>
  </nav>

  <!-- sidebar -->
  <aside class="collapse show collapse-horizontal col-sm-2 p-3 border-end bg-body-tertiary"
    id="collapseWidthExample">
    <!-- sidebar content unchanged -->
  </aside>

  {{-- Page Content --}}
  @yield('content')

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js"
    integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp"
    crossorigin="anonymous"></script>

  <script>
    new Chartist.Line('#traffic-chart', {
      labels: ['January', 'Februrary', 'March', 'April', 'May', 'June'],
      series: [[23000, 25000, 19000, 34000, 56000, 64000]]
    }, {
      low: 0,
      showArea: true
    });
  </script>

</body>
</html>
