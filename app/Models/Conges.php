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
    public function Employees()
    {
        return $this->belongsToMany(Conges::class,'employees_conges',
            'employee_id','conges_id')
            ->withPivot('datedebut','datefin');
    }
}
