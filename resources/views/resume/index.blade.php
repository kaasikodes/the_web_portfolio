@extends('layouts.app')
@section('title')
  My Resume

    
@endsection

@section('content')
    <div class="container bg-primary py-4 pb-5  px-md-5 px-2">
        {{-- messages --}}
        @include('inc.messages')
        {{-- heading --}}
        <div class="projects-header mb-5">
          <h2 class="text-white section-title mb-4">Resume</h2>
          <a href="{{route('resume.edit',$resume->id)}}" class="btn btn-success">Edit</a>
          
        </div>
        
        <div class="py-4 border-white border-top border-bottom d-flex justify-content-center">
          
            <a href="{{route('resume.download',$resume->id)}}" class="btn btn-secondary">Download Resume</a>
          

     
          
        </div>
        
    </div>
    
@endsection