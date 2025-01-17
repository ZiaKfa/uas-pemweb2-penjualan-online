<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $fillable = ['name', 'description', 'price', 'stock','image'];
    protected $casts = [
        'price' => 'decimal:2',
    ];
    
    public function orders()
    {
        return $this->belongsToMany(Order::class)
            ->withTimestamps();
    }


}