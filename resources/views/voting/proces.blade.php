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
        <title>Document</title>
    </head>

    <body>
        <div class="container" style="max-width: 700px;">

            <div class="text-center" style="margin: 20px 0px 20px 0px;">
                {{-- <a href="https://shouts.dev/" target="_blank"><img src="https://i.imgur.com/hHZjfUq.png"></a><br> --}}
                {{-- <span class="text-secondary">Tambah Voting</span> --}}
                <h1> Proces Voting</h1>
            </div>

            <form method="post" action="">
                <div class="row">
                    <div class="col-lg-12">
                        <div id="inputFormRow">
                            <span class="text-secondary">Question</span>
                            <input type="text" name="title[]" class="form-control" value="ss" disabled> <br />
                            <span class="text-secondary">Option</span>
                            <select class="form-control" name="title[]" class="form-control"> </select>
                        </div>
                    </div>
                </div> <br />
                <button id="addRow" type="button" class="btn btn-primary">Save </button>
            </form>
        </div>
    </body>

    </html>
@endsection
