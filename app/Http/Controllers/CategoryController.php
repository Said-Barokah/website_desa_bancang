<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Category;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $categories = Category::all();
        return Inertia('CategoryDashboard',['categories' => $categories,'user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return Inertia::render('CategoryDashboardCreate',['user' => $user]);
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
            "name" => ['required', 'unique:categories'],
            "slug" => ['required', 'unique:categories'],
            "keywords" => ['required'],
            "meta_desc" => ['required']
        ]);
        Category::create([
            "name" => $request->name,
            "slug" => Str::slug($request->name),
            "keywords" => $request->keywords,
            "meta_desc" => $request->meta_desc
        ]);
        return Redirect::route('categories.index')->with(['message' => "Data berhasil di simpan","action" => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);
        return Inertia::render('CategoryDashboardEdit',[
            'category' => $category,
            'action' => 'show'
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
        $category = Category::findOrFail($id);
        return Inertia::render('CategoryDashboardEdit',[
            'category' => $category,
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
            "name" => ['required'],
            "slug" => ['required'],
            "keywords" => ['required'],
            "meta_desc" => ['required']
        ]);

        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->slug = Str::slug($request->slug);
        $category->keywords = $request->keywords;
        $category->meta_desc = $request->meta_desc;
        $category->save();
        return Redirect::route("categories.index")->with(['message'=> "Data berhasil di update","action" => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return Redirect::route('categories.index')->with(["message" => "Data berhasil dihapus","action" => "delete"]);
    }
}
