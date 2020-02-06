@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-3 mb-3">
            @include('suppliers.create')
        </div>
        <div class="col-md-12 mt-3 mb-3">
            <div class="card shadow">
                <div class="card-header bg-dark">
                    <strong class="text-light">
                        List of Suppliers
                    </strong>
                </div>
                <div class="card-body">
                    <input id="filter" type="text" class="form-control" placeholder="Search...">
                    <div class="table-responsive-sm">
                        <table class="table table-borderless table-sm" style="width:100%">
                            <thead>
                                <tr class="table-head-detail">
                                    <th>#</th>
                                    <th>Supplier ID</th>
                                    <th>Name</th>
                                    <th>Contact</th>
                                    <th>Address</th>
                                    <th>Type</th>
                                    <th>Registered</th>
                                    <th>Modified</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="suppliers">
                                @foreach ($suppliers as $supplier)
                                    <tr class="supplier-detail">
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>
                                            {{ $supplier->id }}
                                        </td>
                                        <td>
                                            {{ $supplier->name }}
                                        </td>
                                        <td>
                                            {{ $supplier->number }}
                                        </td>
                                        <td>
                                            {{ $supplier->address }}
                                        </td>
                                        <td>
                                            {{ $supplier->type }}
                                        </td>
                                        <td>
                                            {{ date('F jS, Y', strtotime($supplier->created_at)) }}
                                        </td>
                                        <td>
                                            {{ date('F jS, Y', strtotime($supplier->updated_at)) }}
                                        </td>
                                        <td>
                                            <a href="#" onclick="formInlineEdit({{ $supplier->id }})">Edit</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            {{-- edit forms --}}
                                            @include('suppliers.edit')
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="7" class="pb-0">
                                        {{ $suppliers->links() }}
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
              $("#suppliers tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
              });
            });
        });

        function formInlineEdit(id) {
            $('#edit-supplier-detail'+id).modal('show')
        }
    </script>
@endsection