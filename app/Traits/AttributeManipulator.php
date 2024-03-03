<?php

namespace App\Traits;

trait AttributeManipulator
{
    public function removePrefixFromAttributes(string $prefix, array $attributes): array
    {
        $result = [];
        foreach ($attributes as $key => $value) {
            $newKey = str_replace($prefix, '', $key);
            $result[$newKey] = $value;
        }

        return $result;
    }
}
