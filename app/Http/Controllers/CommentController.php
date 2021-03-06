<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentRequest;
use App\Mail\CommentReceived;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Post $post, CreateCommentRequest $request)
    {
        $data = $request->validated(); // [ 'content' => $request->get('content')]

        $comment = new Comment($data);

        $comment->post()->associate($post); // $comment->post_id = $post->id
        $comment->user()->associate(Auth::user());  // $comment->user_id = Auth::user()->id

        $comment->save(); // insert into comments (content) values ('asdfasdf')
        // $post->comments()->create($data);

        if ($comment->user_id != $comment->post->user_id) { // avoid notifying yourself
            Mail::to($comment->post->author)
                ->send(new CommentReceived($comment));
        }

        return back();
    }
}
