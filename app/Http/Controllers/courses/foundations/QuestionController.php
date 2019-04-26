<?php

namespace App\Http\Controllers\courses\foundations;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\courseModels\foundations\Question;
// use App\User;
use Auth;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return "This is a test";

        // go to the model and get a group of records
        // $questions = Question::All();
        // $questions = Question::paginate(10);

        // $questions = Question::orderBy('chapter', 'id', 'asc')->paginate(5);
        $questions = Question::orderBy('chapter', 'asc', 'id')->paginate(5);

        // return the view, and pass in the group of records to loop through
        return view('courses.foundations.questions.index')->with('questions', $questions);

        // return response()->json([
        //     'questions'=>$questions
        // ], 200);

    }

    /**
     * Show the form for creating a new resource.
     *
     * called from ask - ask now button
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('courses.foundations.questions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the form data
        $this->validate($request, [
            'title' => 'required|max:255'
        ]);
        // process the data and submit it
        $question = new Question();
        $question->title = $request->title;
        $question->chapter = $request->chapter;
        $question->user()->associate(Auth::id());
        $question->description = $request->description;

        // if successful we want to redirect
        if ($question->save()) {
            return redirect()->route('questions.show', $question->id);
        } else {
            return redirect()->route('questions.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Use the model to get 1 record from the database
        $question = Question::findOrFail($id);
        // show the view and pass the record to the view
        return view('courses.foundations.questions.show')->with('question', $question);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Question::findOrFail($id);
        if ($question->user->id != Auth::id()) {
        return abort(403);
        }
        return view('questions.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $idaqaq 0
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:255'
        ]);
        $question = Question::findOrFail($id);
        $question->title = $request->title;
        $question->chapter = $request->chapter;
        $question->description = $request->description;
        $question->save();
        return redirect()->route('questions.show', $question->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // DB::delete('delete questions where id = ?', [$id]);
        //DB::table('questions')->where('id', $id)->delete();
    }

    //=====Laravel Foundations: Basics to Every App Packt =======================================================
    public function getFoundations(){
        return view('courses.foundations.foundations');
    }
    public function getAsk(){
    //public function ask(){
        return view('courses.foundations.ask');
    }
}
/**php artisan make:controller QuestionController --resource    Makes functions automatically
with subdirectory php artisan make:controller /courses/foundations/QuestionController --resource
--resource for  making a CRUD controller.
add Route::resource('questions', 'QuestionController'); to web.php
if Laravel created the controller (web.php). This will setup all routes
Route::resource('questions', 'QuestionController');*/
