

<div class="modal fade" id="edit-brand-detail{{ $brand->id }}" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Brand Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="edit-brand-form{{ $brand->id }}" action="{{ route('brands.update', $brand) }}" method="POST">
          @csrf
          {{ method_field('PUT') }}
          <div class="form-group">
            <label>Brand Name</label>
            <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $brand->name }}" placeholder="Product Brand">
            @error('name')
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