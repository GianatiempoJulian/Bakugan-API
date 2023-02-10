<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;

    public function bakugans(){
        return $this->belongsToMany(Bakugan::class,'bakugans_attributes');
    }
}
