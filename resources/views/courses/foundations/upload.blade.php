@extends('courses.foundations.layouts.card')

@section('card')
    <div class="row">

      <div class="col-md-6 col-md-offset-3">
        <h1>Upload a Profile Picture</h1>
        <hr />

        <form action="{{ route('upload') }}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}

          <input type="file" name="picture" style="margin: 20px 0;" />
          <input type="submit" class="btn btn-primary" value="Upload" />
        </form>
      </div>
      <a href="{{route('futureUploads')}}"><button type="button" class="btn btn-danger" id="bt1">Future Uploads</button></a>
    </div>
@endsection
