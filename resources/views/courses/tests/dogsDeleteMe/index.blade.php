@extends('courses.tests.layouts.dogscard')

@section('card')
    <h5>Dog List: (index.blade.php)</h5>
    <hr />
    @foreach ($dogs as $dog)
    <div class="card my-card-body card-body bg-light">

        <h3>{{ $dog->title }}</h3>
        <h3>{{ $dog->dog_name }}</h3>
        <h3>{{ $dog->breed }}</h3>
        <p>
          {{ $dog->description }}
        </p>
        <div class="text-left">
            <a href="{{ route('dogs.show', $dog->id) }}" class="btn btn-primary btn-sm">View Details</a>
        </div>
    </div>
    @endforeach
    {{ $dogs->links() }}
@endsection

