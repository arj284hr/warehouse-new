@extends('layouts.admin.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-11 text-center">
            <h4>Add Product</h4>
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
       {{--  <div class="col-md-1">
            <a href="{{ route('admin.manager.index') }}" class = "btn btn-sm btn-primary">View All <i class = "fa fa-eye"></i></a>
        </div> --}}
    </div>
    <br>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-8">
            <form action="{{ route('admin.departments.store') }}" method = "POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-row">

                <div class="form-group col-md-8">
                  <input type="text" class="form-control" name="department_name" placeholder="Enter Product Name" required>
              </div>

        <div class="form-group col-md-4">
            <input type="submit" name = "submit" class = "btn btn-sm btn-primary form-control" value = "Add Product">
        </div>
    </div>
</form>
</div>
<div class="col-md-3"></div>
</div>
<br>
<br>

{{-- start --}}
  <div class="row">
            <div class="col-md-11 text-center">
                <h4>All Products</h4>
               {{--  @if(session()->has('message'))
                    <div class="alert alert-success text-center">
                        {{ session()->get('message') }}
                    </div>
                @endif
                @if(session()->has('error'))
                    <div class="alert alert-danger text-center">
                        {{ session()->get('error') }}
                    </div>
                @endif --}}
            </div>
           {{--  <div class="col-md-1">
                <a href="{{ route('admin.manager.create') }}" class = "btn btn-sm btn-primary" >Add New <i class = "fa fa-plus"></i></a>
            </div> --}}
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            {{-- <div class="col-md-6">
                <form action="" method = "POST">
                      {{ route('admin.products.search_published_product') }}
                    {{ csrf_field()}}
                    <div class="input-group">
                        <input type="text" name = "category_name" class="form-control" placeholder="Search Manager">
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
                @if($departments->count() > 0)
                    <table class="table table-sm table-hover">
                        <thead>
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>
                            @foreach($departments as $department)
                                <tr>
                                    <td>{{ $department->id }}</td>
                                    <td>{{ $department->department_name }}</td>
                                    <td>
                                        <a href="{{ route('admin.departments.edit', $department->id) }}" class = "btn btn-sm btn-warning"><i class = "fa fa-edit"></i></a>
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.departments.destroy', $department->id) }}" method = "POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type = "submit" name = "submit" onclick = "return confirm('Do You Really Want to Delete?')"  class = "btn btn-sm btn-danger"><i class = "fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $departments->links() }}
                @else
                    <h4 style = "text-align:center;">No Product Found!</h4>
                @endif
            </div>
        </div>
{{-- end --}}




</div>
@endsection
