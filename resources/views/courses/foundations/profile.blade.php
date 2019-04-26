@extends('courses.foundations.layouts.card')

@section('card')
{{-- <img class="img-rounded pull-right" src="{{ asset('storage/'.$user->profile_pic) }}" style="max-height:100px;" />
<h1>{{ $user->name }}'s Profile</h1> --}}

<div class="row">
    <div class="col-10">
        <h1>{{ $user->name }}'s Profile</h1>
    </div>
    <div class="col-2">
        {{-- <img class="img-rounded" src="{{ asset('storage/'.$user->profile_pic) }}" style="max-height:100px;" /> --}}
        {{-- <img class="img-rounded" src="{{ $user->profile_pic }}" style="max-height:100px;" /> --}}
        <img class="img-rounded" src="{{ $user->thumbnail }}" style="max-height:100px;" />
    </div>
</div>


<p>
    See what {{ $user->name }} has been up to on LaravelAnswers.
</p>
<hr />
<div class="row">
    <div class="col-md-6">
        <h3>Questions</h3>
        @foreach ($user->questions as $question)
            <div class="card my-card-body card-body bg-light">
                <h4>{{ $question->title }}</h4>
                <hr />
                <p>
                    {{ $question->description }}
                </p>
                <div class="text-left">
                    {{-- <a href="{{ route('questions.show', $question->id) }}" class="btn btn-link">View Question</a> --}}
                    <a href="{{ route('questions.show', $question->id) }}" class="btn btn-primary btn-sm">View Question</a>
                </div>
            </div>
            <br>
        @endforeach
    </div>
    <div class="col-md-6">
        <h3>Answers</h3>
        @foreach ($user->answers as $answer)
            <div class="card my-card-body card-body bg-light">
                {{ $answer->question->title }}
                <hr />
                <p>
                    {{ $answer->question->description }}
                </p>

                <p>
                    <small>{{ $user->name }}'s answer:</small><br />
                    {{ $answer->content }}
                </p>
                <a href="{{ route('questions.show', $answer->question->id) }}" class="btn btn-primary btn-sm">View Question</a>


            </div>
            <br>
        @endforeach
    </div>

</div>
@endsection
