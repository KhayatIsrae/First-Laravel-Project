<div class="card">
    <div class="px-3 pt-4 pb-2">
        @if ($editing ?? false)
            <div class="mt-3">
                @include('common.sucess')
                <form enctype="multipart/form-data" action="{{ route('users.update', auth()->user()) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="card">
                        <div class="px-3 pt-4 pb-2">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <img style="width:150px" class="me-3 avatar-sm rounded-circle"
                                        src="{{ $user->getImageURL() }}" alt="{{ $user->name }} Avatar">
                                    <div>
                                        <input type="text" value="{{ $user->name }}" class="input-group"
                                            name="name">
                                    </div>
                                </div>
                            </div>
                            <div class=" mt-3 ">
                                <label for="image" class="fs-5">Profile Image</label>
                                <input type="file" name="image" class=" form-control ">
                            </div>
                            <div class="px-2 mt-4">
                                <h5 class="fs-5"> About : </h5>
                                <div class="mb-3">
                                    <textarea class="form-control" id="bio" rows="3" name="bio">{{ $user->bio }}</textarea>
                                </div>
                                <div class="">
                                    <button type="submit" class="btn btn-dark"> Update </button>
                                </div>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        @else
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <img style="width:150px" class="me-3 avatar-sm rounded-circle" src="{{ $user->getImageURL() }}"
                        alt="{{ $user->name }} Avatar">

                    <div>
                        <h3 class="card-title mb-0"><a href="#"> {{ $user->name }}
                            </a></h3>
                        <span class="fs-6 text-muted">@ {{ $user->name }}</span>
                    </div>
                </div>
                <div>
                    @auth
                        @if (auth()->id() === $user->id)
                            <a href="{{ route('users.edit', $user->id) }}">Edit</a>
                        @endif
                    @endauth
                </div>
            </div>
            <div class="px-2 mt-4">
                <h5 class="fs-5"> About : </h5>
                <p class="fs-6 fw-light">
                    {{ $user->bio }}
                </p>
                <div class="d-flex justify-content-start">
                    <a href="#" class="fw-light nav-link fs-6 me-3"> <i
                            class="bi bi-people"></i>{{ $user->followers()->count() }} Followers </a>
                    <a href="#" class="fw-light nav-link fs-6 me-3"> <i class="bi bi-lightbulb-fill"></i>
                        {{ $user->idea()->count() }} </a>
                    <a href="#" class="fw-light nav-link fs-6"> <i class="bi bi-chat-dots-fill"></i>
                        {{ $user->comments()->count() }}</a>
                </div>
                @auth
                    @if (auth()->id() !== $user->id)
                        @if (Auth::user()->follows($user))
                            <form action="{{ route('users.unfollow', $user->id) }}" method="POST">
                                @csrf
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary btn-danger btn-sm mb-3"> UnFollow
                                    </button>
                                </div>

                            </form>
                        @else
                            <form action="{{ route('users.follow', $user->id) }}" method="POST">
                                @csrf
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary btn-sm mb-3"> Follow </button>
                                </div>

                            </form>
                        @endif
                    @endif
                @endauth
            </div>
            @if ($user->hasStories())
                @include('stories')
            @endif
        @endif

    </div>
</div>
