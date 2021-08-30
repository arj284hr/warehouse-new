@extends('layouts.admin.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 text-center">
                <h4>Hourly/Fixed Payroll</h4>
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
            <form action="{{route('admin.hourly-fix-report')}}" method = "POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-row">

                  <div class="form-group col-4 col-md-4 col-lg-4">
          <label for="">Employee</label>
          <select name="employee_id" id="" class ="form-control">
           <option value="">Select Employee</option>
           @foreach($employees as $employee)
            <option value="{{ $employee->id }}">{{ $employee->first_name . ' '. $employee->last_name .' ( SSN-'. $employee->ssn .' )'}}</option>
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
            <input type="submit" name = "submit" id="submit" class = "btn btn-sm btn-primary form-control" value = "Get Hourly/Fixed Payroll">
        </div>
    </div>
</form>
</div>
<div class="col-md-3"></div>
</div>
<br>
@if(isset($reports))
<div class="container">

   <div class="row">
    @if($reports->count() > 0)
    <div class="mb-2 text-right w-100">
        

        <a href="{{ route('admin.export-Hourly-fix-Pay') }}"><button type="button" class="btn btn-warning  " data-toggle="modal" data-target="#add_anauncement">
            <i class="fa fa-download"></i> Download
          </button></a>

      </div>
            <div class="col-md-12" style="height: 300px; overflow-y: auto" >
                
                    <table class="table table-bordered data-table">
                        <thead>
                            <th>ID</th>
                            <th>Associate Name</th>
                            <th>Associate Social Security Number</th>
                            <th>Payroll</th>
                            <th>Load/ Project Pay</th>
                            <th>Hourly rate</th>
                            <th>Total Hours </th>
                            <th>Overtime Pay Rate</th>
                            <th>Overtime Hours</th>
                            <th>Total pay</th>

                        </thead>
                        <tbody>
                            @foreach($reports as $report)
                                <tr>
                                   <td>@if( $report->id )
                                    {{ $report->id }}
                                    @else
                                    N/A
                                    @endif
                                   </td>
                                   <td>@if( $report->associate_id )
                                    {{ $report->associate->first_name .' '. $report->associate->last_name  }}
                                    @else
                                    N/A
                                    @endif
                                   </td>
                                   <td>@if( $report->ssn_associate )
                                    {{ $report->ssn_associate }}
                                    @else
                                    N/A
                                    @endif
                                   </td>
                                   <td>@if( $report->pay_system )
                                    {{ ucfirst($report->pay_system) }}
                                    @else
                                    N/A
                                    @endif
                                   </td>
                                   <td>@if( $report->load_details->employee_total_pay )
                                    {{ $report->load_details->employee_total_pay }}
                                    @else
                                    N/A
                                    @endif
                                   </td>
                                   <td>@if( $report->associate_id )
                                    {{ $report->associate->hourly_pay }}
                                    @else
                                    N/A
                                    @endif
                                   </td>
                                   <td>@if( $report->hours )
                                    {{ $report->hours }}
                                    @else
                                    N/A
                                    @endif
                                   </td>
                                   <td>@if( !empty($report->associate->overtime_pay) )
                                    {{ $report->associate->overtime_pay }}
                                    @else
                                    N/A
                                    @endif
                                   </td>
                                    <td>{{--@if( $report->hours )
                                    {{ $report->hours }}
                                    @else --}}
                                    N/A
                                    {{-- @endif --}}
                                   </td>
                                   <td>@if( $report->payout_associate )
                                    {{ $report->payout_associate }}
                                    @else
                                    N/A
                                    @endif
                                   </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $reports->links() }}
                @else
                    <h4 style = "text-align:center;">{{ $message }}</h4>
                @endif
            </div>
        </div>
</div>
@endif

@endsection
