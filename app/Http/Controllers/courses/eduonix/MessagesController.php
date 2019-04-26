<?php

namespace App\Http\Controllers\courses\eduonix;
//web.php defined Route::post('/contact/submit', 'MessagesController@submit'); //submit button contact view
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\courseModels\eduonix\Message;

class MessagesController extends Controller
{
    public function submit(Request $request){
      $this->validate($request, [
        'name' => 'required',
        'email' => 'required'
      ]);

      // Create New Message
      $message = new Message;
      $message->name = $request->input('name');
      $message->email = $request->input('email');
      $message->message = $request->input('message');
      // Save Message
      $message->save();

      // Redirect
      return redirect('/')->with('success', 'Message Sent');
    }

    public function getMessage(){
        $messages = Message::all();

        return view('courses.eduonix.messages')->with('messages', $messages);
      }

}
