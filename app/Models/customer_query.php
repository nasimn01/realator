<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class customer_query extends Model
{
    use HasFactory,SoftDeletes;
    public function prop(){
        return $this->belongsTo(property::class, 'property_id','id');
    }
}