@extends('courses.tests.layouts.chapterscard')

@section('card')
    <h5>Chapter List: (index.blade.php)</h5>
    <hr />
    @foreach ($chapters as $chapter)
    <div class="card my-card-body card-body bg-light">

        <h3>{{ $chapter->title }}</h3>
        <h3>{{ $chapter->chapter }}</h3>
        <p>
          {{ $chapter->description }}
        </p>
        <div class="text-left">
            <a href="{{ route('chapters.show', $chapter->id) }}" class="btn btn-primary btn-sm">View Details</a>
        </div>
    </div>
    @endforeach
    {{ $chapters->links() }}
@endsection

