<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeContrat extends Model
{
    protected $fillable = ['nom'];

    public function contrats()
    {
        return $this->hasMany(Contrat::class);
    }
}
