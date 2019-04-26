<?php
// This is part of the laravel/view by Edwin Diaz
namespace App\Http\Controllers\courses\foundations;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\courseModels\foundations\Question;
use Auth;

class QuestionsViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd("IT WORKS");
        $questions = Auth::user()->questions;
        //$questions = Question::orderBy('chapter', 'asc', 'id');
        return response()->json([
            'questions'=>$questions
        ], 200);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'title' => 'required|max:255'
        ]);
        // process the data and submit it
        $question = new Question();
        $question->title = $request->title;
        $question->chapter = $request->chapter;
        // $question->user_id = 1;
        $question->user()->associate(Auth::id());
        $question->description = $request->description;

        if ($question->save()) {
            return response()->json([
                'question'=> $question,
                'message'=> 'question has been created!'
            ]);
        }
        //===================
        // $request->validate([
        //     'title' => 'required|max:255'
        // ]);

        // console.log($request->title);
        // console.log($request->chapter);
        // console.log($request->description);
        // $question = $request->user()->questions()->create([
        //     'title' => $request->title,
        //     'chapter' => $request->chapter,
        //     'user_id' => 1,
        //     'description' => $request->description
        // ]);

        // return response()->json([
        //     'question'=> $question,
        //     'message'=> 'question has been created!'
        //  ]);
        //=====================
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $this->validate($request, [
            'title' => 'required|max:255'
        ]);

        $question = $request->user()->questions()->whereId($id)->update($request->all());

        return response()->json([
            'question'=> $question,
            'message'=> 'question has been Updated!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $task->delete();
        // return response()->json([
        //     'task'=> $task,
        //     'message'=> 'task has been Deleted!'
        // ]);
    }
}
