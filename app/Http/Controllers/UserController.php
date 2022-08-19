<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::latest()->with('roles')->simplePaginate(10);
        $user = Auth::user();
        $keyword = $request->input('keyword');
        if ($keyword != '') {
            $users = User::select("users.id","users.name","users.created_at")
                    ->join('model_has_roles','users.id','=','model_has_roles.model_id')
                    ->join('roles','roles.id','=','model_has_roles.role_id')
                    ->where('roles.name','LIKE',"%{$keyword}%")
                    ->orWhere('users.name', 'LIKE', "%{$keyword}%")
                    ->orderBy('roles.name')
                    ->latest()
                    ->with('roles')
                    ->simplePaginate(10);
        }
        return Inertia::render('UserDashboard', ['users' => $users, 'user' => $user, 'keyword' => $keyword]);
    }

    public function edit($id)
    {
        $user = Auth::user();
        $userApp = User::where('id', '=', $id)->with('roles')->get();
        $roles = Role::all();
        return Inertia::render('UserDashboardEdit', [
            'userApp' => $userApp,
            'action' => 'edit',
            'roles' => $roles,
            'user' => $user
        ]);
    }

    public function update(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            "role_id" => ['required'],
            "name" => ['required'],
        ]);

        if($validate->fails()){
            return Redirect::route('users.index')->with(['message' => "Gagal untuk ditambahkan, cek lagi inputan anda",'action'=> 'error']);
        }

        $user = User::findOrFail($id);
        $new_photo_path = $request->file('path_profile_photo');
        if ($request->file('path_profile_photo') == null || $request->file('path_profile_photo')->extension() == 'jpg' || $request->file('path_profile_photo')->extension() == 'png' || $request->file('path_profile_photo')->extension() == 'jpeg') {
            if ($new_photo_path) {
                $sub_photo_path = substr("$user->path_profile_photo", 8);
                if ($user->photo_path && Storage::disk('public')->exists($sub_photo_path)) {
                    Storage::disk('public')->delete($sub_photo_path);
                }
                $photo_path = $new_photo_path->store('images/profil', 'public');
                $user->path_profile_photo = "/storage/$photo_path";
            }
            $user->name = $request->name;
            if($request->password!=null){
                $user->password = password_hash($request->password,PASSWORD_DEFAULT);
            }

            DB::table('model_has_roles')->where('model_id', $id)->delete();
            $user->assignRole($request->input('role_id'));
            $user->save();
            return Redirect::route("users.index")->with(['message' => "Data berhasil di update", "action" => 'success']);
        }
        return Redirect::route("users.index")->with(['message' => "Cek lagi inputan anda", "action" => 'error']);
    }

    public function create(){
        $user = Auth::user();
        $roles = Role::all();
        return Inertia::render('UserDashboardCreate', [
            'roles' => $roles,
            'user' => $user
        ]);
    }


    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            "role_id" => ['required'],
            "name" => ['required'],
            "email" => ['required','email','unique:users,email'],
        ]);
        if($validate->fails()){
            return Redirect::route('users.index')->with(['message' => "Gagal untuk ditambahkan, cek lagi inputan anda",'action'=> 'error']);
        }
        $user = new User();

        $new_photo_path = $request->file('path_profile_photo');
        if ($request->file('path_profile_photo') == null || $request->file('path_profile_photo')->extension() == 'jpg' || $request->file('path_profile_photo')->extension() == 'png' || $request->file('path_profile_photo')->extension() == 'jpeg') {
            if ($new_photo_path) {
                $photo_path = $new_photo_path->store('images/profil', 'public');
                $user->path_profile_photo = "/storage/$photo_path";
            }
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = password_hash($request->password,PASSWORD_DEFAULT);
            $user->assignRole($request->input('role_id'));
            $user->save();
            return Redirect::route("users.index")->with(['message' => "Data berhasil di tambahkan", "action" => 'success']);
        }
        return Redirect::route('users.index')->with(['message' => "Cek lagi inputan anda", "action" => 'error']);
    }

}
