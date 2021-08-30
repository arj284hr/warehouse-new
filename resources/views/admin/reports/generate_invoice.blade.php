

<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="row justify-content-center" class="">
    
    <div class="col-md-2">
    </div>
    <div class="col-md-8">
        <h4 class="text-center">Customer Invoice</h4>
        <table class="table table-sm table-hover">
            <tbody>
                <tr>
                    <td>ID</td>
                    <td>@if( $invoices->id )
                        {{ $invoices->id }}
                        @else
                        N/A
                        @endif
                       </td>
                </tr>
                <tr>
                    <td>Bill to</td>
                    <td>@if( $invoices->bill_to_id )
                        {{ $invoices->bill_to_id }}
                        @else
                        N/A
                        @endif
                       </td>
                </tr>
                <tr>
                    <td>Load/Project Control No</td>
                    <td>@if( $invoices->load_project_control_no )
                        {{ $invoices->load_project_control_no }}
                        @else
                        N/A
                        @endif
                       </td>
                </tr>
                 <tr>
                    <td>Load/Project Date</td>
                    <td>@if( $invoices->load_project_date )
                        {{ $invoices->load_project_date }}
                        @else
                        N/A
                        @endif
                       </td>
                </tr>
                <tr>
                    <td>Load/Project Type<</td>
                    <td>@if( $invoices->load_type )
                        {{ $invoices->load_type }}
                        @else
                        N/A
                        @endif
                       </td>
                    
                </tr>
                <tr>
                    <td>Location</td>
                    <td>@if( $invoices->location_id )
                        {{ $invoices->location_id }}
                        @else
                        N/A
                        @endif
                       </td>
                    {{-- <td>Morning</td> --}}
                </tr>
                {{--  <td>{{ \Carbon\Carbon::parse($delivery->end_time)->format('Y-m-d') }}</td>
                        <td>{{ \Carbon\Carbon::parse($delivery->start_time)->format('H:i') }}</td> --}}
                <tr>
                    <td>Product</td>
                    <td>@if( $invoices->department_id )
                        {{ $invoices->department_id }}
                        @else
                        N/A
                        @endif
                       </td>
                    {{-- <td>{{ \Carbon\Carbon::parse($warehouse->morning_opening_time)->format('H:i') }}</td>  --}}
                </tr>
                <tr>
                    <td>Shift</td>
                    <td>@if( $invoices->shift )
                        {{ $invoices->shift }}
                        @else
                        N/A
                        @endif
                       </td>
                    {{-- <td>{{ \Carbon\Carbon::parse($warehouse->morning_closing_time)->format('H:i') }}</td> --}}
                </tr>
                 <tr>
                    <td>Trailer Type</td>
                    <td>@if( $invoices->trailer_type )
                        {{ $invoices->trailer_type }}
                        @else
                        N/A
                        @endif
                       </td>
                    {{-- <td>Evening</td> --}}
                </tr>
                <tr>
                    <td>Trailer Size</td>
                    <td>@if( $invoices->trailer_size )
                        {{ $invoices->trailer_size }}
                        @else
                        N/A
                        @endif
                       </td>
                    {{-- <td>{{ \Carbon\Carbon::parse($warehouse->evening_opening_time)->format('H:i') }}</td> --}}
                </tr>
                <tr>
                    <td>In/Out Load/Project</td>
                    <td>@if( $invoices->in_out_load )
                        {{ $invoices->in_out_load }}
                        @else
                        N/A
                        @endif
                       </td>
                    {{-- <td>{{ \Carbon\Carbon::parse($warehouse->evening_closing_time)->format('H:i') }}</td> --}}
                </tr>
                 <tr>
                    <td>Door No.</td>
                    <td>@if( $invoices->door_no )
                        {{ $invoices->door_no }}
                        @else
                        N/A
                        @endif
                       </td>
                    {{-- <td>Night</td> --}}
                </tr>
                <tr>
                    <td>Weight</td>
                    <td>@if( $invoices->weight )
                        {{ $invoices->weight }}
                        @else
                        N/A
                        @endif
                       </td>
                    {{-- <td>{{ \Carbon\Carbon::parse($warehouse->night_opening_time)->format('H:i') }}</td> --}}
                </tr>
                <tr>
                    <td>Begin Case Ct</td>
                    <td>@if( $invoices->begin_case_ct )
                        {{ $invoices->begin_case_ct }}
                        @else
                        N/A
                        @endif
                       </td>
                    {{-- <td>{{ \Carbon\Carbon::parse($warehouse->night_closing_time)->format('H:i') }}</td> --}}
                </tr>
                 <tr>
                    <td>Ending Case Ct</td>
                    <td>@if( $invoices->ending_case_ct )
                        {{ $invoices->ending_case_ct }}
                        @else
                        N/A
                        @endif
                       </td>
                    {{-- <td>Weekend</td> --}}
                </tr>
                <tr>
                    <td>Total Skus</td>
                    <td>@if( $invoices->total_skus )
                        {{ $invoices->total_skus }}
                        @else
                        N/A
                        @endif
                       </td>
                    {{-- <td>{{ \Carbon\Carbon::parse($warehouse->weekend_opening_time)->format('H:i') }}</td> --}}
                </tr>
                <tr>
                    <td>Pieces</td>
                    <td>@if( $invoices->pieces )
                        {{ $invoices->pieces }}
                        @else
                        N/A
                        @endif
                       </td>
                    {{-- <td>{{ \Carbon\Carbon::parse($warehouse->weekend_closing_time)->format('H:i') }}</td> --}}
                </tr>
                <tr>
                    <td>Total load/project Charge</td>
                    <td>@if( $invoices->charge_amount )
                        {{ $invoices->charge_amount }}
                        @else
                        N/A
                        @endif
                       </td>
                       <td>
                    {{-- <td>{{ \Carbon\Carbon::parse($warehouse->weekend_closing_time)->format('H:i') }}</td> --}}
                    
                </tr>

                
                    

            </tbody>
        </table>
        <button type="button" onclick="window.print()" class="btn btn-primary">Print</button>
        
    
    </div>
    <div class="col-md-2">
    </div>
</div>
</body>
</html>