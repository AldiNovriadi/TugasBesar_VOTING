{{-- MENAMPILKAN TAMPILAN YANG ADA DI FOLDER LAYOUTS --}}
@extends('layouts.app')

{{-- UNTUK MENAMPILKAN DATA SETELAH TAMPILAN HEADING --}}
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="js/Chart.js"></script>
        <title>Document</title>
    </head>

    <body>
        <br />
        <h1 style="text-align: center;"> Result Voting</h1>
        <canvas id="myChart"></canvas>
        <?php
        // Koneksikan ke database
        $kon = mysqli_connect('localhost', 'root', '', 'akademik');
        //Inisialisasi nilai variabel awal
        $nama_jurusan = '';
        $jumlah = null;
        //Query SQL
        $sql = "select jurusan,COUNT(*) as 'total' from mahasiswa GROUP by jurusan";
        $hasil = mysqli_query($kon, $sql);
        
        while ($data = mysqli_fetch_array($hasil)) {
            //Mengambil nilai jurusan dari database
            $jur = $data['jurusan'];
            $nama_jurusan .= "'$jur'" . ', ';
            //Mengambil nilai total dari database
            $jum = $data['total'];
            $jumlah .= "$jum" . ', ';
        }
        ?>
        <script>
            var ctx = document.getElementById('myChart').getContext('2d');
            var chart = new Chart(ctx, {
                // The type of chart we want to create
                type: 'bar',
                // The data for our dataset
                data: {
                    labels: [<?php echo $nama_jurusan; ?>],
                    datasets: [{
                        label: 'Data Jurusan Mahasiswa ',
                        backgroundColor: ['rgb(255, 99, 132)', 'rgba(56, 86, 255, 0.87)', 'rgb(60, 179, 113)',
                            'rgb(175, 238, 239)'
                        ],
                        borderColor: ['rgb(255, 99, 132)'],
                        data: [<?php echo $jumlah; ?>]
                    }]
                },

                // Configuration options go here
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        </script>
    </body>

    </html>
@endsection
