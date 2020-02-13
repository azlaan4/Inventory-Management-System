

<div class="modal fade" id="edit-product-detail{{ $product->id }}" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Product Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="edit-product-form{{ $product->id }}" action="{{ route('products.update', $product) }}" method="POSt">
          @csrf
          {{ method_field('PUT') }}

          <div class="form-group">
            <label>Product Category</label>
            <select name="category_id" class="custom-select">
              @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $product->category->id == $category->id ? 'selected' : "" }}>{{ $category->name }}</option>
              @endforeach
            </select>
            @error('category_id')
                <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

          <div class="form-group">
            <label>Product Brand</label>
            <select name="brand_id" class="custom-select">
              @foreach ($brands as $brand)
                <option value="{{ $brand->id }}" {{ $product->brand->id == $brand->id ? 'selected' : "" }}>{{ $brand->name }}</option>
              @endforeach
            </select>
            @error('brand_id')
                <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

          <div class="form-group">
            <label>Product Name</label>
            <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $product->name }}" placeholder="Product Name">
            @error('name')
                <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

          <div class="form-group">
            <label>Actual Price</label>
            <input name="price" type="text" class="form-control @error('price') is-invalid @enderror" value="{{ $product->price }}" placeholder="Cost per Unit">
            @error('price')
                <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

          <div class="form-group">
            <label>Max. Retail Price <small>(MRP)</small></label>
            <input name="mrp" type="text" class="form-control @error('mrp') is-invalid @enderror" value="{{ $product->mrp }}" placeholder="Cost per Unit">
            @error('mrp')
                <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

          <div class="form-group">
            <label>Size</label>
            <select name="size" class="custom-select">
              <option value="Small" {{ $product->size === 'Small' ? 'selected' : "" }}>Small</option>
              <option value="Medium" {{ $product->size === 'Medium' ? 'selected' : "" }}>Medium</option>
              <option value="Large" {{ $product->size === 'Large' ? 'selected' : "" }}>Large</option>
            </select>
            @error('size')
                <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

          <div class="form-group">
            <label>Unit</label>
            <select name="unit" class="custom-select">
              <option value="Boxes" {{ $product->unit === 'Boxes' ? 'selected' : "" }}>Boxes</option>
              <option value="Crates" {{ $product->unit === 'Crates' ? 'selected' : "" }}>Crates</option>
              <option value="Packs" {{ $product->unit === 'Packs' ? 'selected' : "" }}>Packs</option>
              <option value="Sets" {{ $product->unit === 'Sets' ? 'selected' : "" }}>Sets</option>
            </select>
            @error('unit')
                <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

          <div class="form-group">
            <button type="submit" class="btn btn-success btn-sm">
              <i class="fa fa-save mr-1"></i>
              SAVE CHANGES
            </button>
            <a href="#" class="btn btn-danger btn-sm" data-dismiss="modal" aria-label="Close">
              <i class="fas fa-times mr-1"></i>
              CANCEL
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>