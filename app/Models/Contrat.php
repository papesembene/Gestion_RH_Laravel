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
    public function Employees()
    {
        return $this->belongsToMany(Contrat::class,'employees_contrats',
            'employee_id','contrat_id')
            ->withPivot('datedebut','datefin');
    }
}
