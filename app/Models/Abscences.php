<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absences extends Model
{
    protected $fillable = ['description', 'datedebut', 'datefin'];

    public function employees()
    {
        return $this->belongsToMany(Employee::class);
    }
}
