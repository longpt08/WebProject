<?php

namespace App\Http\Controllers;

use App\Http\Enums\UserRole;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
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
               Auth::login($user);
               return redirect()->route('home');
           }
        }
    }

    public function login(Request $request)
    {
        $user = $this->userService->checkIfExistedAccount($request['email'], $request['password']);
        if ($user) {
            Auth::login($user);
            session()->put(['user' => $user]);
            if ($user->role = UserRole::USER) {
                return redirect()->route('home');
            }
            return redirect()->route('admin-index');
        } else {
            return $message = "Login Failed";
        }
    }

    public function logOut()
    {
        session()->flush();
        Auth::logout();
        return redirect()->route('home');
    }

    public function getUserDetail($id)
    {
        $user = User::query()->find($id);
        return view('admin.user-detail', ['user' => $user]);
    }

    public function editUser($id, Request $request)
    {
        $user = User::query()->find($id);
        $user->status = $request->status;
        $user->save();

        return redirect()->route('user-detail', ['id' => $id]);
    }

    public function editProfile(Request $request)
    {
        $user = User::query()->find(Auth::id());
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->date_of_birth = $request->date_of_birth;

        $user->save();
        return redirect()->route('profile');
    }
}
