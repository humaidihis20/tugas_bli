<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class Price extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'nama_item_id',
        'harga_sebelum_pajak',
        'harga_sesudah_pajak',
    ];

    public function items()
    {
        return $this->hasMany(Items::class);
    }

    public function purchases()
    {
        return $this->hasMany(Purchase::class, 'id', 'id');
    }
}
