<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Chef_profile;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class Chef_profileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         {
        $chef = Chef_profile::latest()->get();

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
        $columns = ['id','name','email','dob','p_no', 'gender', 'address', 'password', 'con_password'];

        $length = $request->input('length');
        $column = $request->input('column');
        $dir = $request->input('dir');
        $searchValue = $request->input('search');

        $query = Coupon::select('id','name','email','dob','p_no', 'gender', 'address', 'password', 'con_password')->orderBy($columns[$column], $dir);

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
        $Chef_profile = new Chef_profile;
        $Chef_profile-> education =$request->education;
        $Chef_profile-> experience =$request->experience;
        $Chef_profile-> speciality =$request->speciality;
        $Chef_profile-> ratting =$request->ratting;
        $request=$Chef_profile->save();
        if($request){
            return ["Request"=>'Store'];
        }
        else{
            return ["Request"=>'Not store'];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chef_profile  $chef_profile
     * @return \Illuminate\Http\Response
     */
    public function show(Chef_profile $chef_profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chef_profile  $chef_profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Chef_profile $chef_profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chef_profile  $chef_profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chef_profile $chef_profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chef_profile  $chef_profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chef_profile $chef_profile)
    {
        //
    }
}
