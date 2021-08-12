<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Order extends Model
{
    use HasFactory;

    public function customer(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function author(){
        return $this->belongsTo(User::class, 'author_id');
    }
}
