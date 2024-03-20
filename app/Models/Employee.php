<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'sexe',
        'email',
        'adresse',
        'phone',
        'datenaiss',
        'lieunaiss',
        'dateembauche',
        'type',
        'nationalite',
        'poste_id',
        'dept_id',
        'user_id',
    ];

    public function poste()
    {
        return $this->belongsTo(Poste::class);
    }

    public function departement()
    {
        return $this->belongsTo(Departement::class);
    }

    public function contrats()
    {
        return $this->belongsToMany(Contrat::class)->withPivot('datedebut', 'datefin');
    }

    public function conges()
    {
        return $this->belongsToMany(Conge::class)->withPivot('datedebut', 'datefin');
    }

    public function talents()
    {
        return $this->belongsToMany(Talent::class,'employees_talents');
    }

    public function absences()
    {
        return $this->belongsToMany(Absence::class)->withPivot('datedebut', 'datefin');
    }
}
