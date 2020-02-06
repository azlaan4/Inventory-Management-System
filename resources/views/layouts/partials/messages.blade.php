@if(Session::has('message'))
    <div class="shadow alert alert-success alert-dismissible fade show" role="alert" data-dismiss="alert" aria-label="Close">
        <strong>Success!</strong> {{ Session::get('message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="shadow alert alert-danger alert-dismissible fade show" role="alert" data-dismiss="alert" aria-label="Close">
            <strong>Error!</strong> {{ $error }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endforeach
@endif