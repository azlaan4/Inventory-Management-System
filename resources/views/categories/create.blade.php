<div class="accordion" id="accordionExample">
  <div class="card shadow">
    <div class="card-header bg-dark" data-toggle="collapse" data-target="#add_category_form" aria-expanded="true" aria-controls="add_category_form">
      <strong class="text-light">
          Add New Category
      </strong>
    </div>

    <div id="add_category_form" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
        <form action="{{ route('categories.store') }}" method="POST">
          @csrf
          <div class="row justify-content-center">
            <div class="col-9">
              <div class="form-group">
                <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Product Category">

                @error('name')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>

            <div class="col-3">
              <div class="form-group">
                <button type="submit" class="btn btn-success btn-block">Add</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>