<?php

namespace App\Http\Controllers\courses\tests;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\courseModels\tests\Chapter;
use App\courseModels\tests\ChapterComment;
use Auth;

class ChapterCommentsController extends Controller
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
            'chapter_id' => 'required|integer'
        ]);

        $chapterComment = new ChapterComment();
        $chapterComment->content = $request->content;
        $chapterComment->user()->associate(Auth::id());

        $chapter = Chapter::findOrFail($request->chapter_id);
        $chapter->chapterComments()->save($chapterComment);

        return redirect()->route('chapters.show', $chapter->id);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
