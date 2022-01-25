@extends('layouts.navbar.app1')

@section('title')
    Kelola Voting
@endsection

@section('content')
    <div class="pagetitle">
        <h1>Kelola Voting</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/voting">Home</a></li>
                <li class="breadcrumb-item active">Kelola Voting</li>
            </ol>
        </nav>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Kelola Voting</h5>
                        <form action="/voting/{{ $voting->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <p align="right">
                                <button class="btn btn-outline-danger" type="submit"> Delete Vote</button>
                            </p>
                        </form>
                        <form method="post" action="/voting/{{ $voting->id }}">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <span class="text-secondary">Time</span>
                                            <input type="time" name="time" class="form-control"
                                                value="{{ $time }}" placeholder="Enter Time">
                                        </div>
                                        <div class="col-md-6">
                                            <span class="text-secondary">Date</span>
                                            <input type="date" name="date" value="{{ $date }}"
                                                class="form-control" placeholder="Enter Date">
                                        </div>
                                    </div>
                                    <div id="">
                                        <span class="text-secondary">Question</span>
                                        <input type="text" name="question" class="form-control m-input"
                                            value="{{ $choose->question }}" autocomplete="off"> <br />
                                        <span class="text-secondary">Option</span>
                                        @foreach ($choose->options as $chooses)
                                            @if ($loop->iteration == 1)
                                                <div id="inputFormRow">
                                                    <div class="input-group mb-3">
                                                        <input type="text" name="description[]" class="form-control m-input"
                                                            value=" {{ $chooses->description }}" autocomplete="off">
                                                    </div>
                                                </div>
                                            @else
                                                <div id="inputFormRow">
                                                    <div class="input-group mb-3">
                                                        <input type="text" name="description[]" class="form-control m-input"
                                                            value=" {{ $chooses->description }}" autocomplete="off">
                                                        <div class="input-group-append">
                                                            <button id="removeRow" type="button"
                                                                class="btn btn-danger">Remove</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div id="newRow"></div>
                                    <button id="addRow" type="button" class="btn btn-outline-primary">Add Option</button>
                                </div>
                            </div> <br />
                            <p align="right">
                                <button id="addRow" type="submit" class="btn btn-primary" style="width:15%"> Simpan
                                </button>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('script')
    <script type="text/javascript">
        // add row
        $("#addRow").click(function() {
            var html = '';
            html += '<div id="inputFormRow">';
            html += '<div class="input-group mb-3">';
            html +=
                '<input type="text" name="description[]" class="form-control m-input" placeholder="Enter Option" autocomplete="off">';
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
@endsection
