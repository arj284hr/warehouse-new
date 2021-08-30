@extends('layouts.admin.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-11 text-center">
                {{-- <h4>Un-published Products</h4> --}}
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
           
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            {{-- <div class="col-md-6">
                <form action="" method = "POST">
                    {{ csrf_field() }}
                    <div class="input-group">
                        <input type="text" name = "product_name" class="form-control" placeholder="Search Product">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                                <i class="glyphicon glyphicon-search"></i>
                            </button>
                        </div>
                    </div>
                </form>                
            </div> --}}
            <div class="col-md-3"></div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                @if($products->count() > 0)
                    <table class="table table-sm table-hover">
                        <thead>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>condition</th>
                            <th>Price</th>
                            <th>Shipping Charges</th>
                            <th>Status</th>
                            <th>View</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->product_title }}</td>
                                <td><img src="{{ asset($product->product_image1) }}" alt="Product Image" style = "width: 60px; height: 40px;"></td>
                                <td>{{ substr($product->product_description,0,25) }}</td>
                                <td>{{ $product->product_condition }}</td>
                                <td>{{ $product->product_price_currency.$product->product_price }}</td>
                                <td>{{ $product->shipping_charges_currency.$product->shipping_charges}}</td>
                                @if($product->shipping_charges == true)
                                <td>Sold</td>
                                @else
                                <td>N/A</td>
                                @endif
                                <td>
                                    <a href="{{ route('admin.products.show', $product->id) }}" class = "btn btn-sm btn-info"><i class = "fa fa-eye"></i></a>
                                </td>
                                <td>
                                    <form action="{{ route('admin.products.destroy', $product->id) }}" method = "POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type = "submit" name = "submit" onclick = "return confirm('Do You Really Want to Delete?')"  class = "btn btn-sm btn-danger"><i class = "fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $products->links() }}
                @else 
                    <h4 style = "text-align:center;">No Product Found!</h4>
                @endif
            </div>
        </div>
    </div>
@endsection