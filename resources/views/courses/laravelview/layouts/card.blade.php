@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="card">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="/laravelview/todo">Tasks</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/laravelview/questions">Questions</a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link active" href="/foundations/contact">Contact</a>
                </li> --}}
            </ul>
        </div>
        <div class="card-body">
                {{-- <p><a href="questions/create" class="btn btn-primary btn-lg" role="button">Ask Now</a>
                </p> --}}
            @yield('card')
        </div>
    </div>
  </div>
@endsection
