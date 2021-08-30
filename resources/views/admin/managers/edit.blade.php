@extends('layouts.admin.app')
@section('content')
    <div class="container-fluid" style="margin-top:95px;">
        <div class="row">
            <div class="col-md-10 text-center">
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
            <div class="col-md-2">
                <a href="{{route('admin.manager.index')}}" class = "btn btn-primary">View All <i class = "fa fa-eye"></i></a>
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
           <label for="">Select Customer</label>
           <select class="form-control" name="customer_id" required>
            <option value="{{ $manager->customer_id }}">{{ $manager->manager->customer_name }}</option>
            @foreach($manager['warehouses'] as $warehouse)
            <option value="{{ $warehouse->id }}">{{ $warehouse->customer_name }}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group col-md-12">
          <label for="">Social Security Number</label>
          <input type="text" class="form-control" pattern="[0-9]{5}" name="ssn" value="{{ $manager->ssn }}" placeholder="Enter Last 5 Digits e.g: 12345" required>
        </div>

        <div class="form-group col-md-6">
          <label for="">First Name</label>
          <input type="text" class="form-control" name="first_name" value="{{ $manager->first_name }}" placeholder="First Name" required>
        </div>
        <div class="form-group col-md-6">
          <label for="">Last Name</label>
          <input type="text" class="form-control" name="last_name" value="{{ $manager->last_name }}" placeholder="Last Name">
        </div>


        <div class="form-group col-md-6">
          <label for="">Email</label>
          <input type="email" class="form-control" name="email" value="{{ $manager->email }}" placeholder="emailaddress@example.com" required>
        </div>
        <div class="form-group col-md-6">
          <label for="">Phone</label>
          <input type="text" class="form-control" name="phone" value="{{ $manager->phone }}" placeholder="Phone Number">
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
          <input type="text" class="form-control" name="address" value="{{ $manager->address }}" placeholder="Street, Apartment, or floor">
        </div>
        <div class="form-group col-md-4">
          <label for="">City</label>
          <input type="text" class="form-control" name="city" value="{{ $manager->city }}" placeholder="City">
        </div>
        <div class="form-group col-md-4">
          <label for="">State</label>
          <input type="text" class="form-control" name="state" value="{{ $manager->state }}" placeholder="State">
        </div>
        <div class="form-group col-md-4">
          <label for="">Zip Code</label>
          <input type="text" class="form-control" name="zipcode" value="{{ $manager->zipcode }}" placeholder="e.g: 54000">
        </div>
          {{-- <div class="form-group col-md-6">
          <label for="">Pay System</label>
           <select name="pay_system" id="" class = "form-control">
            <option value="{{ $manager->pay_system }}">{{ ucfirst($manager->pay_system) }}</option>

           <option value="By Hours">By Hours</option>

            <option value="load">Fix</option>
            <option value="load">Both</option>

           </select>
          </div>
        <div class="form-group col-md-6">
          <label for="">Pay</label>
          <input type="text" class="form-control" name="pay" value="{{ $manager->pay }}" placeholder="Pay">
        </div> --}}

        <div class="form-row">
            <div class="form-group col-md-6">
             <label for="">Fix</label>
             <input type="number" class="form-control" name="fix_pay" placeholder="Enter Fix Pay" value="{{ $manager->fix_pay }}">
           </div>
            <div class="form-group col-md-6">
             <label for="">Hourly</label>
             <input type="number" class="form-control" name="hourly_pay" placeholder="Enter Per Hour Pay" value="{{ $manager->hourly_pay }}">
           </div>
            <div class="form-group col-md-6">
             <label for="">Overtime</label>
             <input type="number" class="form-control" name="overtime_pay" placeholder="Enter Overtime Pay" value="{{ $manager->overtime_pay }}">
           </div>
            <div class="form-group col-md-6">
             <label for="">Weekend</label>
             <input type="number" class="form-control" name="weekend_pay" placeholder="Enter Weekend Pay" value="{{ $manager->weekend_pay }}">
           </div>
        </div>

         <div class="form-group col-md-6">
            <label for="">Job Title</label>
            <select name="job_title" class = "form-control">
              <option value="{{ $manager->job_title }}">{{ $manager->job_title }}</option>
             <option value="">Select Job Title</option>
             <option value="Facility Manager">Facility Manager</option>
             <option value="Supervisor">Supervisor</option>
             <option value="Lead">Lead</option>
             <option value="Clerical">Clerical</option>
           </select>
          </div>
        <div class="form-group col-md-6">
          <label for="">Hiring Date</label>
          <input type="date" class="form-control" name="hiring_date" value="{{  \Carbon\Carbon::parse($manager->hiring_date)->format('Y-m-d') }}">
        </div>

      </div>

      <div class="form-group row">
        <label for="" class="col-sm-4 col-form-label"></label>
        <div class="col-md-12">
          <input type="submit" name = "submit" class = "btn btn-sm btn-primary form-control" value = "Update Manager">
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
