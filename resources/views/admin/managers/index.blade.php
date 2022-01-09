@extends('layouts.admin.app')
@section('content')
    <div class="container-fluid "style="margin-top:115px;">
        <div class="row">
            <div class="col-md-10 text-center">
                <h4>Managers</h4>
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
                <a href="{{ route('admin.manager.create') }}" class = "btn btn-primary" >Add New <i class = "fa fa-plus"></i></a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <form action="" method = "POST">
                     {{--  {{ route('admin.products.search_published_product') }}
                    {{ csrf_field()}}  --}}
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
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                @if($managers->count() > 0)
                    <table class="table table-sm table-hover">
                        <thead>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Job Title</th>
                            <th>Customer</th>
                            <th>View</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>
                            @foreach($managers as $manager)
                                <tr>
                                    <td>{{ $manager->id }}</td>
                                    <td>{{ $manager->first_name }}</td>
                                    <td>{{ $manager->last_name }}</td>
                                    <td>{{ $manager->email }}</td>
                                    <td>{{ ucfirst($manager->job_title) }}</td>
                                     <td>
                <?php
                    if(!empty($manager->manager->customer_name))
                    {
                     echo  $manager->manager->customer_name;
                    }else{
                     echo $manager->driver_name; 
                    }
                    ?>
               
                </td>

                                   {{--  <td><img src="{{ asset($category->category_image) }}" alt="Product Image" style = "width: 60px; height: 40px;"></td>
                                    <td>{{ substr($category->category_description,0,25) }}</td> --}}
                                    <td>
                                        <a href="{{ route('admin.manager.show', $manager->id) }}" class = "btn btn-sm btn-info"><i class = "fa fa-eye"></i></a>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.manager.edit', $manager->id) }}" class = "btn btn-sm btn-warning"><i class = "fa fa-edit"></i></a>
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.manager.destroy', $manager->id) }}" method = "POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type = "submit" name = "submit" onclick = "return confirm('Do You Really Want to Delete?')"  class = "btn btn-sm btn-danger"><i class = "fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $managers->links() }}
                @else
                    <h4 style = "text-align:center;">No Manager Found!</h4>
                @endif
            </div>
        </div>
    </div>
@endsection
