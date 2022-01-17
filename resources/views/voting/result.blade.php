{{-- MENAMPILKAN TAMPILAN YANG ADA DI FOLDER LAYOUTS --}}
@extends('layouts.navbar.app1')

{{-- UNTUK MENAMPILKAN DATA SETELAH TAMPILAN HEADING --}}
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <main id="main" class="main">
            <div class="pagetitle">
                <h1>Dashboard</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/voting">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </nav>
            </div>
        </main>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>

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

    </html>
@endsection
