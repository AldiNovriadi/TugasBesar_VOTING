{{-- MENAMPILKAN TAMPILAN YANG ADA DI FOLDER LAYOUTS --}}
@extends('layouts.navbar.app1')

{{-- UNTUK MENAMPILKAN DATA SETELAH TAMPILAN HEADING --}}
@section('content')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/voting">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Kelola Voting</h5>
                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                        <script type="text/javascript">
                            google.charts.load('current', {
                                'packages': ['corechart']
                            });
                            google.charts.setOnLoadCallback(drawChart);

                            function drawChart() {

                                var data = google.visualization.arrayToDataTable([
                                    ['Task', 'Hours per Day'],
                                    <?php echo $chartData; ?>

                                ]);

                                var options = {
                                    title: 'Result Chart ',
                                    // is3D: true,
                                };

                                var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                                chart.draw(data, options);
                            }
                        </script>
                        </head>

                        <body>
                            <main id="main" class="main mt-1">
                                <div class="pagetitle">
                                    <div id="piechart" style="width: 900px; height: 500px;"></div>
                                </div>
                            </main>
                        </body>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
