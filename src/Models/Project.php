<?php

namespace App\DataEngine\Models;

use Illuminate\Database\Eloquent\Model;
use App\DataEngine\Concerns\HasData;
use App\DataEngine\Concerns\HasForms;

class Project extends Model
{
    use HasData, HasForms;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'short_description', 'long_description',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];
}
