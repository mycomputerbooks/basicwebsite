@extends('courses.foundations.layouts.card')

@section('card')
    <h5>Ask a Question (create.blade.php)</h5>
    <hr />
    <form action="{{ route('questions.store') }}" method="POST">
        {{ csrf_field() }}

        <label for="title">Question:</label>
        <input type="text" name="title" id="title" class="form-control" />
        <label for="chapter">Chapter:</label>
        <input type="text" name="chapter" id="chapter" class="form-control" />
        <label for="description">More Information:</label>
        <textarea class="form-control" name="description" id="description" rows="4"></textarea>

        <input type="submit" class="btn btn-primary" value="Submit Question" />
    </form>
@endsection
