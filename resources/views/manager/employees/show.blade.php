@extends('layouts.manager.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 text-center">
                <h4>View Employee</h4>
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
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <h4>Employee Details</h4>
                <table class="table table-sm table-hover">
                    <tbody>
                        <tr>
                            <td>Warehouse</td>
                            <td>{{ $employee->employee->warehouse_name }}</td>
                        </tr>
                        <tr>
                            <td>Social Security Number</td>
                            <td>{{ $employee->ssn }}</td>
                        </tr>
                        <tr>
                            <td>First Name</td>
                            <td>{{ $employee->first_name }}</td>
                        </tr>
                        <tr>
                            <td>First Name</td>
                            <td>{{ $employee->first_name }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{ $employee->email}}</td>
                        </tr>
                        <tr>
                            <td>Phone Number</td>
                            <td>{{ $employee->phone}}</td>
                        </tr>
                        <tr>
                            <td>Date of Birth</td>
                            <td>{{ $employee->date_of_birth }}</td>
                        </tr>
                        <tr>
                            <td>Age</td>
                            <td>N/A</td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>{{ $employee->address }}</td>
                        </tr>
                        <tr>
                            <td>State</td>
                            <td>{{ $employee->state }}</td>
                        </tr>
                        <tr>
                            <td>City</td>
                            <td>{{ $employee->city }}</td>
                        </tr>
                        <tr>
                            <td>Zip Code</td>
                            <td>{{ $employee->zipcode }}</td>
                        </tr>

                        <tr>
                            <td>Job Title</td>
                            <td>{{ $employee->job_title }}</td>
                        </tr>
                        <tr>
                            <td>Hiring Date</td>
                            <td>{{ $employee->hiring_date }}</td>
                        </tr>
                        <tr>
                            <td>Joining Date</td>
                            <td>{{ $employee->joining_date }}</td>
                        </tr>


                        <tr>
                            <td>Pay System</td>
                            <td>{{ $employee->pay_system }}</td>
                        </tr>
                        <tr>
                            <td>Pay Currency</td>
                             <td>{{ $employee->pay_currency }}</td>

                        </tr>
                        <tr>
                            <td>Pay</td>
                           <td>{{ $employee->pay }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
