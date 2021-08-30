<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\InOutLoad;
use App\Pay;
use App\WareHouse;
use App\Department;
use App\User;
use Carbon\Carbon;
use Yajra\DataTables\DataTables;
use Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use App\Exports\CustomerExport;
use App\Exports\CarrierExport;
use App\Exports\DriverExport;
use App\Exports\LoadRevenueExport;
use App\Exports\LoadProductivityExport;
use App\Exports\HourlyPay;
use App\Exports\HourlyFixPay;
use App\Exports\FixOnlyPay;

class ReportController extends Controller
{
    public function customer_invoice(Request $request)
    {

    	 // if ($request->ajax()) {
      //       $loads = InOutLoad::selectRaw('id, date,customer_id, load_project_date,location,bill_to_id')->where('load_project_date',$request->start_date)->get();
      //       return DataTables::of($loads)
      //               ->addIndexColumn()
      //               ->addColumn('action', function($row){

      //                      $btn = '<a href="'.route("admin.inoutloads.show", $row->id).'" class="btn btn-primary btn-sm">View</a>';

      //                       return $btn;
      //               })
      //               ->rawColumns(['action'])
      //               ->make(true);
      //   }

         $customers = WareHouse::all();
          $invoices = InOutLoad::select("*")
                    ->where('customer_id', $request->customer_id)
                    ->whereBetween('load_project_date', [Carbon::parse($request->start_date)->format('Y-m-d 00:00:00' ),Carbon::parse($request->end_date)->format('Y-m-d 23:59:59')])
                    ->paginate(12);



        if ($request->isMethod('post')) {
            if($invoices->count() < 1){
                $message = 'No Data Found Between These Dates!';
           return view('admin.reports.customer-invoice', compact('invoices','customers','message'));

            }
        }

         $message = '';
         return view('admin.reports.customer-invoice', compact('invoices','customers','message'));
    }

    
//     public function generate_invoice($id){

//      $customers = WareHouse::all();
//           $invoices = InOutLoad::find($id);
//          return view('admin.reports.generate_invoice',compact('invoices','customers'));
//     }

    public function carrier_invoice(Request $request)
    {

         $carriers = InOutLoad::all();
         $invoices = InOutLoad::select("*")
                    ->where('carrier', $request->carrier)
                    ->whereBetween('load_project_date', [Carbon::parse($request->start_date)->format('Y-m-d 00:00:00' ),Carbon::parse($request->end_date)->format('Y-m-d 23:59:59')])
                    ->paginate(12);


        if ($request->isMethod('post')) {
            if($invoices->count() < 1){
                $message = 'No Data Found Between These Dates!';
           return view('admin.reports.carrier-invoice', compact('invoices','carriers','message'));

            }
        }

         $message = '';
         return view('admin.reports.carrier-invoice', compact('invoices','carriers','message'));

    }

     public function driver_invoice(Request $request)
    {

         $drivers = User::where('job_title','Driver')->get();
         $invoices = InOutLoad::select("*")
                    ->where('driver_id', $request->driver_id)
                    ->whereBetween('load_project_date', [Carbon::parse($request->start_date)->format('Y-m-d 00:00:00' ),Carbon::parse($request->end_date)->format('Y-m-d 23:59:59')])
                    ->paginate(12);


       if ($request->isMethod('post')) {
            if($invoices->count() < 1){
                $message = 'No Data Found Between These Dates!';
           return view('admin.reports.driver-invoice', compact('invoices','drivers','message'));

            }
        }

         $message = '';
         return view('admin.reports.driver-invoice', compact('invoices','drivers','message'));
    }

    public function hourly_report(Request $request)
    {

         $employees = User::where('type', '!=', '0')->get();
         $reports = Pay::select("*")
                    ->where('associate_id', $request->employee_id)
                    ->where('pay_system', 'hourly')
                    ->whereBetween('load_project_date', [Carbon::parse($request->start_date)->format('Y-m-d 00:00:00' ),Carbon::parse($request->end_date)->format('Y-m-d 23:59:59')])
                    ->paginate(12);


       if ($request->isMethod('post')) {
            if($reports->count() < 1){
                $message = 'No Data Found Between These Dates!';
           return view('admin.reports.hourly-report', compact('reports','employees','message'));

            }
        }

         $message = '';
         return view('admin.reports.hourly-report', compact('reports','employees','message'));
    }

    public function fix_report(Request $request)
    {

         $employees = User::where('type', '!=', '0')->get();
         $reports = Pay::select("*")
                    ->where('associate_id', $request->employee_id)
                    ->where('pay_system', 'percentage')
                    ->whereBetween('load_project_date', [Carbon::parse($request->start_date)->format('Y-m-d 00:00:00' ),Carbon::parse($request->end_date)->format('Y-m-d 23:59:59')])
                    ->paginate(12);


       if ($request->isMethod('post')) {
            if($reports->count() < 1){
                $message = 'No Data Found Between These Dates!';
           return view('admin.reports.fix-report', compact('reports','employees','message'));

            }
        }
          
         $message = '';
         return view('admin.reports.fix-report', compact('reports','employees','message'));
          
    }

    public function hourly_fix_report(Request $request)
    {

         $employees = User::where('type', '!=', '0')->get();
         $reports = Pay::select("*")
                    ->where('associate_id', $request->employee_id)
                    ->whereBetween('load_project_date', [Carbon::parse($request->start_date)->format('Y-m-d 00:00:00' ),Carbon::parse($request->end_date)->format('Y-m-d 23:59:59')])
                    ->paginate(12);


       if ($request->isMethod('post')) {
            if($reports->count() < 1){
                $message = 'No Data Found Between These Dates!';
           return view('admin.reports.hourly-fix-report', compact('reports','employees','message'));

            }
        }

         $message = '';
         return view('admin.reports.hourly-fix-report', compact('reports','employees','message'));
    }
    public function load_revenue(Request $request)
    {

         $customers = WareHouse::all();
          $revenue = InOutLoad::select("*")
                    ->where('customer_id', $request->customer_id)
                    ->whereBetween('load_project_date', [Carbon::parse($request->start_date)->format('Y-m-d 00:00:00' ),Carbon::parse($request->end_date)->format('Y-m-d 23:59:59')])
                    ->paginate(12);



        if ($request->isMethod('post')) {
            if($revenue->count() < 1){
                $message = 'No Data Found Between These Dates!';
           return view('admin.Productivity_Report.load-revenue', compact('revenue','customers','message'));

            }
        }

         $message = '';
         return view('admin.Productivity_Report.load-revenue', compact('revenue','customers','message'));
    }

    public function load_productivity(Request $request)
    {

         $customers = WareHouse::all();
          $productivity= InOutLoad::select("*")
                    ->where('customer_id', $request->customer_id)
                    ->whereBetween('load_project_date', [Carbon::parse($request->start_date)->format('Y-m-d 00:00:00' ),Carbon::parse($request->end_date)->format('Y-m-d 23:59:59')])
                    ->paginate(12);



        if ($request->isMethod('post')) {
            if($productivity->count() < 1){
                $message = 'No Data Found Between These Dates!';
           return view('admin.Productivity_Report.load-productivity', compact('productivity','customers','message'));

            }
        }

         $message = '';
         return view('admin.Productivity_Report.load-productivity', compact('productivity','customers','message'));
    }

    public function export_customer()
    { 
     //     dd('OK');
          return Excel::download(new CustomerExport,'Customer_list.xlsx');
    }
    public function export_carrier()
    { 
     //     dd('OK');
          return Excel::download(new CustomerExport,'Carrier_list.xlsx');
    }

    public function export_driver()
    { 
     //     dd('OK');
          return Excel::download(new DriverExport,'Driver_list.xlsx');
    }

    public function export_Load_Revenue()
    { 
     //     dd('OK');
          return Excel::download(new LoadRevenueExport,'Load_Revenue_list.xlsx');
    }

    public function export_Load_Productivity()
    { 
     //     dd('OK');
          return Excel::download(new LoadProductivityExport,'Load_Productivity_list.xlsx');
    }
    
    public function export_Hourly_Pay()
    { 
     //     dd('OK');
          return Excel::download(new HourlyPay,'Hourly_Report_list.xlsx');
    }

    public function export_Hourly_fix_Pay()
    { 
     //     dd('OK');
          return Excel::download(new HourlyFixPay,'Hourly_fix_Report_list.xlsx');
    }

    public function export_fix_only_Pay()
    { 
     //     dd('OK');
          return Excel::download(new FixOnlyPay,'fix_Only_Report_list.xlsx');
    }

    

}
