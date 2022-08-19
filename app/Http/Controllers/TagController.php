<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $tags = Tag::latest()->simplePaginate(10);
        $keyword = $request->input('keyword');
        if ($keyword != '') {
            // return dd($keyword);
            $tags = Tag::select('tags.id', 'tags.name', 'tags.keywords','tags.created_at')
                ->where('tags.name', 'LIKE', "%{$keyword}%")
                ->orWhere('tags.keywords', 'LIKE', "%{$keyword}%")
                ->latest()
                ->simplePaginate(10);
        }
        return Inertia('TagDashboard',['tags' => $tags,'user' => $user, 'keyword' => $keyword]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return Inertia::render('TagDashboardCreate',['user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            "name" => ['required', 'unique:tags,name'],
            "slug" => ['required', 'unique:tags,slug'],
            "keywords" => ['required'],
            "meta_desc" => ['required']
        ]);
        Tag::create([
            "name" => $request->name,
            "slug" => Str::slug($request->name),
            "keywords" => $request->keywords,
            "meta_desc" => $request->meta_desc
        ]);
        return Redirect::route('tags.index')->with(['message' => "Data berhasil di simpan","action" => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $tag = Tag::findOrFail($id);
        return Inertia::render('TagDashboardEdit',[
            'tag' => $tag,
            'action' => 'show',
    ]);
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
        $tag = Tag::findOrFail($id);
        return Inertia::render('TagDashboardEdit',[
            'tag' => $tag,
            'action' => 'edit',
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
        $validate = $request->validate([
            "name" => ['required', 'unique:tags,name'.$id],
            "slug" => ['required', 'unique:tags,name'.$id],
            "keywords" => ['required'],
            "meta_desc" => ['required']
        ]);


        $tag = Tag::findOrFail($id);
        $tag->name = $request->name;
        $tag->slug = Str::slug($request->slug);
        $tag->keywords = $request->keywords;
        $tag->meta_desc = $request->meta_desc;
        $tag->save();
        return Redirect::route("tags.index")->with(['message'=> "Data berhasil di update","action" => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();
        return Redirect::route('tags.index')->with(["message" => "Data berhasil dihapus","action" => "delete"]);
    }
}
