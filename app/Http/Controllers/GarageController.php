<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GarageController extends Controller
{
    public function home(Request $request){
        $email = $request->session()->get('email');
        return view('garage.home',['email' => $email]);
    }
    public function loginget(){
        return view('garage.login');
    }
    public function login(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');
        $check = DB::select('select * from customers where email =? and password =?',[$email,$password]);
        if($check){
            $customer_id = $check[0]->customer_id;
            $request->session()->put('customer_id', $customer_id);
            $request->session()->put('email', $email);
            return view('garage.home',['email' => $email]);
        }
        else{
            return view('garage.login',['message'=>'Invalid email or password']);
        }
        
    }
    public function registerget(){
        return view('garage.register');
    }
    public function register(Request $request){
        $email = $request->input('email');
        $phonenumber = $request->input('phonenumber');
        $password = $request->input('password');
        $password2 = $request->input('password2');

        $check = DB::select('select email from customers where email = ?',[$email]);
        if($check){
            return view('garage.register',['message'=>'Email already exists']);
        }
        else{
            if($password == $password2){
                $insert = DB::insert('insert into customers(email,phonenumber,password) values(?,?,?)',[$email,$phonenumber,$password]);
                if($insert){
                    return view('garage.login',['message'=>'Registration successful']);
                }
                else{
                    return view('garage.register',['message'=>'Failed to register']);
                }
            }
            else{
                return view('garage.register',['message'=>'Passwords do not match']);
            }
        }
        
    }
    public function notifications(Request $request){
        $customer_id = $request->session()->get('customer_id');
        $email = $request->session()->get('email');
        $select_notifications = DB::select('select * from notifications where customer_id = ?',[$customer_id]);
        return view('garage.notifications', compact('select_notifications'), ['email'=>$email]);
    }

    public function payment(Request $request){
        $location = $request->input('location');
        $deposit = $request->input('deposit');
        $customer_id = $request->session()->get('customer_id');
        $insert_pay = DB::insert('insert into payments(customer_id,amount,location) values(?,?,?)',[$customer_id,$deposit,$location]);
        if($insert_pay){
            $insert_notification = DB::insert('insert into notifications(customer_id,notification) values(?,?)',[$customer_id,"Confirm you have send Ksh. $deposit to G-Auto Garage. Mechanic will be there soon."]);
            if($insert_notification){
                return view('garage.notifications');
            }
            else{
                return view('garage.notifications',['message'=>'Failed to send notification']);
            }

        }
        else{
            return view('garage.home',['message'=>'Failed to insert payment']);
        }

        
    }
}
