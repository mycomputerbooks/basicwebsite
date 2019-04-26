<style>
    .navbar-toggler:focus{
        outline:2px solid rgb(147, 64, 29, .5);


    }

    .navbar-toggler {
        border-color: rgb(147, 64, 29, .9) !important;
        border-radius: 0px;
    }
</style>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    {{-- <a class="navbar-brand" href="#">The Little Red Hen</a> --}}
    <a class="navbar-brand" href="#">
        <img src="{{asset('storage/images/logo.png')}}" alt="">
        {{-- <img src="storage/images/logo.png" alt=""> --}}
    </a>
    <img src="{{asset('storage/images/logoWords.png')}}" alt="">
    {{-- <img src="storage/images/logoWords.png" alt=""> --}}
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">

        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
      {{-- <ul class="navbar-nav ml-auto {{Request::is('/') ? 'active' : ''}}"> --}}
        {{-- <li class="nav-item active"> --}}
        <li class="{{Request::is('/') ? 'active' : ''}}">
          <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
        </li>

        {{-- this also works --}}
        {{-- <li class="{{Request::is('/') ? 'active' : ''}}">
        <a class="nav-link" href="{{ route('index') }}">Home <span class="sr-only">(current)</span></a>
        </li> --}}


        <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Courses</a>
            <div class="dropdown-menu">
                <a href="{{ route('questions.index') }}" class="dropdown-item">Foundations</a>
                <a href="/laravelview/todo" class="dropdown-item">LaravelView</a>
                <a href="/eduonix/contact" class="dropdown-item">Eduonix</a>
                <a href="{{ route('chapters.index') }}" class="dropdown-item">Chapter Tests</a>
                {{-- <a href="/dogs" class="dropdown-item">Dog Tests</a> --}}
                <a href="#" class="dropdown-item">Laravel Ajax</a>
            </div>
        </li>



        {{-- <li class="{{Request::is('about') ? 'active' : ''}}">
          <a class="nav-link" href="/about">About</a>
        </li>
        <li class="{{Request::is('contact') ? 'active' : ''}}">
          <a class="nav-link" href="#">Contact</a>
        </li> --}}
        {{-- <li class="{{Request::is('albums/create') ? 'active' : ''}}">
                <a class="nav-link" href="/albums/create">Create</a>
            </li>
        <li class="{{Request::is('pageComments') ? 'active' : ''}}">
            <a class="nav-link" href="/pageComments">Page Comments</a>
        </li>
        <li class="{{Request::is('viewPageComments') ? 'active' : ''}}">
            <a class="nav-link" href="/viewPageComments">View Comments</a>
        </li> --}}

        @if (Auth::guest())

            <a href="{{ route('login') }}" class="btn btn-outline-light txtBlue mr-1">Login</a>
            <a href="{{ route('register') }}" class="btn btn-outline-light txtBlue">Register</a>

        @else
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    {{ Auth::user()->name }} <span class="caret menuName"></span>
                </a>

                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
        @endif
      </ul>
    </div>
  </nav>
