<div class="modal fade" id="show-customer-detail{{ $customer->id }}" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Customer Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-borderless table-sm" style="width:100%">
          <tr>
            <th>Customer ID</th>
            <td>
              {{ $customer->id }}
            </td>
          </tr>
          <tr>
            <th>Name</th>
            <td>
              {{ $customer->name }}
            </td>
          </tr>
          <tr>
            <th>Type</th>
            <td>
              {{ $customer->type }}
            </td>
          </tr>
          <tr>
            <th>Contact</th>
            <td>
              {{ $customer->number }}
            </td>
          </tr>
          <tr>
            <th>Address</th>
            <td>
              {{ $customer->address }}
            </td>
          </tr>
          <tr>
            <th>Total Transections</th>
            <td>
              Not defined
            </td>
          </tr>
          <tr>
            <th>Registered On</th>
            <td>
              {{ date('F jS, Y', strtotime($customer->created_at)) }}
            </td>
          </tr>
          <tr>
            @if ($customer->created_at != $customer->updated_at)
            <th>Updated On</th>
            <td>
              {{ date('F jS, Y', strtotime($customer->updated_at)) }}
            </td>
            @endif
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>