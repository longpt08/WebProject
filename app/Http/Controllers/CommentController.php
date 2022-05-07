<?php

namespace App\Http\Controllers;

use App\Http\Enums\CommentStatus;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if ($comment->save()) {
            $message = 'Cập nhật thành công!';
            $status = true;
        } else {
            $message = 'Cập nhật không thành công!';
            $status = false;
        }
        return redirect()->route('comment-detail', ['id' => $id])
            ->with(['message' => $message, 'status' => $status]);
    }

    public function postComment(Request $request)
    {
        $comment = new Comment();
        $comment->user_id = Auth::id();
        $comment->product_id = $request->get('product-id');
        $comment->content = $request->get('content');
        $comment->rating = $request->get('rate');
        $comment->status = CommentStatus::PENDING;
        if ($comment->save()) {
            $product = $comment->product;
            $ratings = $product->comments->pluck('rating')->toArray();
            $avarage = array_sum($ratings) / count($ratings);
            $product->average_rating = round($avarage, 2);
            $product->save();
            return redirect()->route('product-single', ['id' => $request->get('product-id')]);
        } else {
            return redirect()->route('product-single', ['id' => $request->get('product-id')])->with(['message' => 'Khong the dang binh luan']);
        }
    }
}
