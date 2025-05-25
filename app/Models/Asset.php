<?php

namespace App\Models;

use App\Models\Asset;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Asset extends Model
{
    protected $primaryKey = 'asset_id';
    protected $table = 'asset';

    protected $fillable = [
        'nama_asset',
        'kategori',
        'tanggal_pembelian',
        'tanggal_kadaluarsa',
        'status',
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
