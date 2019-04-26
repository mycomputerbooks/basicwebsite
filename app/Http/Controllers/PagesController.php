<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Mail;
use App\Mail\ContactForm;

class PagesController extends Controller
{
    public function getHome(){
        return view('home');
      }
    //==================== eduonix ========================================
      public function getEduonixAbout(){
        return view('courses/eduonix/about');
      }
      public function getEduonixContact(){
        return view('courses/eduonix/contact');
      }

    //=====Laravel Foundations: Basics to Every App Packt =======================================================
    public function profile($id)
    {
        //eager loading
        $user = User::with(['questions', 'answers', 'answers.question'])->find($id);
        //$user = User::findOrFail($id);
        return view('courses/foundations/profile')->with('user', $user);
    }

    public function getFoundationsContact()
    {
        return view('courses/foundations/contact');
    }

    //from /foundations/contact
    public function getFoundationsSubmitContact(Request $request)
    {
      $this->validate($request, [
        'name' => 'required',
        'email' => 'required|email',
        'subject' => 'required|min:3',
        'message' => 'required|min:10'
      ]);
      //iniate mailable return to Mail/ContactForm.php
      //Cfim use App\Mail\ContactForm;  and use Mail; Customize in ContactForm
      //Runs build() in App\Mail\ContactForm\ContactForm.php
      Mail::to('admin@example.com')->send(new ContactForm($request));

      return redirect('/');
    }

    //=====Laravel View =======================================================
    public function getLaravelViewQuestions()
    {
        //dd("IT WORKS");
        return view('courses/laravelview/questions');
        //return "This is a test today";
    }

    public function getLaravelViewToDo()
    {
        //dd("IT WORKS");
        return view('courses/laravelview/todo');
        //return "This is a test today";
    }

    //=== tests ================================================
    public function getText(){
        return "This is a test";
    }

}
