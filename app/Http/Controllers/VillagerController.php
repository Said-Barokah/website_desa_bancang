<?php

namespace App\Http\Controllers;

use App\Models\BloodType;
use App\Models\City;
use App\Models\Gender;
use App\Models\Nationality;
use App\Models\MaritalStatus;
use App\Models\Profession;
use App\Models\Religion;
use App\Models\Villager;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class VillagerController extends Controller
{
    public function index(Request $request){
        $user = Auth::user();
        $villagers = Villager::latest()->simplePaginate(10);
        $keyword = $request->input('keyword');
        if ($keyword != '') {
            // return dd($keyword);
            $villagers = Villager::select('villagers.id', 'villagers.nik', 'villagers.name','villagers.created_at')
                ->where('villagers.name', 'LIKE', "%{$keyword}%")
                ->orWhere('villagers.nik', 'LIKE', "%{$keyword}%")
                ->latest()
                ->simplePaginate(10);
        }
        return Inertia::render('VillagerDashboard',['villagers' => $villagers, 'user' => $user , 'keyword' => $keyword]);
    }

    public function create()
    {
        $user = Auth::user();
        $cities = City::all();
        $genders = Gender::all();
        $blood_types = BloodType::all();
        $religions = Religion::all();
        $marital_statuses = MaritalStatus::all();
        $professions = Profession::all();
        $nationalities= Nationality::all();
        return Inertia::render('VillagerDashboardCreate'
        ,[
            'user' => $user,
            'cities' => $cities,
            'genders' => $genders,
            'religions' => $religions,
            'blood_types' => $blood_types,
            'marital_statuses' => $marital_statuses,
            'professions' => $professions,
            'nationalities' => $nationalities
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator =Validator::make($request->all(), [
            "nik" => 'required| unique:villagers|regex:/^[0-9]{16}$/',
            "name" => ['required',"regex:/^([a-zA-Z'.]|\s)+$/"],
            "places_of_birth" => ['required'],
            "birthday" => ["required","date"],
            "blood_type_id" => ["nullable"],
            "gender_id" => ["required"],
            "religion_id" => ["required"],
            "marital_status_id" => ["required"],
            "profession_id" => ["required"],
            "nationality_id" => ["required"]
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        Villager::create([
            "nik" => $request->nik,
            "name" => strtoupper($request->name),
            "places_of_birth" => $request->places_of_birth,
            "birthday" => $request->birthday,
            "blood_type_id" => $request->blood_type_id,
            "gender_id" => $request->gender_id,
            "religion_id" => $request->religion_id,
            "marital_status_id" => $request->marital_status_id,
            "profession_id" => $request->profession_id,
            "nationality_id" => $request->nationality_id
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
        $cities = City::all();
        $genders = Gender::all();
        $blood_types = BloodType::all();
        $religions = Religion::all();
        $marital_statuses = MaritalStatus::all();
        $professions = Profession::all();
        $nationalities= Nationality::all();
        return Inertia::render('VillagerDashboardEdit',[
            'villager' => $villager,
            'cities' => $cities,
            'genders' => $genders,
            'religions' => $religions,
            'blood_types' => $blood_types,
            'marital_statuses' => $marital_statuses,
            'professions' => $professions,
            'nationalities' => $nationalities
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
        $cities = City::all();
        $genders = Gender::all();
        $blood_types = BloodType::all();
        $religions = Religion::all();
        $marital_statuses = MaritalStatus::all();
        $professions = Profession::all();
        $nationalities= Nationality::all();
        return Inertia::render('VillagerDashboardEdit',[
            'villager' => $villager,
            'action' => 'edit',
            'user' => $user,
            'cities' => $cities,
            'genders' => $genders,
            'religions' => $religions,
            'blood_types' => $blood_types,
            'marital_statuses' => $marital_statuses,
            'professions' => $professions,
            'nationalities' => $nationalities

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
        $validator =Validator::make($request->all(), [
            "nik" => ['required','unique:villagers,nik,'.$id,"regex:/^[0-9]{16}$/"],
            "name" => ['required',"regex:/^([a-zA-Z'.]|\s)+$/"],
            "places_of_birth" => ['required'],
            "birthday" => ["required","date"],
            "blood_type_id" => ["nullable"],
            "gender_id" => ["required"],
            "religion_id" => ["required"],
            "marital_status_id" => ["required"],
            "profession_id" => ["required"],
            "nationality_id" => ["required"]
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $villager = Villager::findOrFail($id);
        $villager->nik = $request->nik;
        $villager->name = strtoupper($request->name);
        $villager->places_of_birth = $request->places_of_birth;
        $villager->birthday = $request->birthday;
        $villager->blood_type_id = $request->blood_type_id;
        $villager->gender_id = $request->gender_id;
        $villager->religion_id = $request->religion_id;
        $villager->marital_status_id = $request->marital_status_id;
        $villager->profession_id = $request->profession_id;
        $villager->nationality_id = $request->nationality_id;
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
