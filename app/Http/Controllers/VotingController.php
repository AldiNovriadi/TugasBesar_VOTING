<?php


namespace App\Http\Controllers;

use App\Models\Polls;
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

    public function proces()
    {
        return view('voting.proces');
    }
}
