<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('test'); //testing middleware
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact =  Contact::first();
        return view('contact.index',compact('contact'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contact.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validateRequest($request);
        $contact = Contact::create($data);
        return redirect('/contact')->with('success', 'Contact page created');
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
        
        $contact = Contact::first();
        return view('contact.edit',compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        $data = $this->validateRequest($request);
        $contact->update($data);
        

        return redirect('/contact')->with('success', 'Contact page Updated');
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



    // Validations

    private function validateRequest($request){
        return $request->validate([
            'phone'=>'required',
            'email'=>'required',
            'physical_address'=>'required',
            'whatsapp_link'=>'required|url',
            'whatsapp_text'=>'required',
            'github_link'=>'required|url',
            'twitter_link'=>'required|url',
            'instagram_link'=>'required|url',
            'linkedin_link'=>'required|url',
            'github_text'=>'required',
            'twitter_text'=>'required',
            'instagram_text'=>'required',
            'linkedin_text'=>'required',
           
            

        ]);

    }
}
