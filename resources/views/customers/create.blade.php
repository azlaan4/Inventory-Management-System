<form action="{{ route('customers.store') }}" method="POST">
  @csrf
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
    <button type="submit" class="btn btn-success btn-block">Add</button>
</form>