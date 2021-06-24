@extends('layouts.app')
@section('title')
  Add Resume

    
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
            <h1 class="text-white mb-4">Add Resume</h1>
            
            <form action="{{route('resume.store')}}" method="POST" enctype="multipart/form-data">
         
               
               

                <div class="form-group">
                    <label for="resume">Upload Resume</label>
                    <input type="file" name="resume" id="" class="form-control"> 
                </div>
            
              
    
    
                @csrf
                
               
                
                
                {{Form::submit('Add Resume', ['class'=>'btn btn-success mt-5 text-capitalize mx-auto'])}}
            
    
    
               
    
            
            
            
            </form>
        </div>


        
        
    </div>
    
@endsection