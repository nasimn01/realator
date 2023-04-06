<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class property extends Model
{
    use HasFactory,SoftDeletes;
    public function locat(){
        return $this->belongsTo(location::class, 'location','id');
    }
    public function property_cat(){
        return $this->belongsTo(property_category::class, 'property_category_id','id');
    }
    
}
