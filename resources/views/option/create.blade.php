{{-- MENAMPILKAN TAMPILAN YANG ADA DI FOLDER LAYOUTS --}}
@extends('layouts.navbar.app1')

@section('title')
    Proses Voting
@endsection

{{-- UNTUK MENAMPILKAN DATA SETELAH TAMPILAN HEADING --}}
@section('content')
    <div class="pagetitle">
        <h1>Proses Voting</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/voting">Home</a></li>
                <li class="breadcrumb-item active">Proses Voting</li>
            </ol>
        </nav>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Proses Voting</h5>
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
                                        <input type="text" class="form-control" value="{{ $choose->question }} "
                                            disabled>
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
                            <button type="submit" class="btn btn-primary" style="width:10%">Vote</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
