<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Subject;
use App\Models\Vote;
use App\Models\User;

class AdminController extends Controller
{
    public function admin_dashboard()
    {
        $uid = auth()->user()->id;
        if($uid != 1)
        {
            return view('noadmin');
        }
        else
        {
            return view('admin-dashboard');
        }
    }

    public function subject()
    {
        $uid = auth()->user()->id;
        if($uid != 1)
        {
            return view('noadmin');
        }
        else
        {
            return view('subjects');
        }
    }

    public function admin_result()
    {
        $uid = auth()->user()->id;
        if($uid != 1)
        {
            return view('noadmin');
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
            return view('admin-result', ['subjects'=>$subjects, 'votes'=>$a, 'total_votes'=>$vote_count]);
        }
    }
}
