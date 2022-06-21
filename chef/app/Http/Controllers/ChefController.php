<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Chef;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
class ChefController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
        public function index()
    {
         {
        $chef = Chef::latest()->get();

        return response()->json(['chef' => $chef]);
    }
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function getData(Request $request)

    {
        $columns = ['id','image','name','experience'];

        $length = $request->input('length');
        $column = $request->input('column');
        $dir = $request->input('dir');
        $searchValue = $request->input('search');

        $query = Chef::select('id','image','name','experience')->orderBy($columns[$column], $dir);

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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

     if($request->isMethod('post'))
        {
            DB::beginTransaction();

        try{
                $chef = new Chef();
                $chef->name=$request->name;
                $chef->experience=$request->experience;
                

                if($request->file('image'))
                {
                    $image_path = $request->file('image');
                    $image_name =time().'_'.$image_path->getClientOriginalName();
                    $path = $request->file('image')->move(public_path('uploads/chef_image'), $image_name);

                    $chef->image= $image_name;
                }


                $chef->save();

                DB::commit();

                return response()->json([
                    'chef' => $chef,
                    'message' => 'chef add successful'
                ],Response::HTTP_CREATED);
                
            }catch(Exception $e){
                DB::rollBack();

                $error = $e->getMessage();

                return response()->json($error);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chef  $chef
     * @return \Illuminate\Http\Response
     */
    public function show(Chef $chef)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chef  $chef
     * @return \Illuminate\Http\Response
     */
    public function edit(Chef $chef)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chef  $chef
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chef $chef)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chef  $chef
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chef $chef)
    {
        //
    }
}
