@extends('layouts.admin.app')
@section('content')
    <div class="container-fluid" style="margin-top:140px;">
        <div class="row">
            <div class="col-md-10 text-center">
                <h4>View Manager</h4>
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
                <a href="{{ route('admin.manager.index') }}" class = "btn btn-primary" ><i class = "fa fa-backward"></i> Back</a>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <h4>Manager Details</h4>
                <table class="table table-sm table-hover">
                    <tbody>
                        <tr>
                            <td>Customer</td>
                            <td>{{ $manager->manager->customer_name }}</td>
                        </tr>
                        <tr>
                            <td>Social Security Number</td>
                            <td>{{ $manager->ssn }}</td>
                        </tr>
                        <tr>
                            <td>First Name</td>
                            <td>{{ $manager->first_name }}</td>
                        </tr>
                        <tr>
                            <td>Last Name</td>
                            <td>{{ $manager->last_name }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{ $manager->email}}</td>
                        </tr>
                        <tr>
                            <td>Phone Number</td>
                            <td>{{ $manager->phone}}</td>
                        </tr>

                        <tr>
                            <td>Address</td>
                            <td>{{ $manager->address }}</td>
                        </tr>
                         <tr>
                            <td>City</td>
                            <td>{{ $manager->city }}</td>
                        </tr>
                        <tr>
                            <td>State</td>
                            <td>{{ $manager->state }}</td>
                        </tr>

                        <tr>
                            <td>Zip Code</td>
                            <td>{{ $manager->zipcode }}</td>
                        </tr>

                        <tr>
                            <td>Job Title</td>
                            <td>{{ ucfirst($manager->job_title) }}</td>
                        </tr>
                        <tr>
                            <td>Hiring Date</td>
                            <td>{{ \Carbon\Carbon::parse($manager->hiring_date)->format('Y-m-d') }}</td>
                        </tr>
                        <tr>
                            <td>Fix Pay</td>
                            <td>
                                @if($manager->fix_pay)
                                {{ $manager->fix_pay }}
                                @else
                                N/A
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <td>Hourly Pay</td>
                            <td>
                                @if($manager->hourly_pay)
                                {{ $manager->hourly_pay }}
                                @else
                                N/A
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <td>Weekend Pay</td>
                            <td>
                                @if($manager->weekend_pay)
                                {{ $manager->weekend_pay }}
                                @else
                                N/A
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <td>Overtime Pay</td>
                            <td>
                                @if($manager->overtime_pay)
                                {{ $manager->overtime_pay }}
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
