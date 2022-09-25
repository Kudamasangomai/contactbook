<?php

namespace App\Http\Controllers;
use App\Models\Contact;

use Illuminate\Http\Request;

class contactapicontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return contact::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            
             
            
                "contact_fname"=> 'required',
                "contact_lname"=> 'required',
                "job"=>  'required',
                "contact_email"=>'required|unique:contacts'
               
               
            
        ]);
        return contact::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         return Contact::find($id);
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
        $contact = Contact::find($id);
        $contact->update($request->all());
        return $contact;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        return contact::destroy($id);
      
    }
}
