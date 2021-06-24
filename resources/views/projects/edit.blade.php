@extends('layouts.app')
@section('title')
  Edit Project

    
@endsection

@section('content')
    <div class="container bg-primary py-4">
        <!-- Extra Navigation--> 
        <div class="mb-5">
           
            <a href="{{url()->previous()}}" class="float-right text-white">Go back</a>
            
        </div>

        {{-- Error, Success ,.. messages --}}
        @include('inc.messages')
        

        {{-- Form to be filled out --}}

        <div class="container py-4 px-5">
            <h1 class="text-white mb-4 text-capitalize">Edit {{$project->title}}</h1>
            
            <form action="{{route('projects.update',$project->id)}}" method="POST" enctype="multipart/form-data">
         
                <div class="form-group">
                    {{Form::label('title', 'Title')}}
                    {{Form::text('title', $project->title,['class'=>'form-control','placeholder'=>'Title'])}}
                </div>
                <div class="form-group">
                    {{Form::label('description', 'Description')}}
                    {{Form::textarea('description',  $project->description,['class'=>'form-control','placeholder'=>'Description'])}}
                </div>
            
                <div class="form-group">
                    {{Form::label('category', 'Category')}}
                    <select name="category" id="" class="form-control">
                        <option value="fullstack" {{$project->category == 'fullstack'? 'selected':''}}>fullstack</option>
                        <option value="backend"  {{$project->category == 'backend'? 'selected':''}}>backend</option>
                        <option value="frontend" {{$project->category == 'frontend'? 'selected':''}}>frontend</option>
                    </select>
                </div>

                <div class="form-group">
                    {{Form::label('progress_status', 'Progress status')}}
                    <select name="progress_status" id="" class="form-control">
                        <option value="in progress"{{$project->progress_status == 'in progess'? 'selected':''}}>In Progress</option>
                        <option value="almost done" {{$project->progress_status == 'almost done'? 'selected':''}}>Almost Done</option>
                        <option value="complete" {{$project->progress_status == 'complete'? 'selected':''}}>Complete</option>
                        
                    </select>
                </div>
               
                <div class="form-group">
                    {{Form::label('approach', 'Approach')}}
                    {{Form::textarea('approach', $project->approach ,['class'=>'form-control','placeholder'=>'Approach'])}}
                </div>
                <div class="form-group">
                    {{Form::label('challenges', 'Challenges')}}
                    {{Form::textarea('challenges', $project->challenges ,['class'=>'form-control','placeholder'=>'Challenges'])}}
                </div>
                <div class="form-group">
                    {{Form::label('things_learnt', 'Some things learnt')}}
                    {{Form::textarea('things_learnt',$project->things_learnt ,['class'=>'form-control','placeholder'=>'Some things learnt'])}}
                </div>
                <div class="form-group">
                    {{Form::label('tech_stack', 'Tech stack Used')}}
                    {{Form::textarea('tech_stack',$project->tech_stack ,['class'=>'form-control','placeholder'=>'Tech stack used'])}}
                </div>

                <div class="form-group">
                    <label for="project_image">Replace Project Image</label>
                    <input type="file" name="project_image" id="" class="form-control"> 
                </div>
            
                <div class="form-group">
                    {{Form::label('project_link', 'Project link')}}
                    {{Form::text('project_link', $project->project_link,['class'=>'form-control','placeholder'=>'Project link'])}}
                </div>
                <div class="form-group">
                    {{Form::label('code_link', 'Code link')}}
                    {{Form::text('code_link',$project->code_link ,['class'=>'form-control','placeholder'=>'Code link'])}}
                </div>
    
                
                {{Form::hidden('_method','PUT')}}
    
                @csrf
                
               
                
                
                {{Form::submit('Update', ['class'=>'btn btn-success mt-5 text-capitalize ml-auto'])}}
            
    
    
               
    
            
            
            
            </form>
        </div>


        
        
    </div>
    
@endsection