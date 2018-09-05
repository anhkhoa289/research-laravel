<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DepartmentTree extends Model
{
    use BaseModel;

    protected $fillable = [ 'department_id', 'path', 'position' ];
}
