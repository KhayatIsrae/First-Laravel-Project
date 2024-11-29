<?php

namespace App\Http\Controllers;

use App\Models\comment;
use App\Models\idea;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(idea $idea){
        $comment=new comment();
        $comment->cmnt=request()->get('cmnt',"");
        $comment->idea_id=$idea->id;
        $comment->user_id=auth()->id();
        $comment->save();
        return redirect()->route('ideas.show',$idea->id)->with('success',"comment added succesfully");
    }

    public function destroy(comment $comment){
        $comment->delete();
        return redirect()->route('ideas.show',$comment->idea_id)->with('success','comment deleted succesfully');
    }
}
