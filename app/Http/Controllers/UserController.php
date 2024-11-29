<?php

namespace App\Http\Controllers;

use App\Models\story;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\storage;

class UserController extends Controller
{
    public function show(User $user)
    {
        $stories = story::all()->where('user_id',auth()->id());
        $ideas = $user->idea()->paginate(2);
        $users = User::all();
        return view('user.show', compact('user', 'ideas', 'users','stories'));
    }

    public function edit(User $user)
    {
        $users = User::all();
        $ideas = $user->idea()->paginate(2);
        $editing = true;
        return view('user.show', compact('user', 'editing', 'ideas', 'users'));
    }
    public function update(user $user)
    {
        $validated = request()->validate([
            'name' => 'required|min:2|max:240',
            'bio' => 'nullable|min:1|max:255',
            'image' => 'image',
        ]);
        if (request()->has('image')) {
            $imagePath = request('image')->store('profile', 'public');
            $validated['image'] = $imagePath;
            if ($user->image) {
                Storage::disk('public')->delete($user->image);
            }
        }
        $user->update($validated);
        return redirect()
            ->route('users.show', $user->id)
            ->with('success', 'profile updated succesfully');
    }
}
