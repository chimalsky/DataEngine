<?php

namespace App\DataEngine\Models;

use Illuminate\Database\Eloquent\Model;

use App\DataEngine\Formify;
use App\DataEngine\Events\DataCreating;
use App\DataEngine\Concerns\BelongsToUser;
use App\DataEngine\Models\Form\FormResponse;
use App\DataEngine\Concerns\BelongsToProject;

class Data extends Model
{
    use Formify, BelongsToUser, BelongsToProject;

    /**
     * The event map for the model.
     *
     * @var array
    */
    protected $dispatchesEvents = [
        'creating' => DataCreating::class
    ];

    public static $createRules = [
        'user_id' => 'required|integer',
        'project_id' => 'required|integer',
        'form_id' => 'required|integer',
        'geo_lat' => 'required',
        'geo_lng' => 'required',
        'geo_datetime' => 'required|date', 
        'geo_type' => 'required', 
        'geo_acc' => 'required|integer'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'project_id', 'form_id',
        'geo_lat', 'geo_lng', 'geo_datetime',
        'geo_type', 'geo_acc'
    ];

    protected $dates = ['geo_datetime'];

    public function saveData(array $inputs)
    {
        $created = self::create(
            $this->validateInput(self::$createRules, $inputs)
        );
        
        $this->stored = $created;

        $formResponses = $this->saveFormResponses(
            $this->validateInput(FormResponse::$createRules, $inputs)
        );

        return $formResponses;
    }
}
