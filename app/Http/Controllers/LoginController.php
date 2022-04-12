<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function userLogin(Request $request){
        $result = Account::where('username', $request->username)
                    ->where('password', $request->password)
                    ->first();
        if($result){
            $accountId = $result->id;
            $request->session()->put('accountId',$accountId);
            return redirect('/home');
        }
        else{
            echo 'Wrong username or password!';
        }
    }
}
