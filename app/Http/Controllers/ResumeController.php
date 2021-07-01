<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Resume;
use Illuminate\Support\Facades\Storage;

class ResumeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',[
            'except'=>['download']
        ]);
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resume = Resume::find(1);
        return view('resume.index',compact('resume'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('resume.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($data = $this->validateFileRequest($request)) {
            Resume::create([
                
                
                'resume'=>$data['resume']->store('uploads','public')
            ]);
            
            
           
           

        }
        
        return redirect('/resume')->with('success',"Resume has been added");
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
    public function edit(Resume $resume)
    {
        return view('resume.edit',compact('resume'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resume $resume)
    {
        if ($data = $this->validateFileRequest($request)) {
            Storage::delete("public/$resume->resume");
            $resume->update([
                
                
                'resume'=>$data['resume']->store('uploads','public')
            ]);
            
            
           
           

        }
        
        return redirect('/resume')->with('success',"Resume has been updated");
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

    // DOWNLOAD
    public function download(Resume $resume)
    {
        
        return response()->download("storage/$resume->resume","Isaac_Odeh_Resume");
    }





















    // Validations

   

    private function validateFileRequest($request){
        //dd($request->hasFile('image'));
        if ($request->hasFile('resume')) {
            //return 2;
            return $request->validate([
                
                'resume'=>'file|mimes:jpeg,jpg,png,pdf|max:1200',
                
    
            ]);
        }
       return false;
        
        

    }

}
