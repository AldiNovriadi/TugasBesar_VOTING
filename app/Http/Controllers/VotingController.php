<?php


namespace App\Http\Controllers;

use App\Models\Voting;
use Illuminate\Http\Request;

class VotingController extends Controller
{
    public function index()
    {
        return view('voting.index');
    }

    public function index1()
    {
        $voting = Voting::all();
        return view('voting.index', ['voting' => $voting]);
    }

    public function create()
    {
        return view('voting.create');
    }
}
