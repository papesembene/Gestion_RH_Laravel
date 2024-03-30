<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documents extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'fichier',
        'employee_id'
    ];
    public function employee()
    {
        return $this->belongsTo(Employee::class , );
    }
}
