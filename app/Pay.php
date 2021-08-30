<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Pay extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table="pays";
    protected $fillable = [
        'load_id','associate_id', 'ssn_associate', 'hourly_pay', 'hours','pay_percentage_associate','payout_associate','load_project_date',
    ];

    public function associate()
    {
        return $this->belongsto('App\User', 'associate_id', 'id');
    }

    public function load_details()
    {

        return $this->belongsto('App\InOutLoad', 'load_id', 'id');
    }
    public static function gethourlyPay(){
        $Hourly= DB::table('pays')->join('users','pays.associate_id',"=",'users.id')
        ->select('pays.id','users.first_name','users.last_name','pays.ssn_associate','pays.hourly_pay','pays.hours','users.overtime_pay','pays.payout_associate')->get()->toArray();
        return $Hourly;
    }

    public static function gethourlyFixPay(){
        $Fix= DB::table('pays')->join('users','pays.associate_id',"=",'users.id')->join('in_out_loads','pays.load_id',"=",'in_out_loads.id')
        ->select('pays.id','users.first_name','users.last_name','pays.ssn_associate','pays.pay_system','in_out_loads.employee_total_pay','pays.hourly_pay','pays.hours','users.overtime_pay','pays.payout_associate')->get()->toArray();
        return $Fix;
    }

    public static function getFixOnlyPay(){
        $Fix_only= DB::table('pays')->join('users','pays.associate_id',"=",'users.id')->join('in_out_loads','pays.load_id',"=",'in_out_loads.id')
        ->select('pays.id','users.first_name','users.last_name','pays.ssn_associate','in_out_loads.employee_total_pay','pays.hours','users.overtime_pay','pays.hourly_pay','pays.payout_associate')->get()->toArray();
        return $Fix_only;
    }
}
