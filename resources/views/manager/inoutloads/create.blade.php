@extends('layouts.manager.app')
@section('content')
    <?php
    $xyz = $inOutLoad->id;
    $xyz++ ;
    ?>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-10 text-center">
      <h4>Add Load</h4>
      @if(session()->has('message'))

      <div class="alert alert-success text-center" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
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
      <a href="{{ route('manager.inoutloads.index') }}" class = "btn btn-primary">View All <i class = "fa fa-eye"></i></a>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-12">
      <form action="{{ route('manager.inoutloads.store') }}" method = "POST" enctype="multipart/form-data">
        {{ csrf_field() }}

      <div class="form-row">
        <div class="form-group col-md-2 col-lg-2">
         <label for="">Date</label>
         <input type="text" readonly class="form-control" name="date" value="<?php echo date('Y-m-d');?>">
        </div>
        <div class="form-group col-md-3 col-lg-2">
         <label for="">Load/Project ID</label>
{{--            <select name="load_project_id" id="" class ="form-control">--}}
{{--                <option value="">Select Customer</option>--}}
{{--                @foreach($inOutLoad as $load)--}}
{{--                    <option value="{{ $load->id }}">{{ $load->id }}</option>--}}
{{--                @endforeach--}}
{{--            </select>--}}
         <input type="text" readonly class="form-control"  value="<?php echo $xyz;?>" name="load_project_id">
        </div>
        <div class="form-group col-md-2 col-lg-2">
          <label for="">Customer</label>
          <select name="customer_id" id="" class ="form-control">
           <option value="">Select Customer</option>
           @foreach($customers as $customer)
           <option value="{{ $customer->id }}">{{ $customer->customer_name }}</option>
           @endforeach
          </select>
        </div>
        <div class="form-group col-md-3 col-lg-3">
         <label for="">Load/Project Date</label>
         <input type="date" class="form-control" name="load_project_date" >
        </div>
        <div class="form-group col-md-2 col-lg-3">
          <label for="">Load/Project Type</label>
          <select  id="" class = "form-control" name="load_project_type">
           <option value="">Select Load/Project Type</option>
           <option value="Rebox">Rebox </option>
           <option value="Palletize">Palletize</option>
           <option value="Repalletize">Repalletize</option>
           <option value="Boxing">Boxing</option>
           <option value="Sanitation">Sanitation</option>
           <option value="Rework">Rework</option>
           <option value="Pallet Repair">Pallet Repair</option>
           <option value="Load out">Load out</option>
           <option value="Rework">Rework</option>
           <option value="Labeling">Labeling</option>
           <option value="Barcoding">Barcoding</option>
           <option value="Wrapping">Wrapping</option>
           <option value="Adding slip sheets">Adding slip sheets</option>
           <option value="Contract packaging">Contract packaging</option>
           <option value="Case pick">Case pick</option>
           <option value="Selecting">Selecting</option>
           <option value="Consolidating">Consolidating</option>
           <option value="Put away">Put away</option>
           <option value="Staging">Staging</option>
           <option value="Order fulfillment">Order fulfillment</option>
           <option value="Unload">Unload</option>
         </select>
        </div>

      </div>


      <div class="form-row">

        <div class="form-group col-md-2">
          <label for="">Bill to</label>
          <select name="bill_to_id" id="" class ="form-control">
           <option value="">Select Bill to</option>
           @foreach($customers as $customer)
           <option value="{{ $customer->id }}">{{ $customer->customer_name }}</option>
           @endforeach
         </select>
        </div>
        <div class="form-group col-md-2">
          <label for="">Location</label>
          <select name="location" id="" class ="form-control">
           <option value="">Select Location</option>
           @foreach($customers as $customer)
           <option value="{{ $customer->street_address }}">{{ $customer->street_address }}</option>
           @endforeach
          </select>
        </div>
        <div class="form-group col-md-2">
            <label for="">Payment Type</label>
            <select name="payment_type" id="" class = "form-control">
             <option value="">Select Payment Method</option>
             <option value="bill customer location">Bill Customer Location</option>
             <option value="cash">Cash</option>
             <option value="fleet check">Fleet Check</option>
             <option value="bill carrier">Bill Carrier</option>
             <option value="bill vendor">Bill Vendor</option>
            </select>
        </div>
        <div class="form-group col-md-3">
            <label for="">Check Type</label>
            <input type="text" class="form-control"  placeholder="Enter Check Type" name="check_type">
        </div>
        <div class="form-group col-md-3">
            <label for="">Check Number</label>
            <input type="text" class="form-control"  placeholder="Enter check Number" name="check_number">
        </div>

      </div>


      <div class="form-row">

        {{--<div class="form-group col-md-2">
           <label for="">Driver name</label>
           <input type="text" class="form-control"  placeholder="" name="driver_name">
        </div>--}}
         <div class="form-group col-md-2">
          <label for="">Driver Name</label>
          <select name="driver_id" class ="form-control">
           <option value="">Select Driver</option>
           @foreach($drivers as $driver)
           <option value="{{ $driver->id }}">{{ $driver->first_name.' '.$driver->last_name }}</option>
           @endforeach
         </select>
        </div>
        <div class="form-group col-md-2">
              <label for="">Carrier</label>
              <input type="text" class="form-control"  placeholder="Enter Carrier" name="carrier">
            </div>

        <div class="form-group col-md-2">
              <label for="">Truck No.</label>
              <input type="text" class="form-control"  placeholder="Enter Truck No." name="truck_no">
        </div>
        <div class="form-group col-md-3">
              <label for="">Trailer No.</label>
              <input type="text" class="form-control" placeholder="Enter Trailer No." name="trailer_no">
        </div>
        <div class="form-group col-md-2">
            <label for="">Product</label>
            <select name="department_id" id="" class = "form-control">
             <option value="">Select product</option>
             @foreach($departments as $department)
             <option value="{{ $department->id }}">{{ $department->department_name }}</option>
             @endforeach
           </select>
        </div>
        {{-- <div class="form-group col-md-1">
          <label for="" style="visibility: hidden;">Add Product</label>
          <a href="javascript:void(0)" class="btn btn-primary mb-2" id="new-customer" data-toggle="modal">Add</a>
        </div> --}}

      </div>

      <div class="form-row">

        <div class="form-group col-md-2">
          <label for="">Shift</label>
            <select name="shift" id="" class = "form-control">
             <option value="">Select Shift</option>
             <option value="Morning">Morning</option>
             <option value="Evening">Evening</option>
             <option value="Night">Night</option>
             <option value="Weekend">Weekend</option>
            </select>
        </div>
        <div class="form-group col-md-1">
            <label for="">Dock</label>
            <select name="dock" id="" class = "form-control">
             <option>Select dock</option>
             <option value="Dry">Dry</option>
             <option value="Cold">Cold</option>
             <option value="Frozen">Frozen</option>
             <option value="Persihable">Persihable</option>
             <option value="Flow Through">Flow Through</option>
            </select>
        </div>
        <div class="form-group col-md-3">
            <label for="">Load/Project Control No.</label>
            <input type="text" class="form-control" placeholder="" name="load_project_control_no">
        </div>
        <div class="form-group col-md-2">
            <label for="">Trip No.</label>
            <input type="text" class="form-control"  placeholder="Enter Trip No." name="trip_no">
        </div>
        <div class="form-group col-md-2">
            <label for="">Trailer Type</label>
              <select name="trailer_type" id="" class = "form-control">
               <option value="">Select Trailer Type</option>
               <option value="Container">Container</option>
               <option value="Trailer">Trailer</option>
              </select>
        </div>
        <div class="form-group col-md-2">
            <label for="">Trailer Size</label>
              <select name="trailer_size" id="" class = "form-control">
               <option value="">Select Trailer Size</option>
               <option value="20">20</option>
               <option value="40">40</option>
               <option value="43">43</option>
               <option value="45">45</option>
               <option value="53">53</option>
              </select>
        </div>

      </div>

      <div class="form-row">

        <div class="form-group col-md-3">
            <label for="">Project Start Time</label>
            <input type="time" class="form-control"  placeholder="Enter Project Start Time" name="project_start_time">
        </div>
        <div class="form-group col-md-3">
            <label for="">Project End Time</label>
            <input type="time" class="form-control"  placeholder="Enter Project End Time" name="project_end_time">
        </div>
        <div class="form-group col-md-2">
            <label for="">In/Out Load/Project</label>
              <select name="in_out_load" id="" class = "form-control" required>
               <option>Select In/Out Load/Project</option>
               <option value="Inbound" selected>Inbound</option>
               <option value="Outbound">Outbound</option>
              </select>
        </div>
        <div class="form-group col-md-2">
              <label for="">Door No.</label>
              <input type="text" class="form-control"  placeholder="Enter Door Number" name="door_no">
        </div>
        <div class="form-group col-md-2">
              <label for="">Weight</label>
              <input type="text" class="form-control"  placeholder="Enter Weight" name="weight">
        </div>

      </div>

      <div class="form-row">

        <div class="form-group col-md-2">
              <label for="">PO No.</label>
              <input type="text" class="form-control"  placeholder="Enter PO No." name="po_no">
        </div>
        <div class="form-group col-md-3">
              <label for="">Load/Project trip No.</label>
              <input type="text" class="form-control" placeholder="" name="load_project_trip_no">
          </div>
        <div class="form-group col-md-3">
              <label for="">Bol/Shipment No.</label>
              <input type="text" class="form-control"  placeholder="" name="bol_shipment_no">
        </div>
        <div class="form-group col-md-2">
              <label for="">Shipper</label>
              <input type="text" class="form-control" placeholder="Enter Shipper" name="shipper">
        </div>
        <div class="form-group col-md-2">
              <label for="">Vendor</label>
              <input type="text" class="form-control"  placeholder="Enter Vendor " name="vendor">
        </div>

      </div>

      <div class="form-row">

        <div class="form-group col-md-2">
            <label for="">Begin Case Ct</label>
            <input type="text" class="form-control" placeholder="" name="begin_case_ct">
        </div>
        <div class="form-group col-md-2">
            <label for="">Ending Case Ct</label>
            <input type="text" class="form-control"  placeholder="" name="ending_case_ct">
        </div>
        <div class="form-group col-md-2">
            <label for="">Begin Pallet Ct</label>
            <input type="text" class="form-control"  placeholder="" name="begin_pallet_ct">
        </div>
        <div class="form-group col-md-2">
            <label for="">Ending Pallet Ct</label>
            <input type="text" class="form-control" placeholder="" name="ending_pallet_ct">
        </div>
        <div class="form-group col-md-4">
            <label for="">Total Skus</label>
            <input type="text" class="form-control"  placeholder="Enter Total Skus" name="total_skus">
        </div>

      </div>


      <div class="form-row">

        <div class="form-group col-md-2">
            <label for="">Pieces</label>
            <input type="text" class="form-control"  placeholder="Enter Pieces" name="pieces">
        </div>
        <div class="form-group col-md-2">
            <label for="">Pallets In</label>
            <input type="text" class="form-control" placeholder="Enter Pallets In" name="pallets_in">
        </div>
        <div class="form-group col-md-2">
            <label for="">Pallets Out</label>
            <input type="text" class="form-control"  placeholder="Enter Pallets Out" name="pallets_out">
        </div>
        <div class="form-group col-md-3">
            <label for="">Begin Ship Packs</label>
            <input type="text" class="form-control"  placeholder="" name="begin_ship_packs">
        </div>
        <div class="form-group col-md-3">
            <label for="">Ending Ship Packs</label>
            <input type="text" class="form-control" placeholder="" name="ending_ship_packs">
        </div>

      </div>

         <div class="form-row">

        <div class="form-group col-md-4">
            <label for="">Late / No Show Charge</label>
            <input type="text" class="form-control"  placeholder="Enter Late / No Show Charge" name="late_no_show_charge">
        </div>
        <div class="form-group col-md-4">
            <label for="">Repalletize Pallets</label>
            <input type="text" class="form-control" placeholder="Enter Repalletize Pallets" name="repalletize_pallets">
        </div>
        <div class="form-group col-md-4">
            <label for="">Repalletize Charge</label>
            <input type="text" class="form-control"  placeholder="Enter Repalletize Charge" name="repalletize_charge">
        </div>

       </div>

       <div class="form-row">

        <div class="form-group col-md-3">
            <label for="">Bad Pallets</label>
            <input type="text" class="form-control"  placeholder="Enter Bad Pallets" name="bad_pallets">
        </div>
        <div class="form-group col-md-3">
            <label for="">Bad Pallet Charge</label>
            <input type="text" class="form-control" placeholder="Enter Bad Pallet Charge" name="bad_pallet_charge">
        </div>
        <div class="form-group col-md-3">
            <label for="">Reload Charge</label>
            <input type="text" class="form-control"  placeholder="Enter Reload Charge" name="reload_charge">
        </div>
         <div class="form-group col-md-3">
            <label for="">Special Charges</label>
            <input type="text" class="form-control"  placeholder="Enter Special Charges" name="special_charges">
        </div>

       </div>



  <div class="form-row">
   <div class="col-lg-6">
      <label style="font-size: 16px;"><input type="checkbox" id="hourlyPay" class="check" name="paycheck" value="hourly"><b> Hourly Pay</b></label>
    </div>
 <div class="col-lg-6">

      <label style="font-size: 16px;"><input type="checkbox" id="percentagePay" class="check" name="paycheck" value="percentage"><b> Percentage Pay</b></label>
    </div>
  </div>

  <div class="changefields" style="display: none">

    <div class="form-row">

     <div class="form-group col-md-2">
      <label for="">Charge</label>
      <input type="text" class="form-control income" id="charge" placeholder="Charged Amount" name="charge_amount">
    </div>
    <div class="form-group col-md-2">
      <label for="">Rebate %</label>
      <input type="text" class="form-control income" id="rebate" placeholder="Rebate Percentage" name="rebate_percentage">
    </div>
    <div class="form-group col-md-3">
      <label for="">Total Income Less Rebate</label>
      <input type="text" class="form-control "  id="incomeless_rebate" placeholder="Total Income Less Rebate" name="total_income_less_rebate" readonly>
    </div>
     <div class="form-group col-md-2">
      <label for="">Employee %</label>
      <input type="text" class="form-control pay_percentage"  id="pay_percentage" placeholder="Employee Pay Percentage" name="employee_percentage">
    </div>
    <div class="form-group col-md-3">
      <label for="">Employees Total Pay</label>
      <input type="text" class="form-control"  id="total_pay" placeholder="Employees Total Pay" readonly name="employee_total_pay">
    </div>

  </div>

  <div class="form-row">

     <div class="form-group col-md-4">
          <label for="">Associate Name</label>
          <select name="associate_id1" id="associate1" class ="form-control changefileds">
           <option value="">Select Associate</option>
           @foreach($employees as $employee)
           <option value="{{ $employee->id }}">{{ $employee->first_name.' '.$employee->last_name }}</option>
           @endforeach
         </select>
        </div>
  <div class="form-group col-md-4">
        <label for="">Associate Social Security Number</label>
        <input type="text" class="form-control changefileds" pattern="[0-9]{5}" name="ssn_associate1" placeholder="Enter Last 5 digits " id="ssn1">
    </div>
    <div class="form-group col-md-2">
      <label for="">Percentage %</label>
      <input type="text" class="form-control payout1 changefileds" id="percentage1" placeholder="Percentage" name="pay_percentage_associate1">
    </div>
    <div class="form-group col-md-2">
      <label for="">Payout</label>
      <input type="text" class="form-control changefileds"  id="payout1" readonly name="payout_associate1">
    </div>

  </div>
  <div class="form-row">
     <div class="form-group col-md-4">
          <label for="">Associate Name</label>
          <select name="associate_id2" id="associate2" class ="form-control changefileds">
           <option value="">Select Associate</option>
           @foreach($employees as $employee)
           <option value="{{ $employee->id }}">{{ $employee->first_name.' '.$employee->last_name }}</option>
           @endforeach
         </select>
        </div>
   <div class="form-group col-md-4">
        <label for="">Associate Social Security Number</label>
        <input type="text" class="form-control changefileds" pattern="[0-9]{5}" name="ssn_associate2" placeholder="Enter Last 5 digits " id="ssn2">
    </div>
    <div class="form-group col-md-2">
      <label for="">Percentage %</label>
      <input type="text" class="form-control payout2 changefileds" id="percentage2" placeholder="Percentage" name="pay_percentage_associate2">
    </div>
    <div class="form-group col-md-2">
      <label for="">Payout</label>
      <input type="text" class="form-control changefileds"  id="payout2" readonly name="payout_associate2">
    </div>
  </div>
  <div class="form-row">
     <div class="form-group col-md-4">
          <label for="">Associate Name</label>
          <select name="associate_id3" id="associate3" class ="form-control changefileds">
           <option value="">Select Associate</option>
           @foreach($employees as $employee)
           <option value="{{ $employee->id }}">{{ $employee->first_name.' '.$employee->last_name }}</option>
           @endforeach
         </select>
        </div>
    <div class="form-group col-md-4">
        <label for="">Associate Social Security Number</label>
        <input type="text" class="form-control changefileds" pattern="[0-9]{5}" name="ssn_associate3" placeholder="Enter Last 5 digits " id="ssn3">
    </div>

    <div class="form-group col-md-2">
      <label for="">Percentage %</label>
      <input type="text" class="form-control payout3 changefileds" id="percentage3" placeholder="Percentage" name="pay_percentage_associate3">
    </div>
    <div class="form-group col-md-2">
      <label for="">Payout</label>
      <input type="text" class="form-control changefileds"  id="payout3" readonly name="payout_associate3">
    </div>
  </div>
  <div class="form-row">
     <div class="form-group col-md-4">
          <label for="">Associate Name</label>
          <select name="associate_id4" id="associate4" class ="form-control changefileds">
           <option value="">Select Associate</option>
           @foreach($employees as $employee)
           <option value="{{ $employee->id }}">{{ $employee->first_name.' '.$employee->last_name }}</option>
           @endforeach
         </select>
        </div>
    <div class="form-group col-md-4">
        <label for="">Associate Social Security Number</label>
        <input type="text" class="form-control changefileds" pattern="[0-9]{5}" name="ssn_associate4" placeholder="Enter Last 5 digits" id="ssn4">
    </div>

    <div class="form-group col-md-2">
      <label for="">Percentage %</label>
      <input type="text" class="form-control payout4 changefileds" id="percentage4" placeholder="Percentage" name="pay_percentage_associate4">
    </div>
    <div class="form-group col-md-2">
      <label for="">Payout</label>
      <input type="text" class="form-control changefileds"  id="payout4" readonly name="payout_associate4">
    </div>
  </div>
  <div class="form-row">
     <div class="form-group col-md-4">
          <label for="">Associate Name</label>
          <select name="associate_id5" id="associate5" class ="form-control changefileds">
           <option value="">Select Associate</option>
           @foreach($employees as $employee)
           <option value="{{ $employee->id }}">{{ $employee->first_name.' '.$employee->last_name }}</option>
           @endforeach
         </select>
        </div>
    <div class="form-group col-md-4">
        <label for="">Associate Social Security Number</label>
        <input type="text" class="form-control changefileds" pattern="[0-9]{5}" name="ssn_associate5" placeholder="Enter Last 5 digits" id="ssn5">
    </div>

    <div class="form-group col-md-2">
      <label for="">Percentage %</label>
      <input type="text" class="form-control payout5 changefileds" id="percentage5" placeholder="Percentage" name="pay_percentage_associate5">
    </div>
    <div class="form-group col-md-2">
      <label for="">Payout</label>
      <input type="text" class="form-control changefileds"  id="payout5" readonly name="payout_associate5">
    </div>
  </div>
  <div class="form-row">
      <div class="form-group col-md-4">
          <label for="">Associate Name</label>
          <select name="associate_id6" id="associate6" class ="form-control changefileds">
           <option value="">Select Associate</option>
           @foreach($employees as $employee)
           <option value="{{ $employee->id }}">{{ $employee->first_name.' '.$employee->last_name }}</option>
           @endforeach
         </select>
        </div>
    <div class="form-group col-md-4">
        <label for="">Associate Social Security Number</label>
        <input type="text" class="form-control changefileds" pattern="[0-9]{5}" name="ssn_associate6" placeholder="Enter Last 5 digits" id="ssn6">
    </div>

    <div class="form-group col-md-2">
      <label for="">Percentage %</label>
      <input type="text" class="form-control payout6 changefileds" id="percentage6" placeholder="Percentage" name="pay_percentage_associate6">
    </div>
    <div class="form-group col-md-2">
      <label for="">Payout</label>
      <input type="text" class="form-control changefileds"  id="payout6" readonly name="payout_associate6">
    </div>
  </div>

  </div>

   <div class="form-row showfields" style="display: none">

    {{-- <div class="form-row">

     <div class="form-group col-md-4">
      <label for="">Charge</label>
      <input type="text" class="form-control income1" id="charge1" placeholder="Charged Amount" name="charge_amount">
    </div>
    <div class="form-group col-md-4">
      <label for="">Rebate %</label>
      <input type="text" class="form-control income1" id="rebate1" placeholder="Rebate Percentage" name="rebate_percentage">
    </div>
    <div class="form-group col-md-4">
      <label for="">Total Income Less Rebate</label>
      <input type="text" class="form-control "  id="incomeless_rebate1" placeholder="Total Income Less Rebate" name="total_income_less_rebate" readonly>
    </div>

  </div> --}}

    <div class="form-row">

   {{-- <div class="form-group col-md-2">
      <label for="">Associate Name</label>
      <input type="text" class="form-control" placeholder="Material Handler Name" name="associate1">
    </div>--}}
     <div class="form-group col-md-2">
          <label for="">Associate Name</label>
          <select name="associate_id" id="associate0" class ="form-control">
           <option value="">Select Associate</option>
           @foreach($employees as $employee)
           <option value="{{ $employee->id }}">{{ $employee->first_name.' '.$employee->last_name }}</option>
           @endforeach
         </select>
        </div>
  <div class="form-group col-md-3">
        <label for="">Associate Social Security Number</label>
        <input type="text" class="form-control" pattern="[0-9]{5}" name="ssn_associate" placeholder="Enter Last 5 digits " id="ssn0">
    </div>
    {{-- <div class="form-group col-md-3">
        <label for="">Pay System</label>
          <select name="pay_system" class = "form-control paySystem">
           <option readonly>Select Pay system</option>
           <option value="Fix">Fix</option>
           <option value="Hourly">Hourly</option>
           <option value="Overtime">Overtime</option>
           <option value="Weekend">Weekend</option>
         </select>
      </div> --}}
      <div class="form-group col-md-2">
        <label for="">Hourly Pay</label>
        <input type="number" class="form-control"  id="hourly_pay" placeholder="Hourly Pay" name="hourly_pay">
      </div>
      <div class="form-group col-md-2">
        <label for="">Hours</label>
        <input type="text" class="form-control"  id="hours" placeholder="Enter Working Hours" name="hours">
      </div>
    <div class="form-group col-md-2">
      <label for="">Payout</label>
      <input type="text" class="form-control"  id="payout0" readonly name="payout_associate">
    </div>
    </div>

  </div>

<div class="col-lg-12">
  <br>
</div>
  <div class="form-group row">
    <label for="" class="col-sm-4 col-form-label"></label>
    <div class="col-sm-4">
      <input type="submit" name = "submit" class = "btn btn-sm btn-primary form-control" value = "Add Load">
    </div>
  </div>
</form>
</div>
<div class="col-md-3"></div>
</div>
</div>
<!-- Add Department modal -->
{{-- <div class="modal fade" id="crud-modal" aria-hidden="true" >
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
                <strong>Product Name</strong>
                <input type="text" name="department_name" id="name" class="form-control" placeholder="Enter Product Name" onchange="validate()" required>
              </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" id="btn-save" name="btnsave" class="btn btn-primary">Submit</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              {{-- <a href="{{ route('admin.inoutloads.create') }}" class="btn btn-danger">Cancel</a> --}}
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div> --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
  $(document).ready(function () {

    /* When click New customer button */
    $('#new-customer').click(function () {
      $('#btn-save').val("create-customer");
      $('#customer').trigger("reset");
      $('#customerCrudModal').html("Add New Product");
      $('#crud-modal').modal('show');
    });

    $(document).ready(function(){
      $(".income").keyup(function(){
        var val1 = +$("#charge").val();
        var val2 = +$("#rebate").val();
        var income = val1 - [(val1*val2)/100];
        var pay = (val1*val2)/100;
        $("#incomeless_rebate").val(income);
        $("#total_pay").val(pay);
      });
    });
    $(document).ready(function(){
      $(".income1").keyup(function(){
        var val1 = +$("#charge1").val();
        var val2 = +$("#rebate1").val();
        if(val2 > 100){
          $('#rebate1').val("");
          $('#incomeless_rebate1').val("");
          alert("More then 100% is not Allowed!")
        }
        var income = val1 - [(val1*val2)/100];
        var pay = (val1*val2)/100;
        $("#incomeless_rebate1").val(income);

      });
    });

      $(document).ready(function(){
      $(".pay_percentage").keyup(function(){
        var val1 = +$("#incomeless_rebate").val();
        var val2 = +$("#pay_percentage").val();
        var pay = (val1*val2)/100;
        $("#total_pay").val(pay);
      });
    });

    $(document).ready(function(){
      $(".payout1").keyup(function(){
        var val1 = +$("#total_pay").val();
        var val2 = +$("#percentage1").val();
        var payout = (val1*val2)/100;
        $("#payout1").val(payout);


      });
    });
    $(document).ready(function(){
      $(".payout2").keyup(function(){
        var val1 = +$("#total_pay").val();
        var val2 = +$("#percentage2").val();
        var payout = (val1*val2)/100;
        $("#payout2").val(payout);
      });
    });
    $(document).ready(function(){
      $(".payout3").keyup(function(){
        var val1 = +$("#total_pay").val();
        var val2 = +$("#percentage3").val();
        var payout = (val1*val2)/100;
        $("#payout3").val(payout);
      });
    });
    $(document).ready(function(){
      $(".payout4").keyup(function(){
        var val1 = +$("#total_pay").val();
        var val2 = +$("#percentage4").val();
        var payout = (val1*val2)/100;
        $("#payout4").val(payout);
      });
    });
    $(document).ready(function(){
      $(".payout5").keyup(function(){
        var val1 = +$("#total_pay").val();
        var val2 = +$("#percentage5").val();
        var payout = (val1*val2)/100;
        $("#payout5").val(payout);
      });
    });
    $(document).ready(function(){
      $(".payout6").keyup(function(){
        var val1 = +$("#total_pay").val();
        var val2 = +$("#percentage6").val();
        var payout = (val1*val2)/100;
        $("#payout6").val(payout);
      });
    });

    //  $(document).ready(function(){
    //     $('input[type="checkbox"]').click(function(){
    //         if($(this).prop("checked") == true){
    //           $(".changefileds").hide();
    //           $(".showfields").css("display","block");
    //             console.log("Checkbox is checked.");
    //         }
    //         else if($(this).prop("checked") == false){
    //           $(".changefileds").show();
    //             console.log("Checkbox is unchecked.");
    //         }
    //     });
    // });

      $(document).ready(function(){
        $('#hourlyPay').click(function(){
            if($(this).is(":checked")){
               $(".showfields").css("display","block");
              console.log("Checkbox is checked.");
            }
            else if($(this).is(":not(:checked)")){
              $(".showfields").css("display","none");
                console.log("Checkbox is unchecked.");
            }
        });
    });

        $(document).ready(function(){

        $('#percentagePay').click(function(){

            if($('#percentagePay').prop("checked") == true)
            {

              $(".changefields").css("display","block");
                console.log("Checkbox is checked.");
            }
             else if($('#percentagePay').prop("checked") == false)
             {
                 $(".changefields").css("display","none");
                 console.log("Checkbox is unchecked.");
           }
        });
     });
         $(document).ready(function(){
    $('#hourlyPay').click(function() {
       if($('#percentagePay').prop('checked', true)){
           $('#percentagePay').prop('checked', false)
            $(".changefields").css("display","none");

       }

    });
});
        $(document).ready(function(){
    $('#percentagePay').click(function() {
       if($('#hourlyPay').prop('checked', true)){
           $('#hourlyPay').prop('checked', false)
            $(".showfields").css("display","none");

       }

    });
});

$(document).ready(function(){
    $("select.paySystem").change(function(){
        var paysystem = $(this).children("option:selected").val();
      if(paysystem === "Hourly"){
        $(".hours").css("display","block");
      }
      else if(paysystem === "Fix" || paysystem === "Overtime" || paysystem === "Weekend"){
        $(".hours").css("display","none");
      }
    });
});

$(document).ready(function(){
     $("#percentage1").keyup(function(){
      var value1 = +$("#percentage1").val();
      var value2 = +$("#percentage2").val();
      var value3 = +$("#percentage3").val();
      var value4 = +$("#percentage4").val();
      var value5 = +$("#percentage5").val();
      var value6 = +$("#percentage6").val();
      var val_1 = 100-(value2+value3+value4+value5+value6);
      if(value1 > val_1){
        $('#percentage1').val("");
        $('#payout1').val("");
        alert("You are not allowed to enter more than " + val_1 + "%");
      }
      if(value1 === 100 ){
        $("#percentage2").attr("readonly","true");
        $("#percentage3").attr("readonly","true");
        $("#percentage4").attr("readonly","true");
        $("#percentage5").attr("readonly","true");
        $("#percentage6").attr("readonly","true");
      }
      else if(value1 < 100  || value1 === ""){
        $("#percentage2").removeAttr("readonly");
        $("#percentage3").removeAttr("readonly");
        $("#percentage4").removeAttr("readonly");
        $("#percentage5").removeAttr("readonly");
        $("#percentage6").removeAttr("readonly");

      }

    });
});
$(document).ready(function(){
     $("#percentage2").keyup(function(){
      var value1 = +$("#percentage1").val();
      var value2 = +$("#percentage2").val();
      var value3 = +$("#percentage3").val();
      var value4 = +$("#percentage4").val();
      var value5 = +$("#percentage5").val();
      var value6 = +$("#percentage6").val();
      var val_2 = 100-(value1+value3+value4+value5+value6);
      if(value2 > val_2){
        $('#percentage2').val("");
        $('#payout2').val("");
        alert("You are not allowed to enter more than " + val_2 + "%");
      }
      var val2 = 100-value1;
      if(value2 > val2){
        $('#percentage2').val("");
        $('#payout2').val("");
        alert("You are not allowed to enter more than " + val2 + "%");
      }
      if(value2 === val2 ){

        $("#percentage3").attr("readonly","true");
        $("#percentage4").attr("readonly","true");
        $("#percentage5").attr("readonly","true");
        $("#percentage6").attr("readonly","true");
      }
      else if(value2 < val2  || value2 === ""){

        $("#percentage3").removeAttr("readonly");
        $("#percentage4").removeAttr("readonly");
        $("#percentage5").removeAttr("readonly");
        $("#percentage6").removeAttr("readonly");

      }

    });
});


    $(document).ready(function(){
     $("#percentage3").keyup(function(){
      var value1 = +$("#percentage1").val();
      var value2 = +$("#percentage2").val();
      var value3 = +$("#percentage3").val();
      var value4 = +$("#percentage4").val();
      var value5 = +$("#percentage5").val();
      var value6 = +$("#percentage6").val();
      var val_3 = 100-(value1+value2+value4+value5+value6);
      if(value3 > val_3){
        $('#percentage3').val("");
        $('#payout3').val("");
        alert("You are not allowed to enter more than " + val_3 + "%");
      }
      var val3 = 100-(value1+value2);
      if(value3 > val3){
        $('#percentage3').val("");
        $('#payout3').val("");
        alert("You are not allowed to enter more than " + val3 + "%");
      }
      if(value3 === val3 ){

        $("#percentage4").attr("readonly","true");
        $("#percentage5").attr("readonly","true");
        $("#percentage6").attr("readonly","true");
      }
      else if(value3 < val3  || value3 === ""){

        $("#percentage4").removeAttr("readonly");
        $("#percentage5").removeAttr("readonly");
        $("#percentage6").removeAttr("readonly");

      }

    });
});

        $(document).ready(function(){
     $("#percentage4").keyup(function(){
      var value1 = +$("#percentage1").val();
      var value2 = +$("#percentage2").val();
      var value3 = +$("#percentage3").val();
      var value4 = +$("#percentage4").val();
      var value5 = +$("#percentage5").val();
      var value6 = +$("#percentage6").val();
      var val_4 = 100-(value1+value2+value3+value5+value6);
      if(value4 > val_4){
        $('#percentage4').val("");
        $('#payout4').val("");
        alert("You are not allowed to enter more than " + val_4 + "%");
      }
      var val4 = 100-(value1+value2+value3);
      if(value4 > val4){
        $('#percentage4').val("");
        $('#payout4').val("");
        alert("You are not allowed to enter more than " + val4 + "%");
      }
      if(value4 === val4 ){

        $("#percentage5").attr("readonly","true");
        $("#percentage6").attr("readonly","true");
      }
      else if(value3 < val3  || value3 === ""){

        $("#percentage5").removeAttr("readonly");
        $("#percentage6").removeAttr("readonly");

      }

    });
});

    $(document).ready(function(){
     $("#percentage5").keyup(function(){
      var value1 = +$("#percentage1").val();
      var value2 = +$("#percentage2").val();
      var value3 = +$("#percentage3").val();
      var value4 = +$("#percentage4").val();
      var value5 = +$("#percentage5").val();
      var value6 = +$("#percentage6").val();
      var val_5 = 100-(value1+value2+value3+value4+value6);
      if(value5 > val_5){
        $('#percentage5').val("");
        $('#payout5').val("");
        alert("You are not allowed to enter more than " + val_5 + "%");
      }
      var val5 = 100-(value1+value2+value3+value4);
      if(value5 > val5){
        $('#percentage5').val("");
        $('#payout5').val("");
        alert("You are not allowed to enter more than " + val5 + "%");
      }

      if(value5 === val5 ){

        $("#percentage6").attr("readonly","true");
      }
      else if(value5 < val5 || value5 === ""){

        $("#percentage6").removeAttr("readonly");

      }

    });
});

      $(document).ready(function(){
     $("#percentage6").keyup(function(){
      var value1 = +$("#percentage1").val();
      var value2 = +$("#percentage2").val();
      var value3 = +$("#percentage3").val();
      var value4 = +$("#percentage4").val();
      var value5 = +$("#percentage5").val();
      var value6 = +$("#percentage6").val();
      var val6 = 100-(value1+value2+value3+value4+value5);
      if(value6 > val6){
        $('#percentage6').val("");
        $('#payout6').val("");
        alert("You are not allowed to enter more than " + val6 + "%");
      }
      // if(value6 === val6 ){

      //   $("#percentage4").attr("readonly","true");
      //   $("#percentage5").attr("readonly","true");
      //   $("#percentage6").attr("readonly","true");
      // }
      // else if(value3 < val3  || value3 === ""){

      //   $("#percentage4").removeAttr("readonly");
      //   $("#percentage5").removeAttr("readonly");
      //   $("#percentage6").removeAttr("readonly");

      // }

    });
});

  });
// onclick = "return alert('This Module is in Analysis and Development Phase! Sorry for inconvenience.')"


$(document).ready(function(){

      // Employee Change
      $('#associate0').change(function(){

         // Employee id
         var emp_id = $(this).val();
         // Empty the dropdown
         $('#ssn0').find('option').not(':first').remove();

         // AJAX request
         $.ajax({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type: 'POST',
           url: '{{ route("manager.get_ssn") }}',
           data: {
               'emp_id': emp_id
           },
           dataType: 'json',
           success: function(response){

             var len = 0;
             if(response['data'] != null){
               len = response['data'].length;
             }

             if(len > 0){
               // Read data and create <option >

                 var ssn = response['data'][0].ssn;
                 var hourly_pay = response['data'][0].hourly_pay;
                 console.log(ssn);
                 console.log(hourly_pay);

                 $("#ssn0").val(ssn);
                 $("#hourly_pay").val(hourly_pay);

             }

           }
        });
      });

      $(document).ready(function(){
      $("#hours").keyup(function(){
        var val1 = +$("#hourly_pay").val();
        var val2 = +$("#hours").val();
        var payout0 = (val1*val2);
        $("#payout0").val(payout0);
      });
    });




      // Employee Change
      $('#associate1').change(function(){

         // Employee id
         var emp_id = $(this).val();
         // Empty the dropdown
         $('#ssn1').find('option').not(':first').remove();

         // AJAX request
         $.ajax({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type: 'POST',
           url: '{{ route("manager.get_ssn") }}',
           data: {
               'emp_id': emp_id
           },
           dataType: 'json',
           success: function(response){

             var len = 0;
             if(response['data'] != null){
               len = response['data'].length;
             }

             if(len > 0){
               // Read data and create <option >

                 var ssn = response['data'][0].ssn;
                 console.log(ssn);

                 $("#ssn1").val(ssn);

             }

           }
        });
      });

      // Employee Change
      $('#associate2').change(function(){

         // Employee id
         var emp_id = $(this).val();
         // Empty the dropdown
         $('#ssn2').find('option').not(':first').remove();

         // AJAX request
         $.ajax({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type: 'POST',
           url: '{{ route("manager.get_ssn") }}',
           data: {
               'emp_id': emp_id
           },
           dataType: 'json',
           success: function(response){

             var len = 0;
             if(response['data'] != null){
               len = response['data'].length;
             }

             if(len > 0){
               // Read data and create <option >

                 var ssn = response['data'][0].ssn;
                 console.log(ssn);

                 $("#ssn2").val(ssn);

             }

           }
        });
      });

      // Employee Change
      $('#associate3').change(function(){

         // Employee id
         var emp_id = $(this).val();
         // Empty the dropdown
         $('#ssn3').find('option').not(':first').remove();

         // AJAX request
         $.ajax({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type: 'POST',
           url: '{{ route("manager.get_ssn") }}',
           data: {
               'emp_id': emp_id
           },
           dataType: 'json',
           success: function(response){

             var len = 0;
             if(response['data'] != null){
               len = response['data'].length;
             }

             if(len > 0){
               // Read data and create <option >

                 var ssn = response['data'][0].ssn;
                 console.log(ssn);

                 $("#ssn3").val(ssn);

             }

           }
        });
      });

      // Employee Change
      $('#associate4').change(function(){

         // Employee id
         var emp_id = $(this).val();
         // Empty the dropdown
         $('#ssn4').find('option').not(':first').remove();

         // AJAX request
         $.ajax({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type: 'POST',
           url: '{{ route("manager.get_ssn") }}',
           data: {
               'emp_id': emp_id
           },
           dataType: 'json',
           success: function(response){

             var len = 0;
             if(response['data'] != null){
               len = response['data'].length;
             }

             if(len > 0){
               // Read data and create <option >

                 var ssn = response['data'][0].ssn;
                 console.log(ssn);

                 $("#ssn4").val(ssn);

             }

           }
        });
      });

      // Employee Change
      $('#associate5').change(function(){

         // Employee id
         var emp_id = $(this).val();
         // Empty the dropdown
         $('#ssn5').find('option').not(':first').remove();

         // AJAX request
         $.ajax({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type: 'POST',
           url: '{{ route("manager.get_ssn") }}',
           data: {
               'emp_id': emp_id
           },
           dataType: 'json',
           success: function(response){

             var len = 0;
             if(response['data'] != null){
               len = response['data'].length;
             }

             if(len > 0){
               // Read data and create <option >

                 var ssn = response['data'][0].ssn;
                 console.log(ssn);

                 $("#ssn5").val(ssn);

             }

           }
        });
      });

      // Employee Change
      $('#associate6').change(function(){

         // Employee id
         var emp_id = $(this).val();
         // Empty the dropdown
         $('#ssn6').find('option').not(':first').remove();

         // AJAX request
         $.ajax({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type: 'POST',
           url: '{{ route("manager.get_ssn") }}',
           data: {
               'emp_id': emp_id
           },
           dataType: 'json',
           success: function(response){

             var len = 0;
             if(response['data'] != null){
               len = response['data'].length;
             }

             if(len > 0){
               // Read data and create <option >

                 var ssn = response['data'][0].ssn;
                 console.log(ssn);

                 $("#ssn6").val(ssn);

             }

           }
        });
      });

    });
</script>

@endsection
