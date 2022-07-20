<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoice extends Model
{
    use HasFactory;
    public function berita()
    {
        return $this->belongsTo(berita::class,'berita_id');
    }
    public function scopeFilter($query, array $filters)
    {
        if (isset($filters['search']) ? $filters['search'] : false) {
            return $query->where('kode_invoice', 'like', '%' . $filters['search'] . '%')
                ->orWhere('untuk_keperluan', 'like', '%' . $filters['search'] . '%')
                ->orWhere('unit_kerja', 'like', '%' . $filters['search'] . '%')
                ->orWhere('total', 'like', '%' . $filters['search'] . '%')
                ->orWhere('uraian', 'like', '%' . $filters['search'] . '%')
                ->orWhere('kode_mata_angsuran', 'like', '%' . $filters['search'] . '%')
                ->orWhere('jumlah_angsuran', 'like', '%' . $filters['search'] . '%')
                ->orWhere('realisasi', 'like', '%' . $filters['search'] . '%')
                ->orWhere('sisa_anggaran', 'like', '%' . $filters['search'] . '%')
                ->orWhere('permintaan', 'like', '%' . $filters['search'] . '%')
                ->orWhere('metode_pembayaran', 'like', '%' . $filters['search'] . '%')
                ->orWhere('status', 'like', '%' . $filters['search'] . '%');
        }
    }
}
