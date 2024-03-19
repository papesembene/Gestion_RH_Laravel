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
    public function Employees()
    {
        return $this->belongsToMany(Talent::class,'employees_talents',
            'employee_id','talent_id');
    }
}
