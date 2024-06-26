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
        'CIN',
        'situuation matrimoniale',
        'nbrEnfants',
        'dateembauche',
        'type',
        'nationalite',
        'poste_id',
        'team_id',
        'user_id',
    ];

    public function poste()
    {
        return $this->belongsTo(Poste::class);
    }
    public function conges()
    {
        return $this->hasMany(Conges::class);
    }
    public function talents()
    {
        return $this->belongsToMany(Talent::class, 'employee_talents');
    }

    public function team()
    {
        return $this->belongsTo(Departement::class,'');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }





}
