@extends('layouts.app')
@section('title')
  Your Messages

    
@endsection

@section('content')
    <div class="container bg-primary py-4">
        <!-- Extra Navigation--> 
        <div class="mb-5">
           
            <a href="{{url()->previous()}}" class="float-right text-white">Go back</a>
            
        </div>

       
        

        {{-- Content --}}

        <div class="container py-4 px-5">
           
        
            <h1 class="text-white mb-4 text-center">Messages<span class="badge badge-success">{{$messages->count()}}</span></h1>
             {{-- Error, Success ,.. messages --}}
                @include('inc.messages')
            <div class="row py-5">
                @if ($messages->count() <= 0)
                
                    <p class="text-center flex-grow-1 text-light">There are no messages</p>

                @else
                    @foreach ($messages as $message)
                        <div class="col-12">
                            <div class="card mb-4">
                                
                                <div class="card-body">
                                <h5 class="card-title">{{$message->name}}</h5>
                                
                                <p class="card-text">{{$message->message}}</p>
                                <small>{{$message->created_at->diffForHumans()}}</small>

                                <div class="d-flex flex-wrap justify-content-between mt-4">
                                    <a href="mailto:{{$message->email}}" class="btn btn-primary">{{$message->email}}</a>
                                    <form action="{{route('messages.destroy',$message)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                                
                                
                                </div>
                            </div>
                        </div>
                        
                    @endforeach

                    
                @endif
                
            </div>

           
            
           
        </div>


        
        
    </div>
    
@endsection