<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nota extends Model
{
    use HasFactory;
    public function invoice()
    {
        return $this->belongsTo(invoice::class,'invoice_id');
    }
    public function scopeFilter($query, array $filters)
    {
        if (isset($filters['search']) ? $filters['search'] : false) {
            return $query->where('perihal', 'like', '%' . $filters['search'] . '%')
                ->orWhere('kegiatan', 'like', '%' . $filters['search'] . '%')
                ->orWhere('kode_nota', 'like', '%' . $filters['search'] . '%')
                ->orWhere('biaya', 'like', '%' . $filters['search'] . '%')
                ->orWhere('status', 'like', '%' . $filters['search'] . '%');
        }
    }
}
