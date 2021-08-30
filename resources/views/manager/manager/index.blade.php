@extends('layouts.manager.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-11 text-center">
                <h4>Manager Details</h4>
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
                <a href="{{ route('admin.manager.create') }}" class = "btn btn-sm btn-primary" >Add New <i class = "fa fa-plus"></i></a>
            </div> --}}
        </div>
     {{--    <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
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
            </div>
            <div class="col-md-3"></div>
        </div> --}}
        <br>
        <div class="row">
            <div class="col-md-12">
                @if($manager->count() > 0)
                    <table class="table table-sm table-hover">
                        <thead>
                            <th>ID</th>
                            <th>SSN</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Job Title</th>
                            <th>Warehouse</th>
                            <th>View</th>
                          {{--   <th>Edit</th>
                            <th>Delete</th> --}}
                        </thead>
                        <tbody>
                            @foreach($manager as $manage)
                                <tr>
                                    <td>{{ $manage->id }}</td>
                                    <td>{{ $manage->ssn }}</td>
                                    <td>{{ $manage->first_name }}</td>
                                    <td>{{ $manage->last_name }}</td>
                                    <td>{{ $manage->email }}</td>
                                    <td>{{ $manage->phone }}</td>
                                    <td>{{ ucfirst($manage->job_title) }}</td>
                                    <td>N/A</td>
                                   {{--  <td><img src="{{ asset($category->category_image) }}" alt="Product Image" style = "width: 60px; height: 40px;"></td>
                                    <td>{{ substr($category->category_description,0,25) }}</td> --}}
                                    <td>
                                        <a href="{{ route('manager.manager.show', $manage->id) }}" class = "btn btn-sm btn-info"><i class = "fa fa-eye"></i></a>
                                    </td>
                                 {{--    <td>
                                        <a href="{{ route('manager.manager.edit', $manage->id) }}" class = "btn btn-sm btn-warning"><i class = "fa fa-edit"></i></a>
                                    </td>
                                    <td>
                                        <form action="{{ route('manager.manager.destroy', $manage->id) }}" method = "POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type = "submit" name = "submit" onclick = "return confirm('Do You Really Want to Delete?')"  class = "btn btn-sm btn-danger"><i class = "fa fa-trash"></i></button>
                                        </form>
                                    </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- {{ $managers->links() }} --}}
                @else
                    <h4 style = "text-align:center;">No Manager Found!</h4>
                @endif
            </div>
        </div>
    </div>
@endsection
