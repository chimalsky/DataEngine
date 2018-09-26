<?php

namespace App\DataEngine;

use Validator;
use App\DataEngine\Concerns\BelongsToForm;
use App\DataEngine\Concerns\HasFormResponses;
use App\DataEngine\Concerns\SavesFormResponses;

trait Formify
{
    use BelongsToForm, HasFormResponses, SavesFormResponses;

    protected $stored; 

    protected function validateInput(array $createRules, array $input): array
    {
        $validator = Validator::make($input, $createRules);
        return $validator->valid();
    }
    
}
