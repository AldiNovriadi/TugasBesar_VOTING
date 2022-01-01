<?php


namespace App\Http\Controllers;

use App\Models\Polls;
use App\Models\Voters;
use App\Models\Options;
use Illuminate\Http\Request;

class VotingController extends Controller
{


    public function index()
    {
        $voting = Polls::all();
        return view('voting.index', ['voting' => $voting]);
    }

    public function create()
    {
        return view('voting.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'description' => 'required'
        ]);

        Polls::create($request->question());
        Options::create($request->description());
        return redirect('/voting')->with('success', 'Savedd');
    }

    public function edit($id)
    {
        $voting = Polls::find($id);
        return view('voting.edit', compact('voting'));
    }

    public function update(Request $request, Polls $voting)
    {
        $request->validate([
            'code' => 'required',
            'name' => 'required',
            'gender' => 'required',
            'birth_place' => 'required',
            'birth_date' => 'required',
        ]);

        $voting->update($request->all());
        return redirect('/voting')->with('success', 'voting Updated!');
    }

    public function destroy(Polls $voting)
    {
        $voting->delete();
        return redirect('/voting')->with('success', 'voting deleted');
    }

    public function result()
    {
        return view('voting.result');
    }

    public function proces(Polls $id)
    {
        $choose = $id->load('options');
        return view('option.create', ['choose' => $choose]);
    }

    public function vote(Request $request)
    {
        $request->validate([
            'pollv_id' => 'required',
            'optionv_id' => 'required',
            'user_id' => 'required'
        ]);

        Voters::create($request->all());
        return redirect('/voting')->with('success', 'Savedd');
    }
}
