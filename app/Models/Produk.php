<?php

namespace App\Models;

use App\Models\Produk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;


class Produk extends Model
{
    protected $primaryKey = 'produk_id';
    protected $table = 'produk';

    protected $fillable = [
        'nama_produk',
        'deskripsi',
        'kategori',
        'harga',
        'stok',
        'gambar',
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
