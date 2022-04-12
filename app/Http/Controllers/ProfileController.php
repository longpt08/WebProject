<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(){
        $profile = Profile::where('account_id', session()->get('accountId'))->first();
        if($profile == null){
            $profile = new Profile();
        }
        return view('profile', ['profile' => $profile]);
    }
    public function edit(){
        $profile = Profile::where('account_id', session()->get('accountId'))->first();
        if($profile == null){
            $profile = new Profile();
        }
        return view('edit_profile', ['profile' => $profile]);
    }

    public function save(Request $request){
        $accountId = $request->session()->get('accountId');
//        $profile = Profile::where('account_id', $accountId)->first();
//        if($profile == null){
//            $profile = new Profile([
//                'name' => $request->name,
//                'address' => $request->address,
//                'number_phone' => $request->numberPhone,
//                'date_of_birth' => $request->dateOfBirth,
//                'account_id' => $accountId,
//            ]);
//            $profile->save();
//        }
        Profile::updateOrCreate(
            [
                'account_id' => $accountId,
            ],
            [
                'name' => $request->name,
                'address' => $request->address,
                'number_phone' => $request->numberPhone,
                'date_of_birth' => $request->dateOfBirth,
        ]);
        return redirect('/profile/index');
    }
}
