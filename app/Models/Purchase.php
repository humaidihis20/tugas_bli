<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_quantity',
        'tanggal',
        'nama_item_id',
        'sku',
        'invoice',
        'total',
        'harga_item',
        'quantity',
        'subtotal',
    ];

    public function items()
    {
        return $this->hasMany(Items::class, 'id_quantity', 'id');
    }

    public function items_uoms()
    {
        return $this->belongsTo(Items::class, 'uom_id', 'id');
    }

    public function payment()
    {
        return $this->hasMany(Payments::class, 'purchases_id', 'id');
    }

    public function price()
    {
        return $this->belongsTo(Price::class, 'id', 'id');
    }

    public function uoms()
    {
        return $this->belongsTo(UoM::class, 'id', 'id');
    }
}
