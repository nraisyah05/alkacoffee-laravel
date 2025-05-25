<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{
    protected $primaryKey = 'mitra_id';
    protected $table = 'mitra';

    protected $fillable = [
        'nama_mitra',
        'alamat',
        'email',
        'no_tlp',
        'jenis_mitra',
        'tanggal_bergabung',
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
