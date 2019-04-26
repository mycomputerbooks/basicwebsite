@extends('courses.tests.layouts.chapterscard')
@section('card')

    <h5>Single Chapter: (show.blade.php)</h5>
    <div class="card border-primary mb-3">
        <div class="card-body">
            <h4>{{ $chapter->title }}</h4>
            <hr class="border-primary"/>
            <h4>{{ $chapter->chapter }}</h4>
            <hr class="border-primary"/>
            <p> {{ $chapter->description }}</p>

            <p>
                Submitted By: {{ $chapter->user->name }}, {{ $chapter->created_at->diffForHumans() }}
            </p>

        </div>
    </div>

    <a href="{{ url()->previous() }}" class="btn btn-primary btn-sm">Back</a>

    <hr/>
    @if ($chapter->chapterComments->count() > 0)
        @foreach ($chapter->chapterComments as $comment)
            <div class="card mb-2">
            <div class="card-body">
                {{-- <p> --}}
                {{ $comment->content }}
                {{-- </p> --}}
                <h6>Commented By {{ $comment->user->name }}, {{ $comment->created_at->diffForHumans() }}</h6>
            </div>
            </div>
        @endforeach
    @else
        <div class="card border-danger mb-3">
            <div class="card-body">
                <h4 class="card-title">No Comment Yet!</h4>
                <p class="card-text">There are no comments for this chapter. Please consider submitting one below.</p>
            </div>
        </div>
    @endif

    <hr />
    <form action="{{ route('chapterComments.store') }}" method="POST">
        {{ csrf_field() }}

        <h4>Submit Your Own Comment:</h4>
        <textarea class="form-control" name="content" rows="4"></textarea>
        <input type="hidden" value="{{ $chapter->id }}" name="chapter_id" />
        <button class="btn btn-primary">Submit Comment</button>
    </form>




    {{-- @if ($chapter->chapter_comments->count() > 0)
      @foreach ($chapter->chaptercomments as $comment)
        <div class="card mb-2">
          <div class="card-body">
          </div>
        </div>
      @endforeach
    @else

        <div class="card border-danger mb-3">
            <div class="card-body">
                <h4 class="card-title">No Comment Yet!</h4>
                <p class="card-text">There are no comments for this chapter. Please consider submitting one below.</p>
            </div>
        </div>
    @endif --}}



    <hr />
    <!-- display the form, to submit a new comment -->
    {{-- <form action="{{ route('dogComments.store') }}" method="POST">
        {{ csrf_field() }}

        <h4>Submit Your Own Comment About This Dog:</h4>
        <textarea class="form-control" name="content" rows="4"></textarea>
        <input type="hidden" value="{{ $dog->id }}" name="dog_id" />
        <button class="btn btn-primary">Submit Comment</button>
    </form> --}}

@endsection
