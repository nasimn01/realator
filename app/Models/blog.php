<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class blog extends Model
{
    use HasFactory,SoftDeletes;
    public function property_cat(){
        return $this->belongsTo(property_category::class, 'property_category_id','id');
    }
    
}
