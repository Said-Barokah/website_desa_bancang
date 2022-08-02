<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
class UserAccountSettingController extends Controller
{
    public function update(Request $request)
    {
        $validate = $request->validate([
            "name" => ['required'],
        ]);
        $auth = Auth::user();
        $new_photo_path = $request->file('path_profile_photo');
        if ($new_photo_path) {
            $sub_path_profile_photo = substr("$auth->path_profile_photo", 8);
            if ($auth->path_profile_photo && Storage::disk('public')->exists($sub_path_profile_photo)) {
                Storage::disk('public')->delete($sub_path_profile_photo);
            }
            $path_profile_photo = $new_photo_path->store('images/profil', 'public');
            $auth->path_profile_photo = "/storage/$path_profile_photo";
        }
        $auth->name = $request->name;
        $auth->save();
        return Redirect::route('home')->with(['message' => "Data berhasil di update", "action" => 'success']);
    }

    public function updatePassword(Request $request)
    {
        $validate = Validator::make($request->all(),[
            "current_password" => ['required'],
            "new_password" => ['required']
        ]);

        if($validate->fails()){
            return Redirect::route('home')->with(['message' => "error untuk diupdate (cek password yang dimasukkan)", "action" => 'error']);
        }
        $auth = Auth::user();
        if(password_verify($request->current_password,$auth->password)){
            $auth->password = password_hash($request->new_password,PASSWORD_DEFAULT);
            $auth->save();
            return Redirect::route('home')->with(['message' => "password berhasil di update", "action" => 'success-password']);
        }
        else{
            return Redirect::route('home')->with(['message' => "error untuk diupdate (cek password yang dimasukkan)", "action" => 'error']);
        }

    }
}
