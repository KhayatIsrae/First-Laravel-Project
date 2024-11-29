@auth
    <h4 class="fs-3">Stories:</h4>
    <form action="{{ route('stories.store') }}" enctype="multipart/form-data" class="mb-3" method="POST">
        @csrf
        <p class="mb-0 fs-5">Add to you story:</p>
        <i class="bi bi-plus-circle fs-1" id="plus-icon" style="cursor:pointer " alt="add to your story"></i>
        <input type="file" name="story" id="file-input" class="d-none" >
        <span id="file-name" class="text-danger fs-5 me-5"> </span>
        <button class="btn btn-secondary mb-4" type="submit">Add</button>
    </form>
    <script>
        document.getElementById('plus-icon').addEventListener('click',function(){
            document.getElementById('file-input').click();
        });
        document.getElementById('file-input').addEventListener('change',function(){
            var fileName=document.getElementById('file-input').files[0].name;
            document.getElementById('file-name').textContent='File uploaded:' + fileName;
        });
    </script>
@endauth
