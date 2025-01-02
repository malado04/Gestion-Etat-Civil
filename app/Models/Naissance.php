<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Naissance extends Model
{
    use HasFactory;





      protected $fillable = [
        'certificat_non',
        'certificat_naissance',
        'citoyen_id',
        'cni_temoin1',
        'cni_temoin2',
        'n_profession_pere',
        'n_domicile_pere',
        'n_profession_mere',
        'n_domicile_mere',
        'date_trans_regis',
        'pere_id',
        'mere_id',
        'cni_pere',
        'cni_mere',
        'agent_id',
    ];

   public function pere()
    {
        return $this->belongsTo(User::class, 'pere_id', 'id');
    }
   public function mere()
    {
        return $this->belongsTo(User::class, 'mere_id', 'id');
    } 
   public function citoyens()
    {
        return $this->belongsTo(User::class, 'citoyen_id', 'id');
    }

   public function users()
    {
        return $this->belongsTo(User::class, 'agent_id', 'id');
    }

}
