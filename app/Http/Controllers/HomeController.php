<?php

namespace App\Http\Controllers;

// import the Avatar class
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index(){
        $role = 'guard';
        $user = 'guard';
        if(Auth::check()){
            if(Auth::user()->hasRole('admin')){
                $role = 'admin';
            }
            else if(Auth::user()->hasRole('super admin')){
                $role = 'super admin';
            }
            else {
                $role = 'user';
            }
            $user = Auth::user();
        }

        return Inertia::render('Home',[
            'user' => $user,
            'role' => $role
        ]);
    }
    public function dashboard(){
        return Inertia::render('Dashboard');
    }
}
