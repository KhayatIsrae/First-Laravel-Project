@auth
    <div class="card overflow-hidden ">
        <div class="card-body pt-3">
            <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
                <li class="nav-item">
                    <a class=" {{ Route::is('dashboard') ? 'text-white bg-primary rounded' : '' }} nav-link text-dark"
                        href="{{ route('dashboard') }}">
                        <span>Home</span></a>
                </li>
                @auth
                    <li class="nav-item">
                        <a class=" {{ Route::is('users.show', auth()->user()) ? 'text-white bg-primary rounded' : '' }} nav-link text-dark"
                            href="{{ route('users.show', auth()->user()) }}">
                            <span>Profile</span></a>
                    </li>
                @endauth

            </ul>
        </div>
        {{-- <div class="card-footer text-center py-2">
        <a class="btn btn-link btn-sm" href="#">View Profile </a>
    </div> --}}
    </div>
@endauth
