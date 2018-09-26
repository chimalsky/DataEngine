<?php

namespace App\DataEngine\Models\Form;

use Illuminate\Database\Eloquent\Model;

use App\DataEngine\Concerns\BelongsToUser;
use App\DataEngine\Concerns\BelongsToProject;
use App\DataEngine\Concerns\PivotsFormColumns;

class Form extends Model
{
    use BelongsToUser, BelongsToProject, PivotsFormColumns;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'arrangement' => 'array',
    ];

}
