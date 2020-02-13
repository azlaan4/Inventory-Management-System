<div class="accordion" id="accordionExample">
  <div class="card shadow">
    <div class="card-header bg-dark" data-toggle="collapse" data-target="#add_supplier_form" aria-expanded="true" aria-controls="add_supplier_form">
      <strong class="text-light">
          Add New Supplier
      </strong>
    </div>

    <div id="add_supplier_form" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
        <form action="{{ route('sales.store') }}" method="POST">
          @csrf
          {{-- hidden sale details --}}
          <input type="hidden" id="sale_details" name="sale_details[]">
          <div class="row">
            <div class="col-3">
              <div class="form-group">
                <label>Customer</label>
                <select name="customer_id" class="custom-select">
                  @foreach ($customers as $customer)
                    <option value="{{ $customer->id }}" {{ old('customer_id') == $customer->id ? 'selected' : "" }}>{{ $customer->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="col-3">
              <div class="form-group">
                <label>Discount on Total Cost <small class="text-primary">in percent (&percnt;)</small></label>
                <input name="discount" id="discount" value="0" type="number" class="form-control @error('discount') is-invalid @enderror" value="{{ old('discount') }}" placeholder="Discount on Total sale" onkeyup="discount_calculator()" >
                @error('discount')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>

            <div class="col-3">
              <div class="form-group">
                <label>Products Added</label>
                <input name="total_products" value="0" id="product_count" type="number" class="form-control" readonly>
              </div>
            </div>

            <div class="col-3">
              <div class="form-group">
                <label>Grand Total</label>
                <input name="grand_total" value="0" id="grand_total" type="number" class="form-control" readonly>
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
                    <select id="product_id" class="custom-select">
                      @foreach ($products as $product)
                        @if ($product->status == "Available")
                          <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : "" }}>{{ $product->name }}</option>
                        @endif
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="col-2">
                  <div class="form-group">
                    <label>Quantity</label>
                    <input id="qty" type="number" class="form-control @error('items') is-invalid @enderror" value="1" placeholder="No. of items">
                    @error('item')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>

                <div class="col-1 p-0">
                  <div class="form-group">
                    <a href="#" id="add_to_sale" onclick="sale()" style="font-size: 12px;">
                      <strong>ADD TO SALE</strong>
                    </a>
                  </div>
                </div>

                <div class="col-6">
                  <div class="table-responsive">
                    <table class="table table-sm table-borderless table-hover text-center">
                      <thead>
                        <tr>
                          <th colspan="6">Sale Details</th>
                        </tr>
                        <tr>
                          <th>ID</th>
                          <th>Product</th>
                          <th>Price</th>
                          <th>Actual Quantity</th>
                          <th>Quantity</th>
                          <th>Total Cost</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody id="product_detail_holder">
                      </tbody>
                    </table>
                  </div>
                </div>
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

@section('scripts')
  <script>
    var max_fields        = {{ $products->count() }} //maximum input boxes allowed
    var wrapper           = $("#product_detail_holder") //Fields wrapper
    var add_button        = $("#add_to_sale") //Add button ID
    var all_products      = @JSON($products)  // fetching products from database
    var saled_products = []
    var x = 0 //initlal text box count

    function sale() {
      // creating purchasing details
      var selected_product_id   = $('#product_id').val()
      var selected_product_qty  = $('#qty').val()

      // adding sale product
      for(i = 0; i < all_products.length; i++) {
        if (all_products[i].id == selected_product_id) {
          var product_obj = new Object()

          product_obj.id          = all_products[i].id
          product_obj.name        = all_products[i].name
          product_obj.price       = all_products[i].price
          product_obj.act_qty     = all_products[i].stock
          product_obj.qty         = selected_product_qty
          product_obj.total_price = all_products[i].price*selected_product_qty

          saled_products.push(product_obj)
        }
      }

      // creating sale detail DOM
      if(x < max_fields){ // max input box allowed
        x++ // text box increment
        for(i = 0; i < saled_products.length; i++) {
          var product_detail =
            '<tr id="product' + saled_products[i].id + '">' +
              '<td>' + saled_products[i].id + '</td>' +
              '<td>' + saled_products[i].name + '</td>' +
              '<td>' + saled_products[i].price + '</td>' +
              '<td>' + saled_products[i].act_qty + '</td>' +
              '<td>' + saled_products[i].qty + '</td>' +
              '<td>' + saled_products[i].total_price + '</td>' +
              '<td>' +
                '<small>' +
                  '<a href="#" class="text-danger" onclick="remove_sale(' + saled_products[i].id + ')">' +
                    '<strong style="cursor: pointer">REMOVE</strong>' +
                  '</a>' +
                '</small>' +
              '</td>' +
            '</tr>'
        }

        // changing total when add product
        grand_total()

        //setting sale details to form
        sale_details_function()

        $(wrapper).append(product_detail) // add input boxes.
        $('#product_count').val(x)
      }
    }

    function remove_sale(id) {
      // removing sale product
      saled_products.splice( saled_products.indexOf(id), 1 );

      //setting sale details to form
      sale_details_function()

      // removing sale detail DOM
      $("#product" + id).remove()
      x--
      $('#product_count').val(x)

      // changing total when remove product
      grand_total()
    }

    // calculating grand total
    function grand_total() {
      var grand_total = 0
      for(i = 0; i < saled_products.length; i++) {
        grand_total = grand_total + saled_products[i].total_price
      }
      document.getElementById("grand_total").value = grand_total
    }

    // setting sale details of the current transection to the form back
    function sale_details_function() {
      document.getElementById("sale_details").value = JSON.stringify(saled_products)
    }

    // calculating discount
    function discount_calculator() {
      var original_price = document.getElementById("grand_total").value
      var discount = document.getElementById("discount").value
      var discounted_price = original_price - (original_price * discount / 100)
      document.getElementById("grand_total").value = discounted_price.toFixed(2)
    }
  </script>
@endsection