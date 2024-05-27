<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Flipkart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;


class CustomerController extends Controller
{
    public function Register(Request $request){
        $rules=[
            'firstname'=>'required|string',
            'lastname'=>'required|string',
            'email'=>'required|email|unique:customers',
            'password'=>'required|string|min:4',
            'address' => 'required|string'
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json(['invalid'=>$validator->errors()->first()],401);
        }
        $data = new Customer();
        $data->firstname = $request->firstname;
        $data->lastname = $request->lastname;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->Address = $request->address;
        $data ->save();
        return response()->json(['sucess']);

    }
    public function update(Request $request, $id)
    {
        $rules = [
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string',
            'address' => 'required|string'
        ];
    
        $validator = Validator::make($request->all(), $rules);
    
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()], 400);
        }
    
        $customer = Customer::find($id);
    
        if (!$customer) {
            return response()->json(['error' => 'Customer not found'], 404);
        }
    
        $customer->firstname = $request->input('firstname');
        $customer->lastname = $request->input('lastname');
        $customer->email = $request->input('email');
        $customer->password = Hash::make($request->input('password'));
        $customer->address = $request->input('address');
        $customer->save();
    
        return response()->json(['success' => 'Customer updated successfully']);
    }
    
    public function login(Request $request){
      $customer = Customer::where('email',$request->input('email'))
                    ->first();
       if(!$customer){
        return response()->json(['invalid'=>'user unavailable']);
       }             
       if(!hash::check($request->input('password'),$customer->password))
       {
        return response()->json(['invalid'=> 'incorrect password']);
       }
       else{
            return response()->json(['user'=>' user can Login sucessfully']);
       }

    }
  
    public function delete(Request $request,$id){
        $flipkart = Customer::find($id);
        if($flipkart){
            $flipkart->delete();
            return response()->json(['sucessfuly delete']);
        }
        return response()->json(['not found']);
       
  
    }
}
