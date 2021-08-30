<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\User;
use App\Attendence;

class MainController extends Controller
{    
    public function match_ssn(Request $request)
    {
        try{
            $user = User::where('ssn', $request->ssn)->first();
            
            if(empty($user))
            {
                return response()->json([
                    'status' => 400,
                    'message' => 'Invalid SSN Number!',
                    'data' => null,
                ], 200);
            }
            
            return response()->json([
                'status' => 200,
                'message' => 'Logged in!',
                'data' => $user,
            ], 200);
        }catch(\Exception $e)
        {
            return response()->json([
                'status' => 400,
                'message' => 'There is some trouble to proceed your action!',
                'data' => null,
            ], 200);
        }
    }

    public function attendence_data()
    {
        return response()->json([
            'status' => 200,
            'message' => 'Attendence Data Found',
            'data' => [
                'shifts' => [
                    ['shift' => 'Morning'],
                    ['shift' => 'Evening'],
                    ['shift' => 'Night'],
                ],
                'shift_time' => [
                    ['time' => '09:00 AM'],
                    ['time' => '10:00 AM'],
                    ['time' => '11:00 AM'],
                    ['time' => '12:00 PM'],
                    ['time' => '01:00 PM'],
                    ['time' => '02:00 PM'],
                    ['time' => '03:00 PM'],
                    ['time' => '04:00 PM'],
                    ['time' => '05:00 PM'],
                    ['time' => '06:00 PM'],
                    ['time' => '07:00 PM'],
                    ['time' => '08:00 PM'],
                    ['time' => '09:00 PM'],
                    ['time' => '10:00 PM'],
                    ['time' => '11:00 PM'],
                    ['time' => '12:00 AM'],
                    ['time' => '01:00 AM'],
                    ['time' => '02:00 AM'],
                    ['time' => '03:00 AM'],
                    ['time' => '04:00 AM'],
                    ['time' => '05:00 AM'],
                    ['time' => '06:00 AM'],
                    ['time' => '07:00 AM'],
                    ['time' => '08:00 AM'],
                ],
            ],
        ], 200);
    }

    public function get_my_attendence(Request $request)
    {
        try{
            $user = User::find($request->user_id);

            if(empty($user))
            {
                return response()->json([
                    'status' => 400,
                    'message' => 'User does not Exists!',
                    'data' => null,
                ], 200);
            }

            $attendence = Attendence::where('user_id', $request->user_id)->get();

            return response()->json([
                'status' => $attendence->count() > 0 ? 200 : 400,
                'message' => $attendence->count() > 0 ? 'Attendence Found' : 'No Attendence Found',
                'data' => $attendence->count() > 0 ? $attendence->makeHidden(['created_at', 'updated_at']) : null,
            ], 200);
        }catch(\Exception $e)
        {
            return response()->json([
                'status' => 400,
                'message' => 'There is some trouble to proceed your action!',
                'data' => null,
            ], 200);
        }
    }

    public function attendence(Request $request)
    {
        try{
            $user = User::find($request->user_id);

            if(empty($user))
            {
                return response()->json([
                    'status' => 400,
                    'message' => 'User does not Exists!',
                    'data' => null,
                ], 200);
            }

            $attendence = new Attendence;
            $attendence->user_id = $request->user_id;
            $attendence->shift = $request->shift;
            $attendence->shift_time = $request->shift_time;
            $attendence->date_and_time = $request->date_and_time;
            $attendence->attendence_type = $request->attendence_type;
            $attendence->save();

            return response()->json([
                'status' => 200,
                'message' => 'Attendence Saved Successfully!',
                'data' => null,
            ], 200);
        }catch(\Exception $e)
        {
            return response()->json([
                'status' => 400,
                'message' => 'There is some trouble to proceed your action!',
                'data' => null,
            ], 200);
        }
    }
}   

