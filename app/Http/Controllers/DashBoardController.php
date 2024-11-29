<?php

namespace App\Http\Controllers;

use App\Models\idea;
use App\Models\story;
use App\Models\User;
use Illuminate\Http\Request;

class dashboardcontroller extends Controller
{
    function index()
    {
        $ideas = idea::all();
        $stories = story::all();
        $users = User::all();
        $auth = false;
        if (auth()->check()) {
            $user_followings = auth()->user()->followings()->pluck('user_id');
            $ideas = Idea::Filter(request()->all())->where(function ($q) use ($user_followings) {
                $q->whereRelation('user', 'user_id', auth()->id())->orWhereIn('user_id', $user_followings)->orderBy('created_at', 'desc');
            });
            $stories = story::where(function ($q) use ($user_followings) {
                $q->whereRelation('user', 'user_id', auth()->id())->orWhereIn('user_id', $user_followings)->orderBy('created_at', 'desc');
            });
            $auth = true;
        }
        if ($auth) {
            return view('DashBoard', [
                'ideas' => $ideas->paginate(2),
                'users' => $users,
                'stories' => $stories->get(),
            ]);
        } else {
            return view('DashBoard', [
                'ideas' => $ideas,
                'users' => $users,
                'stories' => $stories,
            ]);
        }
    }
}
// $ideas->all();

// if(request()->has('search')){
//     dd('test..');
//     $ideas=$ideas->where('content','like','%'.request()->get('search','').'%');
// }

// dd(collect($filteredIdeas)->paginate());
