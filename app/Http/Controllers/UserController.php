<?php

namespace App\Http\Controllers;

use App\Http\Services\UserService;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * @var UserService
     */
    private $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }

    public function create(Request $request)
    {
        $user = new User();
        $user->first_name = $request['first-name'];
        $user->last_name = $request['last-name'];
        $user->email = $request['email'];
        $user->password = $request['password'];
        if ($this->userService->checkIfExistedAccount($user->email)) {
            return $message = "Can't create account";
        } else {
           if ($user->save()) {
               session(['user' => $user]);
               return redirect()->route('index');
           }
        }
    }

    public function login(Request $request)
    {
        $user = $this->userService->checkIfExistedAccount($request['email'], $request['password']);
        if ($user) {
            Auth::login($user);
            session()->put(['user' => $user]);
            return redirect()->route('index');
        } else {
            return $message = "Login Failed";
        }
    }

    public function logOut()
    {
        session()->flush();
        Auth::logout();
        return redirect()->route('index');
    }
}
