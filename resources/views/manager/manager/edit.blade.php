@extends('layouts.admin.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-11 text-center">
                <h4>Update Manager Details</h4>
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
                <a href="{{route('admin.manager.index')}}" class = "btn btn-sm btn-primary">View All <i class = "fa fa-eye"></i></a>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <form action="{{ route('admin.manager.update', $manager->id) }}" method = "POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                        <div class="form-row">

          <div class="form-group col-md-12">
           <label for="">Select Warehouse</label>
           <select class="form-control" name="warehouse_id" required>
            <option value="{{ $manager->warehouse_id }}">{{ $manager->manager->warehouse_name }}</option>
            @foreach($manager['warehouses'] as $warehouse)
            <option value="{{ $warehouse->id }}">{{ $warehouse->warehouse_name }}</option>
            @endforeach
          </select>     
        </div>

        <div class="form-group col-md-12">
          <label for="">Social Security Number</label>
          <input type="text" class="form-control" name="ssn" value="{{ $manager->ssn }}" placeholder="Social Security Number" required>
        </div>                    
        
        <div class="form-group col-md-6">
          <label for="">First Name</label>
          <input type="text" class="form-control" name="first_name" value="{{ $manager->first_name }}" placeholder="First Name" required>
        </div>
        <div class="form-group col-md-6">
          <label for="">Last Name</label>
          <input type="text" class="form-control" name="last_name" value="{{ $manager->last_name }}" placeholder="Last Name" required>
        </div>
        
        
        <div class="form-group col-md-6">
          <label for="">Email</label>
          <input type="email" class="form-control" name="email" value="{{ $manager->email }}" placeholder="emailaddress@example.com" required>
        </div>
        <div class="form-group col-md-6">
          <label for="">Phone</label>
          <input type="text" class="form-control" name="phone" value="{{ $manager->phone }}" placeholder="Phone Number" required>
        </div>
        <div class="form-group col-md-6">
          <label for="">Date Of Birth</label>
          <input type="text" class="form-control" name="date_of_birth" value="{{ $manager->date_of_birth }}" placeholder="YYYY-MM-DD" required>
        </div>
        <div class="form-group col-md-6">
          <label for="">Password</label>
          <input type="password" class="form-control" name="password" value="{{ $manager->password }}" placeholder="Password" required>
        </div>
        <div class="form-group col-md-12">
          <label for="">Address</label>
          <input type="text" class="form-control" name="address" value="{{ $manager->address }}" placeholder="Street, Apartment, or floor" required>
        </div>
        
        <div class="form-group col-md-4">
          <label for="">State</label>
          <input type="text" class="form-control" name="state" value="{{ $manager->state }}" placeholder="State" required>
        </div>
        <div class="form-group col-md-4">
          <label for="">City</label>
          <input type="text" class="form-control" name="city" value="{{ $manager->city }}" placeholder="City" required>
        </div>
        <div class="form-group col-md-4">
          <label for="">Zip Code</label>
          <input type="text" class="form-control" name="zipcode" value="{{ $manager->zipcode }}" placeholder="e.g: 54000" required>
        </div>
        <div class="form-group col-md-4">
          <label for="">Pay System</label>
          <input type="text" class="form-control" name="pay_system" value="{{ $manager->pay_system }}" placeholder="Fix or By Hours" required>
        </div>
        <div class="form-group col-md-4">
          <label for="">Pay Currency</label>
          <input type="text" class="form-control" name="pay_currency" value="{{ $manager->pay_currency }}" placeholder="e.g: $" required>
        </div>
        <div class="form-group col-md-4">
          <label for="">Pay</label>
          <input type="text" class="form-control" name="pay" value="{{ $manager->pay }}" placeholder="Pay" required>
        </div>
        {{-- <input type="hidden" class="form-control" name="job_title" value="manager"> --}}
        <div class="form-group col-md-4">
          <label for="">Job Title</label>
          <input type="text" class="form-control" name="job_title" value="manager" disabled placeholder="Manager">
        </div>
        <div class="form-group col-md-4">
          <label for="">Hiring Date</label>
          <input type="text" class="form-control" name="hiring_date" value="{{ $manager->hiring_date }}" placeholder="YYYY-MM-DD" required>
        </div>
        <div class="form-group col-md-4">
          <label for="">Joining Date</label>
          <input type="text" class="form-control" name="joining_date" value="{{ $manager->joining_date }}" placeholder="YYYY-MM-DD" required>
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