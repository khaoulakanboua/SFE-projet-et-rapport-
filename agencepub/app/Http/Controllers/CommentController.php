<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publication;
use App\Comment;
use App\Notifications\NewCommentPosted;
use App\Events\NewNotification;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Publication $publication){
    	request()->validate([
    		'content'=>'required|min:5'
    	]);
    	$comment =new Comment();
    	$comment->content=request('content');
    	$comment->user_id=auth()->user()->id;	
    	$publication->comments()->save($comment);

    	//Notifications
   // $publication->user->notify(new NewCommentPosted($publication,auth()->user()));

      
    	return redirect()->route('publications.index',$publication);

    }
    public function storeCommentReply(Comment $comment){
    	request()->validate([
    		'replyComment' =>'required|min:3']);
    	$commentReply=new Comment();
    	$commentReply->content=request('replyComment');
    	$commentReply->user_id=auth()->user()->id;
    	$comment->comments()->save($commentReply);
    	return redirect()->back();

    }
}
