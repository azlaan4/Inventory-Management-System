<div class="modal fade bd-example-modal-lg" id="show-sale-detail{{ $sale->id }}" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Transection Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-borderless table-sm" style="width:100%">
          <tr class="table-head-detail">
            <th colspan="3">
              Transection ID {{ $sale->id }}
            </th>
            <td colspan="1">
              <em>{{ date('F jS, Y', strtotime($sale->created_at)) }}</em>
            </td>
          </tr>
          <tr>
            <th>Product Name</th>
            <th>Cost per Unit</th>
            <th>Quantity</th>
            <th>Total Cost</th>
          </tr>
          @foreach ($sale->saleDetails as $item)
            <tr>
              <td>{{ $item->product->name }}</td>
              <td>{{ $item->price . " per " . $item->product->unit }}</td>
              <td>{{ $item->items }}</td>
              <td>{{ $item->total_price }}</td>
            </tr>
          @endforeach
        </table>
      </div>
    </div>
  </div>
</div>