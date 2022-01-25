<?php


namespace App\Http\Controllers;

use App\Models\Polls;
use App\Models\Voters;
use App\Models\Options;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
            'time' => 'required',
            'date' => 'required',
            'question' => 'required',
            'description' => 'required',
        ]);
        $question['user_id'] = Auth::User()->id;
        $question['overdue'] = date('Y-m-d H:i:s', strtotime("$request->date $request->time"));
        $question['question'] = $request->question;
        $option = $request->description;

        $create_poll =   Polls::create($question);
        foreach ($option as $options) {
            Options::create(['description' => $options, 'poll_id' => $create_poll->id]);
        }

        return redirect('/voting')->with('success', 'Savedd');
    }

    public function edit(Polls $voting)
    {
        $choose = $voting->load('options');
        $voting = ($voting);
        $time = date('H:i:s', strtotime($voting->overdue));
        $date = date('Y-m-d', strtotime($voting->overdue));
        return view('voting.edit', compact('voting', 'choose', 'time', 'date'));
    }

    public function update(Request $request, Polls $voting)
    {
        $choose = $voting->load('options');
        $request->validate([
            'time' => 'required',
            'date' => 'required',
            'question' => 'required',
            'description' => 'required'
        ]);

        $overdue = date('Y-m-d H:i:s', strtotime("$request->date $request->time"));
        $voting->update([
            'question' => $request->question,
            'overdue' => $overdue

        ]);
        $choose->options->each->delete();
        foreach ($request->description as $desc) {
            Options::create([
                'description' => $desc,
                'poll_id' => $voting->id
            ]);
        }
        return redirect('/voting')->with('success', 'voting Updated!');
    }

    public function destroy(Polls $voting)
    {
        $voting->delete();
        return redirect('/voting')->with('success', 'voting deleted');
    }

    public function result($id)
    {
        // $result = DB::select(DB::raw("SELErCT COUNT(*) as total_voters, optionv_id from voters WHERE pollv_id group BY optionv_id"));
        // $chartData = "";
        // foreach ($result as $list) {
        //     $chartData .= "['" . $list->optionv_id . "', " . $list->total_voters . "],";
        // }
        // $arr['chartData'] = rtrim($chartData, ",");

        $result = \App\Models\Options::where('poll_id', $id)->get();

        $categories = [];

        foreach ($result as $votings) {
            $categories[] = $votings->description;
            $jumlah[] = $votings->voters->count();
            // dd(json_encode($categories));    
        }
        return view('voting.result', ['categories' => $categories, 'jumlah' => $jumlah]);
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
