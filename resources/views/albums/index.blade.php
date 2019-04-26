@extends('layouts.app')

@section('content')
  <h1>Albums Index</h1>
@endsection
@extends('layouts.app')

@section('content')
    <h3>Albums</h3>
    @foreach ($albums as $album)
        {{$album->name}}
    @endforeach
@endsection
