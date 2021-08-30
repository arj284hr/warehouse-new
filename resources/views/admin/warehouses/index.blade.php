@extends('layouts.admin.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 text-center">
            <h4>Available Customers</h4>
            @if(session()->has('message'))
            <div class="alert alert-success text-center">
                {{ session()->get('message') }}
            </div>
            @endif
            @if(session()->has('error'))
            <div class="alert alert-danger text-center">
                {{ session()->get('error') }}
            </div>
            @endif
        </div>
        <div class="col-md-2">
            <a href="{{ route('admin.warehouse.create') }}" class = "btn btn-primary" >Add New <i class = "fa fa-plus"></i></a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <form action="" method = "POST">
                     {{--  {{ route('admin.products.search_published_product') }}
                     {{ csrf_field()}}  --}}
                     <div class="input-group">
                        <input type="text" name = "category_name" class="form-control" placeholder="Search WareHouse">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                                <i class="glyphicon glyphicon-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                @if($warehouses->count() > 0)
                <table class="table table-sm table-hover">
                    <thead>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Location</th>
                        <th>City</th>
                         <th>State</th> 
                        <th>View</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        @foreach($warehouses as $warehouse)
                        <tr>
                            <td>{{ $warehouse->id }}</td>
                            <td>{{ $warehouse->customer_name }}</td>
                            <td>{{ $warehouse->street_address }}</td>
                            <td>{{ $warehouse->city }}</td>
                            <td>{{ $warehouse->state }}</td>

                            <td>
                                <a href="{{ route('admin.warehouse.show', $warehouse->id) }}" class = "btn btn-sm btn-info"><i class = "fa fa-eye"></i></a>
                            </td>

                            <td>
                                <a href="{{ route('admin.warehouse.edit', $warehouse->id) }}" class = "btn btn-sm btn-warning"><i class = "fa fa-edit"></i></a>
                            </td>
                            <td>
                                <form action="{{ route('admin.warehouse.destroy', $warehouse->id) }}" method = "POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type = "submit" name = "submit" onclick = "return confirm('Do You Really Want to Delete?')"  class = "btn btn-sm btn-danger"><i class = "fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                 {{ $warehouses->links() }}
                @else
                <h4 style = "text-align:center;">No Customer Found!</h4>
                @endif
            </div>
        </div>
    </div>
    @endsection
