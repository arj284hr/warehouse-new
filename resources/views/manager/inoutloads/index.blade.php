@extends('layouts.manager.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-11 text-center">
                <h4>All Inbound/Outbound Loads</h4>
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
                <a href="{{ route('manager.inoutloads.create') }}" class = "btn btn-sm btn-primary" >Add New <i class = "fa fa-plus"></i></a>
            </div>
        </div>
      {{--  <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <form action="" method = "POST">
                     
                    {{ csrf_field()}}
                    <div class="input-group">
                        <input type="text" name = "category_name" class="form-control" placeholder="Search Category">
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
                @if($categories->count() > 0)
                    <table class="table table-sm table-hover">
                        <thead>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->category_name }}</td>
                                    <td><img src="{{ asset($category->category_image) }}" alt="Product Image" style = "width: 60px; height: 40px;"></td>
                                    <td>{{ substr($category->category_description,0,25) }}</td>
                                   
                                    <td>
                                        <a href="{{ route('admin.categories.edit', $category->id) }}" class = "btn btn-sm btn-info"><i class = "fa fa-edit"></i></a>
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.categories.destroy', $category->id) }}" method = "POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type = "submit" name = "submit" onclick = "return confirm('Do You Really Want to Delete?')"  class = "btn btn-sm btn-danger"><i class = "fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                   {{ $categories->links() }}
                @else 
                    <h4 style = "text-align:center;">No Inbound Load Found!</h4>
                @endif
            </div>
        </div> --}}
    </div>
@endsection