<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OperatorSponsorship extends Model
{
    use HasFactory;

    /*protected $fillable = ['operator_id', 'sponsorship_id', 'start_date', 'end_date'];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($operatorSponsorship) {
            $sponsorship = $operatorSponsorship->sponsorship;

            if ($sponsorship) {
                $endDate = $operatorSponsorship->start_date->addDays($sponsorship->duration);
                $operatorSponsorship->end_date = $endDate;
            }
        });
    }*/
    protected $table = 'operator_sponsorship';
    public function sponsorship()
    {
        return $this->belongsToMany(Sponsorship::class)->using(OperatorSponsorship::class);
    }

    public function operator()
    {
        return $this->belongsToMany(Operator::class)->using(OperatorSponsorship::class);
    }
}
