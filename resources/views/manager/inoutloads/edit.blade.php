@extends('layouts.manager.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-11 text-center">
                <h4>Update Category</h4>
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
            <div class="col-md-1">
                <a href="{{route('manager.inoutloads.index')}}" class = "btn btn-sm btn-primary">View All <i class = "fa fa-eye"></i></a>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <form action="{{ route('manager.inoutloads.update', $category->id) }}" method = "POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="form-group row">
                        {{-- <label for="" class="col-sm-4 col-form-label">Category</label>
                        <div class="col-sm-8">
                            <select name="category_id" id="" class = "form-control">
                                <option value="">Select Category</option>
                                @foreach($categories as $cats)
                                    <option value="{{ $cats->id }}">{{ $cats->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label">Subcategory</label>
                        <div class="col-sm-8">
                            <select name="subcategory_id" id="" class = "form-control">
                                <option value="">Select Subcategory</option>
                                @foreach($subcategories as $sub)
                                    <option value="{{ $sub->id }}">{{ $sub->subcategory_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label">Product Subcategory</label>
                        <div class="col-sm-8">
                            <select name="product_category_id" id="" class = "form-control">
                                <option value="">Select Product Subcategory</option>
                                @foreach($product_subcategories as $sub)
                                    <option value="{{ $sub->id }}">{{ $sub->product_category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> --}}
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label">Category Name</label>
                        <div class="col-sm-8">
                            <input type="text" name = "category_name" class = "form-control" value = "{{ $category->category_name }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label">Image</label>
                        <div class="col-sm-8">
                            <input type="file" name = "category_image" class = "form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label">Category Description</label>
                        <div class="col-sm-8">
                            <textarea name = "category_description" rows = "10" cols = "10" class = "form-control">{{ $category->category_description }}</textarea>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label"></label>
                        <div class="col-sm-8">
                            <input type="submit" name = "submit" class = "btn btn-sm form-control btn-primary" value = "Update Category">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
@endsection