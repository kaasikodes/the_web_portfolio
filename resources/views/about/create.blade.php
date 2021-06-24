@extends('layouts.app')
@section('title')
  Create About

    
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
            <h1 class="text-white mb-4">Create About Page</h1>
            
            <form action="{{route('about.store')}}" method="POST" enctype="multipart/form-data">
                {{Form::submit('Create', ['class'=>'btn btn-success mb-5 text-capitalize ml-auto'])}}
                <div class="form-group">
                    {{Form::label('name', 'Name')}}
                    {{Form::text('name', '',['class'=>'form-control','placeholder'=>'Name'])}}
                </div>
                <div class="form-group">
                    {{Form::label('role', 'Role')}}
                    {{Form::text('role', '',['class'=>'form-control','placeholder'=>'Role'])}}
                </div>
            
                <div class="form-group">
                    {{Form::label('bio', 'Bio')}}
                    {{Form::textarea('bio','' ,['class'=>'form-control','placeholder'=>'Bio'])}}
                </div>
               
                <div class="form-group py-5 border-bottom border-top border-white">
                    {{Form::label('hero_copy', 'Hero Copy')}}
                    {{Form::textarea('hero_copy','' ,['class'=>'form-control','placeholder'=>'Hero Copy'])}}
                </div>
                <div class="form-group py-5 border-bottom border-white">
                    {{Form::label('skills', 'Skills')}}
                    {{Form::textarea('skills','' ,['class'=>'form-control','placeholder'=>'* Use commas to seperate skills'])}}
                </div>

                <div class="form-group">
                    <label for="profile_image">Choose Profile Image</label>
                    <input type="file" name="profile_image" id="" class="form-control"> 
                </div>
            
                <div class="form-group">
                    {{Form::label('location', 'Location')}}
                    {{Form::text('location', '',['class'=>'form-control','placeholder'=>'Location'])}}
                </div>
                <div class="form-group">
                    {{Form::label('languages_spoken', 'Languages Spoken')}}
                    {{Form::text('languages_spoken','' ,['class'=>'form-control','placeholder'=>'Languages spoken'])}}
                </div>
    
                
    
    
                @csrf
                
               
                
                
                {{Form::submit('Create', ['class'=>'btn btn-success mt-5 text-capitalize ml-auto'])}}
            
    
    
               
    
            
            
            
            </form>
        </div>


        
        
    </div>
    
@endsection