@extends('layouts.admin.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 text-center">
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
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <h4>Manager Details</h4>
                <table class="table table-sm table-hover">
                    <tbody>
                        <tr>
                            <td>Warehouse</td>
                            <td>{{ $manager->manager->warehouse_name }}</td>
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
                        {{-- <tr>
                            <td>Date of Birth</td>
                            <td>{{ $manager->date_of_birth }}</td>
                        </tr>
                        <tr>
                            <td>Age</td>
                            <td>N/A</td>
                        </tr> --}}
                        <tr>
                            <td>Address</td>
                            <td>{{ $manager->address }}</td>
                        </tr>
                        <tr>
                            <td>State</td>
                            <td>{{ $manager->state }}</td>
                        </tr>
                        <tr>
                            <td>City</td>
                            <td>{{ $manager->city }}</td>
                        </tr>
                        <tr>
                            <td>Zip Code</td>
                            <td>{{ $manager->zipcode }}</td>
                        </tr>

                        <tr>
                            <td>Job Title</td>
                            <td>{{ $manager->job_title }}</td>
                        </tr>
                        <tr>
                            <td>Hiring Date</td>
                            <td>{{ $manager->hiring_date }}</td>
                        </tr>
                        <tr>
                            <td>Joining Date</td>
                            <td>{{ $manager->joining_date }}</td>
                        </tr>


                        <tr>
                            <td>Pay System</td>
                            <td>{{ $manager->pay_system }}</td>
                        </tr>
                        <tr>
                            <td>Pay Currency</td>
                             <td>{{ $manager->pay_currency }}</td>

                        </tr>
                        <tr>
                            <td>Pay</td>
                           <td>{{ $manager->pay }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection