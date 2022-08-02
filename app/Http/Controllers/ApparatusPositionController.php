<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApparatusPosition;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
class ApparatusPositionController extends Controller
{

    public function index(){
        $user = Auth::user();
        $apparatus_positions = ApparatusPosition::all();
        return Inertia::render('ApparatusPositionDashboard',['apparatus_positions' => $apparatus_positions,'user' => $user]);
    }

    public function create()
    {
        $user = Auth::user();
        return Inertia::render('ApparatusPositionDashboardCreate',['user' => $user]);
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
            "position" => ['required','unique:apparatus_positions'],
        ]);
        ApparatusPosition::create([
            "position" => $request->position,
        ]);
        return Redirect::route('apparatus-position.index')->with(['message' => "Data berhasil di simpan","action" => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();
        $apparatus_position = ApparatusPosition::findOrFail($id);
        return Inertia::render('ApparatusPositionDashboardEdit',[
            'apparatus_position' => $apparatus_position,
            'action' => 'show',
            'user' => $user
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
        $apparatus_position = ApparatusPosition::findOrFail($id);
        return Inertia::render('ApparatusPositionDashboardEdit',[
            'apparatus_position' => $apparatus_position,
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
            "position" => ['required','unique:apparatus_positions'],
        ]);
        $apparatus_position = ApparatusPosition::findOrFail($id);
        $apparatus_position->position = $request->position;
        $apparatus_position->save();
        return Redirect::route("apparatus-position.index")->with(['message'=> "Data berhasil di update","action" => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $apparatus_position = ApparatusPosition::findOrFail($id);
        $apparatus_position->delete();
        return Redirect::route('apparatus-position.index')->with(["message" => "Data berhasil dihapus","action" => "delete"]);
    }
}
