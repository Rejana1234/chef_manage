<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    function index(){

        return Product::all();
    }

    function addProduct(Request $req){

        $product = new Product;
        $product->product_name=$req->product_name;
        $product->stoke=$req->stoke;
        $product->details=$req->details;
        $product->time_date=$req->time_date;
        $product->price=$req->price;
        $result = $product->save();

        if($result){

            return ["result"=>"Data has been saved."];
        }
        else{

            return ["result"=>"Operation failed"];

        }

    }

    function delete($id){
        
        $product=Product::find($id);
        $result=$product->delete();
        if($result){
            
            return ["result"=>"Data has been deleted."];
        }
        else{
            
            return ["result"=>"Delete operation failed!"];
        }

    }

    function update(Request $req){

        $product = Product::find($req->id);
        $product->product_name=$req->product_name;
        $product->stoke=$req->stoke;
        $product->details=$req->details;
        $product->time_date=$req->time_date;
        $product->price=$req->price;
        $result = $product->save();

        if($result){

            return ["result"=>"Data has been updated."];
        }
        else{

            return ["result"=>"Update operation failed!"];
        }
        
    }
}
