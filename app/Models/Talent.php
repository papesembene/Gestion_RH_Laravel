<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Talent extends Model
{
    use HasFactory;

    protected $fillable = [
        'langue',
        'competence',
        'habilitation',
        'evaluation',
    ];

    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'employees_talents', 'talent_id', 'employee_id');
    }
}
