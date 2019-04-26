<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\PageComment;

class PageCommentsController extends Controller
{
    public function submit(Request $request){
        $this->validate($request, [
            'pageNumber' => 'required',
            'comment' => 'required'
        ]);
        // return($request->input('comment'));
        $comment = new PageComment;
        $comment->pageNumber = $request->input('pageNumber');
        $comment->comment = $request->input('comment');
        $comment->save();
        return redirect('/')->with('success', 'Message Sent');
    }

    public function getPageComments(){
        $pageComments = PageComment::all();
        return view('viewPageComments')->with('pageComments', $pageComments);
      }

}
