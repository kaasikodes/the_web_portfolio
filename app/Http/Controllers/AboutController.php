<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\About;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('about.create');
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
       
        $about = About::create($data);
       
                  

        //add profile image if available
        //dd( $this->validateFileRequest($request));
        if ($data = $this->validateFileRequest($request)) {
            $about->update([
                
                'profile_image'=>$data['image']->store('mini_images','public')
            ]);
            
            
           
           

        }
        
        return redirect('/about')->with('success',"$about->name your about info has been created");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $about = About::find(1);
        
        
        
        // format the skills to an array
        $about->skills = $this->convertToArray($about->skills);
       
        return view('about.show',compact('about'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $about = About::find(1);

        return view('about.edit',compact('about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $about = About::find(1);
        $data = $this->validateRequest($request);
       
        $about->update($data);
        if ($about->profile_image) {
           
            Storage::delete("public/$about->profile_image");
        }
        
       
                  

        //add profile image if available
        //dd( $this->validateFileRequest($request));
        if ($data = $this->validateFileRequest($request)) {
            $about->update([
                
                'profile_image'=>$data['image']->store('mini_images','public')
            ]);
            
            
           
           

        }
        
        return redirect('/about')->with('success',"$about->name your about info has been updated");
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
            'name'=>'required',
            'role'=>'required',
            'bio'=>'required',
            'hero_copy'=>'required',
            'skills'=>'required',
            'location'=>'required',
            'languages_spoken'=>'required',
            

        ]);

    }




    private function validateFileRequest($request){
        //dd($request->hasFile('image'));
        if ($request->hasFile('profile_image')) {
            //return 2;
            return $request->validate([
                
                'image'=>'file|mimes:jpeg,jpg,png|max:12000',
                
    
            ]);
        }
       return false;
        
        

    }


    // Array Formater Functions
    private function convertToArray($text){
        //return $text[0];
        $array = [];
        $basedOn = ',';
        $word = '';
        for($i=0; $i < strlen($text) ; $i++) { // correct thi issue l8r
            if ($text[$i] == $basedOn) {
                
                $array[] = $word;
                $word = '';
                continue;
            }
            $word .= $text[$i];
            if ($i == strlen($text) - 1) {
                $array[] = $word;
                $word = '';
                break;
            }
            
        }
        
        return $array;

        
    }

}

