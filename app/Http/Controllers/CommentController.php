<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function getCommentDetail($id)
    {
        $comment = Comment::query()->find($id);
        return view('admin.comment-detail', [
            'comment' => $comment,
        ]);
    }

    public function editComment($id, Request $request)
    {
        $comment = Comment::query()->find($id);
        $comment->status = $request->status;
        $comment->save();
        return redirect()->route('comment-detail', ['id' => $id]);
    }
}
