@auth
    <h4> Share yours ideas </h4>
    <div class="row">
        <form action="{{ route('ideas.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <textarea class="form-control" id="content" rows="3" name="content"></textarea>
            </div>
            @include('common.errors')
            <div class="btn">
                <button type="submit" class="btn btn-outline-dark"> Share </button>
            </div>
        </form>
    </div>
@endauth
@guest
    <div class="row justify-content-center align-items-center">
        <div class="col text-start">
            <h1 class="lead fs-2">Log in to share your ideas and view others ideas</h1>
        </div>
    </div>
@endguest
