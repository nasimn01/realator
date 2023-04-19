<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class property_category extends Model
{
    use HasFactory,SoftDeletes;
    public function locat(){
        return $this->belongsTo(location::class, 'location_id','id');
    }

    public function property(){
        return $this->hasMany(property::class, 'property_category_id','id');
    }
}
