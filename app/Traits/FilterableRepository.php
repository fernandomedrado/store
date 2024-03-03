<?php

namespace App\Traits;

use App\Helpers\DateTimeHelper;
use App\Helpers\Helper;
use App\Models\Product;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Facades\DB;

trait FilterableRepository
{
    public function getWithFilters(array $filters)
    {
        $query = parent::getModel();

        $itemsPerPage = env('ITEMS_PER_PAGE', 25);

        if (array_key_exists('page_limit', $filters) && !is_null($filters['page_limit'])) {
            $itemsPerPage = (int) $filters['page_limit'];
        }

        $page = $filters['page'] ?? 1;

        return $query->paginate($itemsPerPage, $query->from . '.*', 'page', $page);
    }
}
