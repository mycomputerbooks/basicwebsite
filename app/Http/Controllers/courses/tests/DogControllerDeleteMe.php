<?php

namespace App\Http\Controllers\courses\tests;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\courseModels\tests\Dog;
// use App\courseModels\tests\DogComment;

class DogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Display a listing of the resource.
        //$dogs = Dog::All();

        $dogs = Dog::orderBy('updated_at', 'des', 'id')->paginate(2);
        return view('courses.tests.dogs.index')->with('dogs', $dogs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Show the form for creating a new resource.
        return view('courses.tests.dogs.create');
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
        $dog = new Dog();
        $dog->title = $request->title;
        $dog->breed = $request->breed;
        $dog->description = $request->description;
        $dog->dog_name = $request->name;
        if ($dog->save()) {
            // return redirect()->route('dogs.show', $dog->id);
            return redirect()->route('dogs.index');
        } else {
            return redirect()->route('dogs.create');
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
        $dog = Dog::findOrFail($id);
        return view('courses.tests.dogs.show')->with('dog', $dog);
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
