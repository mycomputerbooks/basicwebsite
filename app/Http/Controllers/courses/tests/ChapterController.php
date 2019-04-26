<?php

namespace App\Http\Controllers\courses\tests;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\courseModels\tests\Chapter;
use Auth;

class ChapterController extends Controller
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
        $chapters = Chapter::orderBy('chapter', 'asc', 'id')->paginate(5);
        return view('courses.tests.chapters.index')->with('chapters', $chapters);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //dd("IT WORKS");
        return view('courses.tests.chapters.create');
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
        $chapter = new Chapter();
        $chapter->chapter = $request->chapter;
        $chapter->title = $request->title;
        $chapter->description = $request->description;
        $chapter->user()->associate(Auth::id());
        if ($chapter->save()) {
            return redirect()->route('chapters.show', $chapter->id);
        } else {
            return redirect()->route('chapter.create');
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
        $chapter = Chapter::findOrFail($id);
        return view('courses.tests.chapters.show')->with('chapter', $chapter);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $chapter = Chapter::findOrFail($id);
        if ($chapter->user->id != Auth::id()) {
        return abort(403);
        }
        return view('chapters.edit');
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
        $chapter = Chapter::findOrFail($id);
        if ($chapter->user->id != Auth::id()) {
        return abort(403);
        }
        return view('chapters.update');
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
