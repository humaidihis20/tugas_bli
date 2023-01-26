<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    use HasFactory;

    protected $fillable = [
        'purchases_id',
        'metode_pembayaran',
        'status_pembayaran',
    ];

    public function purchase()
    {
        return $this->belongsTo(Purchase::class, 'purchases_id', 'id');
    }
}
