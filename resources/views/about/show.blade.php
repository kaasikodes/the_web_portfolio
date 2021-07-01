@extends('layouts.app')
@section('title')
  About

    
@endsection

@section('content')
    <div class="container bg-primary py-4  px-5">
        <a href="{{route('about.edit')}}" class="btn btn-success mb-5 text-capitalize">edit</a>
        @include('inc.messages')
        <div class="main-info row justify-content-between pb-4">
            {{-- content --}}
            <div class="mb-3 content col-lg-8 order-1 order-lg-0 text-white">
                <div class="pb-3 d-flex">
                    <h6 class="title mr-2">Name - </h6>
                    <h6 class="value">{{$about->name}}</h6>
                </div>
                <div class="pb-3 d-flex">
                    <h6 class="title mr-2">Role - </h6>
                    <h6 class="value">{{$about->role}}</h6>
                </div>
                <div class="pb-3">
                    <h6 class="title">Bio - </h6>
                    <h6 class="value">{{$about->bio}}</h6>
                </div>
               
            </div>

            {{-- picture --}}
            <div class="mb-3 picture col-lg-4 order-0 order-lg-1 d-flex justify-content-lg-end align-items-center  justify-content-center pb-5 pb-lg-0">

                <div class="avatar card">
                    <div class="img-container mx-auto" style="background-image: url('{{asset('storage/'.$about->profile_img)}}')">
                        
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

            {{-- hero-copy --}}
            <div class="mt-5 mb-1 col-12 order-2 text-white">
                <div class="py-5 border-bottom border-top border-light">
                    <h6 class="title">Hero Copy - </h6>
                    <h6 class="value">{{$about->hero_copy}}</h6>
                </div>
            </div>




            {{-- skills & languages --}}
            <div class="mt-5 mb-3 col-12 order-2 text-white">
                <div class="py-5 skills">
                    <h6 class="title text-uppercase mb-4">Skills & Languages </h6>
                    <div class="row px-4">
                        @foreach ($about->skills as $skill)
                            <div class="col-md-4 col-12 mb-3">
                                <p class="value">- {{$skill}}</p>
                            </div>
                            
                        @endforeach
                       
                        
                    </div>
                </div>
            </div>

        
        </div>
        
    </div>
    
@endsection