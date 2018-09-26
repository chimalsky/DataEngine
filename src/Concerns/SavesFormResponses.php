<?php

namespace App\DataEngine\Concerns;

use App\DataEngine\Models\Form\FormResponse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

trait SavesFormResponses
{
    protected $form;

    protected function saveFormResponses(array $params): Collection
    {
        $this->form = $this->stored->form()->first();

        $relevantColumns = $this->filterRelevantColumns($params);
        
        $persisted = $relevantColumns->map(function($column) use ($params) {
            $formResponse = FormResponse::create(
                [
                    'data_id' => $this->stored->id,
                    'form_column_id' => $column->id,
                    'response' => $params[$column->inputName()]
                ]
            );

            $formResponse->data()->associate($this->stored);

            return $formResponse;
        }); 

        return $persisted;
    }

    /**
     * Determine which FormColumns are being responded to
     * dirtyParams is an array of input data, now let's
     * see if any of that data refers to a FormColumn
     * which is in the relevant Form
     * 
     * @param  array   $dirtyParams
     *
     * @return Collection
     */
    protected function filterRelevantColumns(array $dirtyParams)
    {
        $formColumns = $this->form->formColumns()->get();//->formColumns()->get();

        $relevant = $formColumns->filter(function ($column, $key) use ($dirtyParams) { 
            return array_key_exists($column->inputName(), $dirtyParams);
        });

        return $relevant;
    }
    
}