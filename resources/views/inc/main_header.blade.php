<div class="main-site-header d-flex align-items-stretch">
    <div class="container d-flex flex-column">
        {{-- relevant links --}}
        <div class="relevant-links d-flex justify-content-end py-4">
            <a href="{{$contact->github_link}}" class="relevant-link text-capitalize pl-5">{{$contact->github_text}}</a>
            <a href="{{$contact->linkedin_link}}" class="relevant-link text-capitalize pl-5">{{$contact->linkedin_text}}</a>
            <a href="{{$contact->twitter_link}}" class="relevant-link text-capitalize pl-5">{{$contact->twitter_text}}</a>
        </div>
        {{-- main branding elements --}}
        <header class="flex-grow-1 d-flex align-items-center">
            <div class="container branding-elements-container">
                {{-- dev intr --}}
                <div class="dev-introduction d-flex flex-md-row justify-content-center flex-column text-center text-md-left">
                    <div class="logo pr-2">
                        <a href="/">
                            <span>CC</span>
                        </a>
                    </div>
            
                    <div class="user-persona pl-2">
                        <h6>Isaac Odeh</h6>
                        <div class="relative-box">
        
                            <small id="dev_options_btn">Aspiring Full Stack dev</small>
                            @auth
                                <div class="dev-options flex-column bg-light px-3 py-2">
                                    <a href="/about" class="dev-option">Developer Version</a>
                                    <a class="dev-option" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
        
                                </div>
                                
                            @endauth
                            
        
                        </div>
                        
        
                    </div>
                </div>
        
                {{-- nav for everyone --}}
                <nav class="row py-4 py-md-0">
                    <ul class="col-12 d-flex justify-content-center">
                        <li>
                            <a href="{{route('about.show')}}">About</a>
                        </li>
                        <li>
                            <a href="{{route('projects.index')}}">Projects</a>
                        </li>
                        <li>
                            <a href="{{route('contact.index')}}">Contact</a>
                        </li>
                        <li>
                            {{-- make it sso depending on wether u or any other viewer it downloads or shows the index page --}}
                            @guest
                                <a href="{{route('resume.download',1)}}">Resume</a> 
                            @else
                                <a href="{{route('resume.index')}}">Resume</a> 
                                
                            @endguest
                           
                        </li>
                    </ul>
                </nav>
                
            </div>
        </header>
    </div>
</div>