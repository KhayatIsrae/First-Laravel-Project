@extends('layouts.layout')
@section('content')
    <div class="mt-3">
        @include('common.sucess')
        <x-idea-card :idea="$idea"/>
        {{-- @include('common.idea_card') --}}
    </div>
@endsection
