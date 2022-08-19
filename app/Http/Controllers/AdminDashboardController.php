<?php

namespace App\Http\Controllers;

use App\Models\BPDStructure;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\VillageApparatusStructure;
use App\Models\Villager;

class AdminDashboardController extends Controller
{
    public function index(){
        $user = Auth::user();
        $village_apparatus_structures = VillageApparatusStructure::with('villager')->with('position')->latest()->simplePaginate(10);
        $totalPost = Post::all()->count();
        $totalVillager = Villager::all()->count();
        $totalApparatus = VillageApparatusStructure::all()->count();
        $totalBPD = BPDStructure::all()->count();
        return Inertia::render('Dashboard',
            [
                'totalPost' => $totalPost,
                'totalVillager' => $totalVillager,
                'totalApparatus' => $totalApparatus,
                'totalBPD' => $totalBPD,
                'user' => $user,
                'village_apparatus_structures' => $village_apparatus_structures
            ]
    );
    }
}
