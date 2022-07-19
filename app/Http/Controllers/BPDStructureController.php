<?php

namespace App\Http\Controllers;

use App\Models\BPDStructure;
use App\Models\ManagementPosition;
use App\Models\Villager;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
class BPDStructureController extends Controller
{
    public function index(){
        $b_p_d_structures = BPDStructure::with('villager')->with('position')->get();
        return Inertia::render('BPDStructureDashboard',['b_p_d_structures' => $b_p_d_structures]);
    }

    public function create()
    {
        $villagers = Villager::all();
        $manager_positions = ManagementPosition::all();
        return Inertia::render('BPDStructureDashboardCreate',['villagers' => $villagers,'manager_positions' => $manager_positions]);
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
            "manager_id" => ['required'],
            "position_id" => ['required'],
            "from_year" => ['required'],
            "to_year" => ['required']
        ]);
        $cover  = $request->file('photo_path');
        if($cover){
            $cover_path     = $cover->store('images/profil', 'public');
            $cover_path   = "/storage/$cover_path";
        }
        BPDStructure::create([
            "photo_path" => $cover_path,
            "manager_id" => $request->manager_id,
            "position_id" => $request->position_id,
            "from_year" => $request->from_year,
            "to_year" => $request->to_year
        ]);
        return Redirect::route('BPD-structure.index')->with(['message' => "Data berhasil di simpan","action" => 'success']);
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
        return Inertia::render('BPDStructureDashboardEdit',[
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
        $b_p_d_structure = BPDStructure::findOrFail($id);
        $villagers = Villager::all();
        $manager_positions = ManagementPosition::all();
        return Inertia::render('BPDStructureDashboardEdit',[
            'b_p_d_structure' => $b_p_d_structure,
            'action' => 'edit',
            'villagers' => $villagers,
            'manager_positions' => $manager_positions
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
            "manager_id" => ['required'],
            "position_id" => ['required'],
            "from_year" => ['required'],
            "to_year" => ['required']
        ]);

        $b_p_d_structure = BPDStructure::findOrFail($id);
        $new_photo_path = $request->file('photo_path');
        if($new_photo_path){
            $sub_photo_path = substr("$b_p_d_structure->photo_path",8);
            if($b_p_d_structure->photo_path && Storage::disk('public')->exists($sub_photo_path)){
                Storage::disk('public')->delete($sub_photo_path);
            }
            $photo_path = $new_photo_path->store('images/profil', 'public');
            $b_p_d_structure->photo_path = "/storage/$photo_path";
        }
        $b_p_d_structure->manager_id = $request->manager_id;
        $b_p_d_structure->position_id = $request->position_id;
        $b_p_d_structure->from_year = $request->from_year;
        $b_p_d_structure->to_year = $request->to_year;
        $b_p_d_structure->save();
        return Redirect::route("BPD-structure.index")->with(['message'=> "Data berhasil di update","action" => 'success']);
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
        return Redirect::route('BPD-structure.index')->with(["message" => "Data berhasil dihapus","action" => "delete"]);
    }
}
