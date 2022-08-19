<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Tag;
use App\Models\Category;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $posts = Post::latest()->simplePaginate(10);
        $keyword = $request->input('keyword');
        if ($keyword != '') {
            // return dd($keyword);
            $posts = Post::select('posts.id', 'posts.title', 'posts.slug', 'posts.keywords', 'posts.created_at', 'categories.name as category_name', 'categories.id as category_id', 'categories.slug as category_slug')
                ->join('categories', 'posts.category_id', '=', 'categories.id')
                ->where('posts.keywords', 'LIKE', "%{$keyword}%")
                ->orWhere('posts.title', 'LIKE', "%{$keyword}%")
                ->orWhere('posts.desc', 'LIKE', "%{$keyword}%")
                ->latest()
                ->simplePaginate(10);
        }
        return Inertia::render('PostDashboard', ['posts' => $posts, 'user' => $user, 'keyword' => $keyword]);
        // return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $categories = Category::all();
        $tags       = Tag::all();
        return Inertia::render('PostDashboardCreate', [
            "categories" => $categories,
            "tags" => $tags,
            'user' => $user
        ]);
        // return view('posts.create', compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $validator = Validator::make($request->all(), [
            "title"     => "required|unique:posts,title",
            "slug"      => "required",
            "cover"     => "required",
            "category"  => "required",
            "tags"      => "array|required",
            "keywords"  => "required",
            "meta_desc" => "required",
        ]);
        if($request->desc=='<p></p>'){
            return redirect()->back()
                            ->withErrors(["desc" => "deskripsi harus diisi "]);
        }
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $post               = new Post();
        if ($request->file('cover')->extension() == 'jpg' || $request->file('cover')->extension() == 'png' || $request->file('cover')->extension() == 'jpeg') {
            $cover              = $request->file('cover');
            if ($cover) {
                $cover_path     = $cover->store('images/blog', 'public');
                $post->cover    = "/storage/$cover_path";
            }
            $post->title        = $request->title;
            $post->slug         = Str::slug($request->slug);
            $post->user_id      = 1;
            $post->category_id  = $request->category;
            $post->desc         = $request->desc;
            $post->keywords     = $request->keywords;
            $post->meta_desc    = $request->meta_desc;
            $post->save();

            $post->tags()->attach($request->tags);

            return redirect()->route('posts.index')->with(['message' => "Data berhasil di simpan", "action" => 'success']);
        }
        return Redirect::back()->withErrors(["cover" => "data gagal disimpan - format cover yang anda masukkan salah"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        $post = Post::findOrFail($id);
        $categories = Category::all();
        $tags = Tag::all();
        return Inertia::render('PostDashboardEdit', [
            'post' => $post,
            'categories' => $categories,
            'tags' => $tags,
            'post_tag' => $post->tags,
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            "title"     => "required|unique:posts,title," . $id,
            "slug"      => 'required',
            "category"  => "required",
            "tags"      => "array|required",
            "keywords"  => "required",
            "meta_desc" => "required",
        ]);
        if($request->desc=='<p></p>'){
            return redirect()->back()
                            ->withErrors(["desc" => "deskripsi harus diisi "]);
        }
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->file('cover') == null || $request->file('cover')->extension() == 'jpg' || $request->file('cover')->extension() == 'png' || $request->file('cover')->extension() == 'jpeg') {
            $post = Post::findOrFail($id);
            $new_cover = $request->file('cover');
            if ($new_cover) {
                $sub_cover = substr("$post->cover", 8);
                if ($post->cover && Storage::disk('public')->exists($sub_cover)) {
                    Storage::disk('public')->delete($sub_cover);
                }
                $new_cover_path = $new_cover->store('images/blog', 'public');
                $post->cover = "/storage/$new_cover_path";
            }

            $post->title        = $request->title;
            $post->slug         = $request->slug;
            $post->user_id      = Auth::user()->id;
            $post->category_id  = $request->category;
            $post->desc         = $request->desc;
            $post->keywords     = $request->keywords;
            $post->meta_desc    = $request->meta_desc;
            $post->save();

            $post->tags()->sync($request->tags);

            return redirect()->route('posts.index')->with(['message' => "Data berhasil di simpan", "action" => 'success']);
        }
        return Redirect::back()->withErrors(['cover' => "Format cover yang anda masukkan salah"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        $post->delete();

        return redirect()->route('posts.index')->with(['message' => 'Data berhasil dihapus','action' => "delete"]);
    }

    public function trash()
    {
        $posts = Post::onlyTrashed()->get();
        return view('posts.trash', compact('posts'));
    }
    public function restore($id)
    {
        $post = Post::withTrashed()->findOrFail($id);

        if ($post->trashed()) {
            $post->restore();
            return redirect()->back()->with('success', 'Data successfully restored');
        } else {
            return redirect()->back()->with('error', 'Data is not in trash');
        }
    }
    public function deletePermanent($id)
    {
        $post = Post::withTrashed()->findOrFail($id);

        if (!$post->trashed()) {

            return redirect()->back()->with('error', 'Data is not in trash');
        } else {

            $post->tags()->detach();


            if ($post->cover && file_exists(storage_path('app/public/' . $post->cover))) {
                Storage::delete('public/' . $post->cover);
            }

            $post->forceDelete();

            return redirect()->back()->with('success', 'Data deleted successfully');
        }
    }
}
