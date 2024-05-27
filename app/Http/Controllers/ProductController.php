<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\products;
use Illuminate\Http\Request;
use Validator;

class ProductController extends Controller
{
    public function createproduct(Request $Request)
    {
        $rules = [
            'productname' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|integer|min:4',
            'stockquantity' => 'required|integer|min:2',
        ];
        $validator = Validator::make($Request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['enter the correct method' . $validator->errors()->first()], 401);
        }

        $product = new products();
        $product->productname = $Request->productname;
        $product->Description = $Request->description;
        $product->price = $Request->price;
        $product->stockquantity = $Request->stockquantity;
        $product->save();
        return response()->json(['status' => 'sucessfully created products'], 200);
    }
    public function update(Request $request,$id){
        $product = products::find($id);
        $rules = [
            'productname' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|integer|min:4',
            'stockquantity' => 'required|integer|min:2',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['enter the correct method' . $validator->errors()->first()], 401);
        }
        $product->productname = $request->productname;
        $product->Description = $request->description;
        $product->price = $request->price;
        $product->stockquantity = $request->stockquantity;
        $product->save();
        return response()->json(['status' => 'sucessfully updated products'],200);
    }
    public function getproduct(Request $request,$id){
        $product =  products::find($id);
        if($product){
            return response()->json(['status'=>'user',$product],200);
        }
        return response()->json(['status'=>'unavailable']);

    }
    public function getallproduct(){
        $product = products::all();
        if($product){
            return response()->json(['status'=>$product],200);
        }
        return response()->json(['status'=>'unavaiilable'],401);
    }
    public function delete(Request $request,$id){
        $product = products::find($id);
        if($product){
            $product->delete();
            return response()->json(['status '=> 'delete sucessfully ']);
        }

    }
}
