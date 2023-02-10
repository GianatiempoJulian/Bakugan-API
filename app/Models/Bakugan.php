<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bakugan extends Model
{
    use HasFactory;

    public function attributes(){
        return $this->belongsToMany(Attribute::class,'bakugans_attributes');
    }

    public function serie(){
        return $this->belongsTo(Serie::class);
    }
}
