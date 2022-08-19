<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AccountSettingController extends Controller
{
    public function index()
    {
        $auth = Auth::user();
        return Inertia::render('AccountSetting', ['auth' => $auth]);
    }
    public function update(Request $request)
    {
        $validate = Validator::make($request->all(),[
            "name" => ['required'],
        ]);

        if($request->file('path_profile_photo') == null || $request->file('path_profile_photo')->extension()=='jpg'|| $request->file('path_profile_photo')->extension()=='png' || $request->file('path_profile_photo')->extension()=='jpeg'){
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
            return Redirect::back()->with(['message' => "Data berhasil di update", "action" => 'success']);
        }
        return Redirect::back()->with(['message' => "Cek lagi inputan anda", "action" => 'error']);

    }

    public function updatePassword(Request $request)
    {
        $validate = $request->validate([
            "current_password" => ['required'],
            "new_password" => ['required']
        ]);
        $auth = Auth::user();
        if(password_verify($request->current_password,$auth->password)){
            $auth->password = password_hash($request->new_password,PASSWORD_DEFAULT);
            $auth->save();
            return Redirect::back()->with(['message' => "Data berhasil di update", "action" => 'success']);
        }
        else {
            return Redirect::back()->with(['message' => "Cek lagi inputan anda", "action" => 'error']);
        }

    }
}
