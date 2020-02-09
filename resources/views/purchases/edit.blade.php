<div class="modal fade" id="edit-purchase-detail{{ $purchase->id }}" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Purchase Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="edit-purchase-form{{ $purchase->id }}" action="{{ route('purchases.update', $purchase) }}" method="POSt">
          @csrf
          {{ method_field('PUT') }}
          <div class="form-group">
            <label>Name</label>
            <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $purchase->name }}" placeholder="Full Name">
            @error('name')
                <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="form-group">
            <label>Contact</label>
            <input name="number" type="text" class="form-control @error('number') is-invalid @enderror" value="{{ $purchase->number }}" placeholder="Contact Number">
            @error('number')
                <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="form-group">
            <label>Address</label>
            <input name="address" type="text" class="form-control @error('address') is-invalid @enderror" value="{{ $purchase->address }}" placeholder="Address">
            @error('address')
                <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="form-group">
            <label>Type of purchase</label>
            <select name="type" class="custom-select">
              <option value="regular" {{ $purchase->type === 'regular' ? 'selected' : "" }}>Regular</option>
              <option value="non-regular" {{ $purchase->type === 'non-regular' ? 'selected' : "" }}>Non Regular</option>
            </select>
            @error('type')
                <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-success btn-block btn-sm">Save Changes</button>
            <a href="#" class="btn btn-danger btn-block btn-sm" data-dismiss="modal" aria-label="Close">Cancel</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>