<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class PackageController extends Controller
{
    public function index(){

        $packager = Package::latest()->get();

        return response()->json(['packager' => $packager]);
    
    }


    function getData(Request $request)
    {

        $columns = ['id','image','food','chef_name','time','program_name','decoration','price','status'];

        $length = $request->input('length');
        $column = $request->input('column');
        $dir = $request->input('dir');
        $searchValue = $request->input('search');

        $query = Package::select('id','image','food','chef_name','time','program_name','decoration','price','status')->orderBy($columns[$column], $dir);

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

    public function store(Request $request)
    {

     if($request->isMethod('post'))
        {
            DB::beginTransaction();

        try{
                $packager = new Package;
                $packager->food=$request->food;
                $packager->chef_name=$request->chef_name;
                $packager->time=$request->time;
                $packager->program_name=$request->program_name;
                $packager->decoration=$request->decoration;
                $packager->price=$request->price;

                if($request->file('image'))
                {
                    $image_path = $request->file('image');
                    $image_name =time().'_'.$image_path->getClientOriginalName();
                    $path = $request->file('image')->move(public_path('uploads/packager_image'), $image_name);

                     $packager->image= $image_name;
                }

               

                $packager->status=$request->status;

                $packager->save();

                DB::commit();

                return response()->json([
                    'packager' => $packager,
                    'message' => 'Packager add successful'
                ],Response::HTTP_CREATED);
                
            }catch(Exception $e){
                DB::rollBack();

                $error = $e->getMessage();

                return response()->json($error);
            }
        }
    }
        

     public function destroy($id)
    {
        $packager = Package::findOrFail($id);
        $packager->delete();

        return response()->json(['message' => 'Packager delete successful']);
    }

    function update(Request $req){

        $packager = Package::find($req->id);
        $packager->image=$req->image;
        $packager->food=$req->food;
        $packager->chef_name=$req->chef_name;
        $packager->time=$req->time;
        $packager->program_name=$req->program_name;
        $packager->decoration=$req->decoration;
        $packager->price=$req->price;
        $packager->status=$req->status;
        $result = $package->save();

        if($result){

            return ["result"=>"Data has been updated."];
        }
        else{

            return ["result"=>"Update operation failed!"];
        }
        
    }
}
