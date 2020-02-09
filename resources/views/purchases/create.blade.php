<div class="accordion" id="accordionExample">
  <div class="card shadow">
    <div class="card-header bg-dark" data-toggle="collapse" data-target="#add_supplier_form" aria-expanded="true" aria-controls="add_supplier_form">
      <strong class="text-light">
          Add New Supplier
      </strong>
    </div>

    <div id="add_supplier_form" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
        <form action="{{ route('suppliers.store') }}" method="POST">
          @csrf
          <div class="row">
            <div class="col-3">
              <div class="form-group">
                <label>Product Supplier</label>
                <select name="supplier_id" class="custom-select">
                  @foreach ($suppliers as $supplier)
                    <option value="{{ $supplier->id }}" {{ old('supplier_id') == $supplier->id ? 'selected' : "" }}>{{ $supplier->name }}</option>
                  @endforeach
                </select>
                @error('supplier_id')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>

            <div class="col-3">
              <div class="form-group">
                <label>Discount on Total Cost</label>
                <input name="discount" type="number" class="form-control @error('discount') is-invalid @enderror" value="{{ old('discount') }}" placeholder="Discount on Total Purchase">
                @error('discount')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>

            <div class="col-3">
              <div class="form-group">
                <label>Total Cost</label>
                <input name="total_cost" type="number" class="form-control @error('total_cost') is-invalid @enderror" value="0" disabled>
                @error('total_cost')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>

            <div class="col-3">
              <div class="form-group">
                <label>Products Count</label>
                <input name="total_products" id="product_count" type="number" class="form-control @error('total_products') is-invalid @enderror" value="1" disabled>
                @error('total_products')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>
          </div>

          <div class="row mt-2 mb-2">
          </div>

          <div class="row">
            <div class="col-12 product_holder">
              <div class="row">
                <div class="col-3">
                  <div class="form-group">
                    <label>Select Product</label>
                    <select name="product_id[]" class="custom-select">
                      @foreach ($products as $product)
                        <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : "" }}>{{ $product->name }}</option>
                      @endforeach
                    </select>
                    @error('product_id')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>

                <div class="col-3">
                  <div class="form-group">
                    <label>Quantity</label>
                    <input name="items[]" type="number" class="form-control @error('items') is-invalid @enderror" value="{{ old('items') }}" placeholder="No. of items">
                    @error('items')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>

                <div class="col-6">
                  <div class="form-group">
                    <small>
                      <strong class="add_field_button text-primary" style="cursor: pointer;">
                        Add More Product
                      </strong>
                    </small>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-3">
              <button type="submit" class="btn btn-success btn-block">Add</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@section('scripts')
  <script>
    $(document).ready(function() {
      var max_fields      = {{ $products->count() }}; //maximum input boxes allowed
      var wrapper         = $(".product_holder"); //Fields wrapper
      var add_button      = $(".add_field_button"); //Add button ID

      var x = 1; //initlal text box count

      $(add_button).click(function(e){ //on add input button click
        if(x < max_fields){ //max input box allowed
          x++; //text box increment
          var add_product =
            '<div class="row" id="add_product' + x + '">' +
              '<div class="col-3">' +
                '<div class="form-group">' +
                  '<label>Select Product</label>' +
                  '<select name="product_id[' + x + ']" class="custom-select">' +
                    '@foreach ($products as $product)' +
                      '<option value="{{ $product->id }}" {{ old("product_id") == $product->id ? "selected" : "" }}>{{ $product->name }}</option>' +
                    '@endforeach' +
                  '</select>' +
                '</div>' +
              '</div>' +

              '<div class="col-3">' +
                '<div class="form-group">' +
                  '<label>Quantity</label>' +
                  '<input name="items[' + x + ']" type="number" class="form-control @error('items') is-invalid @enderror" value="{{ old('items') }}" placeholder="No. of items">' +
                '</div>' +
              '</div>' +

              '<div class="col-6">' +
                '<small>' +
                  '<strong class="text-danger remove" data-value="' + x + '" style="cursor: pointer;">Remove</strong>'
                '</small>' +
              '</div>' +
            '</div>'

          $(wrapper).append(add_product); // add input boxes.
          $('#product_count').val(x);
        }
      });

      $(wrapper).on("click",".remove", function(e){ //user click on remove text
        var add_product_id = $(this).data("value");
        $("#remove" + add_product_id).remove();
        $("#add_product" + add_product_id).remove();
        x--;
      })

    });
  </script>
@endsection