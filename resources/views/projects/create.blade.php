@extends('layouts.app')
@section('title')
  Add Project

    
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
            <h1 class="text-white mb-4">Add Project</h1>
            
            <form action="{{route('projects.store')}}" method="POST" enctype="multipart/form-data">
         
                <div class="form-group">
                    {{Form::label('title', 'Title')}}
                    {{Form::text('title', '',['class'=>'form-control','placeholder'=>'Title'])}}
                </div>
                <div class="form-group">
                    {{Form::label('description', 'Description')}}
                    {{Form::textarea('description', '',['class'=>'form-control','placeholder'=>'Description'])}}
                </div>
            
                <div class="form-group">
                    {{Form::label('category', 'Category')}}
                    <select name="category" id="" class="form-control">
                        <option value="fullstack">fullstack</option>
                        <option value="backend">backend</option>
                        <option value="frontend">frontend</option>
                    </select>
                </div>

                <div class="form-group">
                    {{Form::label('progress_status', 'Progress status')}}
                    <select name="progress_status" id="" class="form-control">
                        <option value="in progress">In Progress</option>
                        <option value="almost done">Almost Done</option>
                        <option value="complete">Complete</option>
                        
                    </select>
                </div>
               
                <div class="form-group">
                    {{Form::label('approach', 'Approach')}}
                    {{Form::textarea('approach','' ,['class'=>'form-control','placeholder'=>'Approach'])}}
                </div>
                <div class="form-group">
                    {{Form::label('challenges', 'Challenges')}}
                    {{Form::textarea('challenges','' ,['class'=>'form-control','placeholder'=>'Challenges'])}}
                </div>
                <div class="form-group">
                    {{Form::label('things_learnt', 'Some things learnt')}}
                    {{Form::textarea('things_learnt','' ,['class'=>'form-control','placeholder'=>'Some things learnt'])}}
                </div>
                <div class="form-group">
                    {{Form::label('tech_stack', 'Tech stack Used')}}
                    {{Form::textarea('tech_stack','' ,['class'=>'form-control','placeholder'=>'Tech stack used'])}}
                </div>

                <div class="form-group">
                    <label for="project_image">Choose Project Image</label>
                    <input type="file" name="project_image" id="" class="form-control"> 
                </div>


                <div class="form-group">
                    <label for="mini_image">Choose Project Mini Image</label>
                    <input type="file" name="mini_image" id="" class="form-control"> 
                </div>
            
                <div class="form-group">
                    {{Form::label('project_link', 'Project link')}}
                    {{Form::text('project_link', '',['class'=>'form-control','placeholder'=>'Project link'])}}
                </div>
                <div class="form-group">
                    {{Form::label('code_link', 'Code link')}}
                    {{Form::text('code_link','' ,['class'=>'form-control','placeholder'=>'Code link'])}}
                </div>
    
                
    
    
                @csrf
                
               
                
                
                {{Form::submit('Add', ['class'=>'btn btn-success mt-5 text-capitalize ml-auto'])}}
            
    
    
               
    
            
            
            
            </form>
        </div>


        
        
    </div>
    
@endsection