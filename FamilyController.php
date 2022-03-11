<?php

namespace App\Http\Controllers;

use App\Models\Family;
use App\Http\Requests\FamilyRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FamilyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['users']=$request->user()->with('family')->firstWhere('id',$request->user()->id);
        //dd($data);
        return view('family.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('family.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\FamilyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FamilyRequest $request)
    {
        $user=Auth::user()->id;
        $familyinfo=Family::create([
            'user_id'=>$user,
            'father_name'=>$request->get('father_name'),
            'mother_name'=>$request->get('mother_name'),
            'spouse_name'=>$request->get('spouse_name'),
            'number_of_child'=>$request->get('number_of_child'),
            'spous_phone'=>$request->get('spous_phone'),
        ]);

        // //dd($familyinfo);
        if(!empty($familyinfo)){
            return redirect()->route('familyinformation.index');
        }else{
            return redirect()->back()->withInput();
        }

       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Family  $family
     * @return \Illuminate\Http\Response
     */
    public function show(Family $family)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Family  $family
     * @return \Illuminate\Http\Response
     */
    public function edit(Family $family)
    {
        $data['family']=$family;
       // dd($family);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\family  $family
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, family $family)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\family  $family
     * @return \Illuminate\Http\Response
     */
    public function destroy(family $family)
    {
        //
    }
}
