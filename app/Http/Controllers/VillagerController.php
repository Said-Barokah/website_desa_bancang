<?php

namespace App\Http\Controllers;

use App\Models\Villager;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
class VillagerController extends Controller
{
    public function index(){
        $user = Auth::user();
        $villagers = Villager::all();
        return Inertia::render('VillagerDashboard',['villagers' => $villagers, 'user' => $user]);
    }

    public function create()
    {
        $user = Auth::user();
        return Inertia::render('VillagerDashboardCreate',['user' => $user]);
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
            "nik" => ['required', 'unique:villagers'],
            "name" => ['required'],
        ]);
        Villager::create([
            "nik" => $request->nik,
            "name" => $request->name,
        ]);
        return Redirect::route('villagers.index')->with(['message' => "Data berhasil di simpan","action" => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $villager = Villager::findOrFail($id);
        return Inertia::render('VillagerDashboardEdit',[
            'villager' => $villager,
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
        $villager = Villager::findOrFail($id);
        return Inertia::render('VillagerDashboardEdit',[
            'villager' => $villager,
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
            "nik" => ['required','unique:villagers'],
            "name" => ['required'],
        ]);
        $villager = Villager::findOrFail($id);
        $villager->nik = $request->nik;
        $villager->name = $request->name;
        $villager->save();
        return Redirect::route("villagers.index")->with(['message'=> "Data berhasil di update","action" => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $villager = Villager::findOrFail($id);
        $villager->delete();
        return Redirect::route('villagers.index')->with(["message" => "Data berhasil dihapus","action" => "delete"]);
    }
}
