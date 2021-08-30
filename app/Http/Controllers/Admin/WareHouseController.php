<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\WareHouse;
use App\User;

class WareHouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  if ($request->ajax()) {
        //     $data = WareHouse::latest()->get();
        //     return Datatables::of($data)
        //             ->addIndexColumn()
        //             ->addColumn('action', function($row){
        //                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editItem">Edit</a>';
   
        //                    $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteItem">Delete</a>';
        //                     return $btn;
        //             })
        //             ->rawColumns(['action'])
        //             ->make(true);
        // }
      $warehouses = WareHouse::paginate(12);
      return view('admin.warehouses.index', compact('warehouses'));

  }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.warehouses.create');
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

        $warehouse = new WareHouse;
        $warehouse->customer_name = $request->customer_name;
        $warehouse->street_address = $request->street_address;
        $warehouse->state = $request->state;
        $warehouse->city = $request->city;
        $warehouse->zipcode = $request->zipcode;
        $warehouse->morning_opening_time = date(DATE_ISO8601, strtotime(date('Y-m-d') . $request->morning_opening_time));
        $warehouse->morning_closing_time = date(DATE_ISO8601, strtotime(date('Y-m-d') . $request->morning_closing_time));
      
        $warehouse->evening_opening_time = date(DATE_ISO8601, strtotime(date('Y-m-d') . $request->evening_opening_time));
        $warehouse->evening_closing_time = date(DATE_ISO8601, strtotime(date('Y-m-d') . $request->evening_closing_time));
        $warehouse->night_opening_time =  date(DATE_ISO8601, strtotime(date('Y-m-d') . $request->night_opening_time));
        $warehouse->night_closing_time = date(DATE_ISO8601, strtotime(date('Y-m-d') . $request->night_closing_time));
        $warehouse->weekend_opening_time =  date(DATE_ISO8601, strtotime(date('Y-m-d') . $request->weekend_opening_time));
        $warehouse->weekend_closing_time = date(DATE_ISO8601, strtotime(date('Y-m-d') . $request->weekend_closing_time));
        $warehouse->save();

            return back()->with('message', 'Customer Added Successfully!');

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
        $warehouse = WareHouse::find($id);
        $manager = User::where('customer_id', $id)
        ->where('type','1')
        ->get();
        $employee = User::where('customer_id', $id)
        ->where('type','2')
        ->get();
        $warehouse->manager = $manager;
        $warehouse->employee = $employee;
        return view('admin.warehouses.show', compact('warehouse'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $warehouse = WareHouse::find($id);
        return view('admin.warehouses.edit', compact('warehouse'));
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

             $warehouse = WareHouse::find($id);
            if(empty($warehouse))
            {
                return back()->with('error', 'Customer Does Not Exists!');
            }
            
            if($request->has('customer_name'))
            {

            $warehouse->customer_name = $request->customer_name;
        }
        if($request->has('stree_address'))
        {
            $warehouse->street_address = $request->street_address;
        }
    
        if($request->has('state'))
        {
            $warehouse->state = $request->state;
        }

        if($request->has('city'))
        {
            $warehouse->city = $request->city;
        }
        if($request->has('zipcode'))
        {
            $warehouse->zipcode = $request->zipcode;
        }
        if($request->has('morning_opening_time'))
        {
            $warehouse->morning_opening_time = date(DATE_ISO8601, strtotime(date('Y-m-d') . $request->morning_opening_time));
        }

        if($request->has('morning_closing_time'))
        {
            $warehouse->morning_closing_time = date(DATE_ISO8601, strtotime(date('Y-m-d') . $request->morning_closing_time));
        }

        if($request->has('evening_opening_time'))
        {
            $warehouse->evening_opening_time = date(DATE_ISO8601, strtotime(date('Y-m-d') . $request->evening_opening_time));
        
       
       
        }

        if($request->has('evening_closing_time'))
        {
            $warehouse->evening_closing_time = date(DATE_ISO8601, strtotime(date('Y-m-d') . $request->evening_closing_time));
        }

        if($request->has('night_opening_time')){
            $warehouse->night_opening_time =  date(DATE_ISO8601, strtotime(date('Y-m-d') . $request->night_opening_time));
        
        }

        if($request->has('night_closing_time'))
        {
            $warehouse->night_closing_time = date(DATE_ISO8601, strtotime(date('Y-m-d') . $request->night_closing_time));
        }

        if($request->has('weekend_opening_time'))
        {
             $warehouse->weekend_opening_time =  date(DATE_ISO8601, strtotime(date('Y-m-d') . $request->weekend_opening_time));
        
        }
      
        if($request->has('weekend_closing_time'))
        {
           $warehouse->weekend_closing_time = date(DATE_ISO8601, strtotime(date('Y-m-d') . $request->weekend_closing_time));
        }
                   
            $warehouse->save();

            return back()->with('message', 'Customer Updated Successfully!');

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

      WareHouse::find($id)->delete();
      return back()->with('message', 'Customer Deleted Successfully!');

  }catch(\Exception $e)
  {

    return back()->with('error', 'There is some trouble to proceed your action!');
  }
 }
}
