{{-- MENAMPILKAN TAMPILAN YANG ADA DI FOLDER LAYOUTS --}}
@extends('layouts.app')

{{-- UNTUK MENAMPILKAN DATA SETELAH TAMPILAN HEADING --}}
@section('content')
    <a class="btn btn-success mt-3" href="/voting/create">Tambah Voting</a>
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
                    <th>No</th>
                    <th>Name</th>
                    <th>Question</th>
                    <th> </th>
                </tr>
            </thead>
            <tbody>
                {{-- @foreach ($voting as $votings)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $votings->name }}</td>
                        <td>{{ $votings->question }}</td>
                        <td>
                            <a href="/voting/{{ $voting->id }}/edit/" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <form action="/voting/{{ $voting->id }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach --}}
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
