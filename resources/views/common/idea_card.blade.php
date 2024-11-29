{{-- <div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                    src="{{$idea->user->getImageURL()}}"
                    alt="{{ $idea->user->name }} Avatar">
                <div>
                    <h5 class="card-title mb-0"><a href="{{ route('users.show', $idea->user_id) }}">
                            {{ $idea->user->name }}
                        </a></h5>
                </div>
            </div>
            <div class="">
                <a href="{{ route('ideas.show', $idea->id) }}"><i class=" fs-3 bi bi-eye-fill"></i></a>
            </div>
            @if (auth()->id() == $idea->user_id)
                <div>
                    <a href="{{ route('ideas.edit', $idea->id) }}">Update</a>
                </div>
                <div>
                    <form action="{{ route('ideas.destroy', $idea->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger btn-sm">X</button>
                    </form>
                </div>
            @endif
        </div>
    </div>
    <div class="card-body">
        @if ($editing ?? false)
            <form action="{{ route('ideas.update', $idea->id) }}" method="POST">
                @csrf
                @method('put')
                <div class="mb-3">
                    <textarea class="form-control" id="idea" rows="3" name="idea">{{ $idea->content }}</textarea>
                </div>
                @include('common.errors')
                <div class="">
                    <button type="submit" class="btn btn-dark"> Update </button>
                </div>
            </form>
        @else
            <div class="row">
                <p class="fs-3 col-9  ">
                    <i class="bi bi-lightbulb-fill"></i>
                    {{ $idea->content }}
                </p>
            </div>
            <div class="d-flex justify-content-between">
                @if (Auth::user()->likesPost($idea))
                    <form action="{{ route('ideas.unlike', $idea->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div>
                            <p class="fw-light nav-link fs-4">
                                <button class="btn btn-primary-soft rounded-circle icon-md fs-4 "><i
                                        class="bi bi-heart-fill "></i> </button>
                                {{ $idea->likes()->count() }}
                            </p>
                        </div>
                    </form>
                @else
                    <form action="{{ route('ideas.like', $idea->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div>
                            <p class="fw-light nav-link fs-4">
                                <button class="btn btn-primary-soft rounded-circle icon-md fs-4 "><i
                                        class="bi bi-heart "></i> </button>
                                {{ $idea->likes()->count() }}
                            </p>
                        </div>
                    </form>
                @endif
                <div>
                    <span class="fs-6 fw-light text-muted"> <i class="bi bi-clock"></i>
                        {{ $idea->created_at }}</span>
                </div>
            </div>
            <hr class="mt-0">
            @include('common.comments')
        @endif
    </div>
</div> --}}
