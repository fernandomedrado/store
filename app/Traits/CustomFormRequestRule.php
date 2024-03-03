<?php

namespace App\Traits;

use Illuminate\Validation\Validator;

trait CustomFormRequestRule
{
    /**
     * Verifica se um campo deve ser preenchido ou não, de acordo com o valor de outro campo.
     *
     * @param  Validator  $validator Instância do validador.
     * @param  string  $field Nome do campo.
     * @param  array  $data Dados do formulário.
     * @param  string  $keyCheck Nome do campo que deve ser verificado.
     * @param  string  $keyValue Nome do campo que deve ser preenchido.
     * @param  string  $emptyMessage Mensagem de erro caso o campo não deva ser preenchido.
     * @param  string  $notEmptyMessage Mensagem de erro caso o campo deva ser preenchido.
     */
    public function crossCheckRule(
        Validator $validator,
        string $field,
        array $data,
        string $keyCheck,
        string $keyValue,
        string $emptyMessage,
        string $notEmptyMessage
    ) {
        $valueCheck = $data[$keyCheck] ?? null;
        $valueData = $data[$keyValue] ?? null;

        if ($valueCheck && empty($valueData)) {
            $validator->errors()->add(
                $field,
                $emptyMessage
            );
        } elseif (!$valueCheck && !empty($valueData)) {
            $validator->errors()->add(
                $field,
                $notEmptyMessage
            );
        }
    }

    public function recursiveCrossCheckRule(
        Validator $validator,
        array $data,
        string $firstKeyCheck,
        string $lastKeyCheck,
        string $firstEmptyMessage,
        string $lastEmptyMessage
    ) {
        $firstKeyValue = $data[$firstKeyCheck] ?? null;
        $lastKeyValue = $data[$lastKeyCheck] ?? null;

        if ($firstKeyValue && empty($lastKeyValue)) {
            $validator->errors()->add(
                $lastKeyCheck,
                $lastEmptyMessage
            );
        } elseif ($lastKeyValue && empty($firstKeyValue)) {
            $validator->errors()->add(
                $firstKeyCheck,
                $firstEmptyMessage
            );
        }
    }
}
