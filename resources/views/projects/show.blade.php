@extends('layouts.app')
@section('title')
  {{$project->title}} project

    
@endsection

@section('content')
    <div class="container bg-primary py-4  px-5 text-white">
        @auth
            <div class="d-flex justify-content-between">
                <a href="{{route('projects.edit',$project->id)}}" class="btn btn-success mb-5 text-capitalize">edit</a>
                <div>
                    {!!Form::open(['action' => ['ProjectsController@destroy',$project->id],'class'=> ''])!!}
                    {{Form::hidden('_method','DELETE')}}
                    @csrf
                
                    {{Form::submit('Delete', ['class'=>' btn btn-danger'])}}
                    {!!Form::close()!!}
                </div>

            </div>
        @endauth
        
        @include('inc.messages')
        <h1 class="mb-4 mt-5 py-2 main-project-title text-bold">{{$project->title}}</h1>
      
        <div class="main-info row pb-4">
            {{-- content --}}
            
        
            <div class="col-md-8">
                <div class="left">
                    {{-- picture --}}
                    <div class="main-project-img-container mb-3 text-danger">
                        <img src="{{asset('my_hack/'.$project->img_text)}}" alt="" class="img-fluid" style="width:100%">

                    </div>
                    {{-- description --}}
                    <div class="main-project-description  my-5 mt-md-2">
                        {{$project->description}}
                    </div>

                    {{-- side by side --}}

                    <div class="main-project-side-by-side mb-5 d-flex justify-content-between py-2 border-white border-bottom">
                        <div class="main-project-category d-flex">
                            <h6 class="mr-2 text-black-50">Category:</h6>
                            <h6>{{$project->category}}</h6>
                        </div>
                        <div class="main-project-status d-flex">
                            <h6 class="mr-2 text-black-50">Status:</h6>
                            <h6>{{$project->progress_status}}</h6>
                        </div>


                    </div>

                    {{-- approach --}}
                    <div class="approach mb-5 aspect">
                        <h5 class="mb-2 text-uppercase text-bold">My Approach</h5>
                        <ul class="ml-4">
                            @foreach ($project->approach as $step)
                              <li>{{$step}}</li>
                                
                            @endforeach
                            
                            
                        </ul>
                    </div>

                    {{-- challenges --}}
                    <div class="approach mb-5 aspect">
                        <h5 class="mb-2 text-uppercase">Challenges Faced</h5>
                        <ul class="ml-4">
                            @foreach ($project->challenges as $challenge)
                              <li>{{$challenge}}</li>
                              
                            @endforeach
                        </ul>
                    </div>

                    {{-- things learnt --}}
                    <div class="approach mb-5 aspect">
                        <h5 class="mb-2 text-uppercase">Some Things Learnt</h5>
                        <ul class="ml-4">
                            @foreach ($project->things_learnt as $point)
                              <li>{{$point}}</li>
                                
                            @endforeach
                        </ul>
                    </div>


                </div>
                
            </div>
            <div class="col-md-4">
                <div class="right border-white border-left pl-md-3 d-flex justify-content-between flex-wrap align-items-start flex-md-column align-items-md-stretch">
                    <a target="_blank" href="{{$project->project_link}}" class="btn btn-success mb-4 correct-btn">View Project</a>
                    <a target="_blank" href="{{$project->code_link}}" class="btn bg-white text-primary mb-4 correct-btn">Check Code</a>

                    {{-- tech stack --}}
                    <div class="approach my-5 aspect w-100">
                        <h5 class="mb-2 text-uppercase">Tech Stack Used</h5>
                        <ul class="ml-4">
                            @foreach ($project->tech_stack as $tech)
                              <li>{{$tech}}</li>
                                
                            @endforeach
                        </ul>
                    </div>

                </div>
            </div>
           

        
        </div>
        
    </div>
    
@endsection