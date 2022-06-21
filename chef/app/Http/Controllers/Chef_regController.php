<?php

namespace App\Http\Controllers;

use App\Models\Chef_reg;
use Illuminate\Http\Request;

class Chef_regController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Chef_reg = new Chef_reg;
        $Chef_reg-> chef_id=$request->chef_id;
        $Chef_reg-> chef_name=$request->chef_name;
        $Chef_reg-> email=$request->email;
        $Chef_reg-> dob=$request->dob;
        $Chef_reg-> p_no=$request->p_no;
        $Chef_reg-> gender=$request->gender;
        $Chef_reg-> password=$request->password;
        $Chef_reg-> con_password=$request->con_password;
        $request=$Chef_reg->save();
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
     * @param  \App\Models\Chef_reg  $chef_reg
     * @return \Illuminate\Http\Response
     */
    public function show(Chef_reg $chef_reg)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chef_reg  $chef_reg
     * @return \Illuminate\Http\Response
     */
    public function edit(Chef_reg $chef_reg)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chef_reg  $chef_reg
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chef_reg $chef_reg)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chef_reg  $chef_reg
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chef_reg $chef_reg)
    {
        //
    }
}
