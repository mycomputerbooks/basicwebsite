@extends('courses.tests.layouts.chapterscard')

@section('card')
    <h5>Add Chapter (create.blade.php)</h5>
    <hr />
    <form action="{{ route('chapters.store') }}" method="POST">
        {{ csrf_field() }}

        <label for="title">Title:</label>
        <input type="text" name="title" id="title" class="form-control" />

        <label for="chapter">Chapter:</label>
        <input type="number" name="chapter" id="chapter" class="form-control" min="1" max="5" />

        <label for="description">Description:</label>
        <textarea class="form-control" name="description" id="description" rows="4"></textarea>

        <input type="submit" class="btn btn-primary" value="Submit Information" />
    </form>
@endsection
