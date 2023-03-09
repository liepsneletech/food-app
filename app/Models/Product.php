<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, Searchable;

    protected $fillable = ['title', 'img', 'desc', 'price', 'provider_id'];

    const SORT = [
        'asc_price' => 'Kaina nuo mažiausios',
        'dsc_price' => 'Kaina nuo didžiausios',
    ];

    public function toSearchableArray()
    {
        return [
            'title' => $this->title,
            'desc' => $this->desc,
        ];
    }

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }
}