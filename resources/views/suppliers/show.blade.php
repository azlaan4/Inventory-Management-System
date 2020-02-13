<div class="modal fade" id="show-supplier-detail{{ $supplier->id }}" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Supplier Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-borderless table-sm" style="width:100%">
          <tr>
            <th>Supplier ID</th>
            <td>
              {{ $supplier->id }}
            </td>
          </tr>
          <tr>
            <th>Name</th>
            <td>
              {{ $supplier->name }}
            </td>
          </tr>
          <tr>
            <th>Type</th>
            <td>
              {{ $supplier->type }}
            </td>
          </tr>
          <tr>
            <th>Contact</th>
            <td>
              {{ $supplier->number }}
            </td>
          </tr>
          <tr>
            <th>Address</th>
            <td>
              {{ $supplier->address }}
            </td>
          </tr>
          <tr>
            <th>Total Transections</th>
            <td>
              {{ $supplier->purchases->count() }}
            </td>
          </tr>
          <tr>
            <th>Registered On</th>
            <td>
              {{ date('F jS, Y', strtotime($supplier->created_at)) }}
            </td>
          </tr>
          <tr>
            @if ($supplier->created_at != $supplier->updated_at)
            <th>Updated On</th>
            <td>
              {{ date('F jS, Y', strtotime($supplier->updated_at)) }}
            </td>
            @endif
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>