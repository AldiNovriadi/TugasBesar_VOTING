{{-- MENAMPILKAN TAMPILAN YANG ADA DI FOLDER LAYOUTS --}}
@extends('layouts.app')

{{-- UNTUK MENAMPILKAN DATA SETELAH TAMPILAN HEADING --}}
<?php $no = 1; ?>
@section('content')
    <a class="btn btn-primary mt-3" href="/voting/create">Create Voting</a>
    <h1 style="text-align: center;"> Welcome to Voting</h1>
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
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr class="text-center">
                    <th width="50px">No</th>
                    <th>Question</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($voting as $votings)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td><a href="/voting/proces/{{ $votings->id }}"> {{ $votings->question }} </a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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
