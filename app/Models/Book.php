<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;
use App\Models\User;
use App\Models\MultiCurrency;

class Book extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'currency',
        'selling_price',
        'quantity',
        'category',
        'sub_category',
        'threshold',
    ];

    public function scopeMycount($query){
        return count($query->where('user_id', Auth::user()->id)->get());
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function multi_currency(){
        return $this->belongsTo(MultiCurrency::class, 'currency');
    }
}
