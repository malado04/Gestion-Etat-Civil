<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citoyen extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $guard = 'citoyen';
   
    protected $fillable = [
        'id',
        'code_agent',
        'cni_rgi',
        'prenom',
        'nom',
        'email',
        'password',
        'sexe',
        'age',
        'date_naissance',
        'heure_naissance',
        'lieu_naissance',
        'profession',
        // 'domicile',
        'tel',
        'quartier',
        'ville',
        'nationalite',
        'cni_pere',
        'cni_mere',
        'dece',
        'centre_sani',//Hopithal, clinique, dispensaire
        'agent_id',
    ];
   
     public function citoyen_pere_id()
    {
        return $this->belongsTo(User::class, 'cni_pere', 'id');
    }

     public function citoyen_mere_id()
    {
        return $this->belongsTo(User::class, 'cni_mere', 'id');
    }

     public function agents()
    {
        return $this->belongsTo(User::class, 'agent_id', 'id');
    }

    public function getAuthPassword()
    {
     return $this->password;
    }
   
    // public function naissance()
    // {
    //     return $this->hasOne(Naissance::class, 'agent_id', 'id');
    // }
    // public function mariage()
    // {
    //     return $this->hasOne(Mariage::class, 'agent_id', 'id');
    // }
    //  public function divorce()
    // {
    //     return $this->hasOne(Divorce::class, 'agent_id', 'id');
    // }
    //  public function rdvs()
    // {
    //     return $this->hasMany(Rdv::class,'citoyen_id');
    // }
    //  public function dossiers()
    // {
    //     return $this->hasMany(Rdv::class, 'agent_id', 'id');
    // }
}
