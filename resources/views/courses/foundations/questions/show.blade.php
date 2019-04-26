@extends('courses.foundations.layouts.card')

@section('card')

    <h5 class="text-primary">Question: (show.blade.php)</h5>
    <div class="card border-primary mb-3">
        <div class="card-body">
            <h4 class="text-primary">{{ $question->chapter }}</h4>
            <h4 class="text-primary">{{ $question->title }}</h4>
            <hr class="border-primary"/>
            <p class="card-text text-primary"> {{ $question->description }}</p>

            @if ($question->updated_at > $question->created_at)
                <p>
                    Updated By: {{ $question->user->name }}, {{ $question->updated_at->diffForHumans() }}
                </p>
            @else
                <p>
                    Submitted By: {{ $question->user->name }}, {{ $question->created_at->diffForHumans() }}
                </p>
            @endif
            {{-- <p>
                Submitted By: {{ $question->user->name }}, {{ $question->created_at->diffForHumans() }}
            </p> --}}
            @if (Auth::id() == $question->user_id)
            {{-- @if(auth()->user()->id == $question->user_id) --}}
                {{-- <button class="btn btn-info" data-toggle="modal" data-target="#edit">Edit</button> --}}
                <button class="btn btn-info" data-mytitle="{{$question->title}}" data-mychapter={{$question->chapter}} data-mydescription="{{$question->description}}" data-toggle="modal" data-target="#editQuestion">Edit</button>

                {{-- {!! Form::model($question,['route'=>['questions.destroy','id'=>$question->id],'method'=>'DELETE',]) !!}
                    <button class="btn btn-danger">delete</button>
                </form> --}}
            @endif
            {{-- <button class="btn btn-danger" onclick="del({{$question->id}})">delete</button> --}}
            {{-- <a href="http://google.com" class="btn btn-danger">delete</a> --}}
        </div>
    </div>



    <!-- display all of the answers for this question -->
    <h4>Answers:</h4>
    @if ($question->answers->count() > 0)
      @foreach ($question->answers as $answer)
        <div class="card mb-2">
          <div class="card-body">
            {{-- <p> --}}
              {{ $answer->content }}
            {{-- </p> --}}
            {{-- <h6>Answered By {{ $answer->user->name }}, {{ $answer->created_at->diffForHumans() }}</h6> --}}

            @if ($answer->updated_at > $answer->created_at)
                <p>
                    Updated By: {{ $answer->user->name }}, {{ $answer->updated_at->diffForHumans() }}
                </p>
            @else
                <p>
                    Submitted By: {{ $answer->user->name }}, {{ $answer->created_at->diffForHumans() }}
                </p>
            @endif



            {{-- @if(auth()->user()->id == $answer->user_id) --}}
            @if (Auth::id() == $answer->user_id)
                <button class="btn btn-info" data-mycontent="{{$answer->content}}" data-toggle="modal" data-target="#editAnswer">Edit</button>
            @endif

            <form method="POST" action="{{ route('answers.destroy', [$answer->id]) }}">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <input type="hidden" value="{{ $question->id }}" name="question_id" />
                <button type="submit">Delete</button>
            </form>

          </div>
        </div>
      @endforeach
    @else

        <div class="card border-danger mb-3">
            <div class="card-body">
                <h4 class="card-title">No Answer Yet!</h4>
                <p class="card-text">There are no answers for this question. Please consider submitting one below.</p>
            </div>
        </div>
    @endif

    <!-- display the form, to submit a new answer -->
    <form action="{{ route('answers.store') }}" method="POST">
        {{ csrf_field() }}

        <h4>Submit Your Own Answer:</h4>
        <textarea class="form-control" name="content" rows="4"></textarea>
        <input type="hidden" value="{{ $question->id }}" name="question_id" />
        <button class="btn btn-primary">Submit Answer</button>
    </form>

    <!-- Create Edit Question Modal -->
    <div class="modal fade" id="editQuestion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Question</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    {{-- <form action="{{ route('questions.update', $question->id ) }}" method="PUT"> --}}
                    {!! Form::model($question,['route'=>['questions.update','id'=>$question->id],'method'=>'PATCH',]) !!}
                        {{ csrf_field() }}

                        <label for="title">Question:</label>
                        <input type="text" name="title" id="title" class="form-control" />
                        <label for="chapter">Chapter:</label>
                        <input type="text" name="chapter" id="chapter" class="form-control" />
                        <label for="description">More Information:</label>
                        <textarea class="form-control" name="description" id="description" rows="4"></textarea>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary" value="Save changes" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Edit Answer Modal -->
    <div class="modal fade" id="editAnswer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Answer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{--   --}}
                </div>
            </div>
        </div>
    </div>

@endsection
<script>
    function del(id){
        alert(id);
    }
</script>
