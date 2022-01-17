{{-- MENAMPILKAN TAMPILAN YANG ADA DI FOLDER LAYOUTS --}}
@extends('layouts.navbar.app1')

{{-- UNTUK MENAMPILKAN DATA SETELAH TAMPILAN HEADING --}}
<?php $no = 1; ?>
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" type="text/css"
            href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">

        <title>Document</title>
    </head>

    <body>
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

        <main id="main" class="main mt-1">
            <div class="pagetitle">
                <h1 style="text-align: center;"> Welcome to Voting</h1>

                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr class="text-center">
                            <th width="50px">No</th>
                            <th width="700px">Question</th>
                            {{-- <th> Result Voting</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($voting as $votings)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td> <a href="/voting/proces/{{ $votings->id }}"> {{ $votings->question }} </a></td>
                                {{-- <td class="text-center"> <a class="btn btn-primary"
                                        href="/voting/result/{{ $votings->id }}">View
                                        Result</a> </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </body>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>

    </html>
@endsection
{{-- @extends('layouts.footer') --}}
