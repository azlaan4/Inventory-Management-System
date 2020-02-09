@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-3 mb-3">
            @include('purchases.create')
        </div>
        <div class="col-md-12 mt-3 mb-3">
            <div class="card shadow">
                <div class="card-header bg-dark">
                    <strong class="text-light">
                        List of Purchases
                    </strong>
                </div>
                <div class="card-body">
                    <input id="filter" type="text" class="form-control" placeholder="Search...">
                    <div class="table-responsive-sm">
                        <table class="table table-borderless table-sm" style="width:100%">
                            <thead>
                                <tr class="table-head-detail">
                                    <th>#</th>
                                    <th>Purchase ID</th>
                                    <th>Name</th>
                                    <th>Contact</th>
                                    <th>Address</th>
                                    <th>Type</th>
                                    <th>Registered</th>
                                    <th>Modified</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="purchases">
                                @foreach ($purchases as $purchase)
                                    <tr class="purchase-detail">
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>
                                            {{ $purchase->id }}
                                        </td>
                                        {{--  <td>
                                            {{ $purchase->name }}
                                        </td>
                                        <td>
                                            {{ $purchase->number }}
                                        </td>
                                        <td>
                                            {{ $purchase->address }}
                                        </td>
                                        <td>
                                            {{ $purchase->type }}
                                        </td>
                                        <td>
                                            {{ date('F jS, Y', strtotime($purchase->created_at)) }}
                                        </td>
                                        <td>
                                            {{ date('F jS, Y', strtotime($purchase->updated_at)) }}
                                        </td>
                                        <td>
                                            <a href="#" onclick="formInlineEdit({{ $purchase->id }})">Edit</a>
                                        </td>  --}}
                                    </tr>
                                    <tr>
                                        <td>
                                            {{-- edit forms --}}
                                            {{--  @include('purchases.edit')  --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="7" class="pb-0">
                                        {{ $purchases->links() }}
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $("#filter").on("keyup", function() {
              var value = $(this).val().toLowerCase();
              $("#purchases tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
              });
            });
        });

        function formInlineEdit(id) {
            $('#edit-purchase-detail'+id).modal('show')
        }
    </script>
@endsection