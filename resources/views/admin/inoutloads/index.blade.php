@extends('layouts.admin.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 text-center">
                <h4>All Inbound/Outbound Loads/Projects</h4>
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
                <a href="{{ route('admin.inoutloads.create') }}" class = "btn btn-primary" >Add New <i class = "fa fa-plus"></i></a>
            </div>
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

<div class="container">
    @if($loads->count() > 0)
    <table class="table table-sm table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Date</th>
               <!--  <th>Load/Project Id</th> -->
                <th>Customer</th>
                <th>Load/Project Date</th>
                <th>Location</th>
                <th>Load/Project Type</th>
                <th>Shift</th>
                <th width="100px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($loads as $load)
            <tr>
                <td>{{$load->id}}</td>
                <td>{{$load->date}}</td>
                <td>
                <?php
                    if(!empty($load->customer->customer_name))
                    {
                     echo  $load->customer->customer_name;
                    }else{
                     echo $load->driver_name; 
                    }
                    ?>
               
                </td>
                <td>{{$load->load_project_date}}</td>
                <td>{{$load->location}}</td>
                <td>{{$load->load_project_type}}</td>
                <td>{{$load->shift}}</td>
                <td class=" ">
                <a href="{{ route('admin.inoutloads.show', $load->id) }}" class = "btn btn-sm btn-info ml-2"><i class = "fa fa-eye"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <br>
    <br>
    {{ $loads->links() }}
    @else
        <h4 style = "text-align:center;">No InOutLoad Found!</h4>
    @endif
</div>

<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>-->
<!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>-->
<!--    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>-->
<!--    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>-->
<!--    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>-->

<!--<script type="text/javascript">-->
<!--  $(function () {-->

<!--    var table = $('.data-table').DataTable({-->
<!--        processing: true,-->
<!--        serverSide: true,-->
<!--        ajax: "{{ route('admin.inoutloads.index') }}",-->
<!--        columns: [-->
<!--            {data: 'id', name: 'id', orderable: false, searchable: false, sClass: "align-middle table-image"},-->
<!--            {data: 'date', name: 'date', orderable: false, searchable: false, sClass: "align-middle table-image"},-->
            <!--// {data: 'load_project_id', name: 'load_project_id', sClass: "align-middle"},-->
<!--            {data: 'customer_id', name: 'customer_id', sClass: "align-middle"},-->
<!--            {data: 'load_project_date', name: 'load_project_date', sClass: "align-middle"},-->
<!--            {data: 'location', name: 'location', sClass: "align-middle"},-->
<!--            {data: 'load_project_type', name: 'load_project_type', sClass: "align-middle"},-->
<!--            {data: 'shift', name: 'shift', sClass: "align-middle"},-->
<!--            {data: 'action', name: 'action',  searchable: false, sClass:"align-middle"},-->

<!--        ],-->
<!--        responsive: true-->
<!--    });-->

<!--  });-->
<!--</script>-->
@endsection
