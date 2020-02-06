<div class="accordion" id="accordionExample">
  <div class="card shadow">
    <div class="card-header bg-dark" data-toggle="collapse" data-target="#add_product_form" aria-expanded="true" aria-controls="add_product_form">
      <strong class="text-light">
          Add New Product
      </strong>
    </div>

    <div id="add_product_form" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
        <form action="{{ route('products.store') }}" method="POST">
          @csrf

          <div class="row justify-content-center">
            <div class="col-3">
              <div class="form-group">
                <label>Product Category</label>
                <select name="category_id" class="custom-select">
                  @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : "" }}>{{ $category->name }}</option>
                  @endforeach
                </select>
                @error('category_id')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>

            <div class="col-3">
              <div class="form-group">
                <label>Product Brand</label>
                <select name="brand_id" class="custom-select">
                  @foreach ($brands as $brand)
                    <option value="{{ $brand->id }}" {{ old('brand_id') == $brand->id ? 'selected' : "" }}>{{ $brand->name }}</option>
                  @endforeach
                </select>
                @error('brand_id')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>

            <div class="col-3">
              <div class="form-group">
                <label>Product Name</label>
                <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Product Name">
                @error('name')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>

            <div class="col-3">
              <div class="form-group">
                <label>Price</label>
                <input name="price" type="text" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}" placeholder="Cost per Unit">
                @error('price')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>
          </div>

          <div class="row justify-content-center">
            <div class="col-3">
              <div class="form-group">
                <label>Size</label>
                <select name="size" class="custom-select">
                  <option value="Small" {{ old('size') === 'Small' ? 'selected' : "" }}>Small</option>
                  <option value="Medium" {{ old('size') === 'Medium' ? 'selected' : "" }}>Medium</option>
                  <option value="Large" {{ old('size') === 'Large' ? 'selected' : "" }}>Large</option>
                </select>
                @error('size')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>

            <div class="col-3">
              <div class="form-group">
                <label>Unit</label>
                <select name="unit" class="custom-select">
                  <option value="Boxes" {{ old('unit') === 'Boxes' ? 'selected' : "" }}>Boxes</option>
                  <option value="Crates" {{ old('unit') === 'Crates' ? 'selected' : "" }}>Crates</option>
                  <option value="Packs" {{ old('unit') === 'Packs' ? 'selected' : "" }}>Packs</option>
                  <option value="Sets" {{ old('unit') === 'Sets' ? 'selected' : "" }}>Sets</option>
                </select>
                @error('unit')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>

            <div class="col-3">
              <div class="form-group">
                <label>Status</label>
                <select name="status" class="custom-select">
                  <option value="Available" {{ old('status') === 'Available' ? 'selected' : "" }}>Available</option>
                  <option value="Not-Available" {{ old('status') === 'Not-Available' ? 'selected' : "" }}>Not-Available</option>
                </select>
                @error('status')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>

            <div class="col-3">
              <button type="submit" class="btn btn-success btn-block mt-4">Add</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>