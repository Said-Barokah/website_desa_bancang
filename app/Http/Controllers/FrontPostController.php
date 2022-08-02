<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class FrontPostController extends Controller
{
    public function index(Request $request)
    {
        $user = 'guard';
        $role = 'guard';
        if (Auth::check()) {
            if (Auth::user()->hasRole('admin')) {
                $role = 'admin';
            } else if (Auth::user()->hasRole('super admin')) {
                $role = 'super admin';
            } else {
                $role = 'user';
            }
            $user = Auth::user();
        }
        $posts = Post::select('posts.cover', 'posts.title', 'posts.created_at', 'posts.slug', 'posts.meta_desc', 'categories.name as category_name', 'categories.id as category_id', 'categories.slug as category_slug')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->latest()
            ->simplePaginate(16);

        $postLatestSideBar = Post::select('posts.cover', 'posts.title', 'posts.created_at', 'posts.slug', 'posts.meta_desc', 'categories.name as category_name', 'categories.id as category_id', 'categories.slug as category_slug')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->latest()->take(5)->get();
        $tags = Tag::latest()->take(7)->get();

        $keyword = $request->input('keyword');
        if ($keyword != '') {
            // return dd($keyword);
            $posts = Post::select('posts.cover', 'posts.title', 'posts.created_at', 'posts.slug', 'posts.meta_desc', 'categories.name as category_name', 'categories.id as category_id', 'categories.slug as category_slug')
                ->join('categories', 'posts.category_id', '=', 'categories.id')
                ->where('posts.keywords', 'LIKE', "%{$keyword}%")
                ->orWhere('posts.title', 'LIKE', "%{$keyword}%")
                ->orWhere('posts.desc', 'LIKE', "%{$keyword}%")
                ->latest()
                ->simplePaginate(16);
        }
        $categories = Category::latest()->get();
        return Inertia::render(
            'News',
            [
                'posts' => $posts,
                'user' => $user,
                'role' => $role,
                'tags' => $tags,
                'categories' => $categories,
                'postLatestSideBar' => $postLatestSideBar,
                'keyword' => $keyword,

            ]
        );
    }

    public function showPostCategory($slug, Request $request)
    {
        $user = 'guard';
        $role = 'guard';
        if (Auth::check()) {
            if (Auth::user()->hasRole('admin')) {
                $role = 'admin';
            } else if (Auth::user()->hasRole('super admin')) {
                $role = 'super admin';
            } else {
                $role = 'user';
            }
            $user = Auth::user();
        }
        $postLatestSideBar = Post::select('posts.cover', 'posts.title', 'posts.created_at', 'posts.slug', 'posts.meta_desc', 'categories.name as category_name', 'categories.id as category_id', 'categories.slug as category_slug')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->latest()->take(5)->get();
        $posts = Post::select('posts.cover', 'posts.title','posts.slug', 'posts.created_at', 'posts.desc', 'categories.name as category_name', 'categories.slug as category_slug')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->where('categories.slug', '=', $slug)
            ->latest()
            ->simplePaginate(16);

        $keyword = $request->input('keyword');
        if ($keyword != '') {
            $posts = Post::select('posts.cover', 'posts.title', 'posts.created_at', 'posts.slug', 'posts.meta_desc', 'categories.name as category_name', 'categories.id as category_id', 'categories.slug as category_slug')
                ->join('categories', 'posts.category_id', '=', 'categories.id')
                ->where('posts.keywords', 'LIKE', "%{$keyword}%")
                ->orWhere('posts.title', 'LIKE', "%{$keyword}%")
                ->orWhere('posts.desc', 'LIKE', "%{$keyword}%")
                ->andWhere('categories.slug', '=', $slug)
                ->latest()
                ->simplePaginate(16);
        }
        $tags = Tag::latest()->take(7)->get();
        $categories = Category::latest()->get();
        // return dd($posts);
        return Inertia::render('News', [
            'user' => $user,
            'posts' => $posts,
            'tags' => $tags,
            'action' => 'Kategori',
            'categories' => $categories,
            'slug' => ucwords($posts[0]->category_name),
            'postLatestSideBar' => $postLatestSideBar,
            'keyword' => $keyword
        ]);
    }

    public function showPost($slug)
    {
        $user = 'guard';
        $role = 'guard';
        if (Auth::check()) {
            if (Auth::user()->hasRole('admin')) {
                $role = 'admin';
            } else if (Auth::user()->hasRole('super admin')) {
                $role = 'super admin';
            } else {
                $role = 'user';
            }
            $user = Auth::user();
        }
        $postLatestSideBar = Post::select('posts.cover', 'posts.title', 'posts.created_at', 'posts.slug', 'posts.meta_desc', 'categories.name as category_name', 'categories.id as category_id', 'categories.slug as category_slug')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->latest()->take(5)->get();
        $post = Post::select('posts.cover', 'posts.title', 'posts.created_at', 'posts.slug', 'posts.desc', 'categories.name as category_name', 'categories.id as category_id', 'categories.slug as category_slug', 'users.name as writer')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->where('posts.slug', '=', $slug)
            ->get();
        $tags = Tag::latest()->take(7)->get();
        $categories = Category::latest()->get();
        return Inertia::render('Post', [
            'user' => $user,
            'post' => $post,
            'role' => $role,
            'tags' => $tags,
            'action' => 'Kategori',
            'categories' => $categories,
            'postLatestSideBar' => $postLatestSideBar,
        ]);
    }

    public function tagNews($slug)
    {

        $user = 'guard';
        $role = 'guard';
        if (Auth::check()) {
            if (Auth::user()->hasRole('admin')) {
                $role = 'admin';
            } else if (Auth::user()->hasRole('super admin')) {
                $role = 'super admin';
            } else {
                $role = 'user';
            }
            $user = Auth::user();
        }

        $posts = PostTag::select('posts.cover', 'posts.title', 'posts.created_at', 'posts.slug', 'posts.meta_desc', 'categories.name as category_name', 'categories.id as category_id', 'categories.slug as category_slug', 'tags.name as tags_name')
            ->join('tags', 'post_tag.tag_id', '=', 'tags.id')
            ->join('posts', 'post_tag.post_id', '=', 'posts.id')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->where('tags.slug', '=', $slug)
            ->latest()
            ->simplePaginate(16);
        $postLatestSideBar = Post::select('posts.cover', 'posts.title', 'posts.created_at', 'posts.slug', 'posts.meta_desc', 'categories.name as category_name', 'categories.id as category_id', 'categories.slug as category_slug')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->latest()->take(5)->get();
        $tags = Tag::latest()->take(7)->get();
        $categories = Category::latest()->get();
        return Inertia::render(
            'News',
            [
                'posts' => $posts,
                'user' => $user,
                'role' => $role,
                'tags' => $tags,
                'action' => 'Tag',
                'categories' => $categories,
                'slug' => ucwords($posts[0]->tags_name),
                'postLatestSideBar' => $postLatestSideBar,

            ]
        );
    }
}
