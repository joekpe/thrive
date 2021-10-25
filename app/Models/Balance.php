<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Balance extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'transaction_type',
        'amount',
        'balance_left',
        'sweep_status',
        'sweep_number'
    ];

    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
