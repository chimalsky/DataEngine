<?php

namespace App\DataEngine\Models\Form;

use Illuminate\Database\Eloquent\Model;
use App\DataEngine\Concerns\BelongsToData;

class FormResponse extends Model
{
    use BelongsToData;
    
    public static $createRules = [
        'data_id' => 'required|integer',
        'form_column_id' => 'required|integer',
        'response' => 'nullable'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'data_id', 'form_column_id', 'response'
    ];

    

    public $timestamps = false;

    public function formColumn() 
    {
        return $this->hasOne('App\Models\FormColumn');
    }
}
