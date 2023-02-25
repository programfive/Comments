<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Models\Answer;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::get();
        return view('dashboard', compact('comments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $user_id = auth()->user()->id;
        $request->validated();
        Comment::create([...$request->validated(), 'user_id' => $user_id]);
        return back();
    }
}