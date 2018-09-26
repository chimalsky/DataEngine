<?php

namespace App\DataEngine\Concerns;

use App\DataEngine\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


trait BelongsToUser
{
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}