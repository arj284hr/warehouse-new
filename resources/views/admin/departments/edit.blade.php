@extends('layouts.admin.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 text-center">
                <h4>Update Product</h4>
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
                <a href="{{route('admin.departments.index')}}" class = "btn btn-primary">View All <i class = "fa fa-eye"></i></a>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <form action="{{ route('admin.departments.update', $department->id) }}" method = "POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                 <div class="form-row">

                <div class="form-group col-md-8">
                  <input type="text" class="form-control" name="department_name" placeholder="Enter Product Name" required value="{{ $department->department_name}}">
              </div>

        <div class="form-group col-md-4">
            <input type="submit" name = "submit" class = "btn btn-sm btn-primary form-control" value = "Update Product">
        </div>
    </div>
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
@endsection
