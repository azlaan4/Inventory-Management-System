<div class="accordion" id="accordionExample">
  <div class="card shadow">
    <div class="card-header bg-dark" data-toggle="collapse" data-target="#add_supplier_form" aria-expanded="true" aria-controls="add_supplier_form">
      <strong class="text-light">
          Add New Supplier
      </strong>
    </div>

    <div id="add_supplier_form" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
        <form action="{{ route('suppliers.store') }}" method="POST">
          @csrf
          <div class="row justify-content-center">
            <div class="col-3">
              <div class="form-group">
                <label>Full Name</label>
                <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Full Name">

                @error('name')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>

            <div class="col-3">
              <div class="form-group">
                <label>Contact Number</label>
                <input name="number" type="text" class="form-control @error('number') is-invalid @enderror" value="{{ old('number') }}" placeholder="Contact Number">
                @error('number')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>

            <div class="col-3">
              <div class="form-group">
                <label>Current Address</label>
                <input name="address" type="text" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}" placeholder="Address">
                @error('address')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>

            <div class="col-3">
              <div class="form-group">
                <label>Type of supplier</label>
                <select name="type" class="custom-select">
                  <option value="regular" {{ old('type') === 'regular' ? 'selected' : "" }}>Regular</option>
                  <option value="non-regular" {{ old('type') === 'non-regular' ? 'selected' : "" }}>Non Regular</option>
                </select>
                @error('type')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-3">
              <button type="submit" class="btn btn-success btn-block">
                <i class="fas fa-check mr-1"></i>
                SUBMIT
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>