<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divorce extends Model
{
    use HasFactory;

       protected $fillable = [
        'certifica_divo',
        'jugemen_divo',
        'fk_homme_id',
        'fk_femme_id',
        'fk_agent_id',
    ];
    
    public function citoyens_h()
    {
        return $this->belongsTo(User::class, 'fk_homme_id', 'id');
    }

    public function citoyens_f()
    {
        return $this->belongsTo(User::class, 'fk_femme_id', 'id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'fk_agent_id', 'id');
    }

}
