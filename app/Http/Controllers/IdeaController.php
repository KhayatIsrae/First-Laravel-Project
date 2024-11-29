<?php

namespace App\Http\Controllers;

use App\Models\idea;
use App\Models\User;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function edit (idea $idea){
        if(auth()->id()!== $idea->user_id){
            abort(404);
        }
        $users=User::all();
        return view('edit',compact('idea','users'));
    }
    public function show(idea $idea){
        $users=User::all();
        return view('show',compact('idea','users'));
    }
    public function store(){
        $validated=request()->validate([
            'content'=>'required|min:2|max:240'
        ]);
        $validated['user_id']=auth()->id();
        idea::create($validated);
        return redirect('/')->with('success','idea created succesfully');
    }
    public function destroy(idea $idea){
        if(auth()->id()!== $idea->user_id){
            abort(404);
        }
        $idea->delete();
        return redirect('/')->with('success','idea deleted succesfully');
    }
    public function update(idea $idea){
        if(auth()->id()!== $idea->user_id){
            abort(404);
        }

        request()->validate([
            'idea'=>'required|min:2|max:240'
        ]);
        $idea->content=request()->get('idea','');
        $idea->save();
        return redirect()->route('ideas.show',$idea->id)->with('success','idea updated succesfully');
    }
    // public function like(idea $idea){
    //     $idea->likes=($idea->likes)+1;
    //     $idea->save();
    //     return redirect()->route('ideas.show',$idea->id);
    // }
}
