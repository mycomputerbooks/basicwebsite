<?php

namespace App\Http\Controllers\courses\foundations;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\courseModels\foundations\Answer;
use App\courseModels\foundations\Question;
use Auth;
use App\Notifications\NewAnswerSubmitted;

class AnswersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index','show']]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => "required|min:15",
            'question_id' => 'required|integer'
        ]);

        $answer = new Answer();
        $answer->content = $request->content;
        $answer->user()->associate(Auth::id());

        $question = Question::findOrFail($request->question_id);
        $question->answers()->save($answer);
        $question->user->notify(new NewAnswerSubmitted($answer, $question, Auth::user()->name));
        return redirect()->route('questions.show', $question->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // echo "hello hooty";
        $this->validate($request, [
            'content' => "required|min:15",
            'question_id' => 'required|integer'
        ]);
        $answer = Answer::findOrFail($id);
        $answer->content = $request->content;
        $question = Question::findOrFail($request->question_id);
        $answer->save();
        return redirect()->route('questions.show', $question->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    public function destroy(Request $request, $id)
    {
        // echo "<h2>PHP is Fun!</h2>";
        $question = Question::findOrFail($request->question_id);
        $answer = Answer::findOrFail($id);
        $answer->delete();
        return redirect()->route('questions.show', $question->id);
    }
}
