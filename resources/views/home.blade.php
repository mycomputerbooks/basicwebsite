@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="text-center">
            <img src="storage/images/donteatthat-worm.jpg" class="img-fluid mb-3" alt="Responsive image">
        </div>

    <div class="card-columns d-flex justify-content-center">
        <div class="card mr-3">
            <div class="card-body">
                <h4 class="card-title">Card title that wraps to a new line</h4>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content
                    is a little bit longer.</p>
                <a class="btn btn-outline-primary" href="https://mycomputerbooks.com/">explore our site</a>
            </div>
        </div>
        <div class="card ml-3">
            {{-- <img class="card-img-top img-fluid" src="https://source.unsplash.com/random/301x200" alt=""> --}}
            <div class="card-body">
                <h4 class="card-title">Card title</h4>
                <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                <p class="card-text">
                    <small class="text-muted">Last updated 3 mins ago</small>
                </p>
                <a class="btn btn-outline-primary" href="/viewPageComments">venture into the book</a>
            </div>
        </div>
    </div>
    </div>


{{-- </div> --}}
@endsection
<style>
    .jumbotron {
    background-image: url(storage/images/donteatthat-worm.jpg);
    background-size: cover;
    height: 100%;}
</style>


{{-- @section('sidebar')
    @parent
    <p>This is appended to the sidebar</p>
@endsection --}}
