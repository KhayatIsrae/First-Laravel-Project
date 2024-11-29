{{-- <div>
    <form action="{{ route('ideas.comments.store', $idea->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <textarea class="fs-6 form-control" rows="1" name="cmnt"></textarea>
        </div>
        <div>
            <button type="submit" class="btn btn-primary btn-sm"> Post Comment </button>
        </div>
    </form>
    <hr>
    @foreach ($idea->comments as $comment)
        <div class="d-flex align-items-start">
            <img style="width:35px" class="me-2 avatar-sm rounded-circle"
                src="{{$comment->user->getImageURL()}}"
                alt="{{ $comment->user->name }} Avatar">
            <div class="w-100">
                <div class="d-flex justify-content-between">
                    <h6 class="">{{ $comment->user->name }}
                    </h6>
                    <div>
                        @if (auth()->id() == $comment->user_id || auth()->id() == $idea->user_id)
                            <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm">X</button>
                            </form>
                        @endif
                    </div>
                    <small class="fs-6 fw-light text-muted"><i class="bi bi-clock"></i> {{ $comment->created_at }}</small>
                </div>

                <p class="fs-5 mt-3 fw-light text-muted">
                    <i class="bi bi-chat-dots-fill"></i>
                    {{ $comment->cmnt }}
                </p>
            </div>
        </div>
    @endforeach
</div> --}}
