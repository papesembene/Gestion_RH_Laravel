<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planning extends Model
{
    use HasFactory;
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    public function team()
    {
        return $this->belongsTo(Departement::class,'team_id');
    }
}
