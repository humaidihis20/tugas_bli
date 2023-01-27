<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\DB;

class Items extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    // protected $table = 'items';

    protected $fillable = [
        'uom_id',
        'kode_item',
        'nama_item',
        'jenis_item',
        'quantity',
        'harga_item',
    ];

    public static function kodeItem()
    {
        $kode = DB::table('items')->max('kode_item');
        $addNol = '';
        $kode = str_replace("ITM", "", $kode);
        // #BU001
        $kode = (int) $kode + 1;
        $incrementKode = $kode;

        if (strlen($kode) == 1) {
            $addNol = "00";
        } elseif (strlen($kode) == 2) {
            $addNol = "0";
        }

        $kodeBaru = "ITM" . $addNol . $incrementKode;
        return $kodeBaru;
    }

    public function uom()
    {
        return $this->belongsTo(UoM::class, 'uom_id', 'id');
    }

    public function items()
    {
        return $this->belongsTo(Items::class, 'id_quantity', 'id');
    }

    public function purchase_uoms()
    {
        return $this->hasMany(Purchase::class, 'uoms_id', 'id');
    }
}
