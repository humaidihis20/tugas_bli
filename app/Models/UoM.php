<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UoM extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_uom',
        'deskripsi_uom',
    ];

    public function item()
    {
        return $this->hasMany(UoM::class, 'uom_id', 'id');
    }

    public function purcase()
    {
        return $this->hasMany(Purchase::class, 'id', 'id');
    }
}
