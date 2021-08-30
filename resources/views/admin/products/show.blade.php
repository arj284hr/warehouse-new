@extends('layouts.admin.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 text-center">
                <h4>View Product</h4>
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
        <br>
        <div class="row">
            <div class="col-md-12">               
                <h4>Product Details</h4>
                <table class="table table-sm table-hover">
                    <tbody>
                        <tr>
                            <td style = "width: 500px;">Product ID</td>
                            <td>{{ $product->id }}</td>
                        </tr>
                        <tr>
                            <td>Prodcut Name</td>
                            <td>{{ $product->product_title }}</td>
                        </tr>
                       
                        <tr>
                            <td>Product Image-1</td>
                            <td>
                                <img src="{{ asset($product->product_image1) }}" alt="Product Image" style = "width: 80px; height: 60px;">
                            </td>
                            {{-- <td>
                                <img src="{{ asset($product->product_image2) }}" alt="Product Image" style = "width: 80px; height: 60px;">
                            </td>
                            <td>
                                <img src="{{ asset($product->product_image3) }}" alt="Product Image" style = "width: 80px; height: 60px;">
                            </td> --}}
                        </tr>
                        <tr>
                            <td>Product Image-2</td>
                          
                            <td>
                                <img src="{{ asset($product->product_image2) }}" alt="Product Image" style = "width: 80px; height: 60px;">
                            </td>
                           
                        </tr>
                        <tr>
                            <td>Product Image-3</td>
                         
                            <td>
                                <img src="{{ asset($product->product_image3) }}" alt="Product Image" style = "width: 80px; height: 60px;">
                            </td>
                        </tr>
                        <tr>
                            <td>Product Description</td>
                            <td>{{ $product->product_description }}</td>
                        </tr>
                        <tr>
                            <td>Price</td>
                            <td>{{ $product->product_price }}</td>
                        </tr>
                        <tr>
                            <td>Price Currency</td>
                            <td>{{ $product->product_price_currency }}</td>
                        </tr>
                        <tr>
                            <td>Shipping Charges</td>
                            <td>{{ $product->shipping_charges }}</td>
                        </tr>                        
                        <tr>
                            <td>Shipping Charges Currency</td>
                            <td>{{ $product->shipping_charges_currency }}</td>
                           
                        </tr>
                      
                        <tr>
                            <td>Product Condition</td>
                            <td>{{ $product->product_condition }}</td>
                        </tr>                        
                    </tbody>
                </table>                
            </div>
        </div>
    </div>
@endsection