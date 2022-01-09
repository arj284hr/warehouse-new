<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\InOutLoad;
use App\Pay;
use App\WareHouse;
use App\Department;
use App\User;
use Yajra\DataTables\DataTables;

class InOutLoadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if ($request->ajax()) {
        //     $loads = InOutLoad::selectRaw('id, date,customer_id, load_project_date,location,bill_to_id')->latest()->get();
        //     return DataTables::of($loads)
        //         ->editColumn('profile_pic', function ($row) {
        //             if (!empty($row->profile_pic)) {
        //                 return '<img src="' . env('IMAGES_PATH') . $row->profile_pic . '" alt=""  style="width: 50px;height: 50px;border-radius: 50%;object-fit: cover;"  onerror="this.src=\'' . url('/assets/admin/img/avatar.png') . '\'">';
        //             }
        //             return '<img src="' . url('/assets/admin/img/avatar.png') . '" alt="" style="width: 50px;height: 50px;border-radius: 50%;object-fit: cover;">';
        //         })
        //         ->addColumn('action', function ($row) {
        //             $checked = ($row->is_active == 1) ? 'checked' : "";
        //             return '<label class="switch">
        //             <input type="checkbox" ' . $checked . '  onclick="isActive(\'' . $row->id . '\')">
        //             <span class="slider"></span>
        //         </label>';
        //         })
        //         ->addColumn('name', function ($row) {
        //             return $row->first_name . " " . $row->last_name;
        //         })
        //         ->editColumn('created_at', function ($row) {
        //             return date('d.m.Y H:i:s', strtotime($row->created_at));
        //         })
        //         ->addColumn('detail', function ($row) {
        //             return '<a href="' . url('/employees/detail/' . $row->id) . '" class="action-btn bg-success">
        //             <i class="icon-fa icon-fa-info-circle"></i>
        //         </a>';
        //         })
        //         ->rawColumns(['profile_pic', 'action', 'created_at', 'name', 'detail'])
        //         ->make(true);
        // }
        //   if ($request->ajax()) {
        //     $loads = InOutLoad::selectRaw('id,customer_id,date,load_project_date,location,load_project_type,shift')->latest()->get();
        //     return DataTables::of($loads)
        //             ->addIndexColumn()
        //             ->addColumn('action', function($row){

        //                   $btn = '<a href="'.route("admin.inoutloads.show", $row->id).'" class="btn btn-primary btn-sm">View</a>';

        //                     return $btn;
        //             })
        //             ->rawColumns(['action'])
        //             ->make(true);
        // }

        $loads = InOutLoad::orderBy('created_at', 'desc')->paginate(12);

         return view('admin.inoutloads.index', compact('loads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)

    {
            // $department = new Department;
            // $department->department_name = $request->department_name;
            // $department->save();
        $inOutLoad= InOutLoad::latest('id')->first();
        $departments = Department::all();
        $customers = WareHouse::all();
        $employees = User::where('type', '2')->latest()->get();
        $drivers = User::where('job_title', 'Driver')->latest()->get();
        return view('admin.inoutloads.create',compact('departments','customers','employees','drivers','inOutLoad'));
    }

     // Fetch ssn
    public function get_ssn(Request $request){

        // return "ok";
        $empData['data'] = User::select('ssn','hourly_pay')
                    ->where('id',$request->emp_id)
                    ->get();

        return response()->json($empData);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        
        try
        {
            //return $request->all();
            $load = new InOutLoad;
            if($request->has('customer_id')){
                $load->customer_id = $request->customer_id;
            }
            if($request->has('location')){
                $load->location = $request->location;
            }
            if($request->has('bill_to_id')){
                $load->bill_to_id = $request->bill_to_id;
            }
            if($request->has('department_id')){
                $load->department_id = $request->department_id;
            }
            if($request->has('in_out_load')){
                $load->in_out_load = $request->in_out_load;
            }
            if($request->has('date')){
                $load->date = $request->date;

            }
            if($request->has('load_project_control_no')){
                $load->load_project_control_no = $request->load_project_control_no;

            }
            if($request->has('load_project_date')){
                $load->load_project_date = $request->load_project_date;

            }
            if($request->has('begin_case_ct')){
                $load->begin_case_ct = $request->begin_case_ct;

            }
            if($request->has('ending_case_ct')){
                $load->ending_case_ct = $request->ending_case_ct;

            }
            if($request->has('begin_pallet_ct')){
                $load->begin_pallet_ct = $request->begin_pallet_ct;

            }
            if($request->has('ending_pallet_ct')){
                $load->ending_pallet_ct = $request->ending_pallet_ct;

            }
            if($request->has('begin_ship_packs')){
                $load->begin_ship_packs = $request->begin_ship_packs;

            }
            if($request->has('ending_ship_packs')){
                $load->ending_ship_packs = $request->ending_ship_packs;

            }
            if($request->has('trailer_type')){
                $load->trailer_type = $request->trailer_type;

            }
            if($request->has('trailer_size')){
                $load->trailer_size = $request->trailer_size;

            }
            if($request->has('load_project_trip_no')){
                $load->load_project_trip_no = $request->load_project_trip_no;

            }
            if($request->has('driver_id')){
                $load->driver_name = $request->driver_id;

            }
            if($request->has('shift')){
                $load->shift = $request->shift;

            }
            if($request->has('payment_type')){
                $load->payment_type = $request->payment_type;

            }
            if($request->has('load_project_type')){
                $load->load_project_type = $request->load_project_type;

            }
            if($request->has('weight')){
                $load->weight = $request->weight;

            }
            if($request->has('pieces')){
                $load->pieces = $request->pieces;

            }
            if($request->has('pallets_in')){
                $load->pallets_in = $request->pallets_in;

            }
            if($request->has('pallets_out')){
                $load->pallets_out = $request->pallets_out;

            }
            if($request->has('carrier')){
                $load->carrier = $request->carrier;

            }
            if($request->has('trailer_no')){
                $load->trailer_no = $request->trailer_no;

            }
            if($request->has('dock')){
                $load->dock = $request->dock;

            }
            if($request->has('truck_no')){
                $load->truck_no = $request->truck_no;

            }
            if($request->has('door_no')){
                $load->door_no = $request->door_no;

            }
            if($request->has('trip_no')){
                $load->trip_no = $request->trip_no;

            }
            if($request->has('total_skus')){
                $load->total_skus = $request->total_skus;

            }
            if($request->has('po_no')){
                $load->po_no = $request->po_no;

            }
            if($request->has('bol_shipment_no')){
                $load->bol_shipment_no = $request->bol_shipment_no;

            }
            if($request->has('shipper')){
                $load->shipper = $request->shipper;

            }
            if($request->has('vendor')){
                $load->vendor = $request->vendor;

            }
            if($request->has('project_start_time')){
                $load->project_start_time = date(DATE_ISO8601, strtotime(date('Y-m-d') . $request->project_start_time));

            }
            if($request->has('project_end_time')){
                $load->project_end_time = date(DATE_ISO8601, strtotime(date('Y-m-d') . $request->project_end_time));

            }
            if($request->has('check_type')){
                $load->check_type = $request->check_type;

            }
            if($request->has('check_number')){
                $load->check_number = $request->check_number;

            }
            if($request->has('late_no_show_charge')){
                $load->late_no_show_charge = $request->late_no_show_charge;

            }
            if($request->has('repalletize_pallets')){
                $load->repalletize_pallets = $request->repalletize_pallets;

            }
            if($request->has('repalletize_charge')){
                $load->repalletize_charge = $request->repalletize_charge;

            }
            if($request->has('bad_pallets')){
                $load->bad_pallets = $request->bad_pallets;

            }
            if($request->has('bad_pallet_charge')){
                $load->bad_pallet_charge = $request->bad_pallet_charge;

            }
            if($request->has('reload_charge')){
                $load->reload_charge = $request->reload_charge;

            }
            if($request->has('special_charges')){
                $load->special_charges = $request->special_charges;

            }

            if($request->paycheck == 'percentage')
            {

                // if($request->has('paycheck')){
                // $load->pay_system = $request->paycheck;
                // }

                if($request->has('charge_amounts')){
                    $load->charge_amount1 = $request->charge_amounts;
                }
                if($request->has('notes')){
                    $load->notes = $request->notes;
                }

                if($request->has('charge_amount')){
                    $load->charge_amount = $request->charge_amount;
                }

                if($request->has('rebate_percentage')){
                    $load->rebate_percentage = $request->rebate_percentage;
                }
                if($request->has('total_income_less_rebate')){
                    $load->total_income_less_rebate = $request->total_income_less_rebate;
                }
                if($request->has('employee_percentage')){
                    $load->employee_percentage = $request->employee_percentage;
                }
                if($request->has('employee_total_pay')){
                    $load->employee_total_pay = $request->employee_total_pay;

                }
            }

            // if($request->paycheck == 'hourly')
            // {

            //     if($request->has('paycheck')){
            //     $load->pay_system = $request->paycheck;
            //     }
            // }



            $load->save();
            // return $load;

            


            if($request->paycheck == 'hourly')
            {
                $pay = new Pay;

                $pay->load_id = $load->id;

                if($request->has('paycheck')){
                    $pay->pay_system = $request->paycheck;
                }

                if($request->has('associate_id')){
                    $pay->associate_id = $request->associate_id;
                }
                if($request->has('ssn_associate')){
                    $pay->ssn_associate = $request->ssn_associate;
                }
                if($request->has('hourly_pay')){
                    $pay->hourly_pay = $request->hourly_pay;
                }
                if($request->has('hours')){
                    $pay->hours = $request->hours;
                }
                if($request->has('payout_associate')){
                    $pay->payout_associate = $request->payout_associate;
                }
                if($request->has('load_project_date')){
                    $pay->load_project_date = $request->load_project_date;

                }

                $pay->save();

                return back()->with('message', 'Load Added Successfully!');

            }

            if($request->paycheck == 'percentage')
            {

                if($request->has('associate_id1'))
                {
                    $pay = new Pay;

                    $pay->load_id = $load->id;

                    if($request->has('paycheck')){
                        $pay->pay_system = $request->paycheck;
                    }

                    if($request->has('associate_id1')){
                        $pay->associate_id = $request->associate_id1;

                    }
                    if($request->has('ssn_associate1')){
                        $pay->ssn_associate = $request->ssn_associate1;

                    }
                    if($request->has('pay_percentage_associate1')){
                        $pay->pay_percentage_associate = $request->pay_percentage_associate1;

                    }
                    if($request->has('payout_associate1')){
                        $pay->payout_associate = $request->payout_associate1;

                    }
                    if($request->has('load_project_date')){
                        $pay->load_project_date = $request->load_project_date;

                    }

                    $pay->save();

                }

                if($request->has('associate_id2'))
                {
                    $pay = new Pay;

                    $pay->load_id = $load->id;

                    if($request->has('paycheck')){
                        $pay->pay_system = $request->paycheck;
                    }


                    if($request->has('associate_id2')){
                        $pay->associate_id = $request->associate_id2;

                    }
                    if($request->has('ssn_associate2')){
                        $pay->ssn_associate = $request->ssn_associate2;

                    }
                    if($request->has('pay_percentage_associate2')){
                        $pay->pay_percentage_associate = $request->pay_percentage_associate2;

                    }
                    if($request->has('payout_associate2')){
                        $pay->payout_associate = $request->payout_associate2;

                    }
                    if($request->has('load_project_date')){
                        $pay->load_project_date = $request->load_project_date;

                    }

                    $pay->save();

                }

                if($request->has('associate_id3'))
                {
                    $pay = new Pay;

                    $pay->load_id = $load->id;

                    if($request->has('paycheck')){
                        $pay->pay_system = $request->paycheck;
                    }

                    if($request->has('associate_id3')){
                        $pay->associate_id = $request->associate_id3;

                    }
                    if($request->has('ssn_associate3')){
                        $pay->ssn_associate = $request->ssn_associate3;

                    }
                    if($request->has('pay_percentage_associate3')){
                        $pay->pay_percentage_associate = $request->pay_percentage_associate3;

                    }
                    if($request->has('payout_associate3')){
                        $pay->payout_associate = $request->payout_associate3;

                    }

                    if($request->has('load_project_date')){
                        $pay->load_project_date = $request->load_project_date;

                    }

                    $pay->save();

                }

                if($request->has('associate_id4'))
                {
                    $pay = new Pay;

                    $pay->load_id = $load->id;


                    if($request->has('paycheck')){
                        $pay->pay_system = $request->paycheck;
                    }


                    if($request->has('associate_id4')){
                        $pay->associate_id = $request->associate_id4;

                    }
                    if($request->has('ssn_associate4')){
                        $pay->ssn_associate = $request->ssn_associate4;

                    }
                    if($request->has('pay_percentage_associate4')){
                        $pay->pay_percentage_associate = $request->pay_percentage_associate4;

                    }
                    if($request->has('payout_associate4')){
                        $pay->payout_associate = $request->payout_associate4;
                    }

                    if($request->has('load_project_date')){
                        $pay->load_project_date = $request->load_project_date;

                    }

                    $pay->save();

                }

                if($request->has('associate_id5'))
                {
                    $pay = new Pay;

                    $pay->load_id = $load->id;

                    if($request->has('paycheck')){
                        $pay->pay_system = $request->paycheck;
                    }


                    if($request->has('associate_id5')){
                        $pay->associate_id = $request->associate_id5;

                    }
                    if($request->has('ssn_associate5')){
                        $pay->ssn_associate = $request->ssn_associate5;

                    }
                    if($request->has('pay_percentage_associate5')){
                        $pay->pay_percentage_associate = $request->pay_percentage_associate5;

                    }
                    if($request->has('payout_associate5')){
                        $pay->payout_associate = $request->payout_associate5;

                    }

                    if($request->has('load_project_date')){
                        $pay->load_project_date = $request->load_project_date;

                    }

                    $pay->save();

                }

                if($request->has('associate_id6'))
                {
                    $pay = new Pay;

                    $pay->load_id = $load->id;

                    if($request->has('paycheck')){
                        $pay->pay_system = $request->paycheck;
                    }


                    if($request->has('associate_id6')){
                        $pay->associate_id = $request->associate_id6;

                    }
                    if($request->has('ssn_associate6')){
                        $pay->ssn_associate = $request->ssn_associate6;

                    }
                    if($request->has('pay_percentage_associate6')){
                        $pay->pay_percentage_associate = $request->pay_percentage_associate6;

                    }
                    if($request->has('payout_associate6')){
                        $pay->payout_associate = $request->payout_associate6;

                    }

                    if($request->has('load_project_date')){
                        $pay->load_project_date = $request->load_project_date;

                    }

                    $pay->save();
                }

                return back()->with('message', 'Load Added Successfully!');

            }

            return back()->with('message', 'Load Added Successfully!');



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
         $load = InOutLoad::find($id);
         $pays  =  Pay::where('load_id', $id)->get();
        return view('admin.inoutloads.show', compact('load','pays'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
