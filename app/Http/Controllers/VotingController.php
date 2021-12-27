<?php


namespace App\Http\Controllers;

use App\Models\Voting;
use App\Models\Votings;
use Illuminate\Http\Request;

class VotingController extends Controller
{
    public function index()
    {
        return view('voting.index');
    }

    public function index1()
    {
        $voting = Votings::all();
        return view('voting.index', ['voting' => $voting]);
    }

    public function create()
    {
        return view('voting.create');
    }

    public function result()
    {
        return view('voting.result');
    }
}
