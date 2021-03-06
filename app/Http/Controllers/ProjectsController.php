<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Http\Resources\Project as ProjectResource;
use Illuminate\Support\Facades\Storage;

class ProjectsController extends Controller
{









    // API ++++++++++++++++++++++++++++++
    public function fetchCategory($category)
    {
        
        $projects = $category === "all" ? Project::all() : Project::getCategory($category)->get();
        return ProjectResource::collection($projects);
    }
    // API ++++++++++++++++++++++++++++++











    public function __construct()
    {
        $this->middleware('auth',['except'=>[
            'show','fetchCategory'
        ]]);
        //$this->middleware('test'); //testing middleware
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view('projects.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('projects.create');
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
       
        $project = Project::create($data);
       
                  

        //add profile image if available
        //dd( $this->validateFileRequest($request));
        if ($data = $this->validateFileRequest($request)) {
            $project->update([
                
                'mini_image'=>$request->hasFile('mini_image')  ? $data['mini_image']->store('mini_images','public'): '',
                'project_image'=>$request->hasFile('project_image')  ? $data['project_image']->store('project_images','public') : ''
            ]);
            
            
           
           

        }
        
        return redirect('/projects')->with('success',"$project->title  has been added");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        $project->challenges = $this->convertToArray($project->challenges);
        $project->things_learnt = $this->convertToArray($project->things_learnt);
        $project->approach = $this->convertToArray($project->approach);
        $project->tech_stack = $this->convertToArray($project->tech_stack);
        return view('projects.show',compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $data = $this->validateRequest($request);
       
        $project->update($data);


       
                  

        //add profile image if available
        // dd( $this->validateFileRequest($request));
        if ($data = $this->validateFileRequest($request)) {
            
            if ($project->project_image) {// if profile image is available then mini will be to cos its created from it
           
                Storage::delete("public/$project->project_image");
                Storage::delete("public/$project->mini_image");
            }
            $project->update([
                
                'mini_image'=>$request->hasFile('mini_image')  ? $data['mini_image']->store('mini_images','public'): $project->mini_image,
                'project_image'=>$request->hasFile('project_image')  ? $data['project_image']->store('project_images','public') : $project->project_image
            ]);
            
            
           
           

        }
        
        return redirect("/projects/$project->id")->with('success',"$project->title  has been updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
          // delete images first
          if ($project->project_image) {
            Storage::delete("public/$project->project_image");
            Storage::delete("public/$project->mini_image");

          }

          $project->delete();
          return redirect('/projects')->with('success',"$project->title  has been deleted");
    }


    


    // Validations

    private function validateRequest($request){
        return $request->validate([
            'title'=>'required',
            'description'=>'required',
            'category'=>'required',
            'progress_status'=>'required',
            'approach'=>'required',
            'challenges'=>'required',
            'things_learnt'=>'required',
            'tech_stack'=>'required',
            'project_link'=>'',
            'code_link'=>'',
            'img_text'=>'',
            'mini_img_text'=>''
            

        ]);

    }




    private function validateFileRequest($request){
        //dd($request->hasFile('mini_image'));
        if ($request->hasFile('project_image') || $request->hasFile('mini_image')) {
            //return 2;
            return $request->validate([
                
               'project_image'=>'file|mimes:jpeg,jpg,png|max:12000',
               'mini_image'=>'file|mimes:jpeg,jpg,png|max:12000',
                
    
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
        for($i=0; $i < strlen($text) ; $i++) { 
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
