@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-3 mb-3">
            @include('products.create')
        </div>
        <div class="col-md-12 mt-3 mb-3">
            <div class="card shadow">
                <div class="card-header bg-dark">
                    <strong class="text-light">
                        List of Products
                    </strong>
                </div>
                <div class="card-body">
                    <input id="filter" type="text" class="form-control" placeholder="Search...">
                    <div class="table-responsive-sm">
                        <table class="table table-borderless table-sm" style="width:100%">
                            <thead>
                                <tr class="table-head-detail">
                                    <th>#</th>
                                    <th>Product ID</th>
                                    <th>Name</th>
                                    <th>Brand</th>
                                    <th>Category</th>
                                    <th>Size</th>
                                    <th>Price</th>
                                    <th>Unit</th>
                                    <th>Stock</th>
                                    <th>Status</th>
                                    <th>Registered</th>
                                    <th>Modified</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="products">
                                @foreach ($products as $product)
                                    <tr class="product-detail">
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>
                                            {{ $product->id }}
                                        </td>
                                        <td>
                                            {{ $product->name }}
                                        </td>
                                        <td>
                                            {{ $product->brand->name }}
                                        </td>
                                        <td>
                                            {{ $product->category->name }}
                                        </td>
                                        <td>
                                            {{ $product->size }}
                                        </td>
                                        <td>
                                            {{ $product->price }}
                                        </td>
                                        <td>
                                            {{ $product->unit }}
                                        </td>
                                        <td>
                                            {{ $product->stock }}
                                        </td>
                                        <td>
                                            {{ $product->status }}
                                        </td>
                                        <td>
                                            {{ date('F jS, Y', strtotime($product->created_at)) }}
                                        </td>
                                        <td>
                                            {{ date('F jS, Y', strtotime($product->updated_at)) }}
                                        </td>
                                        <td>
                                            <a href="#" onclick="formInlineEdit({{ $product->id }})">Edit</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            {{-- edit forms --}}
                                            @include('products.edit')
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="7" class="pb-0">
                                        {{ $products->links() }}
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
              $("#products tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
              });
            });
        });

        function formInlineEdit(id) {
            $('#edit-product-detail'+id).modal('show')
        }
    </script>
@endsection