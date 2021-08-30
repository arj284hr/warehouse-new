@extends('layouts.admin.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 text-center">
                <h4>Customer Invoice</h4>
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
        <div class="col-12 col-md-8 col-lg-6">
            <form action="{{route('admin.get-customer-invoice')}}" method = "POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-row">
                
                <div class="form-group col-6 col-md-6 col-lg-6">
                    <label for="">Start Date</label>
                  <input type="date" class="form-control" name="start_date" id="start_date" required>
              </div>
             
              <div class="form-group col-6 col-md-6 col-lg-6">
                <label for="">End Date</label>
                  <input type="date" class="form-control" name="end_date" id="end_date" required>
              </div>
             
        <div class="form-group col-6 col-md-6 col-lg-6 m-auto">
            <label for="" style="visibility: hidden;">Customer </label>
            <input type="submit" name = "submit" id="submit" class = "btn btn-sm btn-primary form-control" value = "Get Customer Invoice">
        </div>
    </div>
</form>
</div>
<div class="col-md-3"></div>
</div>
<br>
    
<div class="container">
   
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Date</th>
               <!--  <th>Load/Project Id</th> -->
                <th>Customer</th>
                <th>Load/Project Date</th>
                <th>Location</th>
                <th>Bill to</th>
                <th width="100px">Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
   
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
   
<script type="text/javascript">
 //$('#submit').on('submit', function(event){
  // event.preventDefault();
   var start_date = $('#start_date').val();
   var end_date = $('#end_date').val();
  $(function () {
    
  //  var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
     //   ajax: {
            type: 'POST',
           url: "{{ route('admin.get-customer-invoice') }}",
           data:{
                 'start_date': start_date,
                 'end_date' : end_date  
           },

    },
        columns: [
            {data: 'id', name: 'id', orderable: false, searchable: false, sClass: "align-middle table-image"},
            {data: 'date', name: 'date', orderable: false, searchable: false, sClass: "align-middle table-image"},
            // {data: 'load_project_id', name: 'load_project_id', sClass: "align-middle"},
            {data: 'customer_id', name: 'customer_id', sClass: "align-middle"},
            {data: 'load_project_date', name: 'load_project_date', sClass: "align-middle"},
            {data: 'location', name: 'location', sClass: "align-middle"},
            {data: 'bill_to_id', name: 'bill_to_id', sClass: "align-middle"},
            {data: 'action', name: 'action',  searchable: false, sClass:"align-middle"},
        
        ],
        responsive: true
    });
    
  });
  });
</script>
@endsection