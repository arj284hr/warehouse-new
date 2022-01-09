<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class InOutLoad extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table="in_out_loads";
    protected $fillable = [
        'id','customer_id', 'bill_to_id', 'department_id', 'driver_id', 'date', 'load_project_date', 'load_project_type', 'employee_total_pay',
    ];

    
    public function load_details()
    {
        return $this->hasMany('App\Pay', 'load_id', 'id');
    }

    public function customer()
    {
        return $this->belongsto('App\WareHouse', 'customer_id', 'id');
    }

    public function bill_to()
    {
        return $this->belongsto('App\WareHouse', 'bill_to_id', 'id');
    }

    public function driver()
    {
        return $this->belongsto('App\User', 'driver_id', 'driver_name');
    }

    public static function getCustomer(){
        $record= DB::table('in_out_loads')->select('id','bill_to_id','load_project_control_no','load_project_date','load_project_type','location','department_id','shift','trailer_type','trailer_size','in_out_load','door_no','weight','begin_case_ct','ending_case_ct','total_skus','pieces','charge_amount')->get()->toArray();
        return $record;
    }

    public static function getCarrier(){
        $Carrier= DB::table('in_out_loads')->select('id','bill_to_id','load_project_control_no','load_project_date','load_project_type','location','department_id','shift','trailer_type','trailer_size','in_out_load','door_no','weight','begin_case_ct','ending_case_ct','total_skus','pieces','charge_amount')->get()->toArray();
        return $Carrier;
    }

    public static function getDriver(){
        $Driver= DB::table('in_out_loads')->select('id','bill_to_id','load_project_control_no','load_project_date','load_project_type','location','department_id','shift','trailer_type','trailer_size','in_out_load','door_no','weight','begin_case_ct','ending_case_ct','total_skus','pieces','charge_amount')->get()->toArray();
        return $Driver;
    }
    public static function getLoadRevenue(){
        $Revenue= DB::table('in_out_loads')->select('id','bill_to_id','load_project_control_no','load_project_date','load_project_type','location','department_id','shift','trailer_type','trailer_size','in_out_load','door_no','weight','vendor','begin_case_ct','ending_case_ct','total_skus','pieces','charge_amount')->get()->toArray();
        return $Revenue;
    }

    public static function getLoadProductivity(){
        $Driver= DB::table('in_out_loads')->select('id','bill_to_id','load_project_control_no','load_project_date','load_project_type','location','department_id','shift','trailer_type','trailer_size','in_out_load','door_no','weight','vendor','begin_case_ct','ending_case_ct','total_skus','pieces','charge_amount','in_out_load','begin_case_ct','pieces','charge_amount','special_charges')->get()->toArray();
        return $Driver;
    }

}
