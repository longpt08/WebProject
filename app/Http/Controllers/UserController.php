<?php

namespace App\Http\Controllers;

use App\Http\Enums\UserRole;
use App\Http\Enums\UserStatus;
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
        if ($request['role']) {
            $user->roles = $request['role'];
        }
        if ($request['address']) {
            $user->address = $request['address'];
        }
        if ($request['phone-number']) {
            $user->phone_number = $request['phone-number'];
        }

        if ($this->userService->checkIfExistedAccount($user->email)) {
            return redirect()->route('sign-up')->with('message', 'Email đã tồn tại!');
        } else {
            if ($user->save()) {
                if (Auth::user()) {
                    return redirect()->route('user-list');
                }
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
            if ($user->status == UserStatus::ACTIVE) {
                Auth::login($user);
                session()->put(['user' => $user]);
                if ($user->roles == UserRole::USER) {
                    return redirect()->route('home');
                }
                return redirect()->route('admin-index');
            } else {
                return redirect()->route('login')->with('message', "Tài khoản đã bị vô hiệu hóa! Vui lòng liên hệ CSKH để biết thêm chi tiết!");
            }
        } else {
            return redirect()->route('login')->with('message', "Đăng nhập thất bại, tài khoản không tồn tại!");
        }
    }

    public function checkEmail(Request $request)
    {
        if ($this->userService->checkIfExistedAccount($request->email)) {
            return true;
        }
        return false;
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
        if ($user->save()) {
            $message = 'Cập nhật thành công!';
            $status = true;
        } else {
            $message = 'Cập nhật thất bại!';
            $status = false;
        }

        return redirect()->route('user-detail', ['id' => $id])
            ->with('status', $status)->with('message', $message);
    }

    public function editProfile(Request $request)
    {
        $user = User::query()->find(Auth::id());
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->date_of_birth = date('Y-m-d',strtotime($request->date_of_birth));

        $user->save();
        Auth::setUser($user);
        return redirect()->route('profile');
    }
}
