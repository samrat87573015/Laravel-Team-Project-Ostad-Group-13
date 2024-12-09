<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecipeSlider extends Model
{
    protected $guarded = [];
    function user(){
        return $this->belongsTo(User::class);

    }
    function recipe(){
        return $this->belongsTo(Recipe::class);
    }
}