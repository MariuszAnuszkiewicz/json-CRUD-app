<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = [
        'make', 'model', 'engine', 'availability', 'photo',
    ];

}
