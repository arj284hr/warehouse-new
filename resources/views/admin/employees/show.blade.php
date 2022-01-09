@extends('layouts.admin.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 text-center">
                <h4>View Associate</h4>
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
                <a href="{{ route('admin.employee.index') }}" class = "btn btn-primary" ><i class = "fa fa-backward"></i> Back</a>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <h4>Associate Details</h4>
                <table class="table table-sm table-hover">
                    <tbody>
                        <tr>
                            <td>Customer</td>
                            <td>{{ $employee->employee->customer_name }}</td>
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
                            <td>Last Name</td>
                            <td>{{ $employee->last_name }}</td>
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
                            <td>Address</td>
                            <td>{{ $employee->address }}</td>
                        </tr>
                        <tr>
                            <td>City</td>
                            <td>{{ $employee->city }}</td>
                        </tr>
                        <tr>
                            <td>State</td>
                            <td>{{ $employee->state }}</td>
                        </tr>
                        <tr>
                            <td>Zip Code</td>
                            <td>{{ $employee->zipcode }}</td>
                        </tr>

                        <tr>
                            <td>Job Title</td>
                            <td>{{ ucfirst($employee->job_title) }}</td>
                        </tr>
                        <tr>
                            <td>Hiring Date</td>
                            <td>{{  \Carbon\Carbon::parse($employee->hiring_date)->format('Y-m-d') }}</td>
                        </tr>

                        <tr>
                            <td>Fix Pay</td>
                            <td>
                                @if($employee->fix_pay)
                                {{ $employee->fix_pay }}
                                @else
                                N/A
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <td>Hourly Pay</td>
                            <td>
                                @if($employee->hourly_pay)
                                {{ $employee->hourly_pay }}
                                @else
                                N/A
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <td>Weekend Pay</td>
                            <td>
                                @if($employee->weekend_pay)
                                {{ $employee->weekend_pay }}
                                @else
                                N/A
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <td>Overtime Pay</td>
                            <td>
                                @if($employee->overtime_pay)
                                {{ $employee->overtime_pay }}
                                @else
                                N/A
                                @endif
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
