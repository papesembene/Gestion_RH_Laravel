<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conges extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'type_id'
    ];

    public function typeConges()
    {
        return $this->belongsTo(TypeConges::class);
    }

    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'employees_conges', 'conges_id', 'employee_id')
            ->withPivot('datedebut', 'datefin');
    }
}
