<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    public function operators(){
        return
        $this->belongsTo(Operator::class);
       }
       public function votes(){
        return
        $this->belongsTo(Vote::class);
       }
}
