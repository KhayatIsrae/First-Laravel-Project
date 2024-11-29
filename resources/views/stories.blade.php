@auth
    <a href="{{ route('stories.show',$user ) }}">
        <img src="{{$user->getImageURL() }}" alt="" class="mb-3"
            style=" border-radius:50%; width:90px; height:90px; border:5px solid rgb(230, 42, 73)">
    </a>
@endauth
{{-- <img src="img.png" alt="" class="mb-3"
        style=" border-radius:50%; width:90px; height:90px; border:5px solid rgb(230, 42, 73)"> --}}
