<?php
/**
 * Created by PhpStorm.
 * User: Khoa
 * Date: 8/12/2018
 * Time: 11:35 PM
 */

namespace App\Repositories;


use Illuminate\Support\Facades\DB;

class Repository
{
    // For testing
    public $group_id = 2;

    public $models = [];

    public function __construct()
    {
        foreach ($this->models as $key => $model) {
            if (!is_numeric($key)) {
                $modelTable = $key . "Table";
                $this->$key = new $model();
                $this->$modelTable = $this->$key->getTable();
            } else {
                $modelTable = $model . "Table";
                $this->$model = new $model();
                $this->$modelTable = $this->$model->getTable();
            }
        }
    }
}