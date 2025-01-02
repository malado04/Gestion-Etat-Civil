<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dece extends Model
{
    use HasFactory;
   protected $fillable = [
        'date_dece',
        'lieu_dece',
        'certifica_dece',
        'cni_def',
        'cni_temoin',
        'fk_temoin_id',
        'fk_defun_id',
        'fk_agent_id',
    ];
    
     public function citoyen_def()
    {
        return $this->belongsTo(User::class, 'fk_defun_id', 'id');
    }


     public function citoyens_tem()
    {
        return $this->belongsTo(User::class, 'fk_temoin_id', 'id');
    }


    public function citoyens_f()
    {
        return $this->belongsTo(User::class, 'fk_agent_id', 'id');
    }

}
