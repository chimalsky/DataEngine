<?php

namespace App\DataEngine\Concerns;

use App\DataEngine\Models\Data;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


trait BelongsToData
{
    public function data(): BelongsTo
    {
        return $this->belongsTo(Data::class);
    }
}