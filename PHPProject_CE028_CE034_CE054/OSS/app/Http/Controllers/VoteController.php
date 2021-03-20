<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Subject;
use App\Models\Vote;
use App\Models\User;

class VoteController extends Controller
{
    public function show(Request $request)
    {
        $uid = auth()->user()->id;
        $votes = DB::table('votes')->where('user_id', $uid)->first();
        if(isset($votes)){
            $subject_name = Subject::select('name')->where('id', $votes->subject_id)->get();
            return view('alreadyvoted', ['subject_name'=>$subject_name]);
        }
        else{
            $subjects = Subject::all();
            return view('vote', ['subjects'=> $subjects]);
        }
    }

    public function confirmvote(Request $request, $sid)
    {
        $uid = auth()->user()->id;
        $vote = new Vote;
        $vote->subject_id = $sid;
        $vote->user_id = $uid;
        $vote->save();
        return view('confirmvote');
    }

    public function result()
    {
        $uid = auth()->user()->id;
        $votes = DB::table('votes')->where('user_id', $uid)->first();
        if(!isset($votes)){
            return view('noresult');
        }
        else
        {
            $subjects = Subject::all();
            $subject_count = count($subjects);
            $vote_count = DB::table('votes')->count();
            $a = array();
            foreach($subjects as $subject)
            {
                $vote = DB::table('votes')->where('subject_id',$subject->id)->count();
                $a[$subject->id] = $vote;
            }
            return view('result', ['subjects'=>$subjects, 'votes'=>$a, 'total_votes'=>$vote_count]);
        }
    }
}
