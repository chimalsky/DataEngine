<?php

namespace App\DataEngine\Concerns;

use App\DataEngine\Models\Data;
use Illuminate\Database\Eloquent\Relations\HasMany;


trait HasData
{

    public function data()
    {
        return $this->hasMany(Data::class);
    }

    public function dataCount()
    {
        return $this->data()->count();
    }

}