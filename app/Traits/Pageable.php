<?php

namespace App\Traits;

use Illuminate\Pagination\LengthAwarePaginator;

trait Pageable
{
    /**
     * Merge Row and Pagination
     */
    public function rowsPageable(LengthAwarePaginator $row): array
    {
        $query = request()->query();
        $lastPage = $row->lastPage();
        $path = $row->path();

        $first = array_merge($query, [$row->getPageName() => 1]);
        $last = array_merge($query, [$row->getPageName() => $lastPage]);

        return [
            'rows' => $row,
            'pagination' => [
                'total' => $row->total(),
                'count' => $row->count(),
                'per_page' => $row->perPage(),
                'current_page' => $row->currentPage(),
                'total_pages' => $lastPage,
            ],
            'links' => [
                'first' => $path . '?' . http_build_query($first),
                'last' => $path . '?' . http_build_query($last),
                'prev' => $row->previousPageUrl(),
                'next' => $row->nextPageUrl(),
            ],
        ];
    }
}
