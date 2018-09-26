<?php

namespace App\DataEngine\Concerns;

use App\DataEngine\Models\Form\Form;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait HasForms
{
    public function forms(): HasMany
    {
        return $this->hasMany(Form::class);
    }

    public function getActiveForm(): Model
    {
        return $this->forms()->first();
    }
}