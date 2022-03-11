<?php

namespace App\Http\Controllers;

use App\Models\Office;
use App\Http\Requests\OfficeRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $user=Auth::user()->id;
        // $data['offoceinfo']=Office::where('user_id',$user)->get();
        $data['users']=$request->user()->with('family')->firstWhere('id',$request->user()->id);
        //dd($data);
        return view('office.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('office.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OfficeRequest $request)
    {
        $officeinfo=Office::updateOrCreate([
            'user_id'=>Auth::user()->id,
        ],[
            //'user_id'=>Auth::user()->id,
            'designation'=>$request->get('designation'),
            'date_of_joining'=>$request->get('date_of_joining'),
            'joined_designation'=>$request->get('joined_designation'),
            'current_work_place'=>$request->get('current_work_place'),
        ]);

      // dd($officeinfo);

        if(!empty($officeinfo)){
            return redirect()->route('officeinformation.index');
        }
        else{
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function show(Office $office)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function edit(Office $office)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Office $office)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function destroy(Office $office)
    {
        //
    }
}
