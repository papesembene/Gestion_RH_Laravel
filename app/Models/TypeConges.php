<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeConges extends Model
{
    protected $fillable = ['nom'];

    public function conges()
    {
        return $this->hasMany(Conges::class);
    }
}
