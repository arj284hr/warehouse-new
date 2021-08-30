@extends('layouts.admin.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 text-center">
                <h4>Customer</h4>
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
         <div class="col-md-4">
                <a href="{{ route('admin.warehouse.index') }}" class = "btn btn-primary" ><i class = "fa fa-backward"></i> Back</a>
                <a href="{{ route('admin.warehouse.create') }}" class = "btn btn-primary" >Add Customer <i class = "fa fa-plus"></i>
            </a>
        </div>

        </div>
        
        <br>
        <div class="row">
            <div class="col-md-12">
                <h4>Customer Details</h4>
                <table class="table table-sm table-hover">
                    <tbody>
                        <tr>
                            <td>Customer Name</td>
                            <td>{{ $warehouse->customer_name }}</td>
                        </tr>
                        <tr>
                            <td>Street Address</td>
                            <td>{{ $warehouse->street_address }}</td>
                        </tr>
                        <tr>
                            <td>City</td>
                            <td>{{ $warehouse->city }}</td>
                        </tr>
                         <tr>
                            <td>State</td>
                            <td>{{ $warehouse->state }}</td>
                        </tr>
                        <tr>
                            <td>Zip Code</td>
                            <td>{{ $warehouse->zipcode }}</td>
                        </tr>
                        <tr>
                            <td>Shift</td>
                            <td>Morning</td>
                        </tr>
                        {{--  <td>{{ \Carbon\Carbon::parse($delivery->end_time)->format('Y-m-d') }}</td>
                                <td>{{ \Carbon\Carbon::parse($delivery->start_time)->format('H:i') }}</td> --}}
                        <tr>
                            <td>Opening Time</td>
                            <td>{{ \Carbon\Carbon::parse($warehouse->morning_opening_time)->format('H:i') }}</td> 
                        </tr>
                        <tr>
                            <td>Closing Time</td>
                            <td>{{ \Carbon\Carbon::parse($warehouse->morning_closing_time)->format('H:i') }}</td>
                        </tr>
                         <tr>
                            <td>Shift</td>
                            <td>Evening</td>
                        </tr>
                        <tr>
                            <td>Opening Time</td>
                            <td>{{ \Carbon\Carbon::parse($warehouse->evening_opening_time)->format('H:i') }}</td>
                        </tr>
                        <tr>
                            <td>Closing Time</td>
                            <td>{{ \Carbon\Carbon::parse($warehouse->evening_closing_time)->format('H:i') }}</td>
                        </tr>
                         <tr>
                            <td>Shift</td>
                            <td>Night</td>
                        </tr>
                        <tr>
                            <td>Opening Time</td>
                            <td>{{ \Carbon\Carbon::parse($warehouse->night_opening_time)->format('H:i') }}</td>
                        </tr>
                        <tr>
                            <td>Closing Time</td>
                            <td>{{ \Carbon\Carbon::parse($warehouse->night_closing_time)->format('H:i') }}</td>
                        </tr>
                         <tr>
                            <td>Shift</td>
                            <td>Weekend</td>
                        </tr>
                        <tr>
                            <td>Opening Time</td>
                            <td>{{ \Carbon\Carbon::parse($warehouse->weekend_opening_time)->format('H:i') }}</td>
                        </tr>
                        <tr>
                            <td>Closing Time</td>
                            <td>{{ \Carbon\Carbon::parse($warehouse->weekend_closing_time)->format('H:i') }}</td>
                        </tr>



                    </tbody>
                </table>
            </div>
        </div>

        {{-- End Warehouse Details --}}


        {{-- start watehouse manger --}}

            <div class="row">
            <div class="col-md-10 text-center">
                <h4>Manager</h4>
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
            <a href="{{ route('admin.manager.create') }}" class = "btn btn-sm btn-primary" >Add Manager <i class = "fa fa-plus"></i>
            </a>
        </div>

        </div>
        <br>
        <br>
        <div class="row">
            <div class="col-md-12">
                <h4>Customer Manager</h4>
             @if(!empty($warehouse->manager))

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
                        @foreach($warehouse->manager as $manager)
                        <tr>
                         <td>{{ $manager->id }}</td>
                             <td>{{ $manager->first_name }}</td>
                            <td>{{ $manager->last_name }}</td>
                             <td>{{ $manager->email }}</td>
                            <td>{{ ucfirst($manager->job_title) }}</td>
                            <td>{{ $manager->manager->customer_name }}</td>
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
                 @else
                    <h4 style = "text-align:center;">No Manager Found!</h4>
                @endif

            </div>
        </div>

        {{-- end watehouse manager --}}


         {{-- start watehouse employees --}}

            <div class="row">
            <div class="col-md-10 text-center">
                <h4>Employee</h4>
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
            <a href="{{ route('admin.employee.create') }}" class = "btn btn-sm btn-primary" >Add Employee <i class = "fa fa-plus"></i>
            </a>
        </div>
        </div>
        <br>
         <br>
        <div class="row">
            <div class="col-md-12">
                <h4>Customer Employees</h4>
                @if(!empty($warehouse->employee))

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
                            @foreach($warehouse->employee as $employee)
                                <tr>
                                    <td>{{ $employee->id }}</td>
                                    <td>{{ $employee->first_name }}</td>
                                    <td>{{ $employee->last_name }}</td>
                                    <td>{{ $employee->email }}</td>
                                    <td>{{ ucfirst($employee->job_title) }}</td>
                                    <td>{{ $employee->employee->customer_name }}</td>
                                    <td>
                                        <a href="{{ route('admin.employee.show', $employee->id) }}" class = "btn btn-sm btn-info"><i class = "fa fa-eye"></i></a>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.employee.edit', $employee->id) }}" class = "btn btn-sm btn-warning"><i class = "fa fa-edit"></i></a>
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.employee.destroy', $employee->id) }}" method = "POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type = "submit" name = "submit" onclick = "return confirm('Do You Really Want to Delete?')"  class = "btn btn-sm btn-danger"><i class = "fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- {{ $employees->links() }} --}}
                @else
                    <h4 style = "text-align:center;">No Employee Found!</h4>
                @endif
            </div>
        </div>

         {{-- end watehouse employees --}}
    </div>
@endsection
