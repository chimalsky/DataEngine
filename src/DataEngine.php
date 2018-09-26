<?php
namespace App\DataEngine;

use App\DataEngine\Models\Data;

class DataEngine
{
    public static function save(array $params)
    {
        $data = new Data;
        return $data->saveData($params);
    }
}
