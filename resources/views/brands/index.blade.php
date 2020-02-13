@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-3 mb-3">
            @include('brands.create')
        </div>
        <div class="col-md-12 mt-3 mb-3">
            <div class="card shadow">
                <div class="card-header bg-dark">
                    <strong class="text-light">
                        List of Brands
                    </strong>
                </div>
                <div class="card-body">
                    <input id="filter" type="text" class="form-control" placeholder="Search...">
                    <br>
                    <div class="table-responsive-sm">
                        <table class="table table-borderless table-sm">
                            <thead>
                                <tr class="table-head-detail">
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Brand ID</th>
                                    <th>Added On</th>
                                    <th>Updated On</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="brands">
                                @foreach ($brands as $brand)
                                    <tr class="brand-detail">
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>
                                            {{ $brand->name }}
                                        </td>
                                        <td>
                                            {{ $brand->id }}
                                        </td>
                                        <td>
                                          {{ date('F jS, Y', strtotime($brand->created_at)) }}
                                        </td>
                                        <td>
                                            {{ date('F jS, Y', strtotime($brand->updated_at)) }}
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-info" data-toggle="modal" data-target="#edit-brand-detail{{ $brand->id }}" title="Edit">
                                                <i class="far fa-edit mr-1"></i> EDIT
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            {{-- edit forms --}}
                                            @include('brands.edit')
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="7" class="pb-0">
                                        {{ $brands->links() }}
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
              $("#brands tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
              });
            });
        });
    </script>
@endsection