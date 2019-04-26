@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="card">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    {{-- <a class="nav-link active" href="questions">Home</a> --}}
                    <a class="nav-link active" href="{{ route('questions.index') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/questions/create">Ask Question</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/users">Profiles</a>

                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('upload') }}">Upload</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/weather">Weather</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/foundations/contact">Contact</a>
                </li>
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
