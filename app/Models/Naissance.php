<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Naissance extends Model
{
    use HasFactory;
      public function citoyen()
    {
        return $this->belongsTo(Citoyen::class);
    }
}
