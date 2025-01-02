<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mariage extends Model
{
    use HasFactory;

   protected $fillable = [
        'date_mariage',
        'lieu_mariage',
        'homme_id',
        'femme_id',
        'poly_mono',
        'path',
        'fk_user_id',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'fk_user_id', 'id');
    }

    
     public function citoyens_h()
    {
        return $this->belongsTo(User::class, 'homme_id', 'id');
    }

    public function citoyens_f()
    {
        return $this->belongsTo(User::class, 'femme_id', 'id');
    }

}
