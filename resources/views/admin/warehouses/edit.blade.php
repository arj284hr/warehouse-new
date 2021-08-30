@extends('layouts.admin.app')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-10 text-center">
      <h4>Update Customer</h4>
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
      <a href="{{route('admin.warehouse.index')}}" class = "btn btn-primary">View All <i class = "fa fa-eye"></i></a>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
      <form action="{{ route('admin.warehouse.update', $warehouse->id) }}" method = "POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PUT') }}

        <div class="form-row">
           <div class="form-group col-md-12">
            <label for="">Customer Name</label>
            <input type="text" class="form-control" name="customer_name" placeholder="Enter Customer Name" required value="{{ $warehouse->customer_name }}">
          </div>
          <div class="form-group col-md-12">
            <label for="">Street Address</label>
            <input type="text" class="form-control" name="street_address" placeholder="Enter Street Address" value="{{ $warehouse->street_address }}">
          </div>
             <div class="form-group col-md-4">
            <label for="">City</label>
            <input type="text" class="form-control" name="city" placeholder="City" value="{{ $warehouse->city }}">
          </div>
          <div class="form-group col-md-4">
            <label for="">State</label>
            <input type="text" class="form-control" name="state" placeholder="State" value="{{ $warehouse->state }}">
          </div>
          <div class="form-group col-md-4">
            <label for="">Zip Code</label>
            <input type="text" class="form-control" name="zipcode" placeholder="Zip Code"  value="{{ $warehouse->zipcode }}">
          </div>
           <div class="form-group col-md-12">
            <label for="">All Shifts</label>
            
          </div>

            <div class="form-group col-md-4">
            <label for="">Morning Shift</label>
            {{-- <input type="text" class="form-control" name="shift_morning" placeholder="Shift Name" value="Morning" required> --}}
          </div>

          <div class="form-group col-md-4">
            <label for="">Openinig Time</label>
            <input type="time" class="form-control" name="morning_opening_time" value="{{ \Carbon\Carbon::parse($warehouse->morning_opening_time)->format('H:i') }}">
          </div>
          <div class="form-group col-md-4">
            <label for="">Closing Time</label>
            <input type="time" class="form-control" name="morning_closing_time" value="{{ \Carbon\Carbon::parse($warehouse->morning_closing_time)->format('H:i') }}">
          </div>
              <div class="form-group col-md-4">
            <label for="">Evening Shift</label>
           {{--  <input type="text" class="form-control" name="shift_evening" placeholder="Shift Name" value="Evening" required> --}}
          </div>
          <div class="form-group col-md-4">
            <label for="">Openinig Time</label>
            <input type="time"   class="form-control" name="evening_opening_time" value="{{ \Carbon\Carbon::parse($warehouse->evening_opening_time)->format('H:i') }}">
          </div>
          <div class="form-group col-md-4">
            <label for="">Closing Time</label>
            <input type="time" class="form-control" name="evening_closing_time" value="{{ \Carbon\Carbon::parse($warehouse->evening_closing_time)->format('H:i') }}">
          </div>
              <div class="form-group col-md-4">
            <label for="">Night Shift</label>
           {{--  <input type="text" class="form-control" name="shift_night" placeholder="Shift Name" value="Night" required> --}}
          </div>
           <div class="form-group col-md-4">
            <label for="">Openinig Time</label>
            <input type="time"   class="form-control" name="night_opening_time" value="{{ \Carbon\Carbon::parse($warehouse->night_opening_time)->format('H:i') }}">
          </div>
          <div class="form-group col-md-4">
            <label for="">Closing Time</label>
            <input type="time" class="form-control" name="night_closing_time" value="{{ \Carbon\Carbon::parse($warehouse->night_closing_time)->format('H:i') }}">
          </div>
              <div class="form-group col-md-4">
            <label for="">Weekend Shift</label>
           {{--  <input type="text" class="form-control" name="shift_weekend" placeholder="Shift Name" value="Weekend" required> --}}
          </div>
          <div class="form-group col-md-4">
            <label for="">Openinig Time</label>
            <input type="time"   class="form-control" name="weekend_opening_time" value="{{ \Carbon\Carbon::parse($warehouse->weekend_opening_time)->format('H:i') }}">
          </div>
          <div class="form-group col-md-4">
            <label for="">Closing Time</label>
            <input type="time" class="form-control" name="weekend_closing_time" value="{{ \Carbon\Carbon::parse($warehouse->weekend_closing_time)->format('H:i') }}">
          </div>
        </div>
        <div class="col-md-4">
          <input type="hidden" name = "" class = "" value = "">
        </div>
        <div class="col-md-5">
          <input type="submit" name = "submit" class = "btn btn-sm btn-primary form-control" value = "Update Customer">
        </div>
        
      </form>
    </div>
    <div class="col-md-3"></div>
  </div>
</div>
@endsection