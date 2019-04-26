@extends('courses.tests.layouts.dogscard')

@section('card')

    <h5>single dog: (show.blade.php)</h5>
    <div class="card border-primary mb-3">
        <div class="card-body">
            <h4>{{ $dog->title }}</h4>
            <hr class="border-primary"/>
            <h4>{{ $dog->dog_name }}</h4>
            <hr class="border-primary"/>
            <h4>{{ $dog->breed }}</h4>
            <hr class="border-primary"/>
            <p> {{ $dog->description }}</p>
        </div>
    </div>
    {{-- <a href="{{ route('dogs.index') }}" class="btn btn-primary btn-sm">Return</a> --}}
    <a href="{{ url()->previous() }}" class="btn btn-primary btn-sm">Back</a>

    <hr />
    <h4>Dog Comments:</h4>
    @if ($dog->dogComments->count() > 0)
        @foreach ($dog->dogComments as $comment)
            <div class="card mb-2">
            <div class="card-body">
                {{-- <p> --}}
                {{ $comment->content }}
                {{-- </p> --}}
                {{-- <h6>Answered By {{ $answer->user->name }}, {{ $answer->created_at->diffForHumans() }}</h6> --}}
            </div>
            </div>
        @endforeach
    @else
        <div class="card border-danger mb-3">
            <div class="card-body">
                <h4 class="card-title">No Comment Yet!</h4>
                <p class="card-text">There are no comments for this dog. Please consider submitting one below.</p>
            </div>
        </div>
    @endif



    <hr />
    <!-- display the form, to submit a new comment -->
    <form action="{{ route('dogComments.store') }}" method="POST">
        {{ csrf_field() }}

        <h4>Submit Your Own Comment About This Dog:</h4>
        <textarea class="form-control" name="content" rows="4"></textarea>
        <input type="hidden" value="{{ $dog->id }}" name="dog_id" />
        <button class="btn btn-primary">Submit Comment</button>
    </form>

@endsection
