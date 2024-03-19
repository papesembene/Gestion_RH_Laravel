<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Poste extends Model
{
    protected $fillable = ['nom'];

    public function departements()
    {
        return $this->belongsToMany(Departement::class);
    }

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
