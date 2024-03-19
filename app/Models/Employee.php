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
    public function Poste()
    {
        return $this->belongsTo(Poste::class);
    }
    public function Departement()
    {
        return $this->belongsTo(Departement::class);
    }
    public function Contrats()
    {
        return $this->belongsToMany(Contrat::class,'employees_contrats',
            'employee_id','contrat_id')
            ->withPivot('datedebut','datefin');
    }
    public function Conges()
    {
        return $this->belongsToMany(Conges::class,'employees_conges',
            'employee_id','conges_id')
            ->withPivot('datedebut','datefin');
    }
    public function Talents()
    {
        return $this->belongsToMany(Talent::class,'employees_talents',
            'employee_id','talent_id');
    }
    public function Abscences()
    {
        return $this->belongsToMany(Conges::class,'employees_abscences',
            'employee_id','abscences_id')
            ->withPivot('datedebut','datefin');
    }



}
