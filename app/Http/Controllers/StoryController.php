<?php

namespace App\Http\Controllers;

use App\Models\story;
use App\Models\User;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    public function store(){
        $imagePath = request('story')->store('story' , 'public');
        $validated['story'] = $imagePath;
        $validated['user_id']=auth()->id();
        story::create($validated);
        return redirect('/')->with('success','story added successfully');
    }
    public function show(User $user){
        $users = User::all();
        // $stories = story::all();
        // $user_followings = auth()->user()->followings()->pluck('user_id');
        $stories=$user->Stories();
        $stories = story::where(function ($q) use ($user) {
            $q->whereRelation('user', 'user_id', $user->id)->orderBy('created_at', 'desc');
        });

        return view('story-show',[
            'stories'=>$stories->get(),
            'users'=>$users
        ]);
    }
}
