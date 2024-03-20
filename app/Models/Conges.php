<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conges extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'type_id',
        'employee_id',
        'datedebut',
        'datefin'
    ];

    public function typeConges()
    {
        return $this->belongsTo(TypeConges::class);
    }

    public function employees()
    {
        return $this->belongsTo(Employee::class , );
    }
}
