<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VillageApparatusStructure extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function position()
    {
        return $this->belongsTo(ApparatusPosition::class,'position_id','id');
    }
    public function villager(){
        return $this->belongsTo(Villager::class, 'apparatus_id','id');
    }
}
