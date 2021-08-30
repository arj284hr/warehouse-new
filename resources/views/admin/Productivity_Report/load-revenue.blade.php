@extends('layouts.admin.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 text-center">
                <h4>Load Revenue Rebate</h4>
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
            {{--<div class="col-md-2">
                <a href="{{ route('admin.inoutloads.create') }}" class = "btn btn-primary" >Add New <i class = "fa fa-plus"></i></a>
            </div>--}}
        </div>
 
    </div>
    <br>
  <!--   <script>
    $('.datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{route('admin.inoutloads.index')}}",
        },
         
        columns: [
            {data: 'id', name: 'id', orderable: false, searchable: false, sClass: "align-middle table-image"},
            {data: 'date', name: 'date', orderable: false, searchable: false, sClass: "align-middle table-image"},
            {data: 'load_project_id', name: 'load_project_id', sClass: "align-middle"},
            {data: 'customer_id', name: 'customer_id', sClass: "align-middle"},
            {data: 'load_project_date', name: 'load_project_date', sClass: "align-middle"},
            {data: 'location', name: 'location', sClass: "align-middle"},
            {data: 'bill_to_id', name: 'bill_to_id', sClass: "align-middle"},
            {data: 'action', name: 'action',  searchable: false, sClass:"align-middle"},
        
        ],
        responsive: true
    });
</script> -->

    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-12 col-md-8 col-lg-8">
            <form action="{{route('admin.load-revenue')}}" method = "POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-row">

                  <div class="form-group col-4 col-md-4 col-lg-4">
          <label for="">Customer</label>
          <select name="customer_id" id="" class ="form-control">
           <option value="">Select Customer</option>
           @foreach($customers as $customer)
           <option value="{{ $customer->id }}">{{ $customer->customer_name }}</option>
           @endforeach 
          </select>  
        </div>
                
                <div class="form-group col-4 col-md-4 col-lg-4">
                    <label for="">Start Date</label>
                  <input type="date" class="form-control" name="start_date" id="start_date" required>
              </div>
             
              <div class="form-group col-4 col-md-4 col-lg-4">
                <label for="">End Date</label>
                  <input type="date" class="form-control" name="end_date" id="end_date" required>
              </div>
             
        <div class="form-group col-6 col-md-6 col-lg-6 m-auto">
            <label for="" style="visibility: hidden;">Customer </label>
            <input type="submit" name = "submit" id="submit" class = "btn btn-sm btn-primary form-control" value = "Get Load Revenue">
        </div>
    </div>
</form>
</div>
<div class="col-md-3"></div>
</div>
<br>
@if(isset($revenue))
<div class="container">
   
   <div class="row">
    @if($revenue->count() > 0)
    <div class="mb-2 text-right w-100">
        

        <a href="{{ route('admin.export-Load-Revenue') }}"><button type="button" class="btn btn-warning  " data-toggle="modal" data-target="#add_anauncement">
            <i class="fa fa-download"></i> Download
          </button></a>

      </div>
            <div class="col-md-12 text-right" style="height: 300px; overflow-y: auto" >
                
                    <table class="table table-bordered data-table">
                        <thead>
                            {{-- <th>Date range</th> --}}
                           {{--  <th>Date range</th> --}}
                            {{--<th>Load/Project ID</th>--}}
                            <th>Load/Project ID</th>
                            <th>Bill to</th>
                            <th>Load/Project Control No</th>
                            <th>Load/Project Date</th>
                            <th>Load/Project Type, </th>
                            <th>Location</th>
                            <th>Product</th>
                            <th>Shift</th>
                            <th>Trailer Type</th>
                            <th>Trailer Size</th>
                            <th>In/Out Load/ Project</th>  
                            <th>Door No</th>
                            <th>Weight</th>
                            <th>Vendor</th>
                            <th>Begin Case Ct</th>
                            <th>Ending Case Ct</th>
                            <th>Total Skus</th>
                            <th>Pieces</th> 
                            <th>Total Charge</th>
                            {{-- <th>Percentage payout</th> --}}
                            {{-- <th>Action</th> --}}
                            {{-- <th>Special Charges</th>
                            <th>Total Charge</th> --}}
                        </thead>
                        <tbody>
                            @foreach($revenue as $invoice)
                                <tr>
                                   {{-- <td>@if( $invoice->data_range )
                                    {{ $invoice->data_range }}
                                    @else
                                    N/A
                                    @endif
                                   </td> --}}
                                    <td>@if( $invoice->id )
                                    {{ $invoice->id }}
                                    @else
                                    N/A
                                    @endif
                                   </td>
                                   <td>@if( $invoice->bill_to_id )
                                    {{ $invoice->bill_to_id }}
                                    @else
                                    N/A
                                    @endif
                                   </td>
                                   <td>@if( $invoice->load_project_control_no )
                                    {{ $invoice->load_project_control_no }}
                                    @else
                                    N/A
                                    @endif
                                   </td>
                                   <td>@if( $invoice->load_project_date )
                                    {{ $invoice->load_project_date }}
                                    @else
                                    N/A
                                    @endif
                                   </td>
                                   <td>@if( $invoice->load_type )
                                    {{ $invoice->load_type }}
                                    @else
                                    N/A
                                    @endif
                                   </td>
                                   <td>@if( $invoice->location_id )
                                    {{ $invoice->location_id }}
                                    @else
                                    N/A
                                    @endif
                                   </td>
                                   <td>@if( $invoice->department_id )
                                    {{ $invoice->department_id }}
                                    @else
                                    N/A
                                    @endif
                                   </td>
                                   <td>@if( $invoice->shift )
                                    {{ $invoice->shift }}
                                    @else
                                    N/A
                                    @endif
                                   </td>
                                   <td>@if( $invoice->trailer_type )
                                    {{ $invoice->trailer_type }}
                                    @else
                                    N/A
                                    @endif
                                   </td>
                                   <td>@if( $invoice->trailer_size )
                                    {{ $invoice->trailer_size }}
                                    @else
                                    N/A
                                    @endif
                                   </td>
                                   <td>@if( $invoice->in_out_load )
                                    {{ $invoice->in_out_load }}
                                    @else
                                    N/A
                                    @endif
                                   </td>
                                   <td>@if( $invoice->door_no )
                                    {{ $invoice->door_no }}
                                    @else
                                    N/A
                                    @endif
                                   </td>
                                   <td>@if( $invoice->weight )
                                    {{ $invoice->weight }}
                                    @else
                                    N/A
                                    @endif
                                   </td>
                                   <td>@if( $invoice->vendor )
                                    {{ $invoice->vendor}}
                                    @else
                                    N/A
                                    @endif
                                   </td>
                                   <td>@if( $invoice->begin_case_ct )
                                    {{ $invoice->begin_case_ct }}
                                    @else
                                    N/A
                                    @endif
                                   </td>
                                   <td>@if( $invoice->ending_case_ct )
                                    {{ $invoice->ending_case_ct }}
                                    @else
                                    N/A
                                    @endif
                                   </td>
                                   <td>@if( $invoice->total_skus )
                                    {{ $invoice->total_skus }}
                                    @else
                                    N/A
                                    @endif
                                   </td>
                                   <td>@if( $invoice->pieces )
                                    {{ $invoice->pieces }}
                                    @else
                                    N/A
                                    @endif
                                   </td>
                                 {{--   <td>@if( $invoice-> )
                                    {{ $invoice-> }}
                                    @else
                                    N/A
                                    @endif
                                   </td>
                                   <td>@if( $invoice-> )
                                    {{ $invoice-> }}
                                    @else
                                    N/A
                                    @endif
                                   </td>
                                   <td>@if( $invoice-> )
                                    {{ $invoice-> }}
                                    @else
                                    N/A
                                    @endif
                                   </td>
                                   <td>@if( $invoice-> )
                                    {{ $invoice-> }}
                                    @else
                                    N/A
                                    @endif
                                   </td> --}}
                                   <td>@if( $invoice->charge_amount )
                                    {{ $invoice->charge_amount }}
                                    @else
                                    N/A
                                    @endif
                                   </td>
                                   {{-- <td>
                                    @if( $invoice->load_details->payout_associate )
                                    {{ $invoice->load_details->payout_associate}}
                                    @else
                                    N/A
                                    @endif
                                   </td> --}}
                                   {{-- <td>
                                    <a href="{{ route('admin.generate-invoice', $invoice->id ) }}" class = "btn btn-sm btn-warning"><i class = "fa fa-print"></i></a>
                                   </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $revenue->links() }}
                @else
                    <h4 style = "text-align:center;">{{ $message }}</h4>
                @endif
            </div>
        </div>
</div>
@endif

@endsection