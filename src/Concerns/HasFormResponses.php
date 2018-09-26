<?php

namespace App\DataEngine\Concerns;

use App\DataEngine\Models\Form\FormResponse;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait HasFormResponses
{    
    public function formResponses(): HasMany
    {
        return $this->hasMany(FormResponse::class);
    }
}
