<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Models\Answer;
use App\Models\Comment;
use Illuminate\Http\Request;

class AnswerController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $comment_id)
    {

        $user_id = auth()->user()->id;
        $body = $request->body;
        if (!$body) {
            return back();
        } else {
            $comment_id = intval($comment_id);
            Answer::create(['body' => $body, 'user_id' => $user_id, 'comment_id' => $comment_id]);
            return back();
        }
    }
}
