<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\WareHouse;
use App\User;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = User::where('email', '!=', 'admin@admin.com')
        ->where('type', '2')
        ->paginate(12);
        // ->orderBy('customer_id', 'desc')
        return view('admin.employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = WareHouse::all();
        return view('admin.employees.create', compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $employee = new User;
            $employee->customer_id = $request->customer_id;
            $employee->ssn = $request->ssn;
            $employee->first_name = $request->first_name;
            $employee->last_name = $request->last_name;
            $employee->email = $request->email;
            $employee->phone = $request->phone;
            // $employee->pay_system = $request->pay_system;
            // $employee->pay = $request->pay;
            $employee->address = $request->address;
            $employee->city = $request->city;
            $employee->state = $request->state;
            $employee->zipcode = $request->zipcode;
            $employee->fix_pay = $request->fix_pay;
            $employee->hourly_pay = $request->hourly_pay;
            $employee->overtime_pay = $request->overtime_pay;
            $employee->weekend_pay = $request->weekend_pay;
            $employee->job_title = $request->job_title;
            $employee->hiring_date = $request->hiring_date;
            $employee->password = bcrypt($request->password);
            $employee->type = "2";

            $employee->save();


            return back()->with('message', 'Employee Added Successfully!');
        }catch(\Exception $e)
        {
            return back()->with('error', 'There is some trouble to proceed your action!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = User::find($id);
        return view('admin.employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = User::find($id);
        $warehouses = WareHouse::all();
        $employee['warehouses'] = $warehouses;
        return view('admin.employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        try{
         $employee = User::find($id);

         if(empty($employee))
         {
            return back()->with('message', 'Employee Does Not Exist!');
         }

          if($request->has('customer_id'))
        {
            $employee->customer_id = $request->customer_id;
        }
        if($request->has('ssn'))
        {
            $employee->ssn = $request->ssn;
        }
        if($request->has('first_name'))
        {
            $employee->first_name = $request->first_name;
        }
        if($request->has('last_name'))
        {
            $employee->last_name = $request->last_name;
        }
        if($request->has('email'))
        {
            $employee->email = $request->email;
        }
        if($request->has('phone'))
        {
            $employee->phone = $request->phone;
        }
        // if($request->has('pay_system'))
        // {
        //     $employee->pay_system = $request->pay_system;
        // }
        // if($request->has('pay'))
        // {
        //     $employee->pay = $request->pay;
        // }
        if($request->has('address'))
        {
            $employee->address = $request->address;
        }
        if($request->has('city'))
        {
            $employee->city = $request->city;
        }
        if($request->has('state'))
        {
            $employee->state = $request->state;
        }
        if($request->has('zipcode'))
        {
            $employee->zipcode = $request->zipcode;
        }
        if($request->has('fix_pay'))
        {
            $employee->fix_pay = $request->fix_pay;
        }
        if($request->has('hourly_pay'))
        {
            $employee->hourly_pay = $request->hourly_pay;
        }
        if($request->has('overtime_pay'))
        {
            $employee->overtime_pay = $request->overtime_pay;
        }
        if($request->has('weekend_pay'))
        {
            $employee->weekend_pay = $request->weekend_pay;
        }
        if($request->has('job_title'))
        {
            $employee->job_title = $request->job_title;
        }
        if($request->has('hiring_date'))
        {
            $employee->hiring_date = $request->hiring_date;
           // $employee->hiring_date = date(DATE_ISO8601, strtotime(date('Y-m-d') . $request->hiring_date));
        }
        if($request->has('password'))
        {
            $employee->password = bcrypt($request->password);
        }
        $employee->type = "2";

        $employee->save();



        return back()->with('message', 'Employee Updated Successfully!');
    }catch(\Exception $e)
    {
        return back()->with('error', 'There is some trouble to proceed your action!');
    }

}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       try{

          User::find($id)->delete();
          return back()->with('message', 'Employee Deleted Successfully!');

      }catch(\Exception $e)
      {

        return back()->with('error', 'There is some trouble to proceed your action!');
    }
}
}
