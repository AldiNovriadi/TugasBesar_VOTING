{{-- MENAMPILKAN TAMPILAN YANG ADA DI FOLDER LAYOUTS --}}
@extends('layouts.navbar.app')

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

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li> {{ $error }}</li>
                        @endforeach
                    </ul>
                </div> <br />
            @endif

            <form method="post" action="/voting/vote">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div id="inputFormRow">
                            <span class="text-secondary">Question</span>
                            <input type="hidden" value="{{ Auth::User()->id }}" name="user_id">
                            <input type="text" class="form-control" value="{{ $choose->question }} " disabled>
                            <input type="hidden" name="pollv_id" value="{{ $choose->id }}">
                            <br />

                            <span class="text-secondary">Option</span>
                            <select class="form-control" name="optionv_id" class="form-control">
                                <option value=""> -- Choose -- </option>
                                @foreach ($choose->options as $chooses)
                                    <option value="{{ $chooses->id }}"> {{ $chooses->description }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div> <br />
                <button type="submit" class="btn btn-primary">Vote</button>
            </form>
        </div>
    </body>

    </html>
@endsection
