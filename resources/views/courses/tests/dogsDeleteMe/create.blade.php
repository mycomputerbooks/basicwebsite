@extends('courses.tests.layouts.dogscard')

@section('card')
    <h5>Add Dog (create.blade.php)</h5>
    <hr />
    <form action="{{ route('dogs.store') }}" method="POST">
        {{ csrf_field() }}

        <label for="title">Title:</label>
        <input type="text" name="title" id="title" class="form-control" />

        <label for="name">Dog's Name:</label>
        <input type="text" name="name" id="name" class="form-control" />

        <label for="breed">Breed:</label>
        <input type="text" name="breed" id="breed" class="form-control" />
        <label for="description">Description:</label>
        <textarea class="form-control" name="description" id="description" rows="4"></textarea>

        <input type="submit" class="btn btn-primary" value="Submit Information" />
    </form>
@endsection
