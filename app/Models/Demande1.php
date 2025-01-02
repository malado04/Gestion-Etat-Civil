<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'description',
        'fk_dem_id',
        'fk_agent_id',
    ];

    public function demande_cit(){

        return $this->belongTo(Citoyen::class, 'fk_dem_id', 'id');

    }

    public function agent_id(){

        return $this->belongTo(Citoyen::class, 'fk_agent_id', 'id');

    }

}
