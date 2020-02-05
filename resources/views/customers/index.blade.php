@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-header bg-dark">
                    <strong class="text-light">Add New Customer</strong>
                </div>
                <div class="card-body">
                    @include('customers.create')
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-dark">
                    <strong class="text-light">List of Customers</strong>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Contact</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td>@mdo</td>
                                <td>
                                    <a href="#" class="btn btn-link btn-sm" data-toggle="modal" data-target="#editCustomer">Edit</a>
                                </td>
                            </tr>
                            @include('customers.edit')
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection