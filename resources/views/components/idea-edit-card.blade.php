<div class="card">
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
        </div>
        
    </div>
    <div class="card-body">
            <form action="{{ route('ideas.update', $idea->id) }}" method="POST">
                @csrf
                @method('put')
                <div class="mb-1">
                    <textarea class="form-control" id="idea" rows="3" name="idea">{{ $idea->content }}</textarea>
                </div>
                @include('common.errors')
                <div class="">
                    <button type="submit" class="btn btn-dark"> Update </button>
                </div>
            </form>
    </div>
</div>
