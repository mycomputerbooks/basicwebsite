@extends('courses.foundations.layouts.card')

@section('card')
    <h5>Recent Questions: (index.blade.php)</h5>
    <hr />
    @foreach ($questions as $question)
    <div class="card my-card-body card-body bg-light">





        <small class="text-muted text-right">
                Chapter {{ $question->chapter }}
        </small>
        <h3>{{ $question->title }}</h3>
        <p>
          {{ $question->description }}
        </p>
        <div class="text-left">
            <a href="{{ route('questions.show', $question->id) }}" class="btn btn-primary btn-sm">View/Submit Answers</a>
        </div>
    </div>
    @endforeach
    {{ $questions->links() }}
@endsection
