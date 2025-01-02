<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'type',
        'nmb_copies',
        'description',
        'fk_dem_id',
        'fk_agent_id',
    ];

    public function demande_cit(){

        return $this->belongsTo(User::class, 'fk_dem_id', 'id');

    }

    public function agent_id(){

        return $this->belongsTo(User::class, 'fk_agent_id', 'id');

    }

}

