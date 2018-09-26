<?php

namespace App\DataEngine\Concerns;

use App\DataEngine\Models\Project;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


trait BelongsToProject
{
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}