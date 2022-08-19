<?php

namespace App\Http\Controllers;

// import the Avatar class
use App\Models\Post;
use App\Models\VillageApparatusStructure;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use PhpParser\Node\Expr\Cast\Object_;

class HomeController extends Controller
{
    public function index(){
        $role = 'guard';
        $user = array();
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

        $maxFromYear = VillageApparatusStructure::max('from_year');
        $kepalaDesaCurrent =VillageApparatusStructure::where('from_year','=',$maxFromYear)->where('position_id','=',1)
        ->with('position')->with('villager')->get();
        $sekretarisDesaCurrent =VillageApparatusStructure::where('from_year','=',$maxFromYear)->where('position_id','=',2)
        ->with('position')->with('villager')->get();
        $maxToYear = VillageApparatusStructure::max('to_year');
        $postLatest = Post::select('posts.cover','users.name as user_name', 'posts.title', 'posts.created_at', 'posts.slug', 'posts.meta_desc', 'categories.name as category_name', 'categories.id as category_id', 'categories.slug as category_slug')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->join('users','users.id','=','posts.user_id')
            ->latest()->take(4)->get();

    return Inertia::render('Home',[
            'user' => $user,
            'role' => $role,
            'fromYear' => $maxFromYear,
            'toYear' => $maxToYear,
            'kepalaDesa' => $kepalaDesaCurrent,
            'sekretarisDesa' => $sekretarisDesaCurrent,
            'postLatest' => $postLatest
        ]);
    }
    public function dashboard(){
        return Inertia::render('Dashboard');
    }

}
