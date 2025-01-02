<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\User;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id',
        'name',
        'code_agent',
        'cni_rgi',
        'prenom',
        'nom',
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
        'email',
        'password',
        'centre_sani',//Hopithal, clinique, dispensaire
        'agent_id',
        'admin',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
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
     public function users()
    {
        return $this->hasOne(User::class, 'agent_id', 'id');
    }

      /* Funcion que obtiene la imagen de perfil de un usuario */
    // public function adminlte_image()
    // {
    //     $profile = Profile::where('user_id', $this->id)->first();

    //     $photo = 'storage/users/' . $profile->avatar;

    //     return $photo;
    // }

    // /* Funcion que obtiene el rol de un usuario */
    // public function adminlte_desc()
    // {
    //     $user = User::find($this->id);
    //     if (isset($user->roles[0]->name)) {
    //         $role  = $user->roles[0]->name;
    //     } else {
    //         $role  = "No tiene rol";
    //     }

    //     if (isset($user->departaments[0]->name)) {
    //         $departament  = $user->departaments[0]->name;
    //     } else {
    //         $departament  = "No tiene departamento";
    //     }

    //     $info = strtoupper($departament) . '  -  ' . strtoupper($role);
    //     return $info;
    //     /* return $departament . '-' . $role; */
    // }



    // /* Función que obtiene la ruta del perfil de un usuario */
    // public function adminlte_profile_url()
    // {
    //     return 'profile';
    // }

    // /* Un usuario tiene un solo perfil */
    // public function profile()
    // {
    //     /* $profile = Profile::where('user_id', $this->id)->firts(); */

    //     return $this->hasOne(Profile::class);
    // }

    // /* Un usuario tiene una posisición a travez de Profile(perfil) */
    // public function position()
    // {
    //     return $this->hasOneThrough(Position::class, Profile::class);
    // }
    // public function groups()
    // {
    //     return $this->belongsToMany(Group::class)->withTimestamps();
    // }

    // /* Un usuario pertenece a uno o muchos roles */
    // public function roles()
    // {
    //     return $this->belongsToMany(Role::class)->withTimestamps();
    // }

    // //Funcion que verifica si el usuario tiene o no permiso que se le asigne
    // public function havePermission($permiso)
    // {
    //     foreach ($this->roles as $role) {
    //         if ($role['fullAccess'] == "yes") {
    //             return true;
    //         }
    //         foreach ($role->permissions as $perm) {
    //             if ($perm->slug == $permiso) {
    //                 return true;
    //             }
    //         }
    //     }
    //     return false;
    // }
}
