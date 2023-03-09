<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'surname', 'email', 'user_id', 'product_id'];

    const STATUS = [
        'Nepatvirtintas' => 0,
        'Patvirtintas' => 1,
        'Atšauktas' => 2,
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
