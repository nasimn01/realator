<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class property_category extends Model
{
    use HasFactory;
    public function locat(){
        return $this->belongsTo(location::class, 'location_id','id');
    }
}
