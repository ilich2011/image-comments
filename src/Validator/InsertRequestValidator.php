<?php

namespace App\Validator;

class InsertRequestValidator
{
    public function validateRequest(array $data): bool
    {
        foreach ($data as $element) {
            if (empty($element)) {
                return false;
            }
        }
        return true;
    }
}