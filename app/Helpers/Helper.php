<?php

namespace App\Helpers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Helper
{
    public static function getClassShortName(string $class)
    {
        $classParts = explode('\\', $class);
        return end($classParts);
    }

    public static function createDefaultJsonToResponse(
        bool $status, $content = null
    )
    {
        return ['status' => $status, 'body' => $content];
    }

    public static function getUserId()
    {
        return Auth::id();
    }

    public static function getUser()
    {
        return Auth::user();
    }

    public static function buildFilter(
        array $filters,
        string $table,
        string $field,
        string $param,
        Builder|Model $model
    ): Builder|Model {
        if (
            array_key_exists($param, $filters) &&
            !empty($filters[$param])
        ) {
            if (is_array($filters[$param])) {
                $model = $model->whereIn("{$table}.{$field}", $filters[$param]);
            } else {
                $model = $model->where("{$table}.{$field}", $filters[$param]);
            }
        }
        
        return $model;
    }
}
