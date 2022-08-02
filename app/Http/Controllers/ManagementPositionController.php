<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ManagementPosition;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
class ManagementPositionController extends Controller
{
    public function index(){
        $user = Auth::user();
        $management_positions = ManagementPosition::all();
        return Inertia::render('ManagementPositionDashboard',['management_positions' => $management_positions,'user' => $user]);
    }

    public function create()
    {
        $user = Auth::user();
        return Inertia::render('ManagementPositionDashboardCreate',['user' => $user]);
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
        ManagementPosition::create([
            "position" => $request->position,
        ]);
        return Redirect::route('management-position.index')->with(['message' => "Data berhasil di simpan","action" => 'success']);
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
        $management_position = ManagementPosition::findOrFail($id);
        return Inertia::render('ManagementPositionDashboardEdit',[
            'management_position' => $management_position,
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
        $management_position = ManagementPosition::findOrFail($id);
        return Inertia::render('ManagementPositionDashboardEdit',[
            'management_position' => $management_position,
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
            "position" => ['required','unique:management_positions'],
        ]);
        $management_position = ManagementPosition::findOrFail($id);
        $management_position->position = $request->position;
        $management_position->save();
        return Redirect::route("management-position.index")->with(['message'=> "Data berhasil di update","action" => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $management_position = ManagementPosition::findOrFail($id);
        $management_position->delete();
        return Redirect::route('management-position.index')->with(["message" => "Data berhasil dihapus","action" => "delete"]);
    }
}
