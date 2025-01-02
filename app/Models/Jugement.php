<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jugement extends Model
{
    use HasFactory;

   protected $fillable = [
        'certificat_non',
        'certificat_daccouchement',
        'certificat_temoin1',
        'certificat_temoin2',
        'quit_paiem',
        'fiche_vacc',
        'fk_jum_id',
        'fk_user_id',
    ];

    public function citoyen_id()
    {
        return $this->belongsTo(User::class, 'fk_jum_id', 'id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'fk_user_id', 'id');
    }

}
