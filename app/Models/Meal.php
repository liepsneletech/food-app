<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Meal extends Model
{
    use HasFactory, Searchable;

    protected $fillable = ['title', 'desc', 'img', 'price', 'menu_id'];

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

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
