<?php

namespace App\Models;

use App\Models\Kasir;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Kasir extends Model
{
    protected $primaryKey = 'kasir_id';
    protected $table = 'kasir';

    protected $fillable = [
        'nama_pelanggan',
        'pesanan',
        'tanggal_pemesanan',
        'jumlah_pesanan',
        'total_harga',
        'metode_pembayaran',
    ];

    public function scopeFilter(Builder $query, $request, array $filterableColumns, array $searchableColumns = []): Builder
    {
        foreach ($filterableColumns as $column) {
            if ($request->filled($column)) {
                $query->where($column, $request->input($column));
            }
        }

        if ($request->filled('search') && !empty($searchableColumns)) {
            $query->where(function ($q) use ($request, $searchableColumns) {
                foreach ($searchableColumns as $column) {
                    $q->orWhere($column, 'LIKE', '%' . $request->input('search') . '%');
                }
            });
        }

        return $query;
    }
}
