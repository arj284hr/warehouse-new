@extends('layouts.admin.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 text-center">
                <h4>View Load</h4>
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
                <a href="{{ route('admin.inoutloads.index') }}" class = "btn btn-primary" ><i class = "fa fa-backward"></i> Back</a>
            </div>

        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <h4>Load Details</h4>
                <table class="table table-sm table-hover">
                    <tbody>
                        <tr>
                            <td style = "width: 500px;">Load ID</td>
                            <td>{{ $load->id }}</td>
                        </tr>
                        <tr>
                            <td>Customer</td>
                            <td>{{ $load->customer->customer_name }}</td>
                        </tr>

                        <tr>
                            <td>Location</td>
                            <td>
                                @if($load->location)
                                {{ $load->location }}
                                @else
                                N/A
                                @endif
                            </td>
                        </tr>

                          <tr>
                            <td>Bill To</td>
                            <td>
                                @if($load->bill_to_id)
                                {{ $load->bill_to->customer_name }}
                                @else
                                N/A
                                @endif
                            </td>
                        </tr>

                         <tr>
                            <td>In-Out-Load</td>
                            <td>
                                @if($load->in_out_load)
                                {{ $load->in_out_load }}
                                @else
                                N/A
                                @endif
                            </td>
                        </tr>

                         <tr>
                            <td>Load Project Control No.</td>
                            <td>
                                @if($load->load_project_control_no)
                                {{ $load->load_project_control_no }}
                                @else
                                N/A
                                @endif
                            </td>
                        </tr>

                         <tr>
                            <td>Load Project Date</td>
                            <td>
                                @if($load->load_project_date)
                                {{ \Carbon\Carbon::parse($load->load_project_date)->format('Y-m-d') }}
                                @else
                                N/A
                                @endif
                            </td>
                        </tr>

                         <tr>
                            <td>Begin Case Ct</td>
                            <td>
                                @if($load->begin_case_ct)
                                {{ $load->begin_case_ct }}
                                @else
                                N/A
                                @endif
                            </td>
                        </tr>

                         <tr>
                            <td>Ending Case Ct</td>
                            <td>
                                @if($load->ending_case_ct)
                                {{ $load->ending_case_ct }}
                                @else
                                N/A
                                @endif
                            </td>
                        </tr>

                         <tr>
                            <td>Begin Pallet Ct</td>
                            <td>
                                @if($load->begin_pallet_ct)
                                {{ $load->begin_pallet_ct }}
                                @else
                                N/A
                                @endif
                            </td>
                        </tr>

                         <tr>
                            <td>Ending Pallet Ct</td>
                            <td>
                                @if($load->ending_pallet_ct)
                                {{ $load->ending_pallet_ct }}
                                @else
                                N/A
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Begin Ship Packs</td>
                            <td>
                                @if($load->begin_ship_packs)
                                {{ $load->begin_ship_packs }}
                                @else
                                N/A
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Ending Ship Packs</td>
                            <td>
                                @if($load->ending_ship_packs)
                                {{ $load->ending_ship_packs }}
                                @else
                                N/A
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Trailer Type</td>
                            <td>
                                @if($load->trailer_type)
                                {{ $load->trailer_type }}
                                @else
                                N/A
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Trailer Size</td>
                            <td>
                                @if($load->trailer_size)
                                {{ $load->trailer_size }}
                                @else
                                N/A
                                @endif
                            </td>
                        </tr>
                         <tr>
                            <td>Load Project Trip No.</td>
                            <td>
                                @if($load->load_project_trip_no)
                                {{ $load->load_project_trip_no }}
                                @else
                                N/A
                                @endif
                            </td>
                        </tr>

                         <tr>
                            <td>Driver Name</td>
                            <td>
                                @if($load->driver_id)
                                {{ $load->driver->first_name .' '. $load->driver->last_name }}
                                @else
                                N/A
                                @endif
                            </td>
                        </tr>
                         <tr>
                            <td>Shift</td>
                            <td>
                                @if($load->shift)
                                {{ $load->shift }}
                                @else
                                N/A
                                @endif
                            </td>
                        </tr>
                         <tr>
                            <td>Payment Type</td>
                            <td>
                                @if($load->payment_type)
                                {{ $load->payment_type }}
                                @else
                                N/A
                                @endif
                            </td>
                        </tr>
                         <tr>
                            <td>Load/Project Type</td>
                            <td>
                                @if($load->load_project_type)
                                {{ $load->load_project_type }}
                                @else
                                N/A
                                @endif
                            </td>
                        </tr>
                         <tr>
                            <td>Weight</td>
                            <td>
                                @if($load->weight)
                                {{ $load->weight }}
                                @else
                                N/A
                                @endif
                            </td>
                        </tr>
                         <tr>
                            <td>Pieces</td>
                            <td>
                                @if($load->pieces)
                                {{ $load->pieces }}
                                @else
                                N/A
                                @endif
                            </td>
                        </tr>
                         <tr>
                            <td>Pallets In</td>
                            <td>
                                @if($load->pallets_in)
                                {{ $load->pallets_in }}
                                @else
                                N/A
                                @endif
                            </td>
                        </tr>
                         <tr>
                            <td>Carrier</td>
                            <td>
                                @if($load->carrier)
                                {{ $load->carrier }}
                                @else
                                N/A
                                @endif
                            </td>
                        </tr>
                         <tr>
                            <td>Trailer No.</td>
                            <td>
                                @if($load->trailer_no)
                                {{ $load->trailer_no }}
                                @else
                                N/A
                                @endif
                            </td>
                        </tr>
                         <tr>
                            <td>Dock</td>
                            <td>
                                @if($load->dock)
                                {{ $load->dock }}
                                @else
                                N/A
                                @endif
                            </td>
                        </tr>
                         <tr>
                            <td>Truck No.</td>
                            <td>
                                @if($load->truck_no)
                                {{ $load->truck_no }}
                                @else
                                N/A
                                @endif
                            </td>
                        </tr>
                         <tr>
                            <td>Door No.</td>
                            <td>
                                @if($load->door_no)
                                {{ $load->door_no }}
                                @else
                                N/A
                                @endif
                            </td>
                        </tr>
                         <tr>
                            <td>Trip No.</td>
                            <td>
                                @if($load->trip_no)
                                {{ $load->trip_no }}
                                @else
                                N/A
                                @endif
                            </td>
                        </tr>
                         <tr>
                            <td>Total Skus</td>
                            <td>
                                @if($load->total_skus)
                                {{ $load->total_skus }}
                                @else
                                N/A
                                @endif
                            </td>
                        </tr>
                         <tr>
                            <td>Po No.</td>
                            <td>
                                @if($load->po_no)
                                {{ $load->po_no }}
                                @else
                                N/A
                                @endif
                            </td>
                        </tr>
                         <tr>
                            <td>Bol Shipment No.</td>
                            <td>
                                @if($load->bol_shipment_no)
                                {{ $load->bol_shipment_no }}
                                @else
                                N/A
                                @endif
                            </td>
                        </tr>
                          <tr>
                            <td>Shipper</td>
                            <td>
                                @if($load->shipper)
                                {{ $load->shipper }}
                                @else
                                N/A
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Vendor</td>
                            <td>
                                @if($load->vendor)
                                {{ $load->vendor }}
                                @else
                                N/A
                                @endif
                            </td>
                        </tr>
                          <tr>
                            <td>Project Start Time</td>
                            <td>
                                @if($load->project_start_time)
                                {{ \Carbon\Carbon::parse($load->project_start_time)->format('H:i') }}
                                @else
                                N/A
                                @endif
                            </td>
                        </tr>
                          <tr>
                            <td>Project End Time</td>
                            <td>
                                @if($load->project_end_time)
                                {{ \Carbon\Carbon::parse($load->project_end_time)->format('H:i') }}
                                @else
                                N/A
                                @endif
                            </td>
                        </tr>
                          <tr>
                            <td>Check Type</td>
                            <td>
                                @if($load->check_type)
                                {{ $load->check_type }}
                                @else
                                N/A
                                @endif
                            </td>
                        </tr>
                         <tr>
                            <td>Check Number</td>
                            <td>
                                @if($load->check_number)
                                {{ $load->check_number }}
                                @else
                                N/A
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Late No Show Charge</td>
                            <td>
                                @if($load->late_no_show_charge)
                                {{ $load->late_no_show_charge }}
                                @else
                                N/A
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Repalletize Pallets</td>
                            <td>
                                @if($load->repalletize_pallets)
                                {{ $load->repalletize_pallets }}
                                @else
                                N/A
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Repalletize Charge</td>
                            <td>
                                @if($load->repalletize_charge)
                                {{ $load->repalletize_charge }}
                                @else
                                N/A
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Bad Pallets</td>
                            <td>
                                @if($load->bad_pallets)
                                {{ $load->bad_pallets }}
                                @else
                                N/A
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Bad Pallet Charge</td>
                            <td>
                                @if($load->bad_pallet_charge)
                                {{ $load->bad_pallet_charge }}
                                @else
                                N/A
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Reload Charge</td>
                            <td>
                                @if($load->reload_charge)
                                {{ $load->reload_charge }}
                                @else
                                N/A
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Special Charges</td>
                            <td>
                                @if($load->special_charges)
                                {{ $load->special_charges }}
                                @else
                                N/A
                                @endif
                            </td>
                        </tr>
                        
                        @if(empty($pays) || $pays->count() >0)

                        @if($pays[0]->pay_system === 'percentage')

                        <tr>
                            <td>Charged Amount</td>
                            <td>
                                @if($load->charge_amount)
                                {{ $load->charge_amount }}
                                @else
                                N/A
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <td>Rebate Percentage</td>
                            <td>
                                @if($load->rebate_percentage)
                                {{ $load->rebate_percentage }}
                                @else
                                N/A
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <td>Total Income Less Rebate</td>
                            <td>
                                @if($load->total_income_less_rebate)
                                {{ $load->total_income_less_rebate }}
                                @else
                                N/A
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <td>Employee Percentage</td>
                            <td>
                                @if($load->employee_percentage)
                                {{ $load->employee_percentage }}
                                @else
                                N/A
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <td>Employees Total Pay</td>
                            <td>
                                @if($load->employee_total_pay)
                                {{ $load->employee_total_pay }}
                                @else
                                N/A
                                @endif
                            </td>
                        </tr>
                        @endif
                        @endif
                        


                        {{-- <tr>
                            <td></td>
                            <td>
                                @if($load->)
                                {{ $load-> }}
                                @else
                                N/A
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <td></td>
                            <td>
                                @if($load->)
                                {{ $load-> }}
                                @else
                                N/A
                                @endif
                            </td>
                        </tr> --}}

                       <br>
                       <br>
                       @if(empty($pays) || $pays->count() >0)
                       @if(isset($pays))
                       <tr>
                        <td>Pay System</td>
                        <td>
                            @if($pays[0]->pay_system)
                            {{ ucfirst($pays[0]->pay_system) }}
                            @else
                            N/A
                            @endif
                        </td>
                    </tr>
                       @foreach($pays as $pay)


                        @if($pay->pay_system == 'hourly')

                            <tr>
                              <td>Associate Name</td>
                              <td>
                                @if($pay->associate_id)
                                {{$pay->associate->first_name .' '.$pay->associate->last_name }}
                                {{-- {{ \App\User::where('id', $pay->associate_id)->first()->first_name }} --}}
                                @else
                                N/A
                                @endif
                              </td>
                            </tr>

                            <tr>
                                <td>Associate SSN</td>
                                <td>
                                  @if($pay->ssn_associate)
                                  {{ $pay->ssn_associate }}
                                  @else
                                  N/A
                                  @endif
                                </td>
                            </tr>


                            <tr>
                                <td>Hourly Pay</td>
                                <td>
                                  @if($pay->hourly_pay)
                                  {{ $pay->hourly_pay }}
                                  @else
                                  N/A
                                  @endif
                                </td>
                            </tr>


                            <tr>
                                <td>Working Hours</td>
                                <td>
                                  @if($pay->hours)
                                  {{ $pay->hours }}
                                  @else
                                  N/A
                                  @endif
                                </td>
                            </tr>


                            <tr>
                                <td>Total Pay</td>
                                <td>
                                  @if($pay->payout_associate)
                                  {{ $pay->payout_associate }}
                                  @else
                                  N/A
                                  @endif
                                </td>
                            </tr>

                        @endif

                        @endforeach

                        @php
                        $no = 0;
                        @endphp

                    @foreach($pays as $pay)

                            @php
                            $no++;
                            @endphp

                        @if($pay->pay_system == 'percentage')

                            <tr>
                                <td>{{$no.' - '}}Associate Name</td>
                                <td>
                                @if($pay->associate_id)
                                {{$pay->associate->first_name .' '.$pay->associate->last_name }}
                                {{-- {{ \App\User::where('id', $pay->associate_id)->first()->first_name  }} --}}
                                @else
                                N/A
                                @endif
                                </td>
                            </tr>

                            <tr>
                                <td>Associate SSN</td>
                                <td>
                                @if($pay->ssn_associate)
                                {{ $pay->ssn_associate }}
                                @else
                                N/A
                                @endif
                                </td>
                            </tr>

                            <tr>
                                <td>Associate Percentage</td>
                                <td>
                                @if($pay->pay_percentage_associate)
                                {{ $pay->pay_percentage_associate }}
                                @else
                                N/A
                                @endif
                                </td>
                            </tr>


                            <tr>
                                <td>Associate Pay</td>
                                <td>
                                @if($pay->payout_associate)
                                {{ $pay->payout_associate }}
                                @else
                                N/A
                                @endif
                                </td>
                            </tr>

                        @endif
                    @endforeach
                    @endif

                    @endif
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
