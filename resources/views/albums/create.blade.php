{{-- @extends('layouts.app')

@section('content')
  <h1>Create</h1>
@endsection --}}
@extends('layouts.app')

@section('content')
{{-- <div> --}}
  <h3>Create Album</h3>
  {!!Form::open(['action' => 'AlbumsController@store','method' => 'POST', 'enctype' => 'multipart/form-data'])!!}
    {{Form::text('name','',['placeholder' => 'Album Name'])}}
    {{Form::textarea('description','',['placeholder' => 'Album Description'])}}
    {{Form::file('cover_image')}}
    {{Form::submit('submit')}}
  {!! Form::close() !!}
{{-- </div> --}}
@endsection
