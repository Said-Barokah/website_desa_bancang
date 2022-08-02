<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use App\Models\VillageApparatusStructure;
use App\Models\Villager;
use App\Models\ApparatusPosition;
use Illuminate\Support\Facades\Auth;
class VillageApparatusStructureController extends Controller
{
    public function index(){
        $user = Auth::user();
        $village_apparatus_structures = VillageApparatusStructure::with('villager')->with('position')->get();
        return Inertia::render('VillageApparatusStructureDashboard',['village_apparatus_structures' => $village_apparatus_structures,'user' => $user]);
    }

    public function create()
    {
        $user = Auth::user();
        $villagers = Villager::all();
        $apparatus_positions = ApparatusPosition::all();
        return Inertia::render('VillageApparatusStructureDashboardCreate',['villagers' => $villagers,'apparatus_positions' => $apparatus_positions,'user' => $user]);
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
            "apparatus_id" => ['required'],
            "position_id" => ['required'],
            "from_year" => ['required'],
            "to_year" => ['required']
        ]);
        $cover  = $request->file('photo_path');
        if($cover){
            $cover_path     = $cover->store('images/profil', 'public');
            $cover_path   = "/storage/$cover_path";
        }
        VillageApparatusStructure::create([
            "photo_path" => $cover_path,
            "apparatus_id" => $request->apparatus_id,
            "position_id" => $request->position_id,
            "from_year" => $request->from_year,
            "to_year" => $request->to_year
        ]);
        return Redirect::route('village-apparatus-structure.index')->with(['message' => "Data berhasil di simpan","action" => 'success']);
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
        $apparatus_position = VillageApparatusStructure::findOrFail($id);
        return Inertia::render('VillageApparatusStructureDashboardEdit',[
            'apparatus_position' => $apparatus_position,
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
        $village_apparatus_structure = VillageApparatusStructure::findOrFail($id);
        $villagers = Villager::all();
        $apparatus_positions = ApparatusPosition::all();
        return Inertia::render('VillageApparatusStructureDashboardEdit',[
            'village_apparatus_structure' => $village_apparatus_structure,
            'action' => 'edit',
            'villagers' => $villagers,
            'apparatus_positions' => $apparatus_positions,
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
            "apparatus_id" => ['required'],
            "position_id" => ['required'],
            "from_year" => ['required'],
            "to_year" => ['required']
        ]);

        $village_apparatus_structures = VillageApparatusStructure::findOrFail($id);
        $new_photo_path = $request->file('photo_path');
        if($new_photo_path){
            $sub_photo_path = substr("$village_apparatus_structures->photo_path",8);
            if($village_apparatus_structures->photo_path && Storage::disk('public')->exists($sub_photo_path)){
                Storage::disk('public')->delete($sub_photo_path);
            }
            $photo_path = $new_photo_path->store('images/profil', 'public');
            $village_apparatus_structures->photo_path = "/storage/$photo_path";
        }
        $village_apparatus_structures->apparatus_id = $request->apparatus_id;
        $village_apparatus_structures->position_id = $request->position_id;
        $village_apparatus_structures->from_year = $request->from_year;
        $village_apparatus_structures->to_year = $request->to_year;
        $village_apparatus_structures->save();
        return Redirect::route("village-apparatus-structure.index")->with(['message'=> "Data berhasil di update","action" => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $village_apparatus_structures = VillageApparatusStructure::findOrFail($id);
        $village_apparatus_structures->delete();
        return Redirect::route('village-apparatus-structure.index')->with(["message" => "Data berhasil dihapus","action" => "delete"]);
    }

}
