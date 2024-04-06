<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    protected  $table = 'equipes';
    protected $fillable = ['nom', 'leader_id','supervisor_id'];

    public function employee()
    {
        return $this->hasMany(Employee::class);
    }
    public function supervisor()
    {
        return Employee::where('id', $this->supervisor_id)->first();
    }

    public function leader()
    {
        return Employee::where('id', $this->leader_id)->first();
    }

    public function postes()
    {
        return $this->hasMany(Poste::class);
    }

    public function planning()
    {
        return $this->hasMany(Planning::class, 'team_id', 'id');
    }
}
