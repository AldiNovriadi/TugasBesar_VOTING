<?php


namespace App\Http\Controllers;

use App\Models\Polls;
use App\Models\Voters;
use App\Models\Options;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        // dd($request);
        $question['question'] = $request->question;
        $option = $request->description;

        $create_poll =   Polls::create($question);
        foreach ($option as $options) {
            Options::create(['description' => $options, 'poll_id' => $create_poll->id]);
        }

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
        $result = DB::select(DB::raw("SELECT COUNT(*) as total_voters, optionv_id from voters WHERE pollv_id group BY optionv_id"));
        $chartData = "";
        foreach ($result as $list) {
            $chartData .= "['" . $list->optionv_id . "', " . $list->total_voters . "],";
        }
        $arr['chartData'] = rtrim($chartData, ",");
        return view('voting.result', $arr);
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
