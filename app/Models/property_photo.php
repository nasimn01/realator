<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class property_photo extends Model
{
    use HasFactory;
    public function prop(){
        return $this->belongsTo(property::class, 'property_id','id');
    }
}
