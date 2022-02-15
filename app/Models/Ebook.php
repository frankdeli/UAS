<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ebook extends Model
{
    use HasFactory;

    public function order(){
        return $this->hasMany(Order::class);
    }

    public function cart() {
        return $this->belongsToMany(Cart::class, 'ebooks', 'id', 'ebook_id');
    }
}
