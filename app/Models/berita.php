<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class berita extends Model
{
    use HasFactory;
    protected $guarded = ['updated_at', 'created_at'];

    public function scopeFilter($query, array $filters)
    {
        if (isset($filters['search']) ? $filters['search'] : false) {
            return $query->where('judul', 'like', '%' . $filters['search'] . '%')
                ->orWhere('caption', 'like', '%' . $filters['search'] . '%')
                ->orWhere('status', 'like', '%' . $filters['search'] . '%');
        }
    }
    protected $casts = [
        'updated_at' => 'datetime',
        'created_at' => 'datetime',
    ];
}
