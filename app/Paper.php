<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{
    protected $fillable = ['title', 'discr', 'text', 'updated_at'];
    
}
