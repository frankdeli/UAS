<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public function ebook() {
        return $this->hasOne(Ebook::class, 'id', 'ebook_id');
    }

    public function account() {
        return $this->belongsTo(Account::class);
    }
}
