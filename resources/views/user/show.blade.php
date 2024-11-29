@extends('layouts.layout')
@section('content')
    <div class="mt-3">
        @include('common.sucess')
        @include('common.user_card')
    </div>
    @forelse($ideas as $idea)
        <div class="mt-3">
            <x-idea-card :idea="$idea" />
            {{-- @include('common.idea_card') --}}
        </div>
    @empty
        <p class="text-center mt-4">No results found</p>
    @endforelse
    <div>
        {{ $ideas->WithQueryString() }}
    </div>
@endsection
