@extends('layouts.layout')
@section('content')
    <div class="blur-background">
        <a href="/" class="link"></a>
    </div>
    <div class="content">
        <h4 class="fs-3">Stories:</h4>
        <div class="carousel slide" id="myCarousel" data-bs-ride="carousel">
            <div class="carousel-indicators">
                @foreach ($stories as $story)
                    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="{{ $loop->index }}"
                        class="{{ $loop->first ? 'active' : '' }}" aria-label="Slide {{ $loop->index }}"></button>
                @endforeach
            </div>
            <div class="carousel-inner">
                @foreach ($stories as $story)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <div class="d-flex">
                            <img style="width:50px" class="me-2 ms-5 avatar-sm rounded-circle"
                                src="{{ $story->user->getImageURL() }}" alt="{{ $story->user->name }} Avatar">
                            <h5 class="card-title mt-3"><a href="{{ route('users.show', $story->user_id) }}">
                                    {{ $story->user->name }}
                                </a></h5>
                        </div>
                        <div class="mt-3 mb-0">
                            <span class="fs-6 fw-light "> <i class="bi bi-clock"></i>
                                {{ $story->created_at }}</span>
                        </div>
                        <img style="height:500px; width:350px" src="{{ url('storage/' . $story->story) }}"
                            class="d-block w-100">
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev btn-secondary" type="button" data-bs-target="#myCarousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next btn-secondary" type="button" data-bs-target="#myCarousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <style>
        .blur-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(10px);
            z-index: 1;
        }

        .content {
            position: relative;
            z-index: 2;
            padding: 20px;
        }

        .carousel-item {
            position: relative;
            z-index: 2;
        }

        .carousel-control-prev,
        .carousel-control-next {
            z-index: 3;
        }

        .link {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
        }
    </style>
@endsection
