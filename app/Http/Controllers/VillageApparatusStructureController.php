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
use Illuminate\Support\Facades\Validator;

class VillageApparatusStructureController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $village_apparatus_structures = VillageApparatusStructure::with('villager')->with('position')->latest()->simplePaginate(10);
        $keyword = $request->input('keyword');
        if ($keyword != '') {
            // return dd($keyword);
            $village_apparatus_structures = VillageApparatusStructure::select('village_apparatus_structures.id', 'village_apparatus_structures.from_year', 'village_apparatus_structures.to_year', 'village_apparatus_structures.position_id', 'village_apparatus_structures.apparatus_id', 'village_apparatus_structures.created_at')
                ->join('villagers', 'village_apparatus_structures.apparatus_id', '=', 'villagers.id')
                ->join('apparatus_positions', 'village_apparatus_structures.position_id', '=', 'apparatus_positions.id')
                ->where('village_apparatus_structures.from_year', 'LIKE', "%{$keyword}%")
                ->orWhere('village_apparatus_structures.to_year', 'LIKE', "%{$keyword}%")
                ->orWhere('villagers.name', 'LIKE', "%{$keyword}%")
                ->orWhere('villagers.nik', 'LIKE', "%{$keyword}%")
                ->orWhere('apparatus_positions.position', 'LIKE', "%{$keyword}%")
                ->orderBy('village_apparatus_structures.to_year', 'DESC')
                ->with('villager')
                ->with('position')
                ->latest()
                ->simplePaginate(10);
        }
        return Inertia::render('VillageApparatusStructureDashboard', ['village_apparatus_structures' => $village_apparatus_structures, 'user' => $user, 'keyword' => $keyword]);
    }

    public function create()
    {
        $user = Auth::user();
        $villagers = Villager::all();
        $apparatus_positions = ApparatusPosition::all();
        return Inertia::render('VillageApparatusStructureDashboardCreate', ['villagers' => $villagers, 'apparatus_positions' => $apparatus_positions, 'user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "apparatus_id" => ['required'],
            "position_id" => ['required'],
            "from_year" => 'required|string|min:4|max:4|regex:/^[12][0-9]{3}$/',
            "to_year" => 'required|string|min:4|max:4|regex:/^[12][0-9]{3}$/'
        ]);
        if ($validator->fails()) {
            return redirect()->route('village-apparatus-structure.index')
                ->withErrors($validator)
                ->withInput();
        }
        $cover  = $request->file('photo_path');
        $cover_path = null;
        if ($request->file('photo_path') != null) {
            if ($request->file('photo_path')->extension() == 'jpg' || $request->file('photo_path')->extension() == 'png' || $request->file('photo_path')->extension() == 'jpeg') {
                if ($cover) {
                    $cover_path     = $cover->store('images/profil', 'public');
                    $cover_path   = "/storage/$cover_path";
                }
            } else {
                return redirect()->route('village-apparatus-structure.index')->withErrors(["photo_path" => "data gagal disimpan - format foto profil yang anda masukkan salah"]);
            }
        }
        $village_apparatus_structure = new VillageApparatusStructure();
        $village_apparatus_structure->photo_path = $cover_path;
        $village_apparatus_structure->apparatus_id = $request->apparatus_id;
        $village_apparatus_structure->position_id = $request->position_id;
        $village_apparatus_structure->from_year = $request->from_year;
        $village_apparatus_structure->to_year = $request->to_year;
        $village_apparatus_structure->save();
        return Redirect::route('village-apparatus-structure.index')->with(['message' => "Data berhasil di simpan", "action" => 'success']);
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
        return Inertia::render('VillageApparatusStructureDashboardEdit', [
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
        return Inertia::render('VillageApparatusStructureDashboardEdit', [
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
        $validator = Validator::make($request->all(), [
            "apparatus_id" => ['required'],
            "position_id" => ['required'],
            "from_year" => 'required|string|min:4|max:4|regex:/^[12][0-9]{3}$/',
            "to_year" => 'required|string|min:4|max:4|regex:/^[12][0-9]{3}$/'
        ]);

        if ($validator->fails()) {
            return redirect()->route('village-apparatus-structure.index')
                ->withErrors($validator)
                ->withInput();
        }

        $village_apparatus_structures = VillageApparatusStructure::findOrFail($id);
        $new_photo_path = $request->file('photo_path');
        if ($request->file('photo_path') != null) {
            if ($request->file('photo_path')->extension() == 'jpg' || $request->file('photo_path')->extension() == 'png' || $request->file('photo_path')->extension() == 'jpeg') {
                if ($new_photo_path) {
                    $sub_photo_path = substr("$village_apparatus_structures->photo_path", 8);
                    if ($village_apparatus_structures->photo_path && Storage::disk('public')->exists($sub_photo_path)) {
                        Storage::disk('public')->delete($sub_photo_path);
                    }
                    $photo_path = $new_photo_path->store('images/profil', 'public');
                    $village_apparatus_structures->photo_path = "/storage/$photo_path";
                }
            } else {
                return redirect()->route('village-apparatus-structure.index')->withErrors(["photo_path" => "data gagal disimpan - format foto profil yang anda masukkan salah"]);
            }
        }
        $village_apparatus_structures->apparatus_id = $request->apparatus_id;
        $village_apparatus_structures->position_id = $request->position_id;
        $village_apparatus_structures->from_year = $request->from_year;
        $village_apparatus_structures->to_year = $request->to_year;
        $village_apparatus_structures->save();
        return Redirect::route("village-apparatus-structure.index")->with(['message' => "Data berhasil di update", "action" => 'success']);
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
        return Redirect::route('village-apparatus-structure.index')->with(["message" => "Data berhasil dihapus", "action" => "delete"]);
    }
}
