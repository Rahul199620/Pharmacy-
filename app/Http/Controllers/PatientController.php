<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $patients=Patient::get();
            $patients->load(['doctor']);
            
                return ['patients' =>$patients,compact('patients')];
            }
        
        return view('patient');
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
    private function save(Request $request)
    {
         $request->validate([
            'name' => 'required',
            'age'=>'required',
            'admitted_date'=>'required',
            'admitted_date'=>'required',
            'checkout_date'=>'required',
            'doctor_id'=>'required'
            ]);
        $patient=Patient::FindOrNew($request->form_id);
        $patient->fill($request->all());
        $patient->save();
        return ['patient' =>$patient];
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->save($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patient=Patient::findOrFail($id);
        $patient->load('doctor');
        return ['patient'=>$patient];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return $this->save($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
