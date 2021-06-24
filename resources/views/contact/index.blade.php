@extends('layouts.app')
@section('title')
  Contact Page - Enter Details

    
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
            <a href="{{route('contact.edit',$contact->id)}}" class="btn btn-success mb-5">Edit</a>
        
            <h1 class="text-white mb-4">Contact Details</h1>

             {{-- Get in Touch --}}
             <div class="approach my-5 aspect w-100">
                <h5 class="mb-2 text-uppercase">Get in Touch</h5>
                <div class="ml-4">
                    <div class="item d-flex flex-column pb-4">
                        <small class="text-warning mb-2">Phone</small>
                        <a href="tel:+234{{$contact->phone}}" class="text-white">0{{$contact->phone}}</a>
                    </div>
                  
                    
                    <div class="item d-flex flex-column pb-4">
                        <small class="text-warning mb-2">Email</small>
                        
                        <a href="mailto:{{$contact->email}}" class="text-white">{{$contact->email}}</a>
                    </div>
                  
                    
                    <div class="item d-flex flex-column pb-4">
                        <small class="text-warning mb-2">Physical Address</small>
                        <p class="text-white">{{$contact->physical_address}}</p>
                    </div>
                  
                    
                    <div class="item d-flex flex-column pb-4">
                        <small class="text-warning mb-2">Phone</small>
                        <a href="{{$contact->whatsapp_link}}" class="text-white">{{$contact->whatsapp_text}}</a>
                    </div>
                  
                    
                        
                    
                </div>
              </div>
             {{-- Socials --}}
             <div class="approach my-5 aspect w-100">
                <h5 class="mb-2 text-uppercase">Socials</h5>
                <div class="ml-4">
                    <div class="item d-flex flex-column pb-4">
                        <small class="text-warning mb-2">Linkedin</small>
                        <a href="{{$contact->linkedin_url}}" class="text-white">{{$contact->linkedin_text}}</a>
                    </div>
                  
                    
                    <div class="item d-flex flex-column pb-4">
                        <small class="text-warning mb-2">Twitter</small>
                        
                        <a href="{{$contact->twitter_url}}" class="text-white">{{$contact->twitter_text}}</a>
                    </div>
                  
                    
                    <div class="item d-flex flex-column pb-4">
                        <small class="text-warning mb-2">Github</small>
                        <a href="{{$contact->github_url}}" class="text-white">{{$contact->github_text}}</a>
                    </div>
                  
                    
                    <div class="item d-flex flex-column pb-4">
                        <small class="text-warning mb-2">Phone</small>
                        <a href="{{$contact->instagram_url}}" class="text-white">{{$contact->instagram_text}}</a>
                    </div>
                  
                    
                        
                    
                </div>
              </div>

            
           
        </div>


        
        
    </div>
    
@endsection