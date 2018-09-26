<?php

namespace App\DataEngine\Models\Form;

use Illuminate\Database\Eloquent\Model;
use App\DataEngine\Concerns\BelongsToForm;

class FormColumn extends Model
{
    protected $delimeter = '----formcolumn----';

    /**
     * Get the name with delimeter for blade templating
     * on html input [name] attribute.
     * This makse it easier to differentiate between
     * FormResponses to FormColumns and standard data inputs
     *
     * @return string
     */
    public function inputName() 
    {
        $stripped = preg_replace('/\s+/', '', $this->name);

        return $this->delimeter . $this->id . '-' . strtolower($stripped);
    }

    /**
     * Get the Options json decoded
     *
     * @param  string  $value
     * @return json
     */
    public function getOptionsAttribute($value)
    {
        return json_decode($value);
    }
}
