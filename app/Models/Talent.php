<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Talent extends Model
{
    use HasFactory;
    protected $table = 'talents';
    protected $fillable = [
        'nom',
        'type_talent',

    ];

    public function employees()
    {
        return $this->hasMany(Employee::class, 'employee_id', );
    }
}
