<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Mail\AccountVerificationEMail;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Mail\ForgotPassword;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Registartion Method
    public function register(Request $request)
    {
        try{

            if(!$request->has('name'))
            {
                return response()->json([
                    'status' => 400,
                    'message' => 'Name is Required!',
                    'data' => null,
                ], 200);
            }
            
            if(!$request->has('email'))
            {
                return response()->json([
                    'status' => 400,
                    'message' => 'Email is Required!',
                    'data' => null,
                ], 200);
            } 

            $user = User::where('email', $request->email)->first();
            if(!empty($user))
            {
                return response()->json([
                    'status' => 400,
                    'message' => 'Email has Already Been Taken!',
                    'data' => null,
                ], 200);
            }                        

            if(!$request->has('phone'))
            {
                return response()->json([
                    'status' => 400,
                    'message' => 'Phone Number is Required!',
                    'data' => null,
                ], 200);
            }

            if(!$request->has('address'))
            {
                return response()->json([
                    'status' => 400,
                    'message' => 'Address is Required!',
                    'data' => null,
                ], 200);
            }


            if(!$request->has('user_type'))
            {
                return response()->json([
                    'status' => 400,
                    'message' => 'user_type is Required!',
                    'data' => null,
                ],200);
            }

            if(!$request->has('password'))
            {
                return response()->json([
                    'status' => 400,
                    'message' => 'Password is Required!',
                    'data' => null,
                ], 200);
            }

            if(!$request->has('password_confirmation'))
            {
                return response([
                    'status' => 400,
                    'message' => 'Password Confirmation is Required!',
                    'data' => null,
                ], 200);
            }

            if($request->password != $request->password_confirmation)
            {
                return response()->json([
                    'status' => 400,
                    'message' => 'Password & Confirm Password Does Not Matched!',
                    'data' => null,
                ], 200);
            }       

            $user = new User;
            $user->name = $request->name;           
            $user->email = $request->email;           
            $user->phone = $request->phone; 
            $user->address = $request->address;
            $user->password = bcrypt($request->password);  
            $user->user_type = $request->user_type;           
                 
            if($request->has('latitude'))
            {
                $user->latitude = $request->latitude;
            }

            if($request->has('longitude'))
            {
                $user->longitude = $request->longitude;
            }

            if($user->save())
            {      
                // $code = rand(1111, 9999);          
                // \Mail::to($request->email)->send(new AccountVerificationEMail($code));
                // $user1 = User::where('email', $request->email)->first();
                // $user1->verification_code = $code;
                // $user1->save();

                // if($request->expectsJson())
                // {
                //     return response()->json([
                //         'status' => 200,
                //         'message' => 'An Account Verification Email has been Sent to your Account, Please verify your Account!',
                //         'data' => [
                //             'email' => $request->email
                //         ],
                //     ], 200);
                // }
                
                $user1 = User::where('email', $request->email)->first();

                if($request->expectsJson())
                {
                    return response()->json([
                        'status' => 200,
                        'message' => 'Welcome to Sneaker',
                        'data' => $user1->makeHidden(['created_at', 'updated_at', 'email_verified_at', 'verification_code', 'type']),
                    ], 200);
                }
            }
        } catch(\Exception $e)
        {
            return response()->json([
                'status' => 400,
                'message' => 'There is some trouble to proceed your action!',
                'data' => $e->getMessage(),
            ], 200);
        }
    }

    // Login Method
    public function login(Request $request)
    {
        try{
            $loginData = $request->validate([
                'email' => 'string|required',
                'password' => 'required|max:255'
            ]);
            
            if(!auth()->attempt($loginData))
            {
                if($request->expectsJson())
                {
                    return response()->json([
                        'status' => 400,
                        'message' => 'Invalid Credentials',
                        'data' => null,
                    ], 200);
                }           
            }
    
            // if(empty(auth()->user()->email_verified_at))
            // {
            //     if($request->expectsJson())
            //     {
            //         return response()->json([
            //             'status' => 400,
            //             'message' => 'You need to Verify your Account, Please Check Your Email!',
            //             'data' => null,
            //         ], 200);
            //     } 
            // }else{    

                if($request->has('token'))
                {
                    $user = User::where('email', $request->email)->first();
                    $user->token = $request->token;
                    $user->save();
                }         
                
                if($request->expectsJson())
                {           
                    return response()->json([
                        'status' => 200,
                        'message' => 'Welcome to Sneaker!',
                        'data' => auth()->user()->makeHidden(['created_at', 'updated_at', 'email_verified_at', 'verification_code', 'type']),
                    ], 200);
                }        
            // }
        }catch(\Exception $e)
        {
            return response()->json([
                'status' => 400,
                'message' => $e->getMessage(),
                'data' => null,
            ], 200);
        }        
    }   
    
    public function update_profile_image(Request $request)
    {
        try{
            $user = User::find($request->user_id);
            if(empty($user))
            {
                return response()->json([
                    'status' => 400,
                    'message' => 'User Does Not Exists!',
                    'data' => null,
                ], 200);
            }else{
                if($request->has('image'))
                {
                    $base64_image = $request->image;

                    if (preg_match('/^data:image\/(\w+);base64,/', $base64_image)) {
                        $data = substr($base64_image, strpos($base64_image, ',') + 1);
                        $data = base64_decode($data);     
                        $img = preg_replace('/^data:image\/\w+;base64,/', '', $base64_image);
                        $type = explode(';', $base64_image)[0];
                        $type = explode('/', $type)[1]; // png or jpg etc                

                        if($type == 'png' || $type == 'PNG' || $type == 'jpg' || $type == 'JPG' || $type == 'jpeg' || $type == 'JPEG')
                        {
                            $imageName = Str::random(10).'.'.$type;                   

                            \Storage::disk('profile_images')->put($imageName, $data); // this disk is defined in config/filesystems.php under Disks section

                            $img_path = 'profile_images/'.$imageName;                   
                        }else{
                            return response()->json([
                                'status' => 400,
                                'message' => 'Please Choose a Valid Image!',
                                'data' => null,
                            ], 200);   
                        }         
                    }

                    $user->profile_image = $img_path;
                
                    if($user->save())
                    {
                        $user = User::find($request->user_id);
                        
                        if($request->expectsJson())
                        {
                            return response()->json([
                                'status' => 200,
                                'message' => 'Profile Image Updated Successfully!',
                                'data' => $user->makeHidden(['created_at', 'updated_at', 'email_verified_at', 'verification_code', 'self_description', 'type']),
                            ], 200);
                        }
                    }
                }else{
                    return response()->json([
                        'status' => 400,
                        'message' => 'Choose an Image to Update!',
                        'data' => null,
                    ], 200);
                }                
            }
        }catch(\Exception $e)
        {
            return response()->json([
                'status' => 400,
                'message' => 'There is some trouble to proceed your action!',
                'data' => null,
            ], 200);
        }
    }

    public function update_profile(Request $request)
    {
        try{
            $user = User::find($request->user_id);
            if(empty($user))
            {
                return response()->json([
                    'status' => 400,
                    'message' => 'User does not exists!',
                    'data' => null,
                ], 200);
            }

            if($request->has('height'))
            {
                $user->height = $request->height;
            }      

            if($request->has('weight'))
            {
                $user->weight = $request->weight;
            }            

            if($request->has('gender'))
            {
                $user->gender = $request->gender;
            }          

            if($request->has('age'))
            {
                $user->age = $request->age;
            }

            if($user->save())
            {
                $user2 = User::find($request->user_id);

                if($request->expectsJson())
                {
                    return response()->json([
                        'status' => 200,
                        'message' => 'Info Updated Successfully!',
                        'data' => $user2->makeHidden(['created_at', 'updated_at', 'email_verified_at', 'verification_code']), 
                    ], 200);
                }
            }
        }catch(\Exception $e)
        {
            if($request->expectsJson())
            {
                return response()->json([
                    'status' => 400,
                    'message' => 'There is some trouble to proceed your action!',
                    'data' => null,
                ], 200);
            }
        }
    } 
  
    public function forgot_password(Request $request)
    {
        // try{
            $user = User::where('email', $request->email)->first();
            if(empty($user))
            {
                if($request->expectsJson())
                {
                    return response()->json([
                        'status' => 400,
                        'message' => 'User does not exists!',
                        'data' => null,
                    ], 200);
                }
            }

            $code = rand(1111, 9999);
            $user->verification_code = $code;
            $user->save();
            \Mail::to($request->email)->send(new ForgotPassword($code));            
            
            if($request->expectsJson())
            {
                return response()->json([
                    'status' => 200,
                    'message' => 'A Verification Code has been Sent to your Email!',
                    'data' => $request->email,
                ], 200);
            }
            
        // }catch(\Exception $e)
        // {
        //     if($request->expectsJson())
        //     {
        //         return response()->json([
        //             'status' => 400,
        //             'message' => 'There is some trouble to proceed your action!',
        //             'data' => null,
        //         ], 200);
        //     }
        // }
    }

    public function verify_code(Request $request)
    {
        try{
            $user = User::where('email', $request->email)->first();
            if($request->verification_code == $user->verification_code)
            {
                $user->email_verified_at = Carbon::now();
                $user->verification_code = null;
                $user->save();
                if($request->expectsJson())
                {
                    return response()->json([
                        'status' => 200,
                        'message' => 'Verification Code Matched Successfully!',
                        'data' => $request->email,
                    ], 200);
                }
            }else{
                if($request->expectsJson())
                {
                    return response()->json([
                        'status' => 400,
                        'message' => 'Invalid Verification Code!',
                        'data' => null,
                    ], 200);
                }
            }
        }catch(\Exception $e)
        {
            if($request->expectsJson())
            {
                return response()->json([
                    'status' => 400,
                    'message' => 'There is some trouble to proceed your action!',
                    'data' => $e->getMessage(),
                ], 200);
            }
        }
    }

    public function reset_password(Request $request)
    {
        try{
            $user = User::where('email', $request->email)->first();

            if(empty($user))
            {
                if($request->expectsJson())
                {
                    return response()->json([
                        'status' => 400,
                        'message' => 'User does not exists!',
                        'data' => null,
                    ], 200);
                }
            }

            if($request->has('password') && $request->has('confirm_password'))
            {
                if($request->password === $request->confirm_password)
                {
                    $user->password = bcrypt($request->password);
                    if($user->save())
                    {
                        if($request->expectsJson())
                        {
                            return response()->json([
                                'status' => 200,
                                'message' => 'Password Changed Successfully!',
                                'data' => $user->makeHidden(['created_at', 'updated_at', 'email_verified_at', 'verification_code', 'cover_image', 'self_description', 'opening_time', 'type']),
                            ], 200);
                        }
                    }
                }
            }
        }catch(\Exception $e)
        {
            if($request->expectsJson)
            {
                return response()->json([
                    'status' => 400,
                    'message' => 'There is some trouble to proceed your action!',
                    'data' => null,
                ], 200);
            }
        }
    }

    public function payment_method(Request $request)
    {
        try{
            $user = User::find($request->user_id);

            if(empty($user))
            {
                if($request->expectsJson())
                {
                    return response()->json([
                        'status' => 400,
                        'message' => 'User does not exists!',
                        'data' => null,
                    ], 200);
                }
            }

            if($request->has('payment_method'))
            {
                $user->payment_method = $request->payment_method; // cash or credit_card
            }

            if($request->has('name_on_card'))
            {
                $user->name_on_card = $request->name_on_card;
            }

            if($request->has('card_number'))
            {
                $user->card_number = $request->card_number;
            }

            if($request->has('card_expiry_date'))
            {
                $user->card_expiry_date = $request->card_expiry_date;
            }

            if($request->has('card_cvv'))
            {
                $user->card_cvv = $request->card_cvv;
            }

            if($user->save())
            {
                if($request->expectsJson())
                {
                    return response()->json([
                        'status' => 200,
                        'message' => 'Payment Method Info Updated Successfully!',
                        'data' => $user->makeHidden(['created_at', 'updated_at', 'email_verified_at', 'verification_code', 'cover_image', 'self_description', 'opening_time', 'type']),
                    ], 200);
                }
            }
        }catch(\Exception $e)
        {
            if($request->expectsJson())
            {
                return response()->json([
                    'status' => 400,
                    'message' => 'There is some trouble to proceed your action!',
                    'data' => null,
                ], 200);
            }
        }
    }

    public function logout(Request $request)
    {
        try{
            $user = User::find($request->user_id);

            if(empty($user))
            {
                return response()->json([
                    'status' => 400,
                    'message' => 'User does not exists!',
                    'data' => null,
                ], 200);
            }

            $user->token = null;
            if($user->save())
            {
                return response()->json([
                    'status' => 200,
                    'message' => 'Logged Out!',
                    'data' => null,
                ], 200);
            }
        }catch(\Exception $e)
        {
            if($request->expectsJson())
            {
                return response()->json([
                    'status' => 400,
                    'message' => 'There is some trouble to proceed your action!',
                    'data' => null,
                ], 200);
            }
        }
    }

    public function change_password(Request $request)
    {
        try{
            $user = User::find($request->user_id);

            if(empty($user))
            {
                return response()->json([
                    'status' => 400,
                    'message' => 'User does not exists!',
                    'data' => null,
                ], 200);
            }

            if($request->has('old_password'))
            {
                if(Hash::check($request->old_password, $user->password))
                {   
                    $user->password = bcrypt($request->new_password);
                    if($user->save())
                    {
                        return response()->json([
                            'status' => 200,
                            'message' => 'Password Changed Successfully!',
                            'data' => $user->makeHidden(['created_at', 'updated_at']),
                        ], 200);
                    }
                }else{
                    if($request->expectsJson())
                    {
                        return response()->json([
                            'status' => 400,
                            'message' => 'You Entered Wrong Password!',
                            'data' => null,
                        ], 200);
                    }
                }
            }
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

