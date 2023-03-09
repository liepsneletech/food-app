<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'surname', 'email', 'user_id', 'meal_id'];

    const STATUS = [
        'Nepatvirtintas' => 0,
        'Patvirtintas' => 1,
        'Atšauktas' => 2,
    ];

    public function meal()
    {
        return $this->belongsTo(Meal::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
