<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\WareHouse;
use App\User;


class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $managers = User::where('email', '!=', 'admin@admin.com')
        ->where('type', '1')
        ->paginate(100);
        // ->orderBy('created_at', 'desc')
        return view('admin.managers.index', compact('managers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        $customers = WareHouse::all();
        return view('admin.managers.create', compact('customers'));
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
            // return $request->all();
            $manager = new User;
            $manager->customer_id = $request->customer_id;
            $manager->ssn = $request->ssn;
            $manager->first_name = $request->first_name;
            $manager->last_name = $request->last_name;
            $manager->email = $request->email;
            $manager->phone = $request->phone;
            // $manager->pay_system = $request->pay_system;
            // $manager->pay = $request->pay;
            $manager->address = $request->address;
            $manager->city = $request->city;
            $manager->state = $request->state;
            $manager->zipcode = $request->zipcode;
            $manager->fix_pay = $request->fix_pay;
            $manager->hourly_pay = $request->hourly_pay;
            $manager->overtime_pay = $request->overtime_pay;
            $manager->weekend_pay = $request->weekend_pay;
            $manager->job_title = $request->job_title;
            $manager->hiring_date = $request->hiring_date;
            $manager->password = bcrypt($request->password);
            $manager->type = "1";

            $manager->save();

            return back()->with('message', 'Manager Added Successfully!');

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
        $manager = User::find($id);
        return view('admin.managers.show', compact('manager'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $manager = User::find($id);
        $warehouses = WareHouse::all();
        $manager['warehouses'] = $warehouses;
        return view('admin.managers.edit', compact('manager'));
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
           $manager = User::find($id);

           if(empty($manager))
           {
            return back()->with('message', 'Manager Does Not Exist!');
        }

        if($request->has('customer_id'))
        {
            $manager->customer_id = $request->customer_id;
        }
        if($request->has('ssn'))
        {
            $manager->ssn = $request->ssn;
        }
        if($request->has('first_name'))
        {
            $manager->first_name = $request->first_name;
        }
        if($request->has('last_name'))
        {
            $manager->last_name = $request->last_name;
        }
        if($request->has('email'))
        {
            $manager->email = $request->email;
        }
        if($request->has('phone'))
        {
            $manager->phone = $request->phone;
        }
        // if($request->has('pay_system'))
        // {
        //     $manager->pay_system = $request->pay_system;
        // }
        // if($request->has('pay'))
        // {
        //     $manager->pay = $request->pay;
        // }
        if($request->has('address'))
        {
            $manager->address = $request->address;
        }
        if($request->has('city'))
        {
            $manager->city = $request->city;
        }
        if($request->has('state'))
        {
            $manager->state = $request->state;
        }
        if($request->has('zipcode'))
        {
            $manager->zipcode = $request->zipcode;
        }
        if($request->has('fix_pay'))
        {
            $manager->fix_pay = $request->fix_pay;
        }
        if($request->has('hourly_pay'))
        {
            $manager->hourly_pay = $request->hourly_pay;
        }
        if($request->has('overtime_pay'))
        {
            $manager->overtime_pay = $request->overtime_pay;
        }
        if($request->has('weekend_pay'))
        {
            $manager->weekend_pay = $request->weekend_pay;
        }
        if($request->has('job_title'))
        {
            $manager->job_title = $request->job_title;
        }
        if($request->has('hiring_date'))
        {
            $manager->hiring_date = $request->hiring_date;
        }
        if($request->has('password'))
        {
            $manager->password = bcrypt($request->password);
        }

        $manager->type = "1";

        $manager->save();



        return back()->with('message', 'Manager Updated Successfully!');
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
         return back()->with('message', 'Manager Deleted Successfully!');

     }catch(\Exception $e)
     {

        return back()->with('error', 'There is some trouble to proceed your action!');
    }
}
}
