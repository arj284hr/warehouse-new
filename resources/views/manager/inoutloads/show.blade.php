@extends('layouts.manager.app')
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
                            <td>{{ $product->product_name }}</td>
                        </tr>
                       
                        <tr>
                            <td>Product Image</td>
                            <td>
                                <img src="{{ asset($product->image) }}" alt="Product Image" style = "width: 80px; height: 60px;">
                            </td>
                            {{-- <td>
                                <img src="{{ asset($product->product_image2) }}" alt="Product Image" style = "width: 80px; height: 60px;">
                            </td>
                            <td>
                                <img src="{{ asset($product->product_image3) }}" alt="Product Image" style = "width: 80px; height: 60px;">
                            </td> --}}
                        </tr>
                       {{--  <tr>
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
                        </tr> --}}
                        <tr>
                            <td>Product Description</td>
                            <td>{{ $product->product_description }}</td>
                        </tr>
                        <tr>
                            <td>Sale Price</td>
                             <td>{{ $product->sale_price }}</td>
                                    
                        </tr>
                        <tr>
                            <td>Sale Price Currency</td>
                           <td>{{ $product->sale_price_currency }}</td>
                        </tr>
                         <tr>
                            <td>Rent Per Day</td>
                           <td>{{ $product->rent_per_day }}</td>
                        </tr>                        
                        <tr>
                            <td>Rent Currency</td>
                            <td>{{ $product->rent_currency }}</td>
                           
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
                            <td>Product Status</td>
                            <td>
                                    @if($product->is_sold == 'false')

                                       Available

                                       @else

                                       Sold

                                       @endif
                            </td>
                        </tr>                        
                    </tbody>
                </table>                
            </div>
        </div>
    </div>
@endsection