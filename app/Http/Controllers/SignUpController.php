<?php

namespace App\Http\Controllers;

use App\Models\Account;
use http\Env\Response;
use Illuminate\Http\Request;

class SignUpController extends Controller
{
    public function index(){
        return view('signup');
    }
    public function userSignUp(Request $request){
        //check if username existed
        $result = Account::where('username', $request->username)->first();
        if($result == null) {
            $accountId = Account::insertGetId([
                'username' => $request->username,
                'password' => $request->password,
            ]);
            $request->session()->put('accountId', $accountId);
            return redirect('/profile/edit');
        }
        else{
            echo "Username existed!";
        }
    }
}
