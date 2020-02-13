@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-3 mb-3">
            @include('customers.create')
        </div>
        <div class="col-md-12 mt-3 mb-3">
            <div class="card shadow">
                <div class="card-header bg-dark">
                    <strong class="text-light">
                        List of Customers
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
                                    <th>Name</th>
                                    <th>Contact</th>
                                    <th>Type</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="customers">
                                @foreach ($customers as $customer)
                                    <tr class="customer-detail">
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>
                                            {{ $customer->name }}
                                        </td>
                                        <td>
                                            {{ $customer->number }}
                                        </td>
                                        <td>
                                            {{ $customer->type }}
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-info" data-toggle="modal" data-target="#edit-customer-detail{{ $customer->id }}">
                                                <i class="far fa-edit mr-1"></i> EDIT
                                            </a>
                                            <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#show-customer-detail{{ $customer->id }}">
                                                <i class="fa fa-external-link-alt mr-1"></i> DETAIL VIEW
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            {{-- edit forms --}}
                                            @include('customers.edit')
                                        </td>
                                        <td>
                                            {{-- edit forms --}}
                                            @include('customers.show')
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="7" class="pb-0">
                                        {{ $customers->links() }}
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
              $("#customers tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
              });
            });
        });
    </script>
@endsection