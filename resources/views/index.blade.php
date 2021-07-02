@extends('layouts.main')
@section('content')
{{-- hero copy --}}
    <div class="hero-copy py-101">
        <div class="container py-5">
            <p class="text-center text-md-left text-primary">{{$about->hero_copy}}</p>

        </div>
        
    </div>


{{-- my work --}}
    <div class="my-work py-100" id="projects">
        <div class="container py-5 px-md-5">
            
            {{-- heading addded a mt5 to give proper spacing n pt3--}}
            <div class="projects-header mb-5 d-flex flex-column align-items-center mt-5 pt-3">
              <h2 class="text-white text-center section-title mb-4">My Work</h2>
              <div class="project-navigation d-flex justify-content-center py-2 w-75">
    
                <a href="/projects/all" class="project-nav-link px-4">All</a>
                
                <a href="/projects/frontend" class="project-nav-link px-4">Front End</a>
                
                <a href="/projects/backend" class="project-nav-link px-4">Back End</a>
                
                <a href="/projects/fullstack" class="project-nav-link px-4">Full Stack</a>
                
               
              </div>
            </div>
          
    
            {{-- my projects addded a mb to give proper spacing n pb3--}}
            <div class="row py-4" id="projects-container">
              @foreach ($projects as $project)
                  <div class="col-md-4 col-lg-3 d-flex justify-content-center mb-5">
                    <div class="project card d-flex flex-column align-items-center py-2 px-2">
                      <div class="project-img-container" style="background-image: url('{{asset('my_hack/'.$project->mini_img_text)}}')">
    
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
    </div>

{{-- about me --}}
    <div class="about-me py-105 d-flex align-items-center justify-content-center" id="about">
      <div class="container">
       

        <div class="main-info row justify-content-between">
          {{-- content --}}
          <div class="mb-3 mb-md-0 content col-lg-8 order-1 order-lg-0 text-white text-center text-md-left"> 
            <h2 class="text-white  section-title mb-4">About Me</h2>
            
            <div class="pb-3 ">
                
                <p class="value">{{$about->bio}}</p>
            </div>

            <a href="#contact" class="btn btn-primary">Contact Me</a>
           
        </div>

        {{-- picture --}}
        <div class="picture col-lg-4 order-0 order-lg-1 d-flex justify-content-lg-end align-items-center  justify-content-center pb-5 pb-md-0">

            <div class="avatar card">
                <div class="img-container mx-auto" style="background-image: url({{asset('my_hack/isaac.jpg  ')}})">
                    
                </div>
                <div class="card-body">
                    <div class="mb-1 d-flex justify-content-center">

                        <h6 class="title mr-2 text-primary">Location - </h6>
                        <h6 class="value">{{$about->location}}</h6>

                    </div>
                    <div class="d-flex justify-content-center">

                        <h6 class="title mr-2 text-primary">Languages - </h6>
                        <h6 class="value">
                           {{$about->languages_spoken}}
                        </h6>

                    </div>
                </div>
            </div>

        </div>
        </div>
      </div>
    </div>

  {{-- skills & laguages --}}
  <div class="skills_n_languages py-105 bg-white">
    <div class="container">
      <h2 class="text-primary section-title mb-4">Skills & Languages</h2>
      <div class="row px-4 pt-4">
        @foreach ($about->skills as $skill)
            <div class="col-md-4 col-12 mb-3">
                <p class="skill text-primary text-capitalize"> {{$skill}}</p>
            </div>
            
        @endforeach
       
        
    </div>

    </div>

  </div>

{{-- contact me --}}
<div class="contact-me py-105 bg-primary" id="contact">  
  <div class="container">
    
    <h2 class="text-white section-title mb-5 pb-2">Contact Me</h2>
    <div class="thanks"></div>
    <div class="row mt-4">
      <div class="col-md-8 col-12">
        <form action="/api/messages/create" method="post" id="message-form">
          <div class="form-group">
            <input type="text" name="name" id="name" class="form-control" placeholder="Name">

          </div>

          <div class="form-group">
            <input type="email" name="email" id="email"class="form-control" placeholder="Email">

          </div>

          <div class="form-group">
            <textarea name="message" id="message" cols="30" rows="5" class="form-control" placeholder="Message"></textarea>
          </div>

          <button class="btn btn-success">Hit me up</button>
         
          
        </form>
      </div>


      <div class="col-md-4 col-12 d-flex flex-column justify-content-between pl-md-5 mt-5 mt-md-0" >
         
        <div class="approach mb-5 aspect border-black border-left pl-md-4">
          <h5 class="mb-2 text-uppercase text-bold">Get in Touch</h5>
          <ul class="ml-4 text-white" >
             <li>
               <a href="tel:+234{{$contact->phone}}" class="text-white text-capitalize">0{{$contact->phone}}</a>
             </li>
             <li>
               <a href="mailto:{{$contact->email}}" class="text-white">{{$contact->email}}</a>
             </li>
             <li>
               <a href="{{$contact->whatsapp_link}}" class="text-white text-capitalize">{{$contact->whatsapp_text}}</a>
             </li>
             <li>
               <p  class="text-white text-capitalize">{{$contact->physical_address}}</p>
             </li>
              
              
          </ul>
        </div>


        <div class="approach mb-5 aspect border-black border-left pl-md-4">
          <h5 class="mb-2 text-uppercase text-bold">Socials</h5>
          <ul class="ml-4 text-white" >
             <li>
               <a href="tel:+234{{$contact->github_link}}" class="text-white text-capitalize">{{$contact->github_text}}</a>
             </li>
             <li>
               <a href="mailto:{{$contact->linkedin_link}}" class="text-white text-capitalize">{{$contact->linkedin_text}}</a>
             </li>
             <li>
               <a href="{{$contact->twitter_link}}" class="text-white text-capitalize">{{$contact->linkedin_text}}</a>
             </li>
             <li>
               <a href="{{$contact->instagram_link}}" class="text-white text-capitalize">{{$contact->instagram_text}}</a>
             </li>
             
              
              
          </ul>
        </div>





      </div>

    </div>

  </div>
</div>

{{-- footer  --}}
<footer class="footer bg-dark">
  <div class="container py-3 text-center">
    <small class="text-white">Designed & Developed by Isaac Odeh</small>
  </div>
</footer>
    
@endsection