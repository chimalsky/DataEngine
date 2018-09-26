<?php

namespace App\DataEngine\Concerns;

use App\DataEngine\Models\Form\FormColumn;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait PivotsFormColumns
{    
    public function formColumns()
    {
        return $this->belongsToMany(FormColumn::class);
    }
}

