<?php

namespace App\DataEngine\Concerns;

use App\DataEngine\Models\Form\Form;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait BelongsToForm
{
    public function forms() 
    {
        return $this->belongsToMany(Form::class);
    }

    public function form(): BelongsTo
    {
        return $this->belongsTo(Form::class);
    }
}