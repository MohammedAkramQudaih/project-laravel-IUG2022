<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
    public function payment_transaction()
    {
        return $this->hasMany(Payment_transaction::class);
    }
}
