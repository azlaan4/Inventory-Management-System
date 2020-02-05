<form action="{{ route('customers.store') }}" method="POST">
  @csrf
  <div class="modal fade" id="editCustomer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Customer Info</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <input name="name" type="text" class="form-control" value="{{ old('name') }}" placeholder="Full Name">

            @error('name')
                <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="form-group">
            <input name="number" type="text" class="form-control" value="{{ old('number') }}" placeholder="Contact Number">

            @error('number')
                <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="form-group">
            <input name="address" type="text" class="form-control" value="{{ old('address') }}" placeholder="Address">

            @error('address')
                <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="form-group">
            <label>Type of Customer</label>
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
        <div class="modal-footer">
          <button type="button" class="btn btn-success">Update</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</form>