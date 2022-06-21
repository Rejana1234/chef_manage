<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;
use App\Http\Controllers\Controller;
use App\Models\Chef_profile;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class CouponController extends Controller
{
    public function index(){

        {
        $coupon = Coupon::latest()->get();

        return response()->json(['coupon' => $coupon]);
    }
    }

    public function getData(Request $request)
    {
        $columns = ['id','title','code','price','status'];

        $length = $request->input('length');
        $column = $request->input('column');
        $dir = $request->input('dir');
        $searchValue = $request->input('search');

        $query = Coupon::select('id','title','code','price','status')->orderBy($columns[$column], $dir);

        if ($searchValue) {
            $query->where(function($query) use ($searchValue) {
                $query->where('title', 'like', '%' . $searchValue . '%');
            });
        }

        $projects = $query->paginate($length);


        return response()->json([
            'data' => $projects,
            'draw' => $request->input('draw'),
        ],Response::HTTP_OK);
    }


    public function store(Request $req)
    {

     if($req->isMethod('post'))
        {
            DB::beginTransaction();

        try{
                $coupon = new Coupon;
                $coupon->title=$req->title;
                $coupon->code=$req->code;
                $coupon->price=$req->price;
                $coupon->status=$req->status;
                $coupon->save();

                DB::commit();

                return response()->json([
                    'coupon' => $coupon,
                    'message' => 'Coupon add successful'
                ],Response::HTTP_CREATED);
                
            }catch(Exception $e){
                DB::rollBack();

                $error = $e->getMessage();

                return response()->json($error);
            }
        }
    }
        
   public function edit($id)
   {
        $coupon = Coupon::findOrFail($id);

        return response()->json([
            'coupon' => $coupon
        ]);
   }

    public function update(Request $req, $id)
    {
        if($req->_method == 'PUT')
        {
            DB::beginTransaction();

            try {
                //code...
                 $coupon = Coupon::findOrFail($id);

                $coupon->title=$req->title;
                $coupon->code=$req->code;
                $coupon->price=$req->price;
                $coupon->status=$req->status;
                $coupon->save();

                DB::commit();

                return response()->json([
                    'coupon' => $coupon,
                    'message' => 'Coupon updated successful'
                ],Response::HTTP_OK);
            } catch (Exception $e) {
                //throw $th;
                 DB::rollBack();

                $error = $e->getMessage();

                return response()->json($error);
            }
        }
    }

      public function destroy($id)
    {
        $coupon = Coupon::findOrFail($id);
        $coupon->delete();

        return response()->json(['message' => 'Coupon delete successful']);
    }
}
