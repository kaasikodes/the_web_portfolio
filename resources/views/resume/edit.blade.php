@extends('layouts.app')
@section('title')
  Replace Resume

    
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
            <h1 class="text-white mb-4">Replace Resume</h1>
            
            <form action="{{route('resume.update',$resume->id)}}" method="POST" enctype="multipart/form-data">
         
               
               

                <div class="form-group">
                    <label for="resume">Replace Resume</label>
                    <input type="file" name="resume" id="" class="form-control"> 
                </div>
            
              
    
    
                @csrf
                {{Form::hidden('_method','PUT')}}
    
               
                
                
                {{Form::submit('Replace Resume', ['class'=>'btn btn-success mt-5 text-capitalize mx-auto'])}}
            
    
    
               
    
            
            
            
            </form>
        </div>


        
        
    </div>
    
@endsection