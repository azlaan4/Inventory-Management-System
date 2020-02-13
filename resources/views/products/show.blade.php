<div class="modal fade" id="show-product-detail{{ $product->id }}" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Product Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-borderless table-sm" style="width:100%">
          <tr class="table-head-detail">
            <th>Product ID</th>
            <td>
              {{ $product->id }}
            </td>
          </tr>
          <tr>
            <th>Name</th>
            <td>
              {{ $product->name }}
            </td>
          </tr>
          <tr>
            <th>Brand</th>
            <td>
              {{ $product->brand->name }}
            </td>
          </tr>
          <tr>
            <th>Category</th>
            <td>
              {{ $product->category->name }}
            </td>
          </tr>
          <tr>
            <th>Size</th>
            <td>
              {{ $product->size }}
            </td>
          </tr>
          <tr>
            <th>Cost per Unit</th>
            <td>
              Rs. {{ $product->price . "/- per " . $product->unit }}
            </td>
          </tr>
          <tr>
            <th>Max Retail Price</th>
            <td>
              Rs. {{ $product->mrp }} /-
            </td>
          </tr>
          <tr>
            @if ($product->status == "Available")
              <th>Stock Available</th>
              <td>
                  {{ $product->stock . " " . $product->unit }}
              </td>
            @else
              <th>Stock Not Available</th>
              <td>
                  {{ $product->stock . " " . $product->unit }}
              </td>
            @endif
          </tr>
          <tr>
            <th>Product Added On</th>
            <td>
              {{ date('F jS, Y', strtotime($product->created_at)) }}
            </td>
          </tr>
          <tr>
            @if ($product->created_at != $product->updated_at)
            <th>Product Updated On</th>
            <td>
              {{ date('F jS, Y', strtotime($product->updated_at)) }}
            </td>
            @endif
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>