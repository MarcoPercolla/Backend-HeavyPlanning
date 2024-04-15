<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OperatorSpecialization extends Model
{
    protected $table = 'operator_specialization';
    public $timestamps = false;

    public function Specialization()
    {
        return $this->belongsToMany(Specialization::class)->using(OperatorSpecialization::class);
    }

    public function operator()
    {
        return $this->belongsToMany(Operator::class)->using(OperatorSpecialization::class);
    }
}