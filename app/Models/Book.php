<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Book extends Model
{
    use HasFactory;

    public function scopeMycount($query){
        return count($query->where('user_id', Auth::user()->id)->get());
    }
}
