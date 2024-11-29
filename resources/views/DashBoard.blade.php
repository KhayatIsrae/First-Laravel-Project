@extends('layouts.layout')
@section('content')
    @php
        use Carbon\Carbon;
    @endphp
    @include('common.sucess')
    @include('common.add-story')
    @auth
        @foreach ($users as $user)
            @if ($user->hasStories())
                @if ($user->id == auth()->id() || auth()->user()->follows($user))
                    @if ($user->stories()->where('created_at', '>', Carbon::now()->subHours(24))->exists())
                        @include('stories')
                    @endif
                @endif
            @endif
        @endforeach

    @endauth
    @include('common.share_ideas')
    <hr>
    @auth
        @forelse($ideas as $idea)
            <div class="mt-3">
                <x-idea-card :idea="$idea" />
                {{-- @include('common.idea_card', [
                    'idea' => $idea,
                    'users' => $users,
                ]) --}}
            </div>
        @empty
            <p class="text-center mt-4">No results found</p>
        @endforelse
        <div class="mt-3">
            {{ $ideas->WithQueryString() }}
        </div>
    @endauth
@endsection
