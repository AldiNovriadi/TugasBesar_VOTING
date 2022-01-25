{{-- MENAMPILKAN TAMPILAN YANG ADA DI FOLDER LAYOUTS --}}
@extends('layouts.navbar.app1')

@section('title')
    Dashboard
@endsection

{{-- UNTUK MENAMPILKAN DATA SETELAH TAMPILAN HEADING --}}
<?php $no = 1; ?>
@section('content')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/voting">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Welcome to Voting</h5>
                        <table id="example" class="table table-striped table-bordered" style="width:100% ">
                            <thead>
                                <tr class=" text-center">
                                    <th width="50px">No</th>
                                    <th width="600px">Question</th>
                                    <th> Deadline </th>
                                    {{-- <th> Result Voting</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($voting as $votings)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td> <a href="{{ App\Models\Polls::overdue($votings->overdue)['status'] == 'Overdue' ? '#' : '/voting/proces/' . $votings->id }}"
                                                class="{{ App\Models\Polls::overdue($votings->overdue)['status'] == 'Overdue' ? 'text-danger' : '' }}">
                                                {{ $votings->question }}
                                            </a></td>
                                        <td
                                            class="{{ App\Models\Polls::overdue($votings->overdue)['status'] == 'Overdue' ? 'text-danger' : '' }}">
                                            {{ App\Models\Polls::overdue($votings->overdue)['status'] }}</td>
                                        {{-- <td class="text-center"> <a class="btn btn-primary"
                                                        href="/voting/result/{{ $votings->id }}">View
                                                        Result</a> </td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
@endsection
{{-- @extends('layouts.footer') --}}
