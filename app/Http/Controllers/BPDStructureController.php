<?php

namespace App\Http\Controllers;

use App\Models\BPDStructure;
use App\Models\ManagementPosition;
use App\Models\Villager;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BPDStructureController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $b_p_d_structures = BPDStructure::with('villager')->with('position')->latest()->simplePaginate(10);
        $keyword = $request->input('keyword');
        if ($keyword != '') {
            // return dd($keyword);
            $b_p_d_structures = BPDStructure::select('b_p_d_structures.id', 'b_p_d_structures.from_year', 'b_p_d_structures.to_year', 'b_p_d_structures.position_id', 'b_p_d_structures.manager_id', 'b_p_d_structures.created_at')
                ->join('villagers', 'b_p_d_structures.manager_id', '=', 'villagers.id')
                ->join('management_positions', 'b_p_d_structures.position_id', '=', 'management_positions.id')
                ->where('b_p_d_structures.from_year', 'LIKE', "%{$keyword}%")
                ->orWhere('b_p_d_structures.to_year', 'LIKE', "%{$keyword}%")
                ->orWhere('villagers.name', 'LIKE', "%{$keyword}%")
                ->orWhere('villagers.nik', 'LIKE', "%{$keyword}%")
                ->orWhere('management_positions.position', 'LIKE', "%{$keyword}%")
                ->orderBy('b_p_d_structures.from_year', 'DESC')
                ->with('villager')
                ->with('position')
                ->latest()
                ->simplePaginate(10);
        }
        return Inertia::render('BPDStructureDashboard', ['b_p_d_structures' => $b_p_d_structures, 'user' => $user, 'keyword' => $keyword]);
    }

    public function create()
    {
        $user = Auth::user();
        $villagers = Villager::all();
        $manager_positions = ManagementPosition::all();
        return Inertia::render('BPDStructureDashboardCreate', ['villagers' => $villagers, 'manager_positions' => $manager_positions, 'user' => $user]);
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
            "manager_id" => ['required'],
            "position_id" => ['required'],
            "from_year" => 'required|string|min:4|max:4|regex:/^[12][0-9]{3}$/',
            "to_year" => 'required|string|min:4|max:4|regex:/^[12][0-9]{3}$/'
        ]);
        if ($validator->fails()) {
            return redirect()->route('BPD-structure.index')
                ->withErrors($validator)
                ->withInput();
        }
        $b_p_d_structure = new BPDStructure();
        if ($request->file('photo_path') != null) {
            if ($request->file('photo_path')->extension() == 'jpg' || $request->file('photo_path')->extension() == 'png' || $request->file('photo_path')->extension() == 'jpeg') {
                $cover  = $request->file('photo_path');
                if ($cover) {
                    $cover_path     = $cover->store('images/profil', 'public');
                    $b_p_d_structure->photo_path  = "/storage/$cover_path";
                }
            } else {
                return redirect()->route('BPD-structure.index')->withErrors(["photo_path" => "data gagal disimpan - format foto profil yang anda masukkan salah"]);
            }
        }
        $b_p_d_structure->manager_id = $request->manager_id;
        $b_p_d_structure->position_id = $request->position_id;
        $b_p_d_structure->from_year = $request->from_year;
        $b_p_d_structure->to_year = $request->to_year;
        $b_p_d_structure->save();
        return Redirect::route('BPD-structure.index')->with(['message' => "Data berhasil di simpan", "action" => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $apparatus_position = BPDStructure::findOrFail($id);
        return Inertia::render('BPDStructureDashboardEdit', [
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
        $b_p_d_structure = BPDStructure::findOrFail($id);
        $villagers = Villager::all();
        $manager_positions = ManagementPosition::all();
        return Inertia::render('BPDStructureDashboardEdit', [
            'b_p_d_structure' => $b_p_d_structure,
            'action' => 'edit',
            'villagers' => $villagers,
            'manager_positions' => $manager_positions,
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
            "manager_id" => ['required'],
            "position_id" => ['required'],
            "from_year" => 'required|string|min:4|max:4|regex:/^[12][0-9]{3}$/',
            "to_year" => 'required|string|min:4|max:4|regex:/^[12][0-9]{3}$/'
        ]);

        if ($validator->fails()) {
            return redirect()->route('BPD-structure.index')
                ->withErrors($validator)
                ->withInput();
        }

        $b_p_d_structure = BPDStructure::findOrFail($id);
        $new_photo_path = $request->file('photo_path');
        if ($request->file('photo_path') != null) {
            if ($request->file('photo_path')->extension() == 'jpg' || $request->file('photo_path')->extension() == 'png' || $request->file('photo_path')->extension() == 'jpeg') {
                if ($new_photo_path) {
                    $sub_photo_path = substr("$b_p_d_structure->photo_path", 8);
                    if ($b_p_d_structure->photo_path && Storage::disk('public')->exists($sub_photo_path)) {
                        Storage::disk('public')->delete($sub_photo_path);
                    }
                    $photo_path = $new_photo_path->store('images/profil', 'public');
                    $b_p_d_structure->photo_path = "/storage/$photo_path";
                }
            } else {
                return redirect()->route('BPD-structure.index')->withErrors(["photo_path" => "data gagal disimpan - format foto profil yang anda masukkan salah"]);
            }
        }
        $b_p_d_structure->manager_id = $request->manager_id;
        $b_p_d_structure->position_id = $request->position_id;
        $b_p_d_structure->from_year = $request->from_year;
        $b_p_d_structure->to_year = $request->to_year;
        $b_p_d_structure->save();
        return Redirect::route("BPD-structure.index")->with(['message' => "Data berhasil di update", "action" => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $b_p_d_structure = BPDStructure::findOrFail($id);
        $b_p_d_structure->delete();
        return Redirect::route('BPD-structure.index')->with(["message" => "Data berhasil dihapus", "action" => "delete"]);
    }
}
