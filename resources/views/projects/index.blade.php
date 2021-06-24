@extends('layouts.app')
@section('title')
  Projects

    
@endsection

@section('content')
    <div class="container bg-primary py-4  px-md-5 px-2">
        {{-- messages --}}
        @include('inc.messages')
        {{-- heading --}}
        <div class="projects-header mb-5 d-flex flex-column align-items-center">
          <h2 class="text-white text-center section-title mb-4">Projects</h2>
          <div class="project-navigation d-flex justify-content-center py-2 w-75">

            <a href="/projects/all" class="project-nav-link px-4">All</a>
                
            <a href="/projects/frontend" class="project-nav-link px-4">Front End</a>
            
            <a href="/projects/backend" class="project-nav-link px-4">Back End</a>
            
            <a href="/projects/fullstack" class="project-nav-link px-4">Full Stack</a>
            
           
          </div>
        </div>
        {{-- add project btn --}}
        <a href="{{route('projects.create')}}" class="btn btn-success">Add Project</a>

        {{-- my projects --}}
        <div class="row py-4" id="projects-container">
          @foreach ($projects as $project)
              <div class="col-md-4 col-lg-3 d-flex justify-content-center mb-4">
                <div class="project card d-flex flex-column align-items-center py-2 px-2">
                  <div class="project-img-container">

                  </div>


                  <div class="info align-self-start px-3 pt-4 w-100">
                      <div class="pb-3 d-flex justify-content-between align-items-center">
                          <h5 class="title mr-2 text-bold">{{$project->title}}</h5>
                          <a href="{{route('projects.show',$project->id)}}" class="btn btn-primary btn-sm">View</a>
                          
                      </div>
                      <div class="d-flex">
                          <h6 class="title mr-2 text-primary">Status - </h6>
                          <h6 class="value text-capitalize">{{$project->progress_status}}</h6>
                      </div>
                  </div>


                </div>

              </div>


              
          @endforeach
          

     
          
        </div>
        
    </div>
    
@endsection