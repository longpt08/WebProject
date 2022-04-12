<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $accountId = session('accountId');
        $posts = Post::where('account_id', $accountId)->get();
        return view('home', ['posts', $posts]);
    }
}
