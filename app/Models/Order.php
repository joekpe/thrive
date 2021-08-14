<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_number',
        'book_id',
        'book_name',
        'book_price',
        'book_quantity',
        'shipping_details_id',
        'user_id',
        'author_id',
        'currency'
];

    public function customer(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function author(){
        return $this->belongsTo(User::class, 'author_id');
    }
}
