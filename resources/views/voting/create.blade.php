@extends('layouts.navbar.app1')

@section('title')
    Create Voting
@endsection

@section('content')
    <div class="pagetitle">
        <h1>Create Voting</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/voting">Home</a></li>
                <li class="breadcrumb-item active">Create Voting</li>
            </ol>
        </nav>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Create Voting</h5>
                        <form class="row g-3" method="post" action="/voting">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <span class="text-secondary">Time</span>
                                    <input type="time" name="time" class="form-control" placeholder="Enter Time">
                                </div>
                                <div class="col-md-6">
                                    <span class="text-secondary">Date</span>
                                    <input type="date" name="date" class="form-control" placeholder="Enter Date">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div id="inputFormRow">
                                    <span class="text-secondary">Question</span>
                                    <input type="text" name="question" class="form-control m-input"
                                        placeholder="Enter Question" autocomplete="off">
                                    <span class="text-secondary">Option</span>
                                    <div class="input-group mb-3">
                                        <input type="text" name="description[]" class="form-control m-input"
                                            placeholder="Enter Option" autocomplete="off">
                                    </div>
                                </div>
                                <div id="newRow"></div>
                                <button id="addRow" type="button" class="btn btn-outline-primary">Add Option</button>
                            </div>
                            <p align="right">
                                <button id="addRow" type="submit" class="btn btn-primary" style="width:15%">Continue
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
