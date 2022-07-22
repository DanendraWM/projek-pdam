<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class voucher extends Model
{
    use HasFactory;
    public function berita()
    {
        return $this->belongsTo(berita::class,'berita_id');
    }
    public function invoice()
    {
        return $this->belongsTo(invoice::class,'invoice_id');
    }
    public function nota()
    {
        return $this->belongsTo(nota::class,'nota_id');
    }
}
