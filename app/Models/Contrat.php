<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrat extends Model
{
    use HasFactory;

    protected $fillable = [
        'salaire',
        'type_id',
        'employee_id',
        'datedebut',
         'datefin'
    ];

    public function typeContrat()
    {
        return $this->belongsTo(TypeContrat::class,'type_id');
    }
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function employees()
    {
        return $this->belongsTo(Employee::class,);
    }
}
