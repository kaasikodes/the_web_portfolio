<header>
    <div class="container">
        {{-- dev intr --}}
        <div class="dev-introduction row justify-content-center justify-content-md-between">
            <div class="logo col-12 col-md-6 d-flex flex-column align-items-center align-items-md-start">
                <a href="/">
                    <span>CC</span>
                </a>
            </div>
    
            <div class="user-persona col-12 col-md-6 d-flex flex-column align-items-center align-items-md-end">
                <h6>Isaac Odeh</h6>
                <div class="relative-box">

                    <small id="dev_options_btn">Aspiring Full Stack dev</small>
                    @auth
                        <div class="dev-options flex-column bg-light px-3 py-2">
                            <a href="/" class="dev-option">Main Site</a>
                            <a href="{{route('messages.index')}}" class="dev-option">Messages </a>
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
            <ul class="col-12 d-flex justify-content-center justify-content-md-start">
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