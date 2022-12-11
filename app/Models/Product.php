<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $guarded=[];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
    public function payment_transaction()
    {
        return $this->hasMany(Payment_transaction::class);
    }
}
