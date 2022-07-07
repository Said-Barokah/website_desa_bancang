<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class FrontPostController extends Controller
{
    public function index(Request $request){
        $user = '';
        if(Auth::check()){
            $user =Auth::user();
        }
        $posts = Post::select('posts.cover','posts.title','posts.created_at','posts.slug','posts.meta_desc','categories.name as category_name','categories.id as category_id','categories.slug as category_slug')
                        ->join('categories','posts.category_id','=','categories.id')
                        ->latest()
                        ->simplePaginate(16);

        $postLatestSideBar = Post::select('posts.cover','posts.title','posts.created_at','posts.slug','posts.meta_desc','categories.name as category_name','categories.id as category_id','categories.slug as category_slug')
        ->join('categories','posts.category_id','=','categories.id')
        ->latest()->take(5)->get();
        $keyword = $request->input('keyword');
        if($keyword!=''){
            // return dd($keyword);
            $posts=Post::select('posts.cover','posts.title','posts.created_at','posts.slug','posts.meta_desc','categories.name as category_name','categories.id as category_id','categories.slug as category_slug')
            ->join('categories','posts.category_id','=','categories.id')
            ->where('posts.keywords','LIKE',"%{$keyword}%")
            ->orWhere('posts.title','LIKE',"%{$keyword}%")
            ->orWhere('posts.desc','LIKE',"%{$keyword}%")
            ->latest()
            ->simplePaginate(16);
        }
        return Inertia::render('News',[
            'posts' => $posts,
            'user' => $user,
            'postLatestSideBar' => $postLatestSideBar,
            'keyword' => $keyword
        ]
    );
    }

    public function showPostCategory($slug,Request $request){
        $user = '';
        if(Auth::check()){
            $user =Auth::user();
        }
        $postLatestSideBar = Post::select('posts.cover','posts.title','posts.created_at','posts.slug','posts.meta_desc','categories.name as category_name','categories.id as category_id','categories.slug as category_slug')
        ->join('categories','posts.category_id','=','categories.id')
        ->latest()->take(5)->get();
        $posts = Post::select('posts.cover','posts.title','posts.created_at','posts.desc','categories.name as category_name','categories.slug as category_slug')
        ->join('categories','posts.category_id','=','categories.id')
        ->where('categories.slug','=',$slug)
        ->latest()
        ->simplePaginate(16);

        $keyword = $request->input('keyword');
        if($keyword!=''){
            $posts=Post::select('posts.cover','posts.title','posts.created_at','posts.slug','posts.meta_desc','categories.name as category_name','categories.id as category_id','categories.slug as category_slug')
            ->join('categories','posts.category_id','=','categories.id')
            ->where('posts.keywords','LIKE',"%{$keyword}%")
            ->orWhere('posts.title','LIKE',"%{$keyword}%")
            ->orWhere('posts.desc','LIKE',"%{$keyword}%")
            ->andWhere('categories.slug','=',$slug)
            ->latest()
            ->simplePaginate(16);
        }
        return Inertia::render('Post',[
            'user' => $user,
            'posts' => $posts,
            'postLatestSideBar' => $postLatestSideBar,
            'keyword' => $keyword
        ]);
    }

    public function showPost($slug){
        $user = '';
        if(Auth::check()){
            $user =Auth::user();
        }
        $postLatestSideBar = Post::select('posts.cover','posts.title','posts.created_at','posts.slug','posts.meta_desc','categories.name as category_name','categories.id as category_id','categories.slug as category_slug')
        ->join('categories','posts.category_id','=','categories.id')
        ->latest()->take(5)->get();
        $post = Post::select('posts.cover','posts.title','posts.created_at','posts.slug','posts.desc','categories.name as category_name','categories.id as category_id','categories.slug as category_slug','users.name as writer')
                     ->join('categories','posts.category_id','=','categories.id')
                     ->join('users','posts.user_id','=','users.id')
                     ->where('posts.slug','=',$slug)
                     ->get();
        return Inertia::render('Post',[
            'user' => $user,
            'post' => $post,
            'postLatestSideBar' => $postLatestSideBar,
        ]);
    }
}
