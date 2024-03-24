<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    protected  $table = 'equipes';
    protected $fillable = ['nom', 'chef'];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function postes()
    {
        return $this->hasMany(Poste::class);
    }
}
