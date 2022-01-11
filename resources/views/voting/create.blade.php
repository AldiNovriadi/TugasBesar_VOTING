@extends('layouts.navbar.app1')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <title>Create Voting </title>
    </head>

    <body>
        <main id="main" class="main mt-1">
            <div class="pagetitle">
                <div class="container" style="max-width: 700px;">

                    <div class="text-center" style="margin: 20px 0px 20px 0px;">
                        {{-- <a href="https://shouts.dev/" target="_blank"><img src="https://i.imgur.com/hHZjfUq.png"></a><br> --}}
                        {{-- <span class="text-secondary">Tambah Voting</span> --}}
                        <h1> Create Voting</h1>
                    </div>

                    <form method="post" action="/voting">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div id="inputFormRow">
                                    <span class="text-secondary">Question</span>
                                    <input type="text" name="question" class="form-control m-input"
                                        placeholder="Enter Question" autocomplete="off"> <br />
                                    <span class="text-secondary">Option</span>
                                    <div class="input-group mb-3">
                                        <input type="text" name="description[]" class="form-control m-input"
                                            placeholder="Enter Option" autocomplete="off">
                                        <div class="input-group-append">
                                            <button id="removeRow" type="button" class="btn btn-danger">Remove</button>
                                        </div>
                                    </div>
                                </div>
                                <div id="newRow"></div>
                                <button id="addRow" type="button" class="btn btn-info">Add Option</button>
                            </div>
                        </div> <br />
                        <button id="addRow" type="submit" class="btn btn-primary" style="width:100%">Continue </button>
                    </form>
                </div>
            </div>
        </main>

        <script type="text/javascript">
            // add row
            $("#addRow").click(function() {
                var html = '';
                html += '<div id="inputFormRow">';
                html += '<div class="input-group mb-3">';
                html +=
                    '<input type="text" name="description[]" class="form-control m-input" placeholder="Enter title" autocomplete="off">';
                html += '<div class="input-group-append">';
                html += '<button id="removeRow" type="button" class="btn btn-danger">Remove</button>';
                html += '</div>';
                html += '</div>';

                $('#newRow').append(html);
            });

            // remove row
            $(document).on('click', '#removeRow', function() {
                $(this).closest('#inputFormRow').remove();
            });
        </script>
    </body>

    </html>
@endsection
