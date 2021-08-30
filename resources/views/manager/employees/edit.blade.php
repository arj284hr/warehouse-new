@extends('layouts.admin.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-11 text-center">
                <h4>Update Employee Details</h4>
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
                <a href="{{route('admin.employee.index')}}" class = "btn btn-sm btn-primary">View All <i class = "fa fa-eye"></i></a>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <form action="{{ route('admin.employee.update', $employee->id) }}" method = "POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                     <div class="form-row">

          <div class="form-group col-md-12">
           <label for="">Select Warehouse</label>
           <select class="form-control" name="warehouse_id" required>
            <option value="{{ $employee->warehouse_id }}">{{ $employee->employee->warehouse_name }}</option>
            @foreach($employee['warehouses'] as $warehouse)
            <option value="{{ $warehouse->id }}">{{ $warehouse->warehouse_name }}</option>
            @endforeach
          </select>     
        </div>

        <div class="form-group col-md-12">
          <label for="">Social Security Number</label>
          <input type="text" class="form-control" name="ssn" value="{{ $employee->ssn }}" placeholder="Social Security Number" required>
        </div>                    
        
        <div class="form-group col-md-6">
          <label for="">First Name</label>
          <input type="text" class="form-control" name="first_name" value="{{ $employee->first_name }}" placeholder="First Name" required>
        </div>
        <div class="form-group col-md-6">
          <label for="">Last Name</label>
          <input type="text" class="form-control" name="last_name" value="{{ $employee->last_name }}" placeholder="Last Name" required>
        </div>
        
        
        <div class="form-group col-md-6">
          <label for="">Email</label>
          <input type="email" class="form-control" name="email" value="{{ $employee->email }}" placeholder="emailaddress@example.com" required>
        </div>
        <div class="form-group col-md-6">
          <label for="">Phone</label>
          <input type="text" class="form-control" name="phone" value="{{ $employee->phone }}" placeholder="Phone Number" required>
        </div>
        <div class="form-group col-md-6">
          <label for="">Date Of Birth</label>
          <input type="text" class="form-control" name="date_of_birth" value="{{ $employee->date_of_birth }}" placeholder="YYYY-MM-DD" required>
        </div>
        <div class="form-group col-md-6">
          <label for="">Password</label>
          <input type="password" class="form-control" name="password" value="{{ $employee->password }}" placeholder="Password" required>
        </div>
        <div class="form-group col-md-12">
          <label for="">Address</label>
          <input type="text" class="form-control" name="address" value="{{ $employee->address }}" placeholder="Street, Apartment, or floor" required>
        </div>
        
        <div class="form-group col-md-4">
          <label for="">State</label>
          <input type="text" class="form-control" name="state" value="{{ $employee->state }}" placeholder="State" required>
        </div>
        <div class="form-group col-md-4">
          <label for="">City</label>
          <input type="text" class="form-control" name="city" value="{{ $employee->city }}" placeholder="City" required>
        </div>
        <div class="form-group col-md-4">
          <label for="">Zip Code</label>
          <input type="text" class="form-control" name="zipcode" value="{{ $employee->zipcode }}" placeholder="e.g: 54000" required>
        </div>
        <div class="form-group col-md-4">
          <label for="">Pay System</label>
          <input type="text" class="form-control" name="pay_system" value="{{ $employee->pay_system }}" placeholder="Fix or By Hours" required>
        </div>
        <div class="form-group col-md-4">
          <label for="">Pay Currency</label>
          <input type="text" class="form-control" name="pay_currency" value="{{ $employee->pay_currency }}" placeholder="e.g: $" required>
        </div>
        <div class="form-group col-md-4">
          <label for="">Pay</label>
          <input type="text" class="form-control" name="pay" value="{{ $employee->pay }}" placeholder="Pay" required>
        </div>
        {{-- <input type="hidden" class="form-control" name="job_title" value="employee"> --}}
        <div class="form-group col-md-4">
          <label for="">Job Title</label>
          <input type="text" class="form-control" name="job_title" value="employee" disabled placeholder="Employee">
        </div>
        <div class="form-group col-md-4">
          <label for="">Hiring Date</label>
          <input type="text" class="form-control" name="hiring_date" value="{{ $employee->hiring_date }}" placeholder="YYYY-MM-DD" required>
        </div>
        <div class="form-group col-md-4">
          <label for="">Joining Date</label>
          <input type="text" class="form-control" name="joining_date" value="{{ $employee->joining_date }}" placeholder="YYYY-MM-DD" required>
        </div>
      </div>
      
      <div class="form-group row">
        <label for="" class="col-sm-4 col-form-label"></label>
        <div class="col-md-12">
          <input type="submit" name = "submit" class = "btn btn-sm btn-primary form-control" value = "Update Employee">
        </div>
      </div>
                   
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
@endsection