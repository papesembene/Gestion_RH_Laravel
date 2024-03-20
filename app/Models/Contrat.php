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
    ];

    public function typeContrat()
    {
        return $this->belongsTo(TypeContrat::class);
    }

    public function employees()
    {
        return $this->belongsTo(Employee::class,);
    }
}
