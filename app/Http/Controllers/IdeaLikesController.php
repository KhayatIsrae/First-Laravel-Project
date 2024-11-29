<?php

namespace App\Http\Controllers;

use App\Models\idea;
use Illuminate\Http\Request;

class IdeaLikesController extends Controller
{
    public function like(idea $idea)
    {
        $user_id = auth()->user();
        $user_id->likes()->attach($idea);
        return redirect()
            ->route('ideas.show', $idea->id)
            ->with('success', 'liked successfully');
    }
    public function unlike(idea $idea)
    {
        $user_id = auth()->user();
        $user_id->likes()->detach($idea);
        return redirect()
            ->route('ideas.show', $idea->id)
            ->with('success', 'liked successfully');
    }
}
