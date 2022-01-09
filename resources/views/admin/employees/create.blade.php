@extends('layouts.admin.app')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-10 text-center">
      <h4>Add  Associate</h4>
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
      <a href="{{ route('admin.employee.index') }}" class = "btn btn-primary">View All <i class = "fa fa-eye"></i></a>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-7">
      <form action="{{ route('admin.employee.store') }}" method = "POST" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-row">

          <div class="form-group col-md-12">
           <label for="">Select Customer</label>
           <select class="form-control" name="customer_id" required>
            <option>Select Customer</option>
            @foreach($customers as $customer)
            <option value="{{ $customer->id }}">{{ $customer->customer_name }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="form-row">

        <div class="form-group col-md-12">
          <label for="">Social Security Number</label>
          <input type="text" class="form-control" pattern="[0-9]{5}" name="ssn" placeholder="Enter Last 5 Digits e.g: 12345" required>
        </div>
        </div>
        <div class="form-row">
        <div class="form-group col-md-6">
          <label for="">First Name</label>
          <input type="text" class="form-control" name="first_name" placeholder="First Name" required>
        </div>
        <div class="form-group col-md-6">
          <label for="">Last Name</label>
          <input type="text" class="form-control" name="last_name" placeholder="Last Name(optional)">
        </div>
      </div>

        <div class="form-row">
        <div class="form-group col-md-6">
          <label for="">Email</label>
          <input type="email" class="form-control" name="email" placeholder="emailaddress@example.com" required>
        </div>
         <div class="form-group col-md-6">
          <label for="">Phone</label>
          <input type="text" class="form-control" name="phone" placeholder="Phone Number" required>
        </div>
      </div>
      <div class="form-row">

      <div class="form-group col-md-6">
                  <label for="">Password</label>
                  <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
              </div>
               <div class="form-group col-md-6">
                  <label for="">Confirm Password</label>
                  <input type="password" class="form-control" name="confrim_password" id="confirm_password" placeholder="Confirm Password" required>
              </div>
              <div class="form-group col-md-12">
                    <span id='message'></span>
              </div>
              <div class="form-group col-md-12">
                   <input type="checkbox" onclick="toggle()"><b> Show Password</b>
              </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-12">
          <label for="">Address</label>
          <input type="text" class="form-control" name="address" placeholder="Street, Apartment, or floor">
        </div>
        </div>
        <div class="form-row">
           <div class="form-group col-md-4">
          <label for="">City</label>
          <input type="text" class="form-control" name="city" placeholder="City">
        </div>
        <div class="form-group col-md-4">
          <label for="">State</label>
          <input type="text" class="form-control" name="state" placeholder="State">
        </div>
        <div class="form-group col-md-4">
          <label for="">Zip Code</label>
          <input type="text" class="form-control" name="zipcode" placeholder="e.g: 54000">
        </div>
      </div>
      {{--   <div class="form-row">
           <div class="form-group col-md-6">
          <label for="">Pay System</label>
           <select name="pay_system" class = "form-control">
           <option>Select Pay System</option>
           <option value="By Hours">By Hours</option>
           <option value="Fix">Fix</option>
           <option value="Both">Both</option>
           </select>
        </div>
        <div class="form-group col-md-6">
          <label for="">Pay</label>
          <input type="text" class="form-control" name="pay" placeholder="Pay">
        </div>
      </div> --}}
      <div class="form-row">
         <div class="form-group col-md-6">
          <label for="">Fix</label>
          <input type="number" class="form-control" name="fix_pay" placeholder="Enter Fix Pay">
        </div>
         <div class="form-group col-md-6">
          <label for="">Hourly</label>
          <input type="number" class="form-control" name="hourly_pay" placeholder="Enter Per Hour Pay">
        </div>
         <div class="form-group col-md-6">
          <label for="">Overtime</label>
          <input type="number" class="form-control" name="overtime_pay" placeholder="Enter Overtime Pay">
        </div>
         <div class="form-group col-md-6">
          <label for="">Weekend</label>
          <input type="number" class="form-control" name="weekend_pay" placeholder="Enter Weekend Pay">
        </div>
      </div>
        <div class="form-row">
        <div class="form-group col-md-6">
            <label for="">Job Title</label>
            <select name="job_title" class="form-control">
             <option value="">Select Job Title</option>
             <option value="Loader/Unloader">Loader/Unloader</option>
             <option value="ForkLift Driver">ForkLift Driver</option>
             <option value="Sanitation">Sanitation</option>
             <option value="General Labor">General Labor</option>
             <option value="Yard Driver">Yard Driver</option>
             <option value="Driver">Driver</option>
             <option value="Clerical">Clerical</option>

             {{-- @foreach($departments as $department)
             <option value="{{ $department->id }}">{{ $department->department_name }}</option>
             @endforeach  --}}
           </select>
         </div>
          {{-- <div class="form-group col-md-3">
          <label for="" style="visibility: hidden;">Add Job Title</label>
          <a href="javascript:void(0)" class="btn btn-primary" id="job-title" data-toggle="modal">Add Job Title</a>
        </div> --}}
        <div class="form-group col-md-6">
          <label for="">Hiring Date</label>
          <input type="date" class="form-control" name="hiring_date">
        </div>
        {{-- <div class="form-group col-md-3">
          <label for="">Joining Date</label>
          <input type="date" class="form-control" name="joining_date" required>
        </div> --}}
      </div>




      <div class="form-group row">
        <label for="" class="col-sm-4 col-form-label"></label>
        <div class="col-md-12">
          <input type="submit" name = "submit" class = "btn btn-sm btn-primary form-control" value = "Add Associate">
        </div>
      </div>
    </form>
  </div>
  <div class="col-md-3"></div>
</div>
</div>

<!-- Add Job Title modal -->
<div class="modal fade" id="crud-modal" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="customerCrudModal"></h4>
      </div>
      <div class="modal-body">
        <form name="custForm" action="{{ route('admin.departments.store') }}" method="POST">
          <input type="hidden" name="cust_id" id="cust_id" >
          @csrf
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                <strong>Job Title</strong>
                <input type="text" name="job_title_name" id="name" class="form-control" placeholder="Enter Job Title" onchange="validate()" required>
              </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" id="btn-save" name="btnsave" class="btn btn-primary">Submit</button>
              <button type="button" class="btn btn-danger" id="close" data-dismiss="modal">Close</button>
              {{-- <a href="{{ route('admin.inoutloads.create') }}" class="btn btn-danger">Cancel</a> --}}
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function () {

    /* When click New customer button */
    $('#job-title').click(function () {
      $('#btn-save').val("create-customer");
      $('#customer').trigger("reset");
      $('#customerCrudModal').html("Add New Job Title");
      $('#crud-modal').modal('show');
    });
    $('#close').click(function () {
       $('#close').trigger("reset");
       });

    });
  </script>
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
