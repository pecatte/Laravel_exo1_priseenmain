<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livre extends Model
{
    use HasFactory;

    public function user()
    {
    //  ==> site expliquant très bien les divers types de relation
      //  https://laravel.sillo.org/les-relations-avec-eloquent-12/
        return $this->belongsTo(User::class); //, 'id','user_id');
    }
    public function categorie()
    {
        return $this->belongsTo(Categorie::class); //, 'id','categorie_id');
    }
}
