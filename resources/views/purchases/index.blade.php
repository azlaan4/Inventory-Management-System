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
                    <br>
                    <div class="table-responsive-sm">
                        <table class="table table-borderless table-sm" style="width:100%">
                            <thead>
                                <tr class="table-head-detail">
                                    <th>#</th>
                                    <th>Supplier</th>
                                    <th>Total Purchase</th>
                                    <th>Transection Cost</th>
                                    <th>Discount Offered</th>
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
                                            {{ $purchase->supplier->name }}
                                        </td>
                                        <td>
                                            {{ $purchase->product_count }}
                                        </td>
                                        <td>
                                            Rs. {{ $sale->grand_total }} /-
                                        </td>
                                        <td>
                                            {{ $purchase->discount }} %
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#show-purchase-detail{{ $purchase->id }}" title="Show">
                                                <i class="fa fa-external-link-alt mr-1"></i> DETAIL VIEW
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            {{-- show forms --}}
                                            @include('purchases.show')
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
    </script>
@endsection