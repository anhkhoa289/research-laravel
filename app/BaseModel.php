<?php
/**
 * Created by PhpStorm.
 * User: Khoa
 * Date: 8/17/2018
 * Time: 1:42 AM
 */

namespace App;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

trait BaseModel
{
    public function getOne(String $select = "*")
    {
        echo $this->table;
    }

    public function getMany(String $select = "*")
    {
        echo $this->table;
    }

    /**
     * Handle data and insert many
     * @param array $data
     * @return bool
     */
    public function createMany($data = [])
    {
        if (is_indexed($data)) {
            $current = Carbon::now();
            foreach ($data as &$item) {
                if (!isset($item['created_at'])) {
                    $item['created_at'] = $current;
                }
                if (!isset($item['updated_at'])) {
                    $item['updated_at'] = $current;
                }
            }
            return parent::insert($data);
        } else {
            return false;
        }
    }
}