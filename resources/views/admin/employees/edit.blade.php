@extends('layouts.admin.app')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-10 text-center">
      <h4>Update Associate Details</h4>
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
      <a href="{{route('admin.employee.index')}}" class = "btn btn-primary">View All <i class = "fa fa-eye"></i></a>
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
           <label for="">Select Customer</label>
           <select class="form-control" name="customer_id" required>
            <option value="{{ $employee->customer_id }}">{{ $employee->employee->customer_name }}</option>
            @foreach($employee['warehouses'] as $warehouse)
            <option value="{{ $warehouse->id }}">{{ $warehouse->customer_name }}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group col-md-12">
          <label for="">Social Security Number</label>
          <input type="text" class="form-control" pattern="[0-9]{5}" name="ssn" value="{{ $employee->ssn }}" placeholder="Enter Last 5 Digits e.g: 12345" required>
        </div>

        <div class="form-group col-md-6">
          <label for="">First Name</label>
          <input type="text" class="form-control" name="first_name" value="{{ $employee->first_name }}" placeholder="First Name" required>
        </div>
        <div class="form-group col-md-6">
          <label for="">Last Name</label>
          <input type="text" class="form-control" name="last_name" value="{{ $employee->last_name }}" placeholder="Last Name">
        </div>


        <div class="form-group col-md-6">
          <label for="">Email</label>
          <input type="email" class="form-control" name="email" value="{{ $employee->email }}" placeholder="emailaddress@example.com" required>
        </div>
        <div class="form-group col-md-6">
          <label for="">Phone</label>
          <input type="text" class="form-control" name="phone" value="{{ $employee->phone }}" placeholder="Phone Number">
        </div>
         <div class="form-group col-md-6">
                  <label for="">Password</label>
                  <input type="password" class="form-control" name="password" id="password" placeholder="Password">
              </div>
               <div class="form-group col-md-6">
                  <label for="">Confirm Password</label>
                  <input type="password" class="form-control" name="confrim_password" id="confirm_password" placeholder="Confirm Password">
              </div>
              <div class="form-group col-md-12">
                    <span id='message'></span>
              </div>

              <div class="form-group col-md-12">
                   <input type="checkbox" onclick="toggle()"><b> Show Password</b>
              </div>
        <div class="form-group col-md-12">
          <label for="">Address</label>
          <input type="text" class="form-control" name="address" value="{{ $employee->address }}" placeholder="Street, Apartment, or floor">
        </div>
        <div class="form-group col-md-4">
          <label for="">City</label>
          <input type="text" class="form-control" name="city" value="{{ $employee->city }}" placeholder="City">
        </div>
        <div class="form-group col-md-4">
          <label for="">State</label>
          <input type="text" class="form-control" name="state" value="{{ $employee->state }}" placeholder="State">
        </div>
        <div class="form-group col-md-4">
          <label for="">Zip Code</label>
          <input type="text" class="form-control" name="zipcode" value="{{ $employee->zipcode }}" placeholder="e.g: 54000">
        </div>

        {{-- <div class="form-group col-md-6">
          <label for="">Pay System</label>
          <select name="pay_system" id="" class = "form-control" required>
            <option value="{{ $employee->pay_system }}">{{ ucfirst($employee->pay_system) }}</option>
            {{--  @if( $employee->pay_system === 'fix' )
            <option value="By Hours">By Hours</option>

            <option value="load">Fix</option>
            <option value="both">Both</option>

          </select>
        </div>

        <div class="form-group col-md-6">
          <label for="">Pay</label>
          <input type="text" class="form-control" name="pay" value="{{ $employee->pay }}" placeholder="Pay" >
        </div> --}}

        <div class="form-row">
            <div class="form-group col-md-6">
             <label for="">Fix</label>
             <input type="number" class="form-control" name="fix_pay" placeholder="Enter Fix Pay" value="{{ $employee->fix_pay }}">
           </div>
            <div class="form-group col-md-6">
             <label for="">Hourly</label>
             <input type="number" class="form-control" name="hourly_pay" placeholder="Enter Per Hour Pay" value="{{ $employee->hourly_pay }}">
           </div>
            <div class="form-group col-md-6">
             <label for="">Overtime</label>
             <input type="number" class="form-control" name="overtime_pay" placeholder="Enter Overtime Pay" value="{{ $employee->overtime_pay }}">
           </div>
            <div class="form-group col-md-6">
             <label for="">Weekend</label>
             <input type="number" class="form-control" name="weekend_pay" placeholder="Enter Weekend Pay" value="{{ $employee->weekend_pay }}">
           </div>
        </div>

        <div class="form-group col-md-6">
          <label for="">Job Title</label>
          <select name="job_title" class="form-control">
            <option value="{{ $employee->job_title }}">{{ $employee->job_title }}</option>
            <option value="">Select Job Title</option>
            <option value="Loader/Unloader">Loader/Unloader</option>
            <option value="ForkLift Driver">ForkLift Driver</option>
            <option value="Sanitation">Sanitation</option>
            <option value="General Labor">General Labor</option>
            <option value="Yard Driver">Yard Driver</option>
            <option value="Driver">Driver</option>
            <option value="Clerical">Clerical</option>
          </select>
        </div>
        <div class="form-group col-md-6">
          <label for="">Hiring Date</label>
          <input type="date" class="form-control" name="hiring_date" value="{{  \Carbon\Carbon::parse($employee->hiring_date)->format('Y-m-d') }}">
        </div>

      </div>

      <div class="form-group row">
        <label for="" class="col-sm-4 col-form-label"></label>
        <div class="col-md-12">
          <input type="submit" name = "submit" class = "btn btn-sm btn-primary form-control" value = "Update Associate">
        </div>
      </div>

    </form>
  </div>
  <div class="col-md-3"></div>
</div>
</div>
<script>
function toggle() {
  var x = document.getElementById("password");
  var y = document.getElementById("confirm_password");

  if (x.type === "password" && y.type === "password") {

    x.type = "text";
    y.type = "text";
  } else {
    x.type = "password";
    y.type = "password";
  }

}
$(document).ready(function(){
$('#password, #confirm_password').on('keyup', function () {
  if ($('#password').val() == $('#confirm_password').val()) {
    $('#message').html('Password Matching').css('color', 'green');
  } else
    $('#message').html('Password Not Matching').css('color', 'red');
});
});
</script>
@endsection
