<?php

namespace App\Http\Controllers\courses\tests;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\courseModels\tests\Dog;
use App\courseModels\tests\DogComment;

class DogCommentsController extends Controller
{

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
            'dog_id' => 'required|integer'
        ]);
        $dogComment = new DogComment();
        $dogComment->content = $request->content;
        $dog = Dog::findOrFail($request->dog_id);
        $dog->dogComments()->save($dogComment);
        return redirect()->route('dogs.show', $dog->id);
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
