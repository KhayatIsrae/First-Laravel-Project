@auth
    <div class="card mt-3">
        <div class="card-header pb-0 border-0">
            <h5 class="">Who to follow</h5>
        </div>
        <div class="card-body">
            @foreach ($users as $user)
                <div class="d-flex gap-2 mb-3 align-items-center ">
                    <div class="overflow-hidden">
                        <a class="h6 mb-0" href="/users/{{ $user->id }}">{{ $user->name }}</a>
                        <p class="mb-0 small text-truncate">@ {{ $user->name }}</p>
                    </div>
                    <div class="ms-auto">
                        @if (!Auth()->user()->follows($user) && Auth()->id() !== $user->id)
                            <form action="{{ route('users.follow', $user->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary-soft rounded-circle icon-md fs-3"><i
                                        class="bi bi-plus"></i></button>
                            </form>
                        @elseif (Auth()->user()->follows($user))
                            <form action="{{ route('users.unfollow', $user->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary-soft rounded-circle icon-md fs-3 "><i
                                        class="bi bi-dash"></i></button>
                            </form>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endauth
