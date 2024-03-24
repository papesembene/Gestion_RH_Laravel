<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conges extends Model
{
    use HasFactory;
    protected $table = 'conges';

    protected $fillable = [
        'status',
        'type_conges_id',
        'employee_id',
        'datedebut',
        'datefin'
    ];

    public function typeConges()
    {
        return $this->belongsTo(TypeConges::class);
    }


    public function employee()
    {
        return $this->belongsTo(Employee::class ,'employee_id' );
    }
}
